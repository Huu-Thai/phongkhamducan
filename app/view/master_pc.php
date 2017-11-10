<!DOCTYPE html>
<html lang="vi">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>phong kham du can</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="content-language" itemprop="inLanguage" content="vi"/>
	<meta http-equiv="Content-Language" content="vi">
	<meta http-equiv="REFRESH" content="1800" />
	<meta name="REVISIT-AFTER" content="1 DAYS" />
	<meta name="RATING" content="GENERAL" />
	<meta name="viewport" content="width=device-width initial-scale=1.0 maximum-scale=2.0 user-scalable=2" />
	
	<meta property="og:datePublished" itemprop="datePublished" content="2017-09-01T08:15:24+00:00"/>
	<meta name="robots" content="noindex, nofollow" />
	<meta property="fb:app_id" content="175899096311934" />
	<meta property="fb:admins" content="1901686976824220" />		
	<link href="images/icon.ico" rel="shortcut icon" type="image/x-icon" />

	<meta name='twitter:card' content='summary' />
	<meta name='twitter:site' content='@phongkhamducan' />
	<meta name='twitter:creator' content='@phongkhamducan' />
	<link rel="stylesheet" type="text/css" href="css/stylek.css">
	<!-- <link rel="stylesheet" type="text/css" href="css/stylek_k.css"> -->
	<link rel="stylesheet" type="text/css" href="css/stylelist.css">
	<link rel="stylesheet" type="text/css" href="css/styletrong.css">
	<link rel="stylesheet" type="text/css" href="css/mnk.css">
	<link rel="stylesheet" type="text/css" href="css/namkhoa.css">
	<link rel="stylesheet" type="text/css" href="css/phukhoa.css">
	<link rel="stylesheet" type="text/css" href="css/style_post.css">
	<script src="js/jquery-3.2.1.min.js"></script>

</head>
<body>
	<div id="wrapper" class="w1350">
		<?php include $this->linkModule."header.php"; ?>
		<div class="clear"></div>
		<div class="slide">
			<img src="upload/slide.png" title="Hình slide" alt="Hình slide">
		</div>
		<div class="clear"></div>
		
		<?php 
			if(isset($page) && !empty($page)): 

				include $this->linkPage.$page.".php";
			endif;
		?>

		<div class="clear"></div>
		<?php include $this->linkModule."content7.php"; ?>
		<div class="clear"></div>
		<?php include $this->linkModule."footer.php"; ?>
	</div>
</body>
</html>