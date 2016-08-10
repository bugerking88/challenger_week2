<?php

class Controller
{
    public function model($model, $data = null)
    {
        require_once "../bank_account/models/$model.php";

        return new $model();
    }

    public function view($view, $data = array())
    {
        require_once "../bank_account/views/$view.php";
    }

}