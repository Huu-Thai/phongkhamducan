<?php 

class SingleController extends Controller {

	function showPost(){
		$news = new News();
		$data['news'] = $news->getNewsByIdLoai($_GET['idLoai']);
		var_dump($data['news']);

		// $this->view('baiviet', $data);
	}
}