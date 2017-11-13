<?php 
	require_once "checklogin.php";
	require_once "class_quantri.php";
	$qt =  new quantri;
?>
<script type="text/javascript">

		$(document).ready(function() {
			// Store variables

			var accordion_head = $('.accordion > li > a'),
				accordion_body = $('.accordion li > .sub-menu');

			// Open the first tab on load

            if ($.cookie('kaka')>0){
                var menu = $.cookie('kaka');
                var menu_hien = '#'+menu+' a';
                $(menu_hien).addClass('active').next().slideDown('normal');
            }
            else
		      	$('#1 a').addClass('active').next().slideDown('normal');

			// Click function

			accordion_head.on('click', function(event) {

				// Disable header links

				event.preventDefault();

				// Show and hide the tabs on click

				if ($(this).attr('class') != 'active'){
					accordion_body.slideUp('normal');
					$(this).next().stop(true,true).slideToggle('normal');
					accordion_head.removeClass('active');
					$(this).addClass('active');
				}

			});

		});

        function luu(menu){
            $.cookie('kaka',menu,{expires:7,path:'/'});
        }

	</script>

<div id="wrapper-250">

		<ul class="accordion">

			<li id="1" class="files">
				<a href="#one">Trang Chủ</a>
				<ul class="sub-menu">
					<li><a onclick="luu(1)" href="#" target="_blank"><em>01</em>Về Trang Web</a></li>
					<li><a onclick="luu(1)" href="index.php"><em>02</em>Trang Chủ</a></li>
				</ul>

			</li>

			<li id="2" class="files">
				<a href="#one">Quản Lý Loại Tin</a>
				<ul class="sub-menu">
					<li><a onclick="luu(2)" href="main.php?p=dm_xem"><em>01</em>Quản Lý</a></li>
					<li><a onclick="luu(2)" href="main.php?p=dm_them"><em>02</em>Thêm Loại</a></li>
				</ul>
			</li>

			<li id="3" class="files">
				<a href="#one">Quản Lý Pages</a>
				<ul class="sub-menu">
					<li><a onclick="luu(3)" href="main.php?p=pa_xem"><em>01</em>Quản Lý</a></li>
					<li><a onclick="luu(3)" href="main.php?p=pa_them"><em>02</em>Thêm Pages</a></li>
				</ul>
			</li>	

			<li id="4" class="files">
				<a href="#one">Quản Lý Chủ Đề</a>
				<ul class="sub-menu">
					<li><a onclick="luu(4)" href="main.php?p=cd_xem"><em>01</em>Quản Lý</a></li>
					<li><a onclick="luu(4)" href="main.php?p=cd_them"><em>02</em>Thêm Chủ Đề</a></li>
				</ul>
			</li>

			<li id="5" class="files">
				<a href="#one">Quản Lý Tin Tức</a>
				<ul class="sub-menu">
					<li><a onclick="luu(5)" href="main.php?p=tt_xem"><em>01</em>Quản Lý</a></li>
					<li><a onclick="luu(5)" href="main.php?p=tt_them"><em>02</em>Thêm Tin Tức</a></li>
				</ul>
			</li>

			<li id="6" class="files">
				<a href="#one">Quản Lý Menu</a>
				<ul class="sub-menu">
					<li><a onclick="luu(6)" href="main.php?p=menu_xem"><em>01</em>Quản Lý</a></li>
					<li><a onclick="luu(6)" href="main.php?p=menu_them"><em>02</em>Thêm Menu</a></li>
				</ul>
			</li>
			<li id="7" class="files">
				<a href="#one">Quản Lý Đăng Ký</a>
				<ul class="sub-menu">
					<li><a onclick="luu(7)" href="main.php?p=dk_xem"><em>01</em>Quản Lý</a></li>
					<li><a onclick="luu(7)" href="main.php?p=tk_them"><em>02</em>Đăng ký tài khoản</a></li>
				</ul>
			</li>
			<li id="8" class="files">
				<a href="#one">Cấu Hình Chung</a>
				<ul class="sub-menu">
					<li><a onclick="luu(8)" href="main.php?p=cauhinhchung_xem"><em>01</em>Cập Nhật Cấu Hình Website</a></li>
				</ul>
			</li>
			<li id="9" class="files">
				<a href="#one">Quản lý bình luận</a>
				<ul class="sub-menu">
					<li><a onclick="luu(9)" href="main.php?p=check_comment"><em>01</em>Duyệt bình luận</a></li>
				</ul>
			</li>

		</ul>	
</div>

