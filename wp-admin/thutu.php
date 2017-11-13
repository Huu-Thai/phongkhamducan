<?php
	require_once "class_quantri.php";
	$qt = new quantri;
	$bang= $_GET['bang'];
	$ttu=$_GET['ttu'];
	$id=$_GET['id'];

	settype($id,"int");
	settype($ttu,"int");
	if($bang=="menu")
	{
		$qt->SuaThuTu($bang, 'idMenu', $id,$ttu);
	}
	else
	{
		$qt->SuaThuTu($bang, 'idLoaiTin', $id,$ttu);
	}
	
?>
