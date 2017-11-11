<?php 

class SingleController extends Controller {

	function showPost(){
		$news = new News();
		$data['news'] = $news->findId($_GET['idTT']);
		$data['postRelated'] = $news->postRelated($data['news']['idTT'], $data['news']['idCL']);
		$data['mood'] = $news->getMoodable($data['news']['idTT'], $data['news']['idCL']);
		
		$this->view('baiviet', $data);
	}

	function search(){

		$news = new News();
		echo json_encode($news->search($_POST['keyword']));
	}
}