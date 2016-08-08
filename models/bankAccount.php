<?php
require_once("PDO_connect.php");
class bankAccount extends PDO_connect{
    function account(){//所有會員名稱餘額
        $sql="SELECT * FROM `member_Table`";
	    $accountShow=$this->connect_getdata($sql);
	    return $accountShow;
    }
    function detail(){//顯示全部的明細
        $sql="SELECT * FROM `trans_detail`";
        $detail=$this->connect_getdata($sql);
	    return $detail;
    }
}

?>
