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
			<a class="menu_button left" href="javascript:void(0)" onclick="open_menu()"></a>       
			<ul class="nav"> 
				<li class="menutrangchu"> <a href="./" title="Trang Chủ" alt="Trang Chủ" class="chuin">Trang Chủ</a></li>
				<?php while($row = mysqli_fetch_assoc($data['menu'])): ?>
					<li class="kcmenu">
						<a href="<?=$row['TieuDeKD']?>-<?=$row['idLoai']?>.html" title="<?=$row['Title']?>" alt="<?=$row['Title']?>" class="chuin">
							<?=$row['TieuDe'] ?>
							<?php
							if($loai->getSubNewsByIdLoai($row['idLoai']))
								$data['subMenu'] = $loai->getSubNewsByIdLoai($row['idLoai']); 
							?>
							<?php if(isset($data['subMenu'])): ?>
								<span>▼</span>
							</a>

							<ul class="sub_menu">
								<?php while($rowChild = mysqli_fetch_assoc($data['subMenu'])): ?>
									<li>
										<a href="<?=$rowChild['TieuDeKD']?>-<?=$rowChild['Parent']?>-<?=$rowChild['idLoai']?>/"><?=$rowChild['TieuDe'] ?></a>
									</li>
								<?php endwhile; ?>
								
							</ul>
						<?php else: ?>
						</a>
					<?php endif; ?>
				</li>
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
<style>
	.nav {
		min-width: 190px;
	}
	.nav li a {
		/*background: #00a654;*/
		color: #FFF;
		display: block;
		padding: 0px 5px 0px 35px;
		text-align: justify;
	}
	
</style>
<script>
	var flag = 0;
	function open_menu(){
		flag++;
		
		if(flag==2){

			close_menu();
			flag = 0;

		}else{
			
			var class_menu = document.getElementsByClassName("nav");
			for(i = 0; i < class_menu.length; i++){
				class_menu[i].style.display = 'block';
			}
		}
	}

	// document.getElementsByClassName('nav').addEventListener('click', close_menu);
	
	function close_menu(){
		var class_menu = document.getElementsByClassName("nav");
		for(i = 0; i < class_menu.length; i++){
			class_menu[i].style.display = 'none';
		}
	}

</script>