<?php

class Controller  {

	public $linkModule = 'app/view/modules/';
	public $linkPage = 'app/view/pages/';

	function view($page, $data = []){
		$_SESSION['currentLink'] = (isset($_SERVER['https']) ? 'https' : 'http')."://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
		
		$category = new Category();

		require_once "app/view/master.php";
	}

	public function getLink(){

		$_SESSION['oldLink'] = $_SESSION['currentLink'];
		$_SESSION['currentLink'] = (isset($_SERVER['https']) ? 'https' : 'http')."://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	}
}