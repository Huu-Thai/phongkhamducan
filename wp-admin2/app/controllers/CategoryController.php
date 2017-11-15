<?php 

class CategoryController extends Controller {

	public function addNews(){

		$this->view('add-category');
	}

	public function addPage(){
		
		$this->view('add-page');
	}

	public function addMenu(){

		$this->view('add-menu');
	}
}