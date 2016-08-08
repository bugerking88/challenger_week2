<?php
class PDO_connect{
        protected $result;
        protected $Link;
        function connect_PDO($com){
                $db=new PDO("mysql:host=localhost;dbname=bank_account;port=3306","root","");
                $db->exec("set names utf8");
                $this->result=$db->query($com);
        }
        function selectResult()//回傳insert update delete 的結果
        {
                return $this->result;
        }
        function connect_getdata($com){
                $this->connect_PDO($com);
                $row=$this->result->fetchAll(PDO::FETCH_ASSOC);
                return $row;
        }
}
        
?> 