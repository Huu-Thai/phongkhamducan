<?php 

class SingleController extends Controller {

	function showPost(){
		
		$news = new News();
		$rating = new Rating();

		$data['news'] = $news->findId($_GET['idTT']);
		$data['postRelated'] = $news->postRelated($data['news']['idTT'], $data['news']['idCL']);
		$data['mood'] = $news->getMoodable($data['news']['idTT'], $data['news']['idCL']);

		$vote = $rating->getVote($_GET['idTT']);
		if($vote == 3){
			$data['script'] = "<script>$(document).ready(function(){
				$('a[title=\"1\"]').addClass(\"fullStar\");
				$('a[title=\"2\"]').addClass(\"fullStar\");
				$('a[title=\"3\"]').addClass(\"fullStar\");
			})</script>";
		}elseif($vote == 4){
			$data['script'] = "<script>$(document).ready(function(){
				$('a[title=\"1\"]').addClass(\"fullStar\");
				$('a[title=\"2\"]').addClass(\"fullStar\");
				$('a[title=\"3\"]').addClass(\"fullStar\");
				$('a[title=\"4\"]').addClass(\"fullStar\");
			})</script>";
		}elseif($vote ==5){
			$data['script'] = "<script>$(document).ready(function(){
				$('a[title=\"1\"]').addClass(\"fullStar\");
				$('a[title=\"2\"]').addClass(\"fullStar\");
				$('a[title=\"3\"]').addClass(\"fullStar\");
				$('a[title=\"4\"]').addClass(\"fullStar\");
				$('a[title=\"5\"]').addClass(\"fullStar\");
			})</script>";
		}
		// var_dump($data['script']);
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
}