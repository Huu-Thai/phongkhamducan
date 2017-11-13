<?php @session_start(); ?>

<?php

	if (!isset($_SESSION['tg_login_user']) || $_SESSION['tg_login_level'] <> 3) {

		exit();

	}

?>

<!DOCTYPE html>

<html lang="en">

<head>

	<meta charset="UTF-8">

	<title>Document</title>

	<style>

		* {

			margin: 0;

			padding: 0;

			border: 0;

			outline: none;

			font-size: 14px;

			font-family: Arial, sans-serif;

		}

		body { background: #000; }

		.frm-key {

			max-width: 500px;

			margin: 5% auto;

			padding: 1.5% 0;

			border: 1px solid #bce8f1;

			background: #d9edf7;

			border-radius: 4px;

			text-align: center;

		}

		.frm-key > span {

			width: 20%;

			text-align: right;

			display: inline-block;

		}

		.frm-key > span > b { color: red; }

		.frm-key > input[type="text"] {

			width: 70%;

			height: 30px;

			padding-left: 15px;

			margin-bottom: 5px;

			border-radius: 4px;

			box-sizing: border-box;

			border: 1px solid #ccc;

		}

		.frm-key input[type="submit"] {

			color: #fff;

			height: 30px;

			cursor: pointer;

			padding: 0 20px;

			background: #337ab7;

			border-radius: 4px;

			margin-top: 10px;

			box-sizing: border-box;

			border: 1px solid #2e6da4;

		}

		.home {

			padding-left: 5px;

			margin-bottom: 20px;

			text-align: left;

		}

		.home > a { text-decoration: none;color: blue;text-transform: uppercase; }

		.error { color: red;font-weight: 600;font-style: italic;margin-bottom: 5px; }

		.success { color: green;font-weight: 600;font-style: italic;margin-bottom: 5px; }

	</style>

</head>

<body>

	<?php

		if (isset($_POST['send_frm']) && $_POST['key_search'] <> null) {

			require_once "../lib/class_db.php";

			$db = new db;

			$error = array();

			$elcode = ($_POST['ELcode'] <> null)? " AND (idCL IN (".$_POST['ELcode'].") OR idLoai IN (".$_POST['ELcode']."))" : null;

			$sql = "SELECT idTT, TieuDe, Title, TomTat, NoiDung FROM `tintuc`";

			$result = mysql_query($sql);

			while ($row = mysql_fetch_assoc($result)) {

				// if ($row['idTT'] == 709 || $row['idTT'] == 710) {

					$idTT = $row['idTT'];

					// 1.

					$TieuDe = str_replace($_POST['key_search'], $_POST['key_replace'], $row['TieuDe']);

					// 2.

					$Title = str_replace($_POST['key_search'], $_POST['key_replace'], $row['Title']);

					// 3.

					$TomTat = str_replace($_POST['key_search'], $_POST['key_replace'], html_entity_decode(preg_replace("/U\+([0-9A-F]{4})/", "&#x\\1;", $row['TomTat']), ENT_NOQUOTES, 'UTF-8'));

					// 4.

					$NoiDung = str_replace($_POST['key_search'], $_POST['key_replace'], html_entity_decode(preg_replace("/U\+([0-9A-F]{4})/", "&#x\\1;", $row['NoiDung']), ENT_NOQUOTES, 'UTF-8'));

					

					$sqlupd = "UPDATE tintuc SET TieuDe= '{$TieuDe}', Title= '{$Title}', TomTat= '{$TomTat}', NoiDung= '{$NoiDung}' WHERE idTT = {$idTT}{$elcode}";

					$resultupd = mysql_query($sqlupd);

					array_push($error, $resultupd);

				// }

			}

		}

	?>

	<form class="frm-key" method="post">

		<div class="home"><a href="/wp-admin/main.php">&lt;&lt; Trang chủ &gt;&gt;</a></div>

		<?php

			if (isset($error)) {

				if (in_array(false, $error)) {

					echo '<div class="error">Error!</div>';

				}else {

					echo '<div class="success">Success!</div>';

				}

			}

		?>

		<span>Key Search <b>(*)</b>:</span>

		<input type="text" name="key_search" autofocus required>

		<span>Key Replace:</span>

		<input type="text" name="key_replace">

		<span>ELcode:</span>

		<input type="text" name="ELcode">

		<div><input type="submit" name="send_frm" value="Send"></div>

	</form>

</body>

</html>

