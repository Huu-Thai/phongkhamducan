<?php

class Controller  {

	public $linkModule = 'app/view/modules/';
	public $linkPage = 'app/view/pages/';
	public $root = 'http://localhost/phongkhamducan/wp-admin2/';
	public $linkLogin = 'index.php?nameCtr=UserController&action=showLogin';

		
	function view($page, $data = []){
		$news = new News();
		$category = new Category();
		$phone = new Phone();
		$comment = new Comment();

		$_SESSION['currentLink'] = (isset($_SERVER['https']) ? 'https' : 'http')."://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

		if(isset($_SESSION['user']))
			require_once "app/view/master.php";
		else
			header("location:".$this->linkLogin);	
	}


	public function getLink(){

		$_SESSION['oldLink'] = $_SESSION['currentLink'];
		$_SESSION['currentLink'] = (isset($_SERVER['https']) ? 'https' : 'http')."://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	}
}