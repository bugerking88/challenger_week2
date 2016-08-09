<?php
class PdoConnect 
{
    protected $result;
    protected $Link;

    public function connectPDO($com) 
    {
        $db=new PDO("mysql:host=localhost;
        dbname=bank_account;port=3306", "root", "");
        $db->exec("set names utf8");
        $this->result=$db->query($com);
    }
    
    //回傳insert update delete 的結果
    public function selectResult() 
    {
        return $this->result;
    }

    public function connectGetdata($com)
    {
        $this->connectPDO($com);
        $row = $this->result->fetchAll(PDO::FETCH_ASSOC);
        return $row;
    }

}