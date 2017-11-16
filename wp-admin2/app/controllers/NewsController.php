<?php

class NewsController extends Controller {

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