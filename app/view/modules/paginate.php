<?php 
if(isset($data['posts'])):
	$numPost = mysqli_num_rows($data['posts']);
	$postFinal = floor($numPost%10);
	$numPage = ceil($numPost/10);

	if(!isset($_GET['pageNum']))
		$_GET['pageNum'] = 1;
	$x = ($_GET['pageNum'] - 1)*10;

	if($numPost <= 10){
		$end = $numPost;
	}else{
		if($_GET['pageNum'] != $numPage){

			$end = $x + 10;

		}else{
			$end = $x + $postFinal;
		}
	}
	
endif;
?>