<?php

class NewsController extends Controller {

	function __construct(){

		if(!isset($_SESSION['user'])){
			header("location:".$this->linkPage.'login.php');
		}
	}

	function addTopic(){
		$category = new Category();
		$data['category'] = $category->getCategory();

		$this->view('add-topic');
	}

	function addNews(){
		$category = new Category();
		$data['category'] = $category->getCategory();

		$this->view('add-news');
	}
}