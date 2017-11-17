<form action="index.php?nameCtr=CategoryController&action=handleAddCate" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <table border="1" align="center" cellpadding="4" cellspacing="0" class="khungk">
    <tr> <td colspan="2" align="center">THÊM DANH MỤC</td> </tr>

    <tr><td width="100">Mục Cha</td>
     <td>
      <select  id="Parent" name="Parent">
        <option value="0">Không Có</option>
        <?php if(isset($data['category']) != false): ?>
          
          <?php while ($row = mysqli_fetch_assoc($data['category'])):?>
            <option value="<?=$row['idLoai']; ?>" style="font-weight:bold"><?=$row['TieuDe']; ?></option>
            <?php 

              $data['cateChild'] = $category->getChildCategory($row['idLoai']);
              while($rowChild = mysqli_fetch_assoc($data['cateChild'])):
            ?>
            <option value="<?=$rowChild['idLoai']?>">--<?= $rowChild['TieuDe']?></option>
          <?php endwhile; ?>
        <?php endwhile; ?>
      <?php endif; ?>
    </select>
  </td>
</tr>
<tr><td width="100">Tiêu Đề</td>
 <td><input type="text" name="TieuDe" id="TieuDe" /></td>
</tr>
<tr><td>Hình Ảnh</td>
 <td>
   <input type=text name="UrlHinh" id="UrlHinh" class="txt" />
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
   <textarea name="TomTat" id="TomTat" cols="45" rows="5"></textarea>
 </label>
 <script type="text/javascript">
  var editor = CKEDITOR.replace( 'TomTat',{
    filebrowserImageBrowseUrl : 'ckfinder/ckfinder.html?Type=Images',
    filebrowserFlashBrowseUrl : 'ckfinder/ckfinder.html?Type=Flash',
    filebrowserImageUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
    filebrowserFlashUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',

    toolbar:[
    { name: 'basicstyles', items : [ 'Bold','Italic','Underline' , 'Image', 'Format'] },
    ]
  });
</script>
</td>
</tr>
<tr><td width="100">Title</td>
 <td><input type="text" name="Title" id="Title" /></td>
</tr>
<tr><td width="100">Description</td>
 <td><textarea name="Des" id="Des" cols="45" rows="5"></textarea></td>
</tr>
<tr><td width="100">Keyword</td>
 <td><input type="text" name="Keyword" id="Keyword" /></td>
</tr>

<tr><td colspan="2" align="center"><input type="submit" name="btnOK" id="btnOK" value="Thêm" />
  <input type="reset" name="btnxoa" id="btnxoa" value="Làm lại" /></td>
</tr>
</table>
</form>