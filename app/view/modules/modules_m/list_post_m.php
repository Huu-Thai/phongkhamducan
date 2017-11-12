<div class="list_post class_inherit">
	<h1>bài Viết Liên Quan</h1>
	<ul class="item_posts">
		<?php while($row = mysqli_fetch_assoc($data['postRelated'])): ?>
			<li>
				<h3><a href="index.php?nameCtr=SingleController&action=showPost&idTT=<?=$row['idTT']?>"><?=$row['TieuDe'] ?></a></h3>
			</li>
		<?php endwhile; ?>
	</ul>
</div>