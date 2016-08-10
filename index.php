<?php
session_start();
date_default_timezone_set("Asia/Taipei");

header('Content-Type: text/html; charset=utf-8');

require_once 'core/App.php';
require_once 'core/Controller.php';

$app = new App();