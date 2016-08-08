<?php
class bankController extends Controller {
    function bank_page(){
        $bank=$this->model("bankAccount");
        $result=$bank->account();
        $this->view("bankPage",$result);
    }
    function moneyInOut(){
        
    }
    function changeAccount(){
        $this->view("changeAccount");
    }
    function showDetail(){
        $this->view("changeAccount");
    }
}

?>
