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

	public function handleAddTopic(){

		$category = new Category();
		$this->getLink();

		if(isset($_POST['btnOK'])){
			$data['TieuDe'] = $category->deleteFormat($_POST['TieuDe']);
			$data['TieuDeKD'] = $category->stripUnicode($data['TieuDe']);	
			$data['TomTat'] = $category->deleteFormat($_POST['TomTat']);
			
			if($category->AddTopic($data) != false){

				$_SESSION['script'] = "alert('Thêm thành công')";
				header("location:".$_SESSION['oldLink']);
			}else{

				$_SESSION['script'] = "alert('Thêm loại tin xãy ra lỗi')";
				header("location:".$_SESSION['oldLink']);
			}
		}
	}

	function addNews(){
		$category = new Category();
		$data['category'] = $category->getCategory();

		$this->view('add-news', $data);
	}

	public function handleAddNews(){
		$category = new Category();
		$this->getLink();

		if(isset($_POST['btnOK'])){

			$data['Parent'] = (int)$_POST['Parent'];
			$data['TieuDe'] = $category->deleteFormat($_POST['TieuDe']);
			$data['TieuDeKD'] = $category->stripUnicode($data['TieuDe']);
			$data['UrlHinh'] = str_replace('images', 'upload', $category->deleteFormat($_POST['UrlHinh']));
			$data['TomTat'] = $category->deleteFormat($_POST['TomTat']);
			$data['NoiDung'] = $category->deleteFormat($_POST['NoiDung']);
			$data['Title'] = $category->deleteFormat($_POST['Title']);
			$data['Des'] = $category->deleteFormat($_POST['Des']);
			$data['Keyword'] = $category->deleteFormat($_POST['Keyword']);
			
			if($category->addPage($data) != false){

				$_SESSION['script'] = "alert('Thêm thành công')";
				header("location:".$_SESSION['oldLink']);
			}else{

				$_SESSION['script'] = "alert('Thêm loại tin xãy ra lỗi')";
				header("location:".$_SESSION['oldLink']);
			}
		}
	}
}