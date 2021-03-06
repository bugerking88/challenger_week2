<?php

require_once("PDOConnect.php");

class BankAccount extends PDOConnect
{
    //所有會員名稱餘額
    public function showAccount()
    {
        $sql = "SELECT * FROM `MemberTable`";
        $result = $this->db->prepare($sql);
        $result->execute();
        $accountShow = $result->fetchAll();

        return $accountShow;
    }

    //顯示全部的明細
    public function showDetail()
    {
        $sql = "SELECT * FROM `TransDetail`";
        $result = $this->db->prepare($sql);
        $result->execute();
        $detail = $result->fetchAll();

        return $detail;
    }

    //計算轉帳金額
    public function trans($money)
    {
        try {
            //鎖住查詢select ... FOR UPDATE同時只能有一個在語句執行select ... LOCK IN SHARE MODE可以多個同時執行
            $this->db->beginTransaction();
            $sql = "SELECT * FROM `MemberTable` WHERE id = 1 LOCK IN SHARE MODE";
            $result = $this->db->prepare($sql);
            $result->execute();
            $getBalance = $result->fetchAll();

            $total = $getBalance[0]['balance'] + $money;

            if ($total >= 0) {
                //更新餘額
                $sql = "UPDATE `MemberTable` SET `balance` = :balance WHERE id = 1";
                $updateBalance = $this->db->prepare($sql);
                $updateBalance->bindParam(':balance', $total);
                $updateBalance->execute();

                //存入明細Table
                $transTime = date("Y-m-d H:i:s");
                $sql = "INSERT INTO `TransDetail`(`id`, `transMoney`, `currentBalance`, `dateTime`)";
                $sql .= "VALUES('1', :money, :total, :transTime)";
                $result = $this->db->prepare($sql);
                $result->bindParam(':money', $money);
                $result->bindParam(':total', $total);
                $result->bindParam(':transTime', $transTime);
                $result->execute();
                $msg = "存款成功";
            } else {
                throw new PDOException("餘額不足");
            }
            $this->db->commit();
        } catch (Exception $err) {
            $this->db->rollBack();
            $msg = $err->getMessage();
        }
        return $msg;
    }
}
