<?php 

class SingleController extends Controller {

	function showPost(){
		
		$news = new News();
		$rating = new Rating();
		$comment = new Comment();

		$data['news'] = $news->findId($_GET['idTT']);
		$data['postRelated'] = $news->postRelated($data['news']['idTT'], $data['news']['idCL']);
		$data['mood'] = $news->getMoodable($data['news']['idTT'], $data['news']['idCL']);

		$data['vote'] = $rating->getVote($_GET['idTT']);
		if($data['vote'] == 3){
			$data['script'] = "<script>$(document).ready(function(){
				$('a[title=\"1\"]').addClass(\"fullStar\");
				$('a[title=\"2\"]').addClass(\"fullStar\");
				$('a[title=\"3\"]').addClass(\"fullStar\");
			})</script>";
		}elseif($data['vote'] == 4){
			$data['script'] = "<script>$(document).ready(function(){
				$('a[title=\"1\"]').addClass(\"fullStar\");
				$('a[title=\"2\"]').addClass(\"fullStar\");
				$('a[title=\"3\"]').addClass(\"fullStar\");
				$('a[title=\"4\"]').addClass(\"fullStar\");
			})</script>";
		}elseif($data['vote'] ==5){
			$data['script'] = "<script>$(document).ready(function(){
				$('a[title=\"1\"]').addClass(\"fullStar\");
				$('a[title=\"2\"]').addClass(\"fullStar\");
				$('a[title=\"3\"]').addClass(\"fullStar\");
				$('a[title=\"4\"]').addClass(\"fullStar\");
				$('a[title=\"5\"]').addClass(\"fullStar\");
			})</script>";
		}

		if($comment->getComment($_GET['idTT']) != false){
			$data['comment'] = $comment->getComment($_GET['idTT']);
		}

		// var_dump($data['comment']);
		$this->view('baiviet', $data);
	}

	function search(){

		$news = new News();
		echo json_encode($news->search($_POST['keyword']));
	}

	function handleRate(){
		$rating = new Rating();
		echo  $rating->store($_POST['vote'], $_POST['idTT']);

	}

	function storeComment(){
		$comment = new Comment();

		$name = $_POST['name'];
		$phone = $_POST['phone'];
		$message = $_POST['message'];
		$idTT = $_POST['idTT'];

		if($comment->store($name, $phone, $message, $idTT)){
			echo "tin nhắn của bạn đã được lưu, cảm ơn bạn!";
		}
	}
}