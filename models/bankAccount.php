<?php
require_once("PDO_connect.php");
class bankAccount extends PDO_connect{
    function account(){
        $sql="SELECT * FROM `member_Table`";
	    $accountShow=$this->connect_getdata($sql);
	    return $accountShow;
    }
    function detail(){
        $sql="SELECT * FROM `trans_detail`";
        $detail=$this->connect_getdata($sql);
	    return $detail;
    }
}

?>
