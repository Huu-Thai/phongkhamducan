<?php

class NewsController extends Controller {

	function __construct(){

		if(!isset($_SESSION['user'])){
			header("location:".$this->linkPage.'login.php');
		}
	}

	public function showNews(){
		$news = new News();

		$data['pageSize'] = 20;
		$pageNum = 1;

		if (isset($_GET['pageNum']) == true) 
			$pageNum = (int)$_GET['pageNum'];

		if ($pageNum <= 0) 
			$pageNum = 1; 

		
		$TieuDe = isset($_GET['TieuDe']) ? $_GET['TieuDe'] : '';
		$TieuDe = $news->deleteFormat($TieuDe);

		$data['news'] = $news->getAllNews($totalRow, $pageNum, $data['pageSize'], $TieuDe);
		$data['totalRow'] = $totalRow;
		$data['pageNum'] = $pageNum;

		$this->view('show-news', $data);
	}

	public function showNews2(){
		$news = new News();
		$data['news'] = $news->getAllnews2();
		$this->view('show-news', $data);
	}

	public function addTopic(){
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
		$news = new News();
		$this->getLink();

		if(isset($_POST['btnOK']) == true && $_POST['idLoai'] != 0){

			$parentId = $category->findParentId($_POST['idLoai']);

			if($parentId == 0){

				$data['idCL'] = (int)$_POST['idLoai'];
				$data['idLoai'] = 0;
				$data['idCon'] = 0;
			}else{

				$parentId_1 = $category->findParentId($parentId);

				if($parentId_1 == 0){

					$data['idCL'] = $parentId;
					$data['idLoai'] = (int)$_POST['idLoai'];
					$data['idCon'] = 0;
				}else{

					$data['idCL'] = $parentId_1;
					$data['idLoai'] = $parentId;
					$data['idCon'] = (int)$_POST['idLoai'];
				}
			}


			$data['TieuDe'] = str_replace(['-',':','|'],'',$category->deleteFormat($_POST['TieuDe']));
			$data['TieuDeKD'] = $category->stripUnicode($data['TieuDe']);
			$data['UrlHinh'] = $category->deleteFormat($_POST['UrlHinh']);
			$data['TomTat'] = $_POST['TomTat'];
			$data['NoiDung'] = $_POST['NoiDung'];
			$data['Title'] = str_replace(['-',':','|'],'',$category->deleteFormat($_POST['Title']));
			$data['Des'] = $category->deleteFormat($_POST['Des']);
			$data['Keyword'] = $category->deleteFormat($_POST['Keyword']);
			
			if($insertId = ($news->store($data) != false)){

				$news->updateTieuDeKD($insertId, $data['TieuDeKD']);
				$_SESSION['script'] = "alert('Thêm thành công')";
				header("location:".$_SESSION['oldLink']);
			}else{

				die(mysqli_error());
			}
		}
	}

	public function updateNews(){
		$category = new Category();
		$news = new News();

		$idTT = $_GET['id'];
		$data['news'] = $news->findId($idTT);
		$data['category'] = $category->getCategory();

		$this->view('edit-news', $data);
	}

	public function handleUpdateNews(){
		$category = new Category();
		$news = new News();
		$this->getLink();

		if(isset($_POST['btnOK']) == true && $_POST['idLoai'] != 0){

			$parentId = $category->findParentId($_POST['idLoai']);

			if($parentId == 0){

				$data['idCL'] = (int)$_POST['idLoai'];
				$data['idLoai'] = 0;
				$data['idCon'] = 0;
			}else{

				$parentId_1 = $category->findParentId($parentId);

				if($parentId_1 == 0){

					$data['idCL'] = $parentId;
					$data['idLoai'] = (int)$_POST['idLoai'];
					$data['idCon'] = 0;
				}else{

					$data['idCL'] = $parentId_1;
					$data['idLoai'] = $parentId;
					$data['idCon'] = (int)$_POST['idLoai'];
				}
			}

			$data['idTT'] = (int)$_POST['idTT'];
			$data['TieuDe'] = str_replace(['-',':','|'],'',$category->deleteFormat($_POST['TieuDe']));
			$data['TieuDeKD'] = $category->stripUnicode($data['TieuDe']);
			$data['UrlHinh'] = $category->deleteFormat($_POST['UrlHinh']);
			$data['TomTat'] = $_POST['TomTat'];
			$data['NoiDung'] = $_POST['NoiDung'];
			$data['Title'] = str_replace(['-',':','|'],'',$category->deleteFormat($_POST['Title']));
			$data['Des'] = $category->deleteFormat($_POST['Des']);
			$data['Keyword'] = $category->deleteFormat($_POST['Keyword']);
			
			if($news->update($data) != false){

				$news->updateTieuDeKD($data['idTT'], $data['TieuDeKD']);
				$_SESSION['script'] = "alert('Update thành công')";
				header("location:index.php?nameCtr=NewsController&action=showNews");
			}else{

				die(mysqli_error($news->conn));
			}
		}
	}

	public function deleteNews(){
		$news = new News();

		$idTT = (int)$_GET['id'];
		if($news->delete($idTT)){
			header('location:index.php?nameCtr=NewsController&action=showNews');
		}
		return '';
	}

	public function changeAnHien(){
		$news = new News();
		$table = $_GET['table'];
		$ma = $_GET['ma'];
		$id = $_GET['id'];

		echo $news->changeAnHien($table, $ma, $id);
	}
}