<?php
  require_once "checklogin.php";
  require_once "class_quantri.php";
  $qt =  new quantri;
  $id=$_GET['id']; settype($id,"int");
  $sanpham = $qt->CauHinhChungChiTiet($id);
  $row_sanpham = mysql_fetch_assoc($sanpham);
  if (isset($_POST['btnOK'])==true){
    $qt ->SuaCauHinhChung($id);
    header("location:main.php?p=cauhinhchung_xem");
  }
  $danhmuc = $qt->DanhMuc(-1, 0);
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
<tr> <td colspan="2" align="center">UPDATE CẤU HÌNH CHUNG</td> </tr>

<tr><td width="100">URL</td>
     <td><input type="text" name="URL" id="TieuDe" value="<?php echo $row_sanpham['URL'] ?>" /></td>
</tr>
<tr><td width="100">Facebook</td>
     <td><input type="text" name="Facebook" value="<?php echo $row_sanpham['Facebook'] ?>" /></td>
</tr>
<tr><td width="100">Twitter</td>
     <td><input type="text" name="Twitter" value="<?php echo $row_sanpham['Twitter'] ?>" /></td>
</tr>

<tr><td width="100">Google</td>
     <td><input type="text" name="GooglePlus" value="<?php echo $row_sanpham['GooglePlus'] ?>" /></td>
</tr>

<tr><td width="100">Địa Chỉ</td>
     <td><input type="text" name="DiaChi" value="<?php echo $row_sanpham['DiaChi'] ?>" /></td>
</tr>

<tr><td width="100">Google Map</td>
     <td><input type="text" name="Map" value="<?php echo $row_sanpham['Map'] ?>" /></td>
</tr>

<tr><td width="100">Điện Thoại</td>
     <td><input type="text" name="DienThoai" value="<?php echo $row_sanpham['DienThoai'] ?>" /></td>
</tr>

<tr><td width="100">Hotline</td>
     <td><input type="text" name="Hotline" value="<?php echo $row_sanpham['Hotline'] ?>" /></td>
</tr>


<tr><td width="100">Title</td>
     <td><input type="text" name="TitleTrangChu" id="Title" value="<?php echo $row_sanpham['TitleTrangChu'] ?>"/></td>
</tr>
<tr><td width="100">Description</td>
     <td><textarea name="DesTrangChu" id="Des" cols="45" rows="5"><?php echo $row_sanpham['DesTrangChu'] ?></textarea></td>
</tr>
<tr><td width="100">Keyword</td>
     <td><input type="text" name="KeywordTrangChu" id="Keyword" value="<?php echo $row_sanpham['KeywordTrangChu'] ?>" /></td>
</tr>
<tr><td width="100">Thẻ H1</td>
     <td><input type="text" name="H1" id="Keyword" value="<?php echo $row_sanpham['H1'] ?>" /></td>
</tr>
<tr><td width="100">Thẻ H2</td>
     <td><input type="text" name="H2" id="Keyword" value="<?php echo $row_sanpham['H2'] ?>" /></td>
</tr>
<tr><td width="100">Thẻ H3</td>
     <td><input type="text" name="H3" id="Keyword" value="<?php echo $row_sanpham['H3'] ?>" /></td>
</tr>
<tr><td width="100">Thẻ H4</td>
     <td><input type="text" name="H4" id="Keyword" value="<?php echo $row_sanpham['H4'] ?>" /></td>
</tr>
<tr><td width="100">Thẻ H5</td>
     <td><input type="text" name="H5" id="Keyword" value="<?php echo $row_sanpham['H5'] ?>" /></td>
</tr>
<tr><td width="100">Thẻ H6</td>
     <td><input type="text" name="H6" id="Keyword" value="<?php echo $row_sanpham['H6'] ?>" /></td>
</tr>
<tr><td colspan="2" align="center"><input type="submit" name="btnOK" id="btnOK" value="Sửa" />

</tr>
</table>
</form>
