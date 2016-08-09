<?php

class BankController extends Controller 
{
    function bankPage() 
    {//帳戶頁面
        $bank = $this->model("BankAccount");
        $result1 = $bank->account();
        $result2 = $this->showDetail();
        $this->view("bankPage", Array($result1,$result2));
    }

    function moneyInOut() 
    {//顯示轉帳頁面
        $this->view("moneyInOut");
    }

    function changeAccount()
    {//更換使用者
        $this->view("changeAccount");
    }

    function showDetail() 
    {//顯示轉入出明細
        $detail = $this->model("BankAccount");
        $result = $detail->detail();
        return $result;
    }

    function transferMoney() 
    {//轉帳後跳轉
        $trans = $this->model("BankAccount");
        $money = $_POST['send'];
        $trans->trans($money);
        header('Location: /bank_account/bank/bankPage');
    }

}

