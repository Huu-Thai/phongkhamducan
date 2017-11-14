<link rel="stylesheet" href="css/rating.css">
<div class="m640 content_posts">
	
	<div class="list_post class_inherit">
		<h1>bài Viết Liên Quan</h1>
		<ul class="item_posts">
		<?php if(isset($data['postRelated'])): ?>
			<?php while($row = mysqli_fetch_assoc($data['postRelated'])): ?>
				<li>
					<h3><a href="<?=$row['TieuDeKD']?>/<?=$row['idTT']?>/chi-tiet/"><?=$row['TieuDe'] ?></a></h3>
				</li>
			<?php endwhile; ?>
		<?php endif; ?>
		</ul>
	</div>

	<div class="clear20	"></div>
	<div class="cnt_post">
		<div class="title_post">
			<h1><?=$data['news']['TieuDe']; ?></h1>
			<span>
				<time>Ngày đăng: <?= date('d-m-Y', strtotime($data['news']['NgayDang'])); ?></time>
				<i>lượt xem: <?=$data['news']['LuotXem']?>></i>
			</span>
		</div>
		<div class='clear'></div>
		<div class="description_post">
			<p>
				<?=$data['news']['Des'] ?>
			</p>
			<img src="<?=$data['news']['UrlHinh']?>" alt="" style="width:76%;max-width:472px;">
			<p><?=$data['news']['Title']?></p>
		</div>
		<div class='clear'></div>
		<div class="interested">
			<ul>
				<li>
					<img src="images/sq_add.png" alt="">
					<h3> có thể bạn quan tâm;</h3>
				</li>
				<?php while($row = mysqli_fetch_assoc($data['mood'])): ?>
					<li>
						<label for="">>> </label><a href="<?=$row['TieuDeKD']?>/<?=$row['idTT']?>/chi-tiet/" ><?=$row['Title'] ?></a>
					</li>
				<?php endwhile; ?>
				
			</ul>
		</div>
		<div class="clear"></div>
		<div class="caption_cnt">
			<div class="title_main">
				<h2><?=$data['news']['Title'] ?></h2>
			</div>
			<!-- <p>Bệnh liệt dương là tình trạng dương vật của nam giới không thể cương cứng Bệnh liệt dương là tình trạng dương vật của nam giới không thể cương cứng...</p> -->
		</div>
		<div class="clear"></div>
		<div class="cause_sick">
			<?=$data['news']['NoiDung'] ?>
			<!-- <ul>
				<li>
					<div class="title_cause">
						<img src="images/heart.png" alt="Quan tâm">
						<h2>Nguyên nhân gây bệnh liệt dương</h2>
					</div>
					<div class="text_cnt">
						<p> các chuyên gia phòng khám đa khoa thái hà cho biết: co rât nhiều nguyên nhân dẫn đến bệnh liệt dương điều đó có thể kể đến một số nguyên nhân phổ biến dưới đây</p>
						<p>- các chuyên gia phòng khám đa khoa thái hà cho biết: co rât nhiều nguyên nhân dẫn đến bệnh liệt dương điều đó có thể kể đến một số nguyên nhân phổ biến dưới đây</p>
						<p>- các chuyên gia phòng khám đa khoa thái hà cho biết: co rât nhiều nguyên nhân dẫn đến bệnh liệt dương điều đó có thể kể đến một số nguyên nhân phổ biến dưới đây</p>
						<p>- các chuyên gia phòng khám đa khoa thái hà cho biết: co rât nhiều nguyên nhân dẫn đến bệnh liệt dương điều đó có thể kể đến một số nguyên nhân phổ biến dưới đây</p>
						<p>- các chuyên gia phòng khám đa khoa thái hà cho biết: co rât nhiều nguyên nhân dẫn đến bệnh liệt dương điều đó có thể kể đến một số nguyên nhân phổ biến dưới đây</p>
						<p>- các chuyên gia phòng khám đa khoa thái hà cho biết: co rât nhiều nguyên nhân dẫn đến bệnh liệt dương điều đó có thể kể đến một số nguyên nhân phổ biến dưới đây</p>
						<p>- các chuyên gia phòng khám đa khoa thái hà cho biết: co rât nhiều nguyên nhân dẫn đến bệnh liệt dương điều đó có thể kể đến một số nguyên nhân phổ biến dưới đây</p>
						<p>- các chuyên gia phòng khám đa khoa thái hà cho biết: co rât nhiều nguyên nhân dẫn đến bệnh liệt dương điều đó có thể kể đến một số nguyên nhân phổ biến dưới đây</p>
						<p>- các chuyên gia phòng khám đa khoa thái hà cho biết: co rât nhiều nguyên nhân dẫn đến bệnh liệt dương điều đó có thể kể đến một số nguyên nhân phổ biến dưới đây</p>
					</div>
				</li>
				<li>
					<div class="title_cause">
						<img src="images/heart.png" alt="Quan tâm">
						<h2>Nguyên nhân gây bệnh liệt dương</h2>
					</div>
					<div class="text_cnt">
						<p> các chuyên gia phòng khám đa khoa thái hà cho biết: co rât nhiều nguyên nhân dẫn đến bệnh liệt dương điều đó có thể kể đến một số nguyên nhân phổ biến dưới đây</p>
						<p>- các chuyên gia phòng khám đa khoa thái hà cho biết: co rât nhiều nguyên nhân dẫn đến bệnh liệt dương điều đó có thể kể đến một số nguyên nhân phổ biến dưới đây</p>
						<p>- các chuyên gia phòng khám đa khoa thái hà cho biết: co rât nhiều nguyên nhân dẫn đến bệnh liệt dương điều đó có thể kể đến một số nguyên nhân phổ biến dưới đây</p>
						<p>- các chuyên gia phòng khám đa khoa thái hà cho biết: co rât nhiều nguyên nhân dẫn đến bệnh liệt dương điều đó có thể kể đến một số nguyên nhân phổ biến dưới đây</p>
						<p>- các chuyên gia phòng khám đa khoa thái hà cho biết: co rât nhiều nguyên nhân dẫn đến bệnh liệt dương điều đó có thể kể đến một số nguyên nhân phổ biến dưới đây</p>
						<p>- các chuyên gia phòng khám đa khoa thái hà cho biết: co rât nhiều nguyên nhân dẫn đến bệnh liệt dương điều đó có thể kể đến một số nguyên nhân phổ biến dưới đây</p>
						<p>- các chuyên gia phòng khám đa khoa thái hà cho biết: co rât nhiều nguyên nhân dẫn đến bệnh liệt dương điều đó có thể kể đến một số nguyên nhân phổ biến dưới đây</p>
						<p>- các chuyên gia phòng khám đa khoa thái hà cho biết: co rât nhiều nguyên nhân dẫn đến bệnh liệt dương điều đó có thể kể đến một số nguyên nhân phổ biến dưới đây</p>
						<p>- các chuyên gia phòng khám đa khoa thái hà cho biết: co rât nhiều nguyên nhân dẫn đến bệnh liệt dương điều đó có thể kể đến một số nguyên nhân phổ biến dưới đây</p>
					</div>
				</li>
				<li>
					<div class="title_cause">
						<img src="images/heart.png" alt="Quan tâm">
						<h2>Nguyên nhân gây bệnh liệt dương</h2>
					</div>
					<div class="text_cnt">
						<p> các chuyên gia phòng khám đa khoa thái hà cho biết: co rât nhiều nguyên nhân dẫn đến bệnh liệt dương điều đó có thể kể đến một số nguyên nhân phổ biến dưới đây</p>
						<p>- các chuyên gia phòng khám đa khoa thái hà cho biết: co rât nhiều nguyên nhân dẫn đến bệnh liệt dương điều đó có thể kể đến một số nguyên nhân phổ biến dưới đây</p>
						<p>- các chuyên gia phòng khám đa khoa thái hà cho biết: co rât nhiều nguyên nhân dẫn đến bệnh liệt dương điều đó có thể kể đến một số nguyên nhân phổ biến dưới đây</p>
						<p>- các chuyên gia phòng khám đa khoa thái hà cho biết: co rât nhiều nguyên nhân dẫn đến bệnh liệt dương điều đó có thể kể đến một số nguyên nhân phổ biến dưới đây</p>
						<p>- các chuyên gia phòng khám đa khoa thái hà cho biết: co rât nhiều nguyên nhân dẫn đến bệnh liệt dương điều đó có thể kể đến một số nguyên nhân phổ biến dưới đây</p>
						<p>- các chuyên gia phòng khám đa khoa thái hà cho biết: co rât nhiều nguyên nhân dẫn đến bệnh liệt dương điều đó có thể kể đến một số nguyên nhân phổ biến dưới đây</p>
						<p>- các chuyên gia phòng khám đa khoa thái hà cho biết: co rât nhiều nguyên nhân dẫn đến bệnh liệt dương điều đó có thể kể đến một số nguyên nhân phổ biến dưới đây</p>
						<p>- các chuyên gia phòng khám đa khoa thái hà cho biết: co rât nhiều nguyên nhân dẫn đến bệnh liệt dương điều đó có thể kể đến một số nguyên nhân phổ biến dưới đây</p>
						<p>- các chuyên gia phòng khám đa khoa thái hà cho biết: co rât nhiều nguyên nhân dẫn đến bệnh liệt dương điều đó có thể kể đến một số nguyên nhân phổ biến dưới đây</p>
					</div>
				</li>
			</ul> -->
		</div>
		<div class="clear"></div>
		<div class="hr"></div>
		<input type="hidden" name="idTT" value="<?=$data['news']['idTT']?>">
		<div class="ratings">
			<div class="rating_stars">
				<input type="radio" name="example" class="rating" value="1" />
				<input type="radio" name="example" class="rating" value="2" />
				<input type="radio" name="example" class="rating" value="3" />
				<input type="radio" name="example" class="rating" value="4" />
				<input type="radio" name="example" class="rating" value="5" />
			</div>
			<p>Bệnh liệt dương: Nguyên nhân, triệu chứng cách chữa trị</p>
			<p>Điểm trung bình: <b><?=$data['vote']  ?> </b>/ 5 lượt đánh giá</p>
		</div>
		<script src="js/rating.js"></script>
		<?php echo $data['script']; ?>
		<div class="clear"></div>
		<?php include "standpoint.php"; ?>
		<div class="clear"></div>
		<?php include "comment2.php"; ?>
		<div class="clear"></div>
	</div>
</div>

