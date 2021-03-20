<?php

require_once "controller/Controller.php";

$conn = new Controller();

$curl = $conn->model('Curl');
$getContents = $conn->model('GetContents');
$model = $conn->model('Model');
$view = $conn->view('View');

$model->dataEntry();

require_once $view->head();
require_once $view->body('body.php');
