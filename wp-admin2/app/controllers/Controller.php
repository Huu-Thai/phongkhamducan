<?php

class Controller  {

	public $linkModule = 'app/view/modules/';
	public $linkPage = 'app/view/pages/';

	function view($page, $data = []){


		require_once "app/view/master.php";
	}
}