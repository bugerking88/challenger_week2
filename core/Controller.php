<?php

class Controller 
{
    public function model($model, $data = NULL) 
    {
        require_once "../bank_account/models/$model.php";
        return new $model ();
    }

    public function view($view, $data = Array()) 
    {
        require_once "../bank_account/views/$view.php";
    }

}