<?php 

class ChuyenkhoaController extends Controller {

	function getPost(){
		$news = new News();
		$data['idLoai'] = $_GET['idLoai'];
		$data['TieuDeKD'] = $_GET['TieuDeKD']; //dung cho tieu de khong dau o phan trang
	
		if($news->getNewsByIdCl($data['idLoai'])){
			$data['posts'] = $news->getNewsByIdCl($data['idLoai']);
		}
		$loai = new Loai();

		if ($loai->getLoaiById($data['idLoai'])) {
			$data['loai'] = $loai->getLoaiById($data['idLoai']);
		}
		if ($loai->getSubNewsByIdLoai($data['idLoai'])) {
			$data['subPosts'] = $loai->getSubNewsByIdLoai($data['idLoai']);
		}
		
		if(isset($_GET['childIdLoai'])){
			
			$childIdLoai = $_GET['childIdLoai'];
			
		}else{
			if($loai->getChildId($data['idLoai'])){
				$childIdLoai = $loai->getChildId($data['idLoai'])['idLoai'];
			}
		}
		
		if($loai->getLoaiById($childIdLoai)){
			$data['choseSubPost'] = $loai->getLoaiById($childIdLoai);
		}
		$this->view('chuyenkhoa', $data);
	}
}