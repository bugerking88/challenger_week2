<?php
require_once("PDO_connect.php");
class bankAccount extends PDO_connect
{
    function account()
    {//所有會員名稱餘額
        $sql="SELECT * FROM `member_Table`";
	    $accountShow=$this->connect_getdata($sql);
	    return $accountShow;
    }
    function detail()
    {//顯示全部的明細
        $sql="SELECT * FROM `trans_detail`";
        $detail=$this->connect_getdata($sql);
	    return $detail;
    }
    // function trans($money)
    // {//計算轉帳金額
    //     $sql="UPDATE `member_Table` SET `balance`=`balance`+$money";
    //     $this->connect_PDO($sql);
    //     $sql="INSERT INTO `trans_detail` (`id`,`trans_money`) values('1','$money')";
    //     $this->connect_PDO($sql);
    // }
    function trans($money)
    {//計算轉帳金額
        $db=new PDO("mysql:host=localhost;dbname=bank_account;port=3306","root","");
        $db->beginTransaction();
        $sql="SELECT * FROM product WHERE id = :1 FOR UPDATE";
        sleep(3);
        $sql="UPDATE `member_Table` SET `balance`=`balance`+$money";
        $this->connect_PDO($sql);
        $sql="INSERT INTO `trans_detail` (`id`,`trans_money`) values('1','$money')";
        $this->connect_PDO($sql);
    }
}


