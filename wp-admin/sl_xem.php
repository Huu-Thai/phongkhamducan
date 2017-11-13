<?php
	require_once "checklogin.php";
	require_once "class_quantri.php";
	$qt = new quantri;
	$pageSize = 20;
	$pageNum = 1;
	if (isset($_GET['pageNum'])==true) $pageNum = $_GET['pageNum'];
	if ($pageNum<=0) $pageNum=1; settype($pageNum,"int");
	if(isset($_GET['TieuDe'])){$TieuDe = $_GET['TieuDe'];}else{$TieuDe="";}
	$TieuDe = $qt->XoaDinhDang($TieuDe);
?>
<?php
	$loaisp = $qt->ListSL($totalRows, $pageNum,$pageSize, $TieuDe);
?>
<style>
#thanhphantrang a {text-decoration:none; padding-left:5px; padding-right:5px; margin-left:5px; margin-right:5px;}
#thanhphantrang span {
	padding-left:5px;
	padding-right:5px;
	margin-left:5px;
	margin-right:5px;
	color:#F00;
	font-size: 24px;
	font-weight: bolder;
}
.smallButton{
	border: 1px solid #cdcdcd;
	padding: 5px 5px;
	display: inline-block;
	background: #f6f6f6;
	margin:0 10px 0 0;
}
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
	function()
	{
	    return this.each(function()
	    {
	        $(this).keydown(function(e)
	        {
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
	function suathutu(e,ma)
	{
	    if (typingTimeout != undefined)
	        clearTimeout(typingTimeout);
	    typingTimeout = setTimeout( function()
	    {
	    	var ttu = $("#ThuTu_"+ma).val();
	    	var bien = "id="+ma+"&ttu="+ttu;
	        $.get('thutu_slider.php', bien, function(data) {
				
			});
	    }
	    , 500);
	}
</script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

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
<?php $i = 1; while ($row_loaisp = mysql_fetch_assoc($loaisp) ) { ?>
<?php ob_start(); ?>
<tr>  	<td>{STT}</td>
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
$str = str_replace("{STT}",$i,$str);
$str = str_replace("{id}",$row_loaisp['idSlider'],$str);
$str = str_replace("{TieuDe}",$row_loaisp['TieuDe'],$str);
$str = str_replace("{UrlHinh}",$row_loaisp['UrlHinh'],$str);
$str = str_replace("{ThuTu}",$row_loaisp['ThuTu'],$str);
$str = str_replace("{AnHien}",$row_loaisp['AnHien'],$str);
echo $str;
$i++
?>
<?php } //while ?>
<?php if ($totalRows > $pageSize) { ?>
<tr>
  <td colspan="8" align="left">
   <p id=thanhphantrang>
	<?=$qt->pagesList($totalRows, $pageNum, $pageSize);?>
	</p>
    </td>
</tr>
<?php } ?>
</table>