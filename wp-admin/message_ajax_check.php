<?php
	if (isset($_POST['ghichu']) && $_POST['sdt'] <> null) {
		require_once "../lib/class_db.php";
		$db = new db;
		$sql = "UPDATE sodienthoai SET Ghichu = '{$_POST[ghichu]}' WHERE id_sdt = {$_POST[sdt]}";
		$result = mysql_query($sql);
		if ($result == false) {
			echo $_POST['sdt'].'---false';
		} else {
			echo $_POST['sdt'].'---true';
		}
	}
?>