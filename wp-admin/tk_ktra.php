<?php
	// require_once "checklogin.php";
	session_start();
	if(isset($_SESSION['tg_login_id'])) // khanh sua lai
	{
		$id = $_SESSION['tg_login_id'];
		settype($id, "int");
		$Pass = $_GET['Pass'];
		$Pass = md5($Pass);
		require_once("dbcon.php");
		$sql = "SELECT * FROM users WHERE idUser='$id' AND Pass ='$Pass'";
		$user = mysql_query($sql);
		if (mysql_num_rows($user) != 1)
			{
				echo "Mật khẩu nhập không đúng !!!";
			}
	}
	else
	{
		echo "Xin liên Hệ Với Khanh Lập Trình Để Được Trợ Giúp";
	}
	
?>
