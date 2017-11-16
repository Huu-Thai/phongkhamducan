<?php

class Controller  {

	public $linkModule = 'app/view/modules/';
	public $linkPage = 'app/view/pages/';
	public $root = 'http://localhost/phongkhamducan/wp-admin2/';

		
	function view($page, $data = []){
		$_SESSION['currentLink'] = (isset($_SERVER['https']) ? 'https' : 'http')."://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	
		$category = new Category();

		if(isset($_SESSION['user']))
			require_once "app/view/master.php";
		else
			header("location:index.php?nameCtr=UserController&action=showLogin");	
	}


	public function getLink(){

		$_SESSION['oldLink'] = $_SESSION['currentLink'];
		$_SESSION['currentLink'] = (isset($_SERVER['https']) ? 'https' : 'http')."://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	}
}