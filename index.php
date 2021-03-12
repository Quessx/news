<?php

require_once "controller/Controller.php";

$conn = new Controller();

$curl = $conn->model('Curl');
$model = $conn->model('Model');
$view = $conn->view('View');

$view->header();
$view->contents();
$view->saveImg();

echo $view->arrRes[0];

require_once 'view/head.php';
require_once 'view/body.php';
