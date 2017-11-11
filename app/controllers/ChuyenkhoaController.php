<?php 

class ChuyenkhoaController extends Controller {

	function getPost(){
		$news = new News();
		$data['idLoai'] = $_GET['idLoai'];
		$data['posts'] = $news->getNewsByIdCl($data['idLoai']);
		
		$loai = new Loai();
		$data['loai'] = $loai->getLoaiById($data['idLoai']);
		$data['subPosts'] = $loai->getSubNewsByIdLoai($data['idLoai']);

		$childIdLoai = $loai->getChildId($data['idLoai'])['idLoai'];
		if(isset($_GET['childIdLoai'])){
			$childIdLoai = $_GET['childIdLoai'];
		}
		$data['choseSubPost'] = $loai->getLoaiById($childIdLoai);

		$this->view('chuyenkhoa', $data);
	}
}