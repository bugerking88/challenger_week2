<?php
class bankController extends Controller {
    function bank_page(){
        $bank=$this->model("bankAccount");
        $result1=$bank->account();
        $result2=$this->showDetail();
        $this->view("bankPage",Array($result1,$result2));
    }
    function moneyInOut(){
        
    }
    function changeAccount(){
        $this->view("changeAccount");
    }
    function showDetail(){
        $detail=$this->model("bankAccount");
        $result=$detail->detail();
        return $result;
    }
}

?>
