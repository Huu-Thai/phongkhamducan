<header>
	<div class="divtop">
		<div class="m640">
			<div class="left adresstop">
				<img src="images/icon-adress-top.png" title="Địa Chỉ " alt="Địa Chỉ ">
				<span class="text-address">23 Thái Nguyên, P.Phước Tân, Tp.Nha Trang, Khánh Hòa</span>
			</div>
			<div class="right mxhtop">
				<a href="" title="Facebook " alt="Facebook " class="xoay" target="_blank">
					<img src="images/icon-facebook.png" alt="Facebook " title="Facebook " class="hidden zoomInRight1">
				</a>
				<a href="" title="Twitter " alt="Twitter " class="xoay" target="_blank">
					<img src="images/icon-twitter.png" title="Twitter " alt="Twitter " class="hidden zoomInRight1">
				</a>
				<a href="" title="Google Plus " alt="Google Plus " class="xoay" target="_blank">
					<img src="images/icon-googleplus.png" title="Google Plus " alt="Google Plus " class="hidden zoomInRight1">
				</a>
			</div>
			<div class="clear"></div>
		</div>
	</div><!-- divtop -->
	<div class="clear"></div>
	<div class="m640 divtop2">  
		<div class="left logotop tuvana">
			<a href="" title="Về Trang Chủ" alt="Về Trang Chủ">
				<img src="images/logo.png" title="Logo " alt="Logo ">
			</a>
		</div>    
		<div class="right glv-tv_top">
			<div class="left hieuung">
				<img src="images/icon-gio-lam-viec-top.png" title="Giờ Làm Việc" alt="Giờ Làm Việc">
			</div>
			<div class="right">
				<span>Giờ Làm Việc</span>
				<p>8h00 - 22h00</p>
			</div>
			<div class="clear"></div>
		</div>
		<div class="right glv-tv_top">
			<div class="left hieuung">
				<img src="images/icon-phone-top.png" title="Tư Vấn Miễn Phí" alt="Tư Vấn Miễn Phí">
			</div>
			<div class="right">
				<span class="tvtop">Tư Vấn Miễn Phí</span>
				<p>0258.625.5555</p>
			</div>
			<div class="clear"></div>
		</div>
	</div> <!-- divtop2 -->
	<div class="clear"></div>
	<div class="menutop">
		<div class="m640 edit_menutop"> 
			<a class="menu_button left" href="javascript:void(0)" onclick="open_menu()" ondblclick="close_menu()"></a>       
			<ul class="nav"> 
				<li class="menutrangchu"> <a href="./" title="Trang Chủ" alt="Trang Chủ" class="chuin">Trang Chủ</a></li>
				<?php while($row = mysqli_fetch_assoc($data['menu'])): ?>
					<li class="kcmenu"> <a href="index.php?nameCtr=ChuyenkhoaController&action=getPost&idLoai=<?=$row['idLoai']?>" title="<?=$row['Title']?>" alt="<?=$row['Title']?>" class="chuin"><?=$row['TieuDe'] ?></a></li>
				<?php endwhile; ?>
				<li class="kcmenu"> <a href="#" title="Liên Hệ" alt="CLiên Hệ" class="chuin">Liên Hệ</a></li>
			</ul>         
			<div class="timkiem right">
				<input type="text" class="box_search" placeholder="search" cols="50">
				<a href="#" data-popup-open="popup-1" title="Tìm Kiếm" alt="Tìm Kiếm">
					<img src="images/icon_search.png" title="Tìm Kiếm" alt="Tìm Kiếm">
				</a>           
			</div>
			<div class="clear"></div>
		</div>
	</div>
</header>
<script>
	
	function open_menu(){
		var class_menu = document.getElementsByClassName("nav");
		for(i = 0; i < class_menu.length; i++){
			class_menu[i].style.display = 'block';
		}
	}
	function close_menu(){
		var class_menu = document.getElementsByClassName("nav");
		for(i = 0; i < class_menu.length; i++){
			class_menu[i].style.display = 'none';
		}
	}
</script>