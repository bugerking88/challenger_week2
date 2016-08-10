<?php

class PDOConnect
{
    protected $db;
    public function __construct()
    {
        $host = "localhost";
        $dbName = "bank_account";
        $this->db = new PDO("mysql:host=$host;dbname=$dbName;port=3306", "root", "");
        $this->db->exec("set names utf8");
    }

}
