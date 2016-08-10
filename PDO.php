<?php

require_once("config.php");

class Connect
{
    public $nowtime;
    public $con;
    public $db;
    private $dbname = "payment";
    private $host = "localhost";
    private $user = "root";
    private $password = "";

    //建立連線
    public function __construct()
    {
        $this->nowtime = date("Y-m-d H:i:s");
        $this->db = new PDO("mysql:host=localhost;dbname=payment;port=3306", "root", "");
        $this->db->exec("set names utf8");
    }

    //存入使用
    public function deposit($user, $money)
    {
        try{
            $this->db->begintransaction;

            $cmd = "SELECT `id`,`money` FROM `list`".
                   "WHERE `account` = :user FOR UPDATE ";
            $result = $this->db->prepare($cmd);
            $result->bindParam(':user', $user);
            $result->execute();
            $totle = $result->fetchAll(PDO::FETCH_ASSOC);
            $newmoney = $totle[0]["money"] + $money ;

            $cmd = "INSERT INTO `info` (`userId`, `date`, `type`, `money`, `totle`)".
                   "VALUES (:id, :time, '存入', :money, :newmoney)";
            $result = $this->db->prepare($cmd);
            $result->bindParam(':id', $totle[0]["id"]);
            $result->bindParam(':time', $this->nowtime);
            $result->bindParam(':money', $money);
            $result->bindParam(':newmoney', $newmoney);
            $result->execute();

            $cmd = "UPDATE `list` SET `money` = `money` + ? WHERE `account` = ?";
            $result = $this->db->prepare($cmd);
            $result->bindParam(1, $money);
            $result->bindParam(2, $user);
            $result->execute();

            $this->db->commit;

            return "成功";
        } catch (PDOException $err) {
            $this->db->rollback;

            echo "error" . $err->getMessage();

            exit;
        }

    }

    //取出使用
    public function withdraw($user, $money)
    {
        try{
            $this->db->begintransaction;

            $cmd = "SELECT `id`,`money` FROM `list`".
                   "WHERE `account` = :user FOR UPDADE ";
            $result = $this->db->prepare($cmd);
            $result->bindParam(':user', $user);
            $result->execute();
            $totle = $result->fetchAll(PDO::FETCH_ASSOC);

            $newmoney = $totle[0]["money"] - $money ;

            if ($money <= $totle[0]["money"]) {
                $cmd = "INSERT INTO `info` (`userId`, `date`, `type`, `money`, `totle`)".
                       "VALUES (:id, :time, '提出', :money, :newmoney)";
                $result = $this->db->prepare($cmd);
                $result->bindParam(':id', $totle[0]["id"]);
                $result->bindParam(':time', $this->nowtime);
                $result->bindParam(':money', $money);
                $result->bindParam(':newmoney', $newmoney);
                $result->execute();

                $cmd = "UPDATE `list` SET `money` = `money` - ?".
                       "WHERE `account` = ?";
                $result = $this->db->prepare($cmd);
                $result->bindParam(1, $newmoney);
                $result->bindParam(2, $user);
                $result->execute();

                $this->db->commit;

                return "成功";
            } else {
                $this->db->rollback;

                return "失敗";
            }
        } catch (PDOException $err) {
            $this->db->rollback;

            echo "error" . $err->getMessage();

            exit;
        }
    }

    //交易明細
    public function info()
    {
        $cmd = "SELECT * FROM `info` WHERE `userId` = (SELECT `id` FROM `list` WHERE `account` = :user)".
               "ORDER BY `date` ASC";
        $result = $this->db->prepare($cmd);
        $result->bindParam(':user', $_SESSION["user"]);
        $result->execute();
        $info = $result->fetchAll(PDO::FETCH_ASSOC);

        return $info;
    }

    //餘額查詢
    public function money()
    {
        $cmd = "SELECT * FROM `list` WHERE `account` = :user ";
        $result = $this->db->prepare($cmd);
        $result->bindParam(':user', $_SESSION["user"]);
        $result->execute();
        $user = $result->fetchAll(PDO::FETCH_ASSOC);

        return $user;
    }

    //帳戶資料
    public function user()
    {
        $cmd = "SELECT * FROM `list`";
        $result = $this->db->prepare($cmd);
        $result->execute();
        $user = $result->fetchAll(PDO::FETCH_ASSOC);

        return $user;
    }

    //解除連線
    public function __destruct()
    {
        $this->db = null;
    }
}