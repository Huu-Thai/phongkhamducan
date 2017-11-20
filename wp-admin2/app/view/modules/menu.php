<nav class="content-left col-md-2">
	<div class="index col-10">
		<strong>Mục lục</strong>
	</div>
	<ul class="menu menu-left col-10">
		<li id="1" class='menu-item'>
			<a href="javscript:void(0)" class="active">Trang Chủ</a>
			<ul class="sub-menu">
				<li>
					<a href="http://localhost/phongkhamducan/"><em>01</em>Trang phòng khám</a>
				</li>
				<li>
					<a href="./"><em>02</em>Admin</a>
				</li>
			</ul>
		</li>
		<li id="2" class='menu-item'>
			<a href="javscript:void(0)">Danh Mục</a>
			<ul class="sub-menu">
				<li>
					<a href="index.php?nameCtr=CategoryController&action=showCategory"><em>01</em>Tất cả danh mục</a>
				</li>
				<li>
					<a href="index.php?nameCtr=CategoryController&action=addCate"><em>02</em>Thêm danh mục</a>
				</li>
			</ul>
		</li>
		<li id="3" class='menu-item'>
			<a href="javscript:void(0)">Pages</a>
			<ul class="sub-menu">
				<li>

					<a href=""><em>01</em>Tất cả page</a>
				</li>
				<li>
					<a href="index.php?nameCtr=CategoryController&action=addPage"><em>02</em>Thêm page</a>
				</li>
			</ul>
		</li>
		<li id="4" class='menu-item'>
			<a href="javascript:void(0)">Thiết bị</a>
			<ul class="sub-menu">
				<li>
					<a href=""><em>01</em>Tất cả thiết bị</a>
				</li>
				<li>
					<a href="index.php?nameCtr=NewsController&action=addTopic"><em>02</em>Thêm thiết bị</a>
				</li>
			</ul>
		</li>
		<li id="5" class='menu-item'>
			<a href="javascript:void(0)">Tin Tức</a>
			<ul class="sub-menu">
				<li>

					<a href=index.php?nameCtr=NewsController&action=showNews><em>01</em>Tất cả tin tức</a>
				</li>
				<li>
					<a href="index.php?nameCtr=NewsController&action=addNews"><em>02</em>Thêm tin tức</a>
				</li>
			</ul>
		</li>
		<li id="7" class='menu-item'>
			<a href="javascript:void(0)">Câu Hỏi</a>
			<ul class="sub-menu">
				<li>
					<a href="index.php?nameCtr=UserController&action=getAllUser"><em>01</em>Tất cả câu hỏi</a>
				</li>
			</ul>
		</li>
		<li id="8" class='menu-item'>
			<a href="javascript:void(0)">Slider</a>
			<ul class="sub-menu">
				<li>
					<a href="index.php?nameCtr=InterfaceController&action=showSlider"><em>01</em>Tất cả silder</a>
				</li>
				<li>
					<a href="index.php?nameCtr=UserController&action=addUser"><em>02</em>Thêm slider</a>
				</li>
			</ul>
		</li>
		<li id="9" class='menu-item'>
			<a href="javascript:void(0)">Đăng ký</a>
			<ul class="sub-menu">
				<li>
					<a href="index.php?nameCtr=PhoneController&action=showPhone"><em>01</em>Tất cả đăng ký</a>
				</li>
			</ul>
		</li>
		<li id="10" class='menu-item'>
			<a href="javascript:void(0)">Góp ý</a>
			<ul class="sub-menu">
				<li>
					<a href="index.php?nameCtr=UserController&action=getAllUser"><em>01</em>Tát cả góp ý</a>
				</li>
			</ul>
		</li>
		<li id="11" class='menu-item'>
			<a href="javascript:void(0)">Bình Luận</a>
			<ul class="sub-menu">
				<li>
					<a href="index.php?nameCtr=CommentController&action=browseComment"><em>01</em>Duyệt bình luận</a>
				</li>
			</ul>
		</li>
		<li id="12" class='menu-item'>
			<a href="javascript:void(0)">Tài Khoản</a>
			<ul class="sub-menu">
				<li>
					<a href="index.php?nameCtr=UserController&action=showUser"><em>01</em>Tất cả userr</a>
				</li>
				<li>
					<a href="index.php?nameCtr=UserController&action=addUser"><em>02</em>Thêm user</a>
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
				$.cookie('menu', parentId, {expires:7, path:'/'});

				if($("#" + parentId + " > a").attr('class') != 'active'){

					$(".menu-item .sub-menu").slideUp('normal');
					$("#"+ parentId + " .sub-menu").slideDown('normal');
					
					$(".menu-item  a").removeClass('active');
					$("#" + parentId + " > a").addClass('active');
				}
				
			});
		});

		if($.cookie('menu') > 0){

			var parentId = $.cookie('menu');
			$(".menu-item  a").removeClass('active');
			$("#"+ parentId + " > a").addClass('active');
			$("#"+ parentId + " .sub-menu").slideDown('normal');
			
		}

	});
</script>