<script>
  $(document).ready(function(){
    $("#form1").submit(function(){
      if($("#Parent").val()==0){ alert('chưa nhập loại'); return false;}
    });
  });
</script>
<form id="form1" name="form1" action="index.php?nameCtr=NewsController&action=handleAddNews" method="post" enctype="multipart/form-data">
  <table border="1" align="center" cellpadding="4" cellspacing="0" class="khungk">
    <tr> <td colspan="2" align="center">THÊM TIN TỨC BỆNH MỚI</td> </tr>

    <tr>
     <td width="100">Chọn Loại</td>
     <td>

      <select  id="Parent" name="idLoai">
        <option value="0">Không Có</option>
        <?php if(isset($data['category']) != false): ?>

          <?php while ($row = mysqli_fetch_assoc($data['category'])):?>
            <option value="<?=$row['idLoai']; ?>" style="font-weight:bold"><?=$row['TieuDe']; ?></option>
            <?php 

            $data['cateChild'] = $category->getChildCategory($row['idLoai']);
            if($data['cateChild'] != false):
              while($rowChild = mysqli_fetch_assoc($data['cateChild'])):
                ?>
              <option value="<?=$rowChild['idLoai']?>">--<?= $rowChild['TieuDe']?></option>
              <?php 

              $data['cateChildOfChild'] = $category->getChildCategory($rowChild['idLoai']);
              if($data['cateChildOfChild'] != false):
                while($rowChildOfChild = mysqli_fetch_assoc($data['cateChildOfChild'])):
                  ?>
                <option value="<?=$rowChildOfChild['idLoai']?>">----<?= $rowChildOfChild['TieuDe']?></option>
              <?php endwhile; ?>
            <?php endif; ?>
          <?php endwhile; ?>
        <?php endif; ?>
      <?php endwhile; ?>
    <?php endif; ?>
  </select>

  Bài Viết Theo Chủ Đề: 

  <select id="Chudetag" name="Chudetag">
    <option value="0">Chọn Chủ Đề Tag</option>
    
    <option value=""> 

    </option>

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

<tr><td colspan="2" align="center">
  <!-- <input type="submit" name="btnPreView" id="btnPreView" value="Xem thử" /> --> 
  <input type="submit" name="btnOK" id="btnOK" value="Thêm" />
  <input type="reset" name="btnxoa" id="btnxoa" value="Làm lại" /></td>
</tr>
</table>
</form>
