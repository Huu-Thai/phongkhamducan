<?php
  require_once "checklogin.php";
  require_once "class_quantri.php";
  $qt =  new quantri;
  $id=$_GET['id']; settype($id,"int");
  $sanpham = $qt->ChiTietMenu($id);
  $row_sanpham = mysql_fetch_assoc($sanpham);
  if (isset($_POST['btnOK'])==true){
    $qt ->SuaMenu($id);
    header("location:main.php?p=menu_xem");
  }
  $danhmuc = $qt->DanhMucMenu(-1, 0);
?>
<script>
    $(document).ready(function() {
      hienthumb();
    });
    function BrowseServer( startupPath, functionData ){
      var finder = new CKFinder();
      finder.basePath = 'ckfinder/'; //Đường path nơi đặt ckfinder
      finder.startupPath = startupPath; //Đường path hiện sẵn cho user chọn file
      finder.selectActionFunction = SetFileField; // hàm sẽ được gọi khi 1 file được chọn
      finder.selectActionData = functionData; //id của text field cần hiện địa chỉ hình
      finder.selectThumbnailActionFunction = ShowThumbnails; //hàm sẽ được gọi khi 1 file thumnail được chọn
      finder.popup(); // Bật cửa sổ CKFinder
    } //BrowseServer

    function SetFileField( fileUrl, data ){
      document.getElementById( data["selectActionData"] ).value = fileUrl;
      hienthumb();
    }
    function ShowThumbnails( fileUrl, data ){
      var sFileName = this.getSelectedFile().name; // this = CKFinderAPI
      document.getElementById( 'thumbnails' ).innerHTML +=
      '<div class="thumb">' +
      '<img src="' + fileUrl + '" />' +
      '<div class="caption">' +
      '<a href="' + data["fileUrl"] + '" target="_blank">' + sFileName + '</a> (' + data["fileSize"] + 'KB)' +
      '</div>' +
      '</div>';
      document.getElementById( 'preview' ).style.display = "";
      return false; // nếu là true thì ckfinder sẽ tự đóng lại khi 1 file thumnail được chọn

    }
    function hienthumb(){
      var valu = $('#UrlHinh').val();
      if (valu != "") {
        var bien = "<img src='"+valu+"' width='150' height='150'>";
        $('#thumbnail').html(bien);
      };
    }
</script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
<table border="1" align="center" cellpadding="4" cellspacing="0" class="khungk">
<tr> <td colspan="2" align="center">SỬA DANH MỤC Menu</td> </tr>

<tr><td width="100">Mục Cha</td>
     <td>
      <select  id="Parent" name="idCapCha">
        <option value="0">Không Có</option>
        <?php while ($row_dm = mysql_fetch_assoc($danhmuc)) { ?>
            <option <?php if ($row_dm['idMenu'] == $row_sanpham['idCapCha']){ echo "selected='selected'"; } ?> value="<?php echo $row_dm['idMenu']; ?>" style="font-weight:bold"><?php echo $row_dm['TieuDe']; ?></option>
      <?php /*
        $danhmuccon = $qt->DanhMuc(-1, $row_dm['idLoaiTin']);
        while($row_dmc = mysql_fetch_assoc($danhmuccon)){
      ?>
        <option <?php if ($row_dmc['idLoaiTin'] == $row_sanpham['idLoaiCha']){ echo "selected='selected'"; } ?> value="<?php echo $row_dmc['idLoaiTin']?>">--<?php echo $row_dmc['TieuDe']?></option>
      <?php } */?>
          <?php } ?>
        </select>
     </td>
</tr>

<tr><td width="100">Tiêu Đề</td>
     <td><input type="text" name="TieuDe" id="TieuDe" value="<?php echo $row_sanpham['TieuDe'] ?>" /></td>
</tr>

<tr><td colspan="2" align="center"><input type="submit" name="btnOK" id="btnOK" value="Sửa" />

</tr>
</table>
</form>
