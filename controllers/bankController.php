<?php

class BankController extends Controller 
{
    //帳戶頁面
    public function bankPage() 
    {
        $bank = $this->model("BankAccount");
        $result1 = $bank->account();
        $result2 = $this->showDetail();
        $this->view("bankPage", Array($result1, $result2));
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
        $result = $detail->detail();
        return $result;
    }
    
    //轉帳後跳轉
    public function transferMoney() 
    {
        $trans = $this->model("BankAccount");
        $money = $_POST['send'];
        $trans->trans($money);
        header('Location: /bank_account/bank/bankPage');
    }

}

