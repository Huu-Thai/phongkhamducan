<?php 

class CategoryController extends Controller {

	function __construct(){

		if(!isset($_SESSION['user'])){
			header("location:".$this->linkPage.'login.php');
		}
	}

	public function addCate(){
		$category = new Category();

		$data['category'] = $category->getCategory();

		$this->view('add-category', $data);
	}

	public function addPage(){
		
		$this->view('add-page');
	}

	public function addMenu(){

		$this->view('add-menu');
	}
}