<?php
require_once("PDO_connect.php");
class bankAccount extends PDO_connect{
    function account(){
        $sql="SELECT * FROM `member_table`";
	    $accountShow=$this->connect_getdata($sql);
	    return $accountShow;
    }
}

?>
