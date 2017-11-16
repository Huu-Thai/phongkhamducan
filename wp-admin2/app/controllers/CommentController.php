<?php

class CommentController extends Controller {
	
	function __construct(){

		if(!isset($_SESSION['user'])){
			header("location:".$this->linkPage.'login.php');
		}
	}

	function browseComment() {
		$comment = new Comment();
		$data['comments'] = $comment->getComment();

		$this->view('browse-comment', $data);
	}
}