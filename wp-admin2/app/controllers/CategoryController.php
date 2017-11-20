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

		$data['idCha'] = -1;
		if (isset($_GET['idCha']) == true) $data['idCha'] = $_GET['idCha'];

		$data['category'] = $category->getAllCategory($totalRow, $pageNum, $data['pageSize'], $TieuDe, $data['idCha']);
		$data['totalRow'] = $totalRow;
		$data['pageNum'] = $pageNum;

		$data['cateParent'] = $category->getCategory();

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

	public function changeAnHien(){
		$category = new Category();
		$table = $_GET['table'];
		$ma = $_GET['ma'];
		$id = $_GET['id'];
		$col = $_GET['col'];

		echo $category->changeAnHien($table, $ma, $id, $col);
	}

	public function editIndex(){
		$category = new Category();
		$table = $_GET['table'];
		$ttu =$_GET['ttu'];
		$id =$_GET['id'];

		echo $category->editIndex($table, $id, $ttu);
	}

	public function updateCategory(){
		$category = new Category();

		$data['idLoai'] = $_GET['id'];
		$data['cateById'] = $category->findId($data['idLoai']);
		$data['category'] = $category->getCategory();

		$this->view('edit-category', $data);
	}

	public function handelUpdatecate(){
		$category = new Category();

		if(isset($_POST['btnOK'])){
			$TieuDe= $_POST['TieuDe'];
			$UrlHinh= $_POST['UrlHinh'];
			$Title= $_POST['Title'];
			$Des= $_POST['Des'];
			$data['Parent'] = (int)$_POST['Parent'];
			$Keyword= $_POST['Keyword'];
			$data['TomTat'] = $_POST['TomTat'];

			$data['idLoai'] = (int)$_POST['idLoai'];
			$data['TieuDe'] = $category->deleteFormat($TieuDe);
			$data['UrlHinh'] = $category->deleteFormat($UrlHinh);
			$data['Title'] = $category->deleteFormat($Title);
			$data['Keyword'] = $category->deleteFormat($Keyword);
			$data['Des'] = $category->deleteFormat($Des);
			$data['TieuDeKD'] = $category->stripUnicode($TieuDe);

			if($category->update($data) != false){

				$category->updateTieuDeKD($data['idLoai'], $data['TieuDeKD']);
				$_SESSION['script'] = "alert('Update thành công')";
				header("location:index.php?nameCtr=CategoryController&action=showCategory");
			}else{

				die(mysqli_error($category->conn));
			}

		}
	}


}