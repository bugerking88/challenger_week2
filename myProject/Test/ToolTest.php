<?php

require_once '/home/ubuntu/workspace/bank_account/models/BankAccount.php';

class BankAccountTest extends \PHPUnit_Framework_TestCase {

    public function testCreatBankClass()
    {
         return new BankAccount();
    }

    /**
     * @depends testCreatBankClass
     */
    public function testShowAccount($bankClass){
        $bankClass->showAccount();
    }

    /**
     * @depends testCreatBankClass
     */
    public function testShowDetail($bankClass){
        $bankClass->showDetail();
    }

    /**
     * @depends testCreatBankClass
     */
    public function testTrans($bankClass){
        $bankClass->trans('500');
        $bankClass->trans('-200000');
    }

}
