<?php

 class UserController extends Controller {

 	function register() {
 		if(isset($_SESSION['linkCurrent']))
			$_SESSION['linkOld'] = $_SESSION['linkCurrent'];
		$_SESSION['linkCurrent'] = (isset($_SERVER['HTTPS']) ? 'https' : 'http')."://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
		
 		$user = new User();
 		if(isset($_POST['btnRegister'])){
 			$check = $user->checkUser($_POST['username'], $_POST['password']);

 			if($check){
 				$_SESSION['script'] = 'alert("User đã tồn tại")';
 				header("location:".$_SESSION['linkOld']);
 			}else{
 				$userInsert = $user->store($_POST['username'], $_POST['password']);
 				$_SESSION['script'] = 'alert("Đăng ky thành công")';
 				$_SESSION['username'] = $_POST['username'];
 				header("location:".$_SESSION['linkOld']);
 			}
 		}
 	}
 	function login() {
 		if(isset($_SESSION['linkCurrent']))
			$_SESSION['linkOld'] = $_SESSION['linkCurrent'];
		$_SESSION['linkCurrent'] = (isset($_SERVER['HTTPS']) ? 'https' : 'http')."://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

 		$user = new User();
 		if(isset($_POST['btnLogin'])){
 			$check = $user->checkUser($_POST['username'], $_POST['password']);

 			if($check){
 				$_SESSION['user']['name'] = $_POST['username'];
 				$_SESSION['script'] = 'alert("Ban Da Dang nhap thanh cong bay gio ban co the tham gia binh luan")';
 				header("location:".$_SESSION['linkOld']);
 			}else{
 				$_SESSION['script'] = 'alert("User khong ton tai")';
 				header("location:".$_SESSION['linkOld']);
 			}
 		}
 	}
 }