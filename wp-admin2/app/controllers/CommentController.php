<?php

class CommentController extends Controller {
	
	function __construct(){

		if(!isset($_SESSION['user'])){
			header("location:".$this->linkPage.'login.php');
		}
	}

	function showComment() {
		$comment = new Comment();

		$data['pageSize'] = 20; 
		$pageNum = 1;

		if (isset($_GET['pageNum']) == true) $pageNum = $_GET['pageNum'];
		if ($pageNum <= 0) $pageNum = 1; settype($pageNum, "int");

		$HoTen = '';
		if(isset($_GET['HoTen'])){
			$HoTen = $_GET['HoTen'];
		}

		if(isset($_GET['SoDT'])){
			$SoDT = $_GET['SoDT'];
		}

		$HoTen = $comment->deleteFormat($HoTen);
		$data['comments'] = $comment->getAllComment($totalRow, $pageNum, $data['pageSize'], $SoDT, $HoTen);
		$data['totalRow'] = $totalRow;
		$data['pageNum'] = $pageNum;

		$this->view('show-comment', $data);
	}

	function changeAnHien(){
		$comment = new Comment();
		$table = $_GET['table'];
		$ma = $_GET['ma'];
		$id = $_GET['id'];
		$col = $_GET['col'];

		echo $comment->changeAnHien($table, $ma, $id, $col);
	}

}