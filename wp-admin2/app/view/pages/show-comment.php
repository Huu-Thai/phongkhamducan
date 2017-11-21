<script type="text/javascript">
  $(document).ready(function() {
    $(".anhien").click(function() {
      var bien = $(this).attr('AnHien');
      var ma = $(this).attr('id');

      $.get('index.php?nameCtr=CommentController&action=changeAnHien', bien, function(data) {
        var chuoi = "<img  src=images/ah_"+data+".png>";
        $("#"+ma).html(chuoi);

      });

      return false;
    });
  });

  function nhapchuot(){
    var dulieu = $("#TieuDe").val();
    if (dulieu == "Nhập tiêu đề cần tìm")
      $("#TieuDe").val("");
  }
</script>

<form action="" method="get" name="form2" id="form2">
	<input type="hidden" name="nameCtr" id="" value="CommentController" />
	<input type="hidden" name="action" id="" value="showComment" />
	Họ Tên <input type="text" id="" name="HoTen" value="" style="width:300px" />
	Số Điện Thoại <input type="text" id="" name="SoDT" value="" style="width:300px" />
	<input type="submit" value="Tìm" id="btnLocMa" name="btnLocMa" />
</form>
<div class="box_comment">
	<table border="1" cellspacing="0" cellpadding="5" width="1000">
		<thead>
			<tr>
				<th>#</th>
				<th>Họ và tên</th>
				<th>Số điện thoại</th>
				<th width="300">Nội dung comment</th>
				<th>Bài viết</th>
				<th>ID bài viết</th>
				<th>Xét duyệt</th>
			</tr>
		</thead>
		<tbody>
			<?php if($data['comments'] != false): $i = 1;?>
				<?php while($row = mysqli_fetch_assoc($data['comments'])): ?>
					<?php ob_start(); ?>
					<tr>
						<td width="" scope="col"><?=$i ?></td>
						<td width="">{HoTen}</td>
						<td width="">{SoDT}</td>
						<td width="">{NoiDung}</td>
						<td width="">{TieuDe}</td>
						<td width="">{idTT}</td>
						<td width="" class="anhien"><a class="smallButton anhien" id="ma_{idBL}"  AnHien="table=binhluan&ma=idBL&id={idBL}&col=AnHien"  href="javascript:void(0)"><img  src="images/ah_{AnHien}.png"></a></td>
					</tr>

					<?php

					$str = ob_get_clean();
					$str = str_replace("{idBL}", $row['idBL'], $str);
					$str = str_replace("{idTT}", $row['idTT'], $str);
					$str = str_replace("{HoTen}", $row['HoTen'], $str);
					$str = str_replace("{SoDT}", $row['SoDT'], $str);
					$NoiDung = $comment->deleteFormat($row['NoiDung']);
					$NoiDung = $comment->cutString($NoiDung, 200, " ...");
					$str = str_replace("{NoiDung}", $NoiDung, $str);
					$str = str_replace("{TieuDe}", $row['TieuDe'], $str);
					$str = str_replace("{AnHien}", $row['AnHien'], $str);
					echo $str;

					?>
					<?php $i++; ?>
				<?php endwhile; ?>
			<?php endif; ?>
			
			<?php if ($data['totalRow'] > $data['pageSize']): ?>
				<tr>
					<td colspan="8" align="left">
						<p id=thanhphantrang>
							<?=$comment->pageList($data['totalRow'], $data['pageNum'], $data['pageSize']);?>
						</p>
					</td>
				</tr>
			<?php endif; ?>
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

<style>
	
</style>
