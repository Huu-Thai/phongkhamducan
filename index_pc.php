<?php
session_start();

$controllers = 'app/controllers/';
$models = 'app/model/';

require_once $models."DB.php";
require_once $models."Loai.php";

require_once $controllers."Controller.php";
require_once $controllers."HomeController.php";
require_once $controllers."SingleController.php";
require_once $controllers."ChuyenkhoaController.php";

$nameCtr = 'HomeController';
$action = 'index';

if(isset($_GET['nameCtr']) && isset($_GET['action'])){
	$nameCtr = $_GET['nameCtr'];
	$action = $_GET['action'];
}

$controller = new $nameCtr();
$controller->$action();