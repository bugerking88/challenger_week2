<?php
class PdoConnect
{
    protected $result;
    protected $Link;
    function connectPDO($com)
    {
        $db=new PDO("mysql:host=localhost;dbname=bank_account;port=3306","root","");
        $db->exec("set names utf8");
        $this->result=$db->query($com);
    }
    function selectResult()//回傳insert update delete 的結果
    {
        return $this->result;
    }
    function connectGetdata($com)
    {
        $this->connectPDO($com);
        $row=$this->result->fetchAll(PDO::FETCH_ASSOC);
        return $row;
    }
}