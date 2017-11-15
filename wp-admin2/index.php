<?php

session_start();

$adminControllers = 'app/controllers/';
$adModel = 'app/Model/';


require_once $adminControllers.'Controller.php';
require_once $adminControllers."HomeController.php";
require_once $adminControllers."CategoryController.php";
require_once $adminControllers."NewsController.php";
require_once $adminControllers.'UserController.php';
require_once $adminControllers.'CommentController.php';

$nameCtr = 'HomeController';
$action = 'index';

if(isset($_GET['nameCtr']) && isset($_GET['action'])) {
	$nameCtr = $_GET['nameCtr'];
	$action = $_GET['action'];
}

$controller = new $nameCtr();
$controller->$action();