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

	public function handleAddCate(){
		$category = new Category();
		$this->getLink();

		if(isset($_POST['btnOK'])){
			$data['TieuDe'] = $category->deleteFormat($_POST['TieuDe']);
			$data['TieuDeKD'] = $category->stripUnicode($data['TieuDe']);
			$data['UrlHinh'] = str_replace('images', 'upload', $category->deleteFormat($_POST['UrlHinh']));
			$data['Title'] = $category->deleteFormat($_POST['Title']);
			$data['Des'] = $category->deleteFormat($_POST['Des']);
			$data['Parent'] = (int)$_POST['Parent'];
			$data['Keyword'] = $category->deleteFormat($_POST['Keyword']);
			$data['TomTat'] = $category->deleteFormat($_POST['TomTat']);
			
			if($category->store($data) != false){

				$_SESSION['script'] = "alert('Thêm thành công')";
				header("location:".$_SESSION['oldLink']);
			}else{

				$_SESSION['script'] = "alert('Thêm loại tin xãy ra lỗi')";
				header("location:".$_SESSION['oldLink']);
			}
		}
	}

	public function addPage(){
		
		$this->view('add-page');
	}

	public function handleAddPage(){

		$category = new Category();
		$this->getLink();

		if(isset($_POST['btnOK'])){
			$data['TieuDe'] = $category->deleteFormat($_POST['TieuDe']);
			$data['TieuDeKD'] = $category->stripUnicode($data['TieuDe']);
			$data['UrlHinh'] = str_replace('images', 'upload', $category->deleteFormat($_POST['UrlHinh']));
			$data['TomTat'] = $category->deleteFormat($_POST['TomTat']);
			$data['NoiDung'] = $category->deleteFormat($_POST['NoiDung']);
			$data['Title'] = $category->deleteFormat($_POST['Title']);
			$data['Des'] = $category->deleteFormat($_POST['Des']);
			$data['Keyword'] = $category->deleteFormat($_POST['Keyword']);
			
			if($category->addpage($data) != false){

				$_SESSION['script'] = "alert('Thêm thành công')";
				header("location:".$_SESSION['oldLink']);
			}else{

				$_SESSION['script'] = "alert('Thêm loại tin xãy ra lỗi')";
				header("location:".$_SESSION['oldLink']);
			}
		}
	}

	public function addMenu(){

		$this->view('add-menu');
	}


}