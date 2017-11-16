<?php

session_start();

$_SESSION['adminRoot'] = __DIR__;


$adminControllers = 'app/controllers/';
$adminModel = 'app/Model/';

require_once $adminModel."DB.php";
require_once $adminModel."Category.php";
require_once $adminModel."News.php";
require_once $adminModel."User.php";
require_once $adminModel."Comment.php";

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