<?php
	require_once "checklogin.php";
	require_once "class_quantri.php";
	$qt = new quantri;
	$pageSize = 10;
	$pageNum = 1;

	if (isset($_GET['pageNum'])==true) $pageNum = $_GET['pageNum'];
	if ($pageNum<=0) $pageNum=1; settype($pageNum,"int");
	if(isset($_GET['TieuDe'])){$TieuDe = $_GET['TieuDe'];}else{$TieuDe="";}
	$TieuDe = $qt->XoaDinhDang($TieuDe);
	
	$idCha = -1;
	if (isset($_GET['idCha'])==true) {$idCha = $_GET['idCha'];} 
	
?>
<?php
	$loaisp = $qt->ListCauHinhChung();
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
		$(".checkmenu").click(function() {
			var bien = $(this).attr('AnHien');
			var ma = $(this).attr('id');
			$.get('anhien_menu.php', bien, function(data) {
				var chuoi = "<img  src=images/ah_"+data+".png>";
				$("#"+ma).html(chuoi);
			});
			return false;
		});
		$(".checkhome").click(function() {
			var bien = $(this).attr('AnHien');
			var ma = $(this).attr('id');
			$.get('anhien_home.php', bien, function(data) {
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
	    	var bien = "id="+ma+"&ttu="+ttu+"&bang=LoaiTin";
	        $.get('thutu.php', bien, function(data) {				
			});
	    }
	    , 500);
	}
</script>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<div style="clear: both; height: 10px"></div>
<table id="dsloaitin" border="1" cellpadding="4" cellspacing="0" width="680" align="center" class="khungk" />

<tr>
		<th width="20">Cấu Hình Chung</th>
</tr>

<?php while ($row_loaisp = mysql_fetch_assoc($loaisp) ) { ?>
<?php ob_start(); ?>
		<!-- <tr><td><span class="kdo">Mã:</span> {id}</td></tr> -->
		<tr><td><span class="kdo">URL:</span> {URL}</td></tr>
        <tr><td><span class="kdo">FaceBook:</span> {Facebook}</td></tr>
        <tr><td><span class="kdo">Twitter:</span> {Twitter}</td></tr>
        <tr><td><span class="kdo">Google:</span> {GooglePlus}</td></tr>
        <tr><td><span class="kdo">Địa Chỉ:</span> {DiaChi}</td></tr>
       	<tr><td><span class="kdo">Link Map:</span> {Map}</td></tr>
        <tr><td><span class="kdo">Điện Thoại:</span> {DienThoai}</td></tr>
        <tr><td><span class="kdo">HotLine:</span> {Hotline}</td></tr>
		 <tr><td style="text-align: center; text-transform: uppercase; color: #00BCD4;"> Phần Trang Chủ</td></tr>
        <tr><td><span class="kdo">Title Trang Chủ:</span> {TitleTrangChu}</td></tr>
        <tr><td><span class="kdo">Description Trang Chủ:</span> {DesTrangChu}</td></tr>
        <tr><td><span class="kdo">Keyword Trang Chủ:</span> {KeywordTrangChu}</td></tr>
        <tr><td><span class="kdo">Thẻ H1 Trang Chủ:</span> {H1}</td></tr>
        <tr><td><span class="kdo">Thẻ H2 Trang Chủ:</span> {H2}</td></tr>
        <tr><td><span class="kdo">Thẻ H3 Trang Chủ:</span> {H3}</td></tr>
        <tr><td><span class="kdo">Thẻ H4 Trang Chủ:</span> {H4}</td></tr>
        <tr><td><span class="kdo">Thẻ H5 Trang Chủ:</span> {H5}</td></tr>
        <tr><td><span class="kdo">Thẻ H6 Trang Chủ:</span> {H6}</td></tr>
        <tr>
	      	<td width="100" align="center">
	            <a class="smallButton" href="main.php?p=cauhinhchung_chinh&id={id}"><img  src="images/pencil.png" title="Sửa Danh Mục"></a>	            
	  		</td>
  		</tr>



<?php
$str = ob_get_clean();
$str = str_replace("{id}",$row_loaisp['idCauHinhChung'],$str);
$str = str_replace("{URL}",$row_loaisp['URL'],$str);
$str = str_replace("{Facebook}",$row_loaisp['Facebook'],$str);
$str = str_replace("{Twitter}",$row_loaisp['Twitter'],$str);
$str = str_replace("{GooglePlus}",$row_loaisp['GooglePlus'],$str);
$str = str_replace("{DiaChi}",$row_loaisp['DiaChi'],$str);
$str = str_replace("{Map}",$row_loaisp['Map'],$str);
$str = str_replace("{DienThoai}",$row_loaisp['DienThoai'],$str);
$str = str_replace("{Hotline}",$row_loaisp['Hotline'],$str);

$str = str_replace("{TitleTrangChu}",$row_loaisp['TitleTrangChu'],$str);
$str = str_replace("{DesTrangChu}",$row_loaisp['DesTrangChu'],$str);
$str = str_replace("{KeywordTrangChu}",$row_loaisp['KeywordTrangChu'],$str);

$str = str_replace("{H1}",$row_loaisp['H1'],$str);
$str = str_replace("{H2}",$row_loaisp['H2'],$str);
$str = str_replace("{H3}",$row_loaisp['H3'],$str);
$str = str_replace("{H4}",$row_loaisp['H4'],$str);
$str = str_replace("{H5}",$row_loaisp['H5'],$str);
$str = str_replace("{H6}",$row_loaisp['H6'],$str);
echo $str;
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
<style type="text/css">
	.kdo
	{
		color: red;
		font-weight: bold;
	}
</style>