<!DOCTYPE html>
<html>
<head>
	<base href="http://localhost/phongkhamducan/wp-admin2/" />
	<meta charset="utf-8">
	<title>ProAdmin</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
</head>
<body>
	<div id="wrapper" class="container">
		<header id="header">
			<div class="header-left col-md-2">
				<img src="images/logo.png" alt="">
			</div>
			<div class="header-right col-md-10">
				<div class="header-right-left col-md-2">
					<div class="col-10 arrow"></div>
				</div>
				<div class="header-right-right col-md-10">
					<p>Chào bạn: <a href="">Thái</a> <img src="images/icons/user.png" alt=""></p>
					<p><a href="">Thoát</a></p>
				</div>

			</div>
		</header>
		<section class="content">
			<nav class="content-left col-md-2">
				<div class="index col-10">
					<strong>Mục lục</strong>
				</div>
				<ul class="menu menu-left col-10">
					<li class='menu-item'>
						<a href="javscript:void(0)">Trang Chủ</a>
					</li>
					<li class='menu-item'>
						<a href="javscript:void(0)">Quản Lý Loại Tin</a>
						<ul class="sub-menu">
							<li>
								<a href=""><em>01</em>Item 1</a>
							</li>
							<li>
								<a href=""><em>01</em>Item 2</a>
							</li>
						</ul>
					</li>
					<li class='menu-item'>
						<a href="javscript:void(0)">Quản Lý Pages</a>
						<ul class="sub-menu">
							<li>
								
								<a href=""><em>01</em>Item 1</a>
							</li>
							<li>
								<a href=""><em>01</em>Item 2</a>
							</li>
						</ul>
					</li>
					<li class='menu-item'>
						<a href="">Quản Lý Chủ Đề</a>
						<ul class="sub-menu">
							<li>
								
								<a href=""><em>01</em>Item 1</a>
							</li>
							<li>
								<a href=""><em>01</em>Item 2</a>
							</li>
						</ul>
					</li>
					<li class='menu-item'>
						<a href="">Quản Lý Tin Tức</a>
						<ul class="sub-menu">
							<li>
								
								<a href=""><em>01</em>Item 1</a>
							</li>
							<li>
								<a href=""><em>01</em>Item 2</a>
							</li>
						</ul>
					</li>
					<li class='menu-item'>
						<a href="">Quản Lý Menu</a>
						<ul class="sub-menu">
							<li>
								
								<a href=""><em>01</em>Item 1</a>
							</li>
							<li>
								<a href=""><em>01</em>Item 2</a>
							</li>
						</ul>
					</li>
					<li class='menu-item'>
						<a href="">Quản Lý Đăng Ký</a>
					</li>
					<li class='menu-item'>
						<a href="">Cấu Hình Chung</a>
					</li>
					<li class='menu-item'>
						<a href="">Quản Lý Bình Luận</a>
					</li>
				</ul>
				<div class="clearfix"></div>
			</nav>
			<div class="content-right col-md-10">
				<div class="content-right-header">
					<marquee>Chào mừng bạn đến với trang quản trị. Chúc bạn có ngày làm việc vui vẻ</marquee>
				</div>
				
				<div class="content-right-body"></div>
				
			</div>
		</section>
	</div>
	<script>
		$(document).ready(function(){
			$(".menu-item").each(function(){
				$(this).click(function(){
					$(".sub-menu").css('display','block');
				});
			});
		});
	</script>
</body>
</html>