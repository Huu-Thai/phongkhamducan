<div class="list_post edit_list_post">
		<h1>DANH MỤC BỆNH</h1>

		<ul class="department">
			<li class="title_depart">
				<div class="bgd_title_sick">
					<span class="item_plus"></span>
					<h3><?=$data['loai']['TieuDe']; ?></h3>
				</div>

				<ul>
				<?php if(isset($data['subPosts'])): ?>
					<?php while($row = mysqli_fetch_assoc($data['subPosts'])): ?>
						<li>
							<a href="<?=$row['TieuDeKD']?>-<?=$row['Parent']?>-<?=$row['idLoai']?>/"><i class="doub_arow">>> </i><?=$row['TieuDe'] ?></a>	
						</li>
					<?php endwhile; ?>
				<?php endif; ?>
				</ul>
			</li>
		</ul>
	</div>