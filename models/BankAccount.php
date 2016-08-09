<?php
require_once("PDO_connect.php");

class BankAccount extends PdoConnect 
{
    function account() 
    {//所有會員名稱餘額
        $sql = "SELECT * FROM `member_Table`";
	    $accountShow = $this->connectGetdata($sql);
	    return $accountShow;
    }

    function detail() 
    {//顯示全部的明細
        $sql = "SELECT * FROM `trans_detail`";
        $detail = $this->connectGetdata($sql);
	    return $detail;
    }

    function trans($money) 
    {//計算轉帳金額
        $db = new PDO("mysql:host=localhost;dbname=bank_account;port=3306", "root", "");
        $db->beginTransaction();
        $sql = "SELECT * FROM product WHERE id = :1 FOR UPDATE";
        sleep(3);
        $sql = "UPDATE `member_Table` SET `balance`=`balance`+$money";
        $this->connectPDO($sql);
        $sql = "INSERT INTO `trans_detail` (`id`, `trans_money`) values('1', '$money')";
        $this->connectPDO($sql);
    }

}


