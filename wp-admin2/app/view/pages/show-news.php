<script type="text/javascript">

  $(document).ready(function() {

    $(".anhien").click(function() {

      var bien = $(this).attr('AnHien');
      var ma = $(this).attr('id');

      $.get('index.php?nameCtr=NewsController&action=changeAnHien', bien, function(data) {

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
<form action="" method="get" name="form2" id="form2" style="float: left;">
	<input type="hidden" name="nameCtr" id="" value="NewsController" />
	<input type="hidden" name="action" id="" value="showNews" />
	<input type="text" id="TieuDe" name="TieuDe" value="Nhập tiêu đề cần tìm" onclick="nhapchuot()" />
	<input type="submit" value="Tìm" id="btnLocMa" name="btnLocMa" />
</form>
<div class="reloadk"> 
	<a href="index.php?nameCtr=NewsController&action=showNews">
		[ Reload Lại ]
	</a>
</div>

<div style="clear: both; height: 10px"></div>
<table id="dsloaitin" border="1" cellpadding="4" cellspacing="0" width="900" align="center" class="khungk" />

<tr>
	<th width="20">Mã</th>
	<th width="150">Tiêu đề</th>
	<th width="80">Hình</th>
	<th width="400">Tóm Tắt</th>
	<th width="50">Ẩn/Hiện</th>
	<th width="150">Thao Tác</th>
</tr>
<?php if($data['news'] != false): ?>
	<?php while ($row = mysqli_fetch_assoc($data['news']) ) : ?>
		<?php ob_start(); ?>
		<tr>    
			<td class="anhien">{idTT}</td>
			<td>{TieuDe}</td>
			<td><img src="{UrlHinh}" width="70" height="70"></td>
			<td>{TomTat}</td>
			<td class="anhien"><a class="smallButton anhien" id="ma_{idTT}"  AnHien="table=tintuc&ma=idTT&id={idTT}&col=AnHien"  href="javascript:void(0)"><img  src="images/ah_{AnHien}.png"></a></td>
			<td align="center">
				<a class="smallButton" href="index.php?nameCtr=NewsController&action=updateNews&id={idTT}"><img  src="images/pencil.png" title="Sửa Tin"></a>
				<a class="smallButton" href="index.php?nameCtr=NewsController&action=deleteNews&id={idTT}" onclick="return confirm('Bạn có muốn xóa !!! ');"><img src="images/close.png" title="Xóa Tin"></a>
				<a class="smallButton" href="../{TieuDeKD}.html" target="_blank"><img src="images/eye_inv.png" title="Lấy Link"></a>
			</td>
		</tr>

		<?php

		$str = ob_get_clean();
		$str = str_replace("{idTT}", $row['idTT'],$str);
		$str = str_replace("{TieuDe}", $row['TieuDe'],$str);
		$str = str_replace("{TieuDeKD}", $row['TieuDeKD'],$str);
		$str = str_replace("{UrlHinh}", $row['UrlHinh'],$str);
		$TomTat = $news->deleteFormat($row['TomTat']);
		$TomTat = $news->cutString($TomTat,150," ...");
		$str = str_replace("{TomTat}", $TomTat ,$str);
		$str = str_replace("{AnHien}",$row['AnHien'],$str);
		echo $str;

		?>
	<?php endwhile; ?>
<?php endif; ?>

<?php if ($data['totalRow'] > $data['pageSize']): ?>
	<tr>
		<td colspan="8" align="left">
			<p id=thanhphantrang>
				<?=$news->pageList($data['totalRow'], $data['pageNum'], $data['pageSize']);?>
			</p>
		</td>
	</tr>
<?php endif; ?>
</table>
