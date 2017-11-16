<nav class="content-left col-md-2">
	<div class="index col-10">
		<strong>Mục lục</strong>
	</div>
	<ul class="menu menu-left col-10">
		<li id="1" class='menu-item'>
			<a href="./" class="active">Trang Chủ</a>
		</li>
		<li id="2" class='menu-item'>
			<a href="javscript:void(0)">Quản Lý Loại Tin</a>
			<ul class="sub-menu">
				<li>
					<a href=""><em>01</em>Item 1</a>
				</li>
				<li>
					<a href="index.php?nameCtr=CategoryController&action=addCate"><em>01</em>Thêm loại tin</a>
				</li>
			</ul>
		</li>
		<li id="3" class='menu-item'>
			<a href="javscript:void(0)">Quản Lý Pages</a>
			<ul class="sub-menu">
				<li>

					<a href=""><em>01</em>Item 1</a>
				</li>
				<li>
					<a href="index.php?nameCtr=CategoryController&action=addPage"><em>01</em>Thêm page</a>
				</li>
			</ul>
		</li>
		<li id="4" class='menu-item'>
			<a href="javascript:void(0)">Quản Lý Chủ Đề</a>
			<ul class="sub-menu">
				<li>

					<a href=""><em>01</em>Item 1</a>
				</li>
				<li>
					<a href="index.php?nameCtr=NewsController&action=addTopic"><em>01</em>Thêm chủ đề bài viết</a>
				</li>
			</ul>
		</li>
		<li id="5" class='menu-item'>
			<a href="javascript:void(0)">Quản Lý Tin Tức</a>
			<ul class="sub-menu">
				<li>

					<a href=""><em>01</em>Item 1</a>
				</li>
				<li>
					<a href="index.php?nameCtr=NewsController&action=addNews"><em>01</em>Thêm tin tức</a>
				</li>
			</ul>
		</li>
		<li id="6" class='menu-item'>
			<a href="javascript:void(0)">Quản Lý Menu</a>
			<ul class="sub-menu">
				<li>
					<a href=""><em>01</em>Item 1</a>
				</li>
				<li>
					<a href="index.php?nameCtr=CategoryController&action=addMenu"><em>01</em>Thêm menu</a>
				</li>
			</ul>
		</li>
		<li id="7" class='menu-item'>
			<a href="javascript:void(0)">Quản Lý Người Dùng</a>
			<ul class="sub-menu">
				<li>

					<a href="index.php?nameCtr=UserController&action=getAllUser"><em>01</em>Xem thông tin người dùng</a>
				</li>
				<li>
					<a href="index.php?nameCtr=UserController&action=addUser"><em>01</em>Thêm người dùng</a>
				</li>
			</ul>
		</li>
		<li id="8" class='menu-item'>
			<a href="javascript:void(0)">Cấu Hình Chung</a>
			<ul class="sub-menu">
				<li>

					<a href=""><em>01</em>Item 1</a>
				</li>
				<li>
					<a href=""><em>01</em>Item 2</a>
				</li>
			</ul>
		</li>
		<li id="9" class='menu-item'>
			<a href="javascript:void(0)">Quản Lý Bình Luận</a>
			<ul class="sub-menu">
				<li>

					<a href=""><em>01</em>Item 1</a>
				</li>
				<li>
					<a href="index.php?nameCtr=CommentController&action=browseComment"><em>01</em>Duyệt bình luận</a>
				</li>
			</ul>
		</li>
	</ul>
	<div class="clearfix"></div>
</nav>

<script>
	$(document).ready(function(){
		$(".menu-item").each(function(){
			$(this).click(function(){
				var parentId = $(this).attr('id');

				if($("#" + parentId + " > a").attr('class') != 'active'){

					$(".menu-item .sub-menu").slideUp('normal');
					$("#"+ parentId + " .sub-menu").slideDown('normal');
					
					$(".menu-item  a").removeClass('active');
					$("#" + parentId + " > a").addClass('active');
				}
				
			});
		});

		$('.menu-item > a').each(function(){
			if($(this).attr('class') == 'active'){
				$("#"+ parentId + " .sub-menu").slideDown('normal');
			}
		});
	});
</script>