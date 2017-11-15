<?php

class NewsController extends Controller {

	function addTopic(){

		$this->view('add-topic');
	}

	function addNews(){

		$this->view('add-news');
	}
}