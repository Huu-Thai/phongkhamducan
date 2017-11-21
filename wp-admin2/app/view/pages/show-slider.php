<style>

	input[type="text"].ThuTu {
		width: 50px;
		text-align: center;
	}
</style>

<script type="text/javascript">
	$(document).ready(function() {
		$(".anhien").click(function() {
			var bien = $(this).attr('AnHien');
			var ma = $(this).attr('id');

			$.get('anhien.php', bien, function(data) {
				var chuoi = "<img  src=images/ah_"+data+".png>";
				$("#"+ma).html(chuoi);
			});

			return false;
		});

		$(".ThuTu").ForceNumericOnly();
		$(".ThuTu").live("keypress", function(e){

			var ma = $(this).attr('bien');
			suathutu($(e.target),ma);
		});
	});

	function nhapchuot(){
		var dulieu = $("#TieuDe").val();
		if (dulieu == "Nhập tiêu đề cần tìm")
			$("#TieuDe").val("");
	}

	jQuery.fn.ForceNumericOnly =
	function(){
		return this.each(function() {
			$(this).keydown(function(e) {
				var key = e.charCode || e.keyCode || 0;
	            // allow backspace, tab, delete, arrows, numbers and keypad numbers ONLY
	            // home, end, period, and numpad decimal
	            return (
	            	key == 8 ||
	            	key == 9 ||
	            	key == 46 ||
	            	key == 110 ||
	            	key == 190 ||
	            	(key >= 35 && key <= 40) ||
	            	(key >= 48 && key <= 57) ||
	            	(key >= 96 && key <= 105));
	        });
		});
	};
	var typingTimeout;
	function suathutu(e,ma)	{
		if (typingTimeout != undefined)
			clearTimeout(typingTimeout);
		typingTimeout = setTimeout( function() {
			var ttu = $("#ThuTu_"+ma).val();
			var bien = "id="+ma+"&ttu="+ttu;
			$.get('thutu_slider.php', bien, function(data) {});
		}, 500);
	}

</script>
<form action="" method="get" name="form2" id="form2">
	<input type="hidden" name="p" id="p" value="sl_xem" />
	<input type="text" id="TieuDe" name="TieuDe" value="Nhập tiêu đề cần tìm" onclick="nhapchuot()" />
	<input type="submit" value="Tìm" id="btnLocMa" name="btnLocMa" />
</form>

<div style="clear: both; height: 10px"></div>
<table id="dsloaitin" border="1" cellpadding="4" cellspacing="0" width="540" align="center" />
<tr>

	<th width="20">STT</th>
	<th width="100">Tiêu đề</th>
	<th width="120">Hình</th>
	<th width="50">Ẩn/Hiện</th>
	<th width="50">Thứ Tự</th>
	<th width="100">Thao Tác</th>
</tr>

<?php if($data['slider'] != false): ?>
	<?php $i = 1; while ($row = mysqli_fetch_assoc($data['slider']) ): ?>
	<?php ob_start(); ?>

	<tr>
		<td>{STT}</td>
		<td>{TieuDe}</td>
		<td><img src="{UrlHinh}" width="120" height="70"></td>
		<td class="anhien"><a class="smallButton anhien" id="ma_{id}"  AnHien="bang=quangcao&ma=idSlider&id={id}"  href="#"><img  src="images/ah_{AnHien}.png"></a></td>
		<td>
			<input type="text" name="ThuTu" bien="{id}" id="ThuTu_{id}" class="ThuTu" value="{ThuTu}">
		</td>
		<td width="100" align="center">
			<a class="smallButton" href="main.php?p=sl_chinh&id={id}"><img  src="images/pencil.png" title="Sửa Slider"></a>
			<a class="smallButton" href="sl_xoa.php?id={id}" onclick="return confirm('Bạn có muốn xóa !!! ');"><img src="images/close.png" title="Xóa Slider"></a>
		</td>
	</tr>

	<?php

	$str = ob_get_clean();
	$str = str_replace("{STT}", $i, $str);
	$str = str_replace("{id}", $row['idSlider'], $str);
	$str = str_replace("{TieuDe}", $row['TieuDe'], $str);
	$str = str_replace("{UrlHinh}", $row['UrlHinh'], $str);
	$str = str_replace("{ThuTu}", $row['ThuTu'], $str);
	$str = str_replace("{AnHien}", $row['AnHien'], $str);
	echo $str;
	$i++

	?>

<?php endwhile; ?>
<?php endif; ?>

<?php if ($data['totalRow'] > $data['pageSize']) { ?>

<tr>
	<td colspan="8" align="left">
		<p id=thanhphantrang>
			<?=$qt->pagesList($data['totalRow'], $data['pageNum'], $data['pageSize']);?>
		</p>
	</td>
</tr>

<?php } ?>

</table>