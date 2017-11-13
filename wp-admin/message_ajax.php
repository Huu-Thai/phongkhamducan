<?php
	require_once "../lib/class_db.php";
	$db = new db;
	$bell = array();
	$sql = "SELECT id_sdt, sdt FROM sodienthoai WHERE Ghichu = 'chua'";
	$result = mysql_query($sql);
	while ($row = mysql_fetch_assoc($result)) {
		$sdt = explode('---', $row['sdt']);
		if (preg_match('/(^09+[0-9]{8})|(^01+[0-9]{9})/', $sdt[0])) {
			array_push($bell, $row['id_sdt']);
			echo '<div id="wait'.$row['id_sdt'].'">';
			echo '<strong>'.$sdt[0].'</strong>';
			echo '<p>
				Ghi chú: 
				<input id="id_ghichu" class="id_ghichu" type="text" />
				<input id="id_sdt" type="hidden" value="'.$row['id_sdt'].'" /></p>';
			echo '<p>Link: '.$sdt[1].'</p>';
			echo '</div>';
		}
	}
	if (count($bell) > 0) {
		echo '<audio autoplay="autoplay">';
		echo '<source src="bing.mp3" type="audio/mpeg" />';
		echo '<embed hidden="true" autostart="true" loop="false" src="bing.mp3" />';
		echo '</audio>';
		echo '<input id="count-bell" type="hidden" value="('.count($bell).') ">';
	}
?>
