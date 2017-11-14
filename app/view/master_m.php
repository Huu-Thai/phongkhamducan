<!DOCTYPE html>
<html lang="vi">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<base href="http://localhost/phongkhamducan/" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>phong kham du can</title>
	
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
	<link rel="stylesheet" type="text/css" href="css_m/style.css">
	<link rel="stylesheet" type="text/css" href="css_m/header.css">
	<link rel="stylesheet" type="text/css" href="css_m/banner.css">
	<link rel="stylesheet" type="text/css" href="css_m/content1.css">
	<link rel="stylesheet" type="text/css" href="css_m/content2.css">
	<link rel="stylesheet" type="text/css" href="css_m/content3.css">
	<link rel="stylesheet" type="text/css" href="css_m/content4.css">
	<link rel="stylesheet" type="text/css" href="css_m/content5.css">
	<link rel="stylesheet" type="text/css" href="css_m/content7.css">
	<link rel="stylesheet" type="text/css" href="css_m/content8.css">
	<link rel="stylesheet" type="text/css" href="css_m/standpoint.css">
	<link rel="stylesheet" type="text/css" href="css_m/style_specialist.css">
	<link rel="stylesheet" type="text/css" href="css_m/list_post.css">
	<link rel="stylesheet" type="text/css" href="css_m/style_post.css">
	<link rel="stylesheet" type="text/css" href="css_m/footer-banner.css">
	<link rel="stylesheet" type="text/css" href="css_m/footer.css">
	<link rel="stylesheet" type="text/css" href="css_m/comment.css">
	<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>

</head>
<body>
	<div id="wrapper" class="m640">
		<?php include $this->linkModuleMobile."header.php"; ?>
		<div class="clear"></div>
		<!-- <div class="slide">
			<img src="upload/slide.png" title="Hình slide" alt="Hình slide">
		</div>
		<div class="clear"></div> -->
		
		<?php 
		if(isset($page) && !empty($page)): 

			include $this->linkPageMobile.$page.".php";
		endif;
		?>

		<div class="clear"></div>
		<?php include $this->linkModuleMobile."content7.php"; ?>
		<div class="clear"></div>
		<?php include $this->linkModuleMobile."footer.php"; ?>
	</div>
	<script type="text/javascript" src="ajax/search.js"></script>
	<script type="text/javascript" src="ajax/rating.js"></script>
	<script type="text/javascript" src="ajax/comment.js"></script>

	<script type="text/javascript">
		<?php 
		if(isset($_SESSION['script'])) { 
			echo $_SESSION['script'] ;
			unset($_SESSION['script']);
		}
		?>
	</script>
</body>
</html>