<?php

class PDOConnect
{
    protected $result;
    protected $Link;
    protected $db;
    public function __construct()
    {
        $host="localhost";
        $dbName="bank_account";
        $this->db=new PDO("mysql:host=$host;dbname=$dbName;port=3306", "root", "");
        $this->db->exec("set names utf8");
    }
    public function connectPDO($com)
    {
        return $this->db->query($com);
    }

    public function connectGetdata($com)
    {
        $result = $this->connectPDO($com);
        $row = $result->fetchAll(PDO::FETCH_ASSOC);
        return $row;
    }

}

<?php
class PDO_connect{
        protected $result;
        protected $Link;
        function connect_PDO($com){
                $db=new PDO("mysql:host=localhost;dbname=activety;port=3306","root","");
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