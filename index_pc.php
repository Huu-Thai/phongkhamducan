<?php
// session_start();
if(isset($_SESSION['user']) && isset($cookie) == 0){
	$expeired = time()+(24*60*60);
	$value = strval(json_encode($_SESSION['user']));
	setcookie('user',$value, $expeired);
	$cookied = 1;
}
if(!isset($_SESSION['user'])){
	$cookied = 0;
}
if(isset($_COOKIE['user']) && !isset($_SESSION['user'])){
	$_SESSION['user'] = json_decode($_COOKIE['user'], true);
}
$controllers = 'app/controllers/';
$models = 'app/model/';

require_once $models."DB.php";
require_once $models."Loai.php";
require_once $models."News.php";
require_once $models."Rating.php";
require_once $models."User.php";
require_once $models."Comment.php";

require_once $controllers."Controller.php";
require_once $controllers."HomeController.php";
require_once $controllers."SingleController.php";
require_once $controllers."ChuyenkhoaController.php";
require_once $controllers."UserController.php";

$nameCtr = 'HomeController';
$action = 'index';

if(isset($_GET['nameCtr']) && isset($_GET['action'])){
	$nameCtr = $_GET['nameCtr'];
	$action = $_GET['action'];
}

$controller = new $nameCtr();
$controller->$action();