<div class="box_comment">
	<table>
		<thead>
			<tr>
				<th>#</th>
				<th>Họ và tên</th>
				<th>Số điện thoại</th>
				<th>Nội dung comment</th>
				<th>Bài viết</th>
				<th>ID bài viết</th>
				<th>Xét duyệt</th>
			</tr>
		</thead>
		<tbody>
			<?php if(isset($data['comments'])): ?>
				<?php include $this->linkModule.'paginate.php'; ?>
				<?php while($row = mysqli_fetch_assoc($data['comments'])): ?>
					<?php $rows[] = $row; ?>
				<?php endwhile; ?>
			<?php endif; ?>
			<?php for($run = $x; $run < $end; $run++): ?>
				<tr>
					<td scope="col"></td>
					<td><?=$rows[$run]['HoTen'] ?></td>
					<td><?=$rows[$run]['SoDT']?></td>
					<td><?=$rows[$run]['NoiDung'] ?></td>
					<td><?=$rows[$run]['TieuDe']?></td>
					<td><?=$rows[$run]['idTT']?></td>
					<td><input id="<?=$rows[$run]['idBL']?>" type="checkbox" name="comment_id" value="<?=$rows[$run]['AnHien']?>" <?=($rows[$run]['AnHien']==1) ? 'checked' : ''?>></td>
				</tr>
			<?php endfor; ?>
			
			<tr>
				<td colspan="7">

					<p id="thanhphantrang">
						<?php for($i = 1; $i <= $numPage; $i++): ?>
							<a class="trang" href="/phongkhamducan/wp-admin/main.php?&p=check_comment&pageNum=<?=$i?>"><?=$i ?></a>
						<?php endfor; ?>

					</p>
				</td>
			</tr>
		</tbody>
	</table>
</div>
<script>
	$(document).ready(function(){
		$("input[name='comment_id']").each(function(){
			$(this).click(function(){
				var AnHien = $(this).val();
				var idBL = $(this).attr('id');

				$.ajax({
					url: 'check_comment_ajax.php',
					type: 'post',
					typeData: 'json',
					data: {
						idBL: idBL,
						AnHien: AnHien
					},
					success: function(data){
						console.log(data);
					}
				});
			});
		});
	});
</script>