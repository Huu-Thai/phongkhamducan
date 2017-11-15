<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
<table border="1" align="center" cellpadding="4" cellspacing="0" class="khungk">
<tr> <td colspan="2" align="center">THÊM TIN TỨC BỆNH MỚI</td> </tr>

<tr>
     <td width="100">Chọn Loại</td>
     <td>

      <?php //$danhmuc = $qt->DanhMuc(-1, 0); ?>
      <select  id="Parent" name="idLoaiTin">
        <option value="0">Không Có</option>
        <?php while ($row_dm = mysql_fetch_assoc($danhmuc)) { ?>
            <option <?php if ($row_dm['idLoaiTin'] == $row_sanpham['idLoaiTin']){ echo "selected='selected'"; } ?> value="<?php echo $row_dm['idLoaiTin']; ?>" style="font-weight:bold"><?php echo $row_dm['TieuDe']; ?></option>
      <?php 
        $danhmuccon = $qt->DanhMuc(-1, $row_dm['idLoaiTin']);
        while($row_dmc = mysql_fetch_assoc($danhmuccon)){
      ?>
        <option <?php if ($row_dmc['idLoaiTin'] == $row_sanpham['idLoaiTin']){ echo "selected='selected'"; } ?> value="<?php echo $row_dmc['idLoaiTin']?>">--<?php echo $row_dmc['TieuDe']?></option>
      <?php }?>
          <?php } ?>
        </select>


        Bài Viết Theo Chủ Đề: 
        <?php $chude = $qt->Chudetag(); ?>
        <select id="Chudetag" name="Chudetag">
                <option value="0">Chọn Chủ Đề Tag</option>
                <?php while ($chudetag = mysql_fetch_assoc($chude)) { ?>
            <option <?php if ($row_sanpham['idChuDe']==$chudetag['idChuDe']) echo "selected='selected'"; ?> value="<?php echo $chudetag['idChuDe'];?>"> 
              <?php echo $chudetag['TieuDe'];?> 
            </option>
          <?php } ?>
        </select> 

     </td>
</tr>

<tr><td width="100">Tiêu Đề</td>
     <td><input name="TieuDe" type="text" id="TieuDe" value="<?php if(isset($_POST['TieuDe'])) { echo $_POST['TieuDe']; } ?>" /></td>
</tr>
<tr><td>Hình Ảnh</td>
     <td>
     <input name="UrlHinh" type=text class="txt" id="UrlHinh" value="<?php if(isset($_POST['UrlHinh'])) { echo $_POST['UrlHinh'];} ?>" />
      <label>

        <input onclick="BrowseServer('hinhanh:/','UrlHinh')"  type="button" name="btnChonFile" id="btnChonFile" value="Chọn File" />

      </label>
      <div style="clear: both"></div>
      <div id="thumbnail">

      </div>
    </td>
</tr>
<tr><td width="100">Tóm Tắt</td>
     <td><label>
       <textarea name="TomTat" id="TomTat" cols="45" rows="5"><?php if(isset($_POST['TomTat'])) { echo $_POST['TomTat'];} ?></textarea>
     </label>
     <script type="text/javascript">
var editor = CKEDITOR.replace( 'TomTat',{
  filebrowserImageBrowseUrl : 'ckfinder/ckfinder.html?Type=Images',
  filebrowserFlashBrowseUrl : 'ckfinder/ckfinder.html?Type=Flash',
  filebrowserImageUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
  filebrowserFlashUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
	height: '150px',
  toolbar:[
  { name: 'basicstyles', items : [ 'Bold','Italic','Underline' , 'Image', 'Format'] },
  ]
});
</script>
     </td>
</tr>
<tr><td width="100">Nội Dung</td>
     <td><label>
       <textarea name="NoiDung" id="NoiDung" cols="45" rows="15"><?php if(isset($_POST['NoiDung'])) { echo $_POST['NoiDung'];}?></textarea>
     </label>
     <script type="text/javascript">
var editor = CKEDITOR.replace( 'NoiDung',{
  filebrowserImageBrowseUrl : 'ckfinder/ckfinder.html?Type=Images',
  filebrowserFlashBrowseUrl : 'ckfinder/ckfinder.html?Type=Flash',
  filebrowserImageUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
  filebrowserFlashUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
	height: '500px',
  toolbar:[
  { name: 'document', items : [ 'Source','-','Templates' ] },
  { name: 'clipboard', items : [ 'Cut','Copy','Paste','PasteText','PasteFromWord','-','Undo','Redo' ] },
  { name: 'editing', items : [ 'Find','Replace','-','SelectAll','-','SpellChecker', 'Scayt' ] },
  { name: 'forms', items : [ 'Form', 'Checkbox', 'Radio', 'TextField', 'Textarea', 'Select', 'Button', 'ImageButton',
        'HiddenField' ] },
  '/',
  { name: 'basicstyles', items : [ 'Bold','Italic','Underline','Strike','Subscript','Superscript','-','RemoveFormat' ] },
  { name: 'paragraph', items : [ 'NumberedList','BulletedList','-','Outdent','Indent','-','Blockquote','CreateDiv',
  '-','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock','-','BidiLtr','BidiRtl' ] },
  { name: 'links', items : [ 'Link','Unlink','Anchor' ] },
  { name: 'insert', items : [ 'Image','MediaEmbed','Flash','Table','HorizontalRule','Smiley','SpecialChar','PageBreak','Iframe' ] },
  '/',
  { name: 'styles', items : [ 'Styles','Format','Font','FontSize' ] },
  { name: 'colors', items : [ 'TextColor','BGColor' ] },
  { name: 'tools', items : [ 'Maximize', 'ShowBlocks','-','About' ] }
  ]
});
</script>
     </td>
</tr>

<tr><td width="100">Title</td>
    <td><input name="Title" type="text" id="Title" value="<?php if(isset($_POST['Title'])) { echo $_POST['Title'];} ?>" /></td>
</tr>
<tr><td width="100">Description</td>
    <td><textarea name="Des" id="Des" ><?php if(isset($_POST['Des'])) { echo $_POST['Des'];} ?></textarea></td>
</tr>
<tr><td width="100">Keyword</td>
    <td><input name="Keyword" type="text" id="Keyword" value="<?php if(isset($_POST['Keyword'])) { echo $_POST['Keyword'];} ?>" /></td>
</tr>

<tr><td width="100">Thẻ H1</td>
    <td><input name="H1" type="text" id="Keyword" value="Thẻ H1 là Tiêu Đề" readonly/></td>
</tr>
<tr><td width="100">Thẻ H2</td>
    <td><input name="H2" type="text" id="Keyword" value="" /></td>
</tr>
<tr><td width="100">Thẻ H3</td>
    <td><input name="H3" type="text" id="Keyword" value="" /></td>
</tr>
<tr><td width="100">Thẻ H4</td>
    <td><input name="H4" type="text" id="Keyword" value="" /></td>
</tr>
<tr><td width="100">Thẻ H5</td>
    <td><input name="H5" type="text" id="Keyword" value="" /></td>
</tr>
<tr><td width="100">Thẻ H6</td>
    <td><input name="H6" type="text" id="Keyword" value="" /></td>
</tr>

<tr><td colspan="2" align="center">
  <!-- <input type="submit" name="btnPreView" id="btnPreView" value="Xem thử" /> --> 
   <input type="submit" name="btnOK" id="btnOK" value="Thêm" />
  <input type="reset" name="btnxoa" id="btnxoa" value="Làm lại" /></td>
</tr>
</table>
</form>