<?php
	require_once "class_quantri.php";
	$qt = new quantri;
	$idSP=$_GET['id'];

	settype($idSP,"int");
	if ($idSP<=0){ die ("Không biết loại menu cần xóa"); }
	$qt->XoaMenu($idSP);
	header("location:main.php?p=menu_xem");
?>