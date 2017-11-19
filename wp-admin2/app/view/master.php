<script>
	<?php 
	if(isset($_SESSION['script'])) echo $_SESSION['script'];
	unset($_SESSION['script']);
	?>
</script>
<!DOCTYPE html>
<html>
<head>
	<base href="http://localhost/phongkhamducan/wp-admin2/" />
	<meta http-equiv="Content-Type", type="text/html" charset="utf-8" />
	<title>ProAdmin</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="js/jquery.cookie.js"></script>
	<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
	<script type="text/javascript" src="ckfinder/ckfinder.js"></script>
	<script type="text/javascript">
		function BrowseServer( startupPath, functionData ){
			var finder = new CKFinder();
			finder.basePath = 'ckfinder/'; //Đường path nơi đặt ckfinder
			finder.startupPath = startupPath; //Đường path hiện sẵn cho user chọn file
			finder.selectActionFunction = SetFileField; // hàm sẽ được gọi khi 1 file được chọn
			finder.selectActionData = functionData; //id của text field cần hiện địa chỉ hình
			finder.selectThumbnailActionFunction = ShowThumbnails; //hàm sẽ được gọi khi 1 file thumnail được chọn
			finder.popup(); // Bật cửa sổ CKFinder
		} //BrowseServer	
		function SetFileField( fileUrl, data ){
			document.getElementById( data["selectActionData"] ).value = fileUrl;			
		}
		function ShowThumbnails( fileUrl, data ){
			var sFileName = this.getSelectedFile().name; // this = CKFinderAPI
			document.getElementById( 'thumbnails' ).innerHTML +=
			'<div class="thumb">' +
			'<img src="' + fileUrl + '" />' +
			'<div class="caption">' +
			'<a href="' + data["fileUrl"] + '" target="_blank">' + sFileName + '</a> (' + data["fileSize"] + 'KB)' +
			'</div>' +
			'</div>';
			document.getElementById( 'preview' ).style.display = "";
			return false; // nếu là true thì ckfinder sẽ tự đóng lại khi 1 file thumnail được chọn

		}
	</script>
</head>
<body>
	<div id="wrapper" class="container">
		<?php include "modules/header.php"; ?>
		<section class="content">
			<?php include "modules/menu.php"; ?>
			<div class="content-right col-md-10">
				<div class="content-right-header">
					<marquee>Chào mừng bạn đến với trang quản trị. Chúc bạn có ngày làm việc vui vẻ</marquee>
				</div>

				<div class="content-right-body">
					<?php 
					if(isset($page)) {
						include 'pages/'.$page.'.php';
					}

					?>
				</div>

			</div>

		</section>
	</div>
	
</body>
</html>