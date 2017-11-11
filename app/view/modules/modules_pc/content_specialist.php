<div class="w1000 content_posts">
	<div class="list_post edit_list_post">
		<h1>DANH MỤC BỆNH</h1>

		<ul class="department">
			<li class="title_depart">
				<div class="bgd_title_sick">
					<span class="item_plus"></span>
					<h3><?=$data['loai']['TieuDe']; ?></h3>
				</div>

				<ul>
					<?php while($row = mysqli_fetch_assoc($data['subPosts'])): ?>
						<li>
							<a href="index.php?nameCtr=ChuyenkhoaController&action=getPost&idLoai=<?=$row['Parent']?>&childIdLoai=<?=$row['idLoai']?>"><i class="doub_arow">>> </i><?=$row['TieuDe'] ?></a>	
						</li>
					<?php endwhile; ?>
				</ul>
			</li>
		</ul>
	</div>
	<div class="cnt_post edit_cnt_post">

		<div class="edit_title_post">
			<img src="images/bg_h3_loai.png" alt="">
			<h1><?=$data['choseSubPost']['Title'] ?></h1>
			<p><?=$data['choseSubPost']['Des']; ?></p>
		</div>
		<div class='clear30'></div>

		<div class="list_sick_depart">
			<?php include "app/view/modules/paginate.php"; ?>
			
			<?php for($run = $x; $run < $end; $run++): ?>
				<div class="clear20"></div>
				<div class="sick_depart">
			
					<img src="<?=$rows[$run]['UrlHinh']?>" alt="<?=$rows[$run]['Title']?>">
					<div>
						<h2><?=$rows[$run]['Title']; ?></h2>
						<p><?=$rows[$run]['TomTat']; ?></p>
					</div>
					<div class="hu_xemthem">
						<a href="index.php?nameCtr=SingleController&action=showPost&idTT=<?=$rows[$run]['idTT']?>" title="<?=$rows[$run]['Title']?>">Xem chi tiết...</a>
					</div>
				</div>
			<?php endfor; ?>
			<div class="clear20"></div>
			<ul class="paginate">
				<?php for($i = 1;$i <= $numPage; $i++): ?>
						<li <?php echo ($_GET['pageNum'] == $i) ? 'class="active"' : ""?> ><a href="index.php?nameCtr=ChuyenkhoaController&action=getPost&idLoai=<?=$data['idLoai']?>&pageNum=<?=$i?>">Trang <?=$i ?></a></li>
				<?php endfor; ?>
			</ul>
		</div>
	</div>
</div>
<div class="clear20"></div>
<?php include "footer-banner.php"; ?>
</div>


