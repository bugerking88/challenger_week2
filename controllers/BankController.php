<?php

class BankController extends Controller
{
    //帳戶頁面
    public function bankPage()
    {
        $bank = $this->model("BankAccount");
        $accountShow = $bank->showAccount();
        $showDetail = $this->showDetail();
        $this->view("bankPage", [$accountShow, $showDetail]);
    }

    //顯示轉帳頁面
    public function moneyInOut()
    {
        $this->view("moneyInOut");
    }

    //更換使用者
    public function changeAccount()
    {
        $this->view("changeAccount");
    }

    //顯示轉入出明細
    public function showDetail()
    {
        $detail = $this->model("BankAccount");
        $result = $detail->showDetail();

        return $result;
    }

    //轉帳後跳轉
    public function transferMoney()
    {
        $trans = $this->model("BankAccount");
        $money = $_POST['send'];
        $msg = $trans->trans($money);
        $this->view("showErrorMsg", $msg);
        header("refresh:0, url=https://lab-rain-wang.c9users.io/bank_account/Bank/bankPage");
    }
}

