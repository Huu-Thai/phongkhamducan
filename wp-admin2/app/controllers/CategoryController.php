<?php 

class CategoryController extends Controller {

	function __construct(){

		if(!isset($_SESSION['user'])){
			header("location:".$this->linkPage.'login.php');
		}
	}

	public function showCategory(){
		$category = new Category();

		$data['pageSize'] = 20;
		$pageNum = 1;

		if (isset($_GET['pageNum']) == true) 
			$pageNum = (int)$_GET['pageNum'];

		if ($pageNum <= 0) 
			$pageNum = 1; 

		$TieuDe = isset($_GET['TieuDe']) ? $_GET['TieuDe'] : '';
		$TieuDe = $category->deleteFormat($TieuDe);

		$idCha = -1;
		if (isset($_GET['idCha']) == true) $idCha = $_GET['idCha'];

		$data['category'] = $category->getAllCategory($totalRow, $pageNum, $data['pageSize'], $TieuDe, $idCha);
		$data['totalRow'] = $totalRow;
		$data['pageNum'] = $pageNum;

		$this->view('show-category', $data);
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
			
			$NgayDang = gmdate('Y/m/d H:i:s', time() + 7*3600);



			//Chèn dữ liệu vào database

			$query = "INSERT INTO pages (TieuDe, TieuDeKD, NoiDung, Des, idGroup, NgayDang, Title, Keyword,UrlHinh,TomTat)

			VALUES ('$TieuDe', '$TieuDeKD', '$NoiDung', '$Des', $idGroup , '$NgayDang', '$Title', '$Keyword', '$UrlHinh', '$TomTat')";

			$category->insert($query) or die (mysql_error($category->conn));
		}
	}

	public function addMenu(){

		$this->view('add-menu');
	}


}