<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
<table border="1" align="center" cellpadding="4" cellspacing="0" class="khungk">
<tr> <td colspan="2" align="center">THÊM PAGES</td> </tr>

<tr><td width="100">Tiêu Đề</td>
     <td><input type="text" name="TieuDe" id="TieuDe" /></td>
</tr>
<!-- <tr>
	<td width="100">Thuộc loại bài viết</td>
	<td>
		<select name="idGroup">
			<option value="1">Bài viết đơn</option>
			<option value="0">Tin tức hoạt động</option>
		</select>
	</td>
</tr> -->
<tr>
	<td>Hình ảnh</td>
	<td>
		<input name="UrlHinh" type=text class="txt" id="UrlHinh" value="<?php 
    if(isset($_POST['UrlHinh'])){
    echo $_POST['UrlHinh']; } ?>" />
		 <input onclick="BrowseServer('hinhanh:/','UrlHinh')"  type="button" name="btnChonFile" id="btnChonFile" value="Chọn File" />
	</td>
</tr>
<tr>
	<td>Tóm tắt</td>
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
	
</td>
</tr>
<tr><td width="100">Nội Dung</td>
     <td><label>
       <textarea name="NoiDung" id="NoiDung" cols="45" rows="5"></textarea>
     </label>
     <script type="text/javascript">
var editor = CKEDITOR.replace( 'NoiDung',{
  filebrowserImageBrowseUrl : 'ckfinder/ckfinder.html?Type=Images',
  filebrowserFlashBrowseUrl : 'ckfinder/ckfinder.html?Type=Flash',
  filebrowserImageUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
  filebrowserFlashUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',

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
     <td><input type="text" name="Title" id="Title" /></td>
</tr>
<tr><td width="100">Description</td>
     <td><textarea name="Des" id="Des" cols="45" rows="5"></textarea></td>
</tr>
<tr><td width="100">Keyword</td>
     <td><input type="text" name="Keyword" id="Keyword" /></td>
</tr>

<tr><td width="100">H1</td>
     <td><input type="text" name="H1" id="Keyword" value="H1 Là Title Bài Viết"  readonly /></td>
</tr>
<tr><td width="100">H2</td>
     <td><input type="text" name="H2" id="Keyword" /></td>
</tr>
<tr><td width="100">H3</td>
     <td><input type="text" name="H3" id="Keyword" /></td>
</tr>
<tr><td width="100">H4</td>
     <td><input type="text" name="H4" id="Keyword" /></td>
</tr>
<tr><td width="100">H5</td>
     <td><input type="text" name="H5" id="Keyword" /></td>
</tr>
<tr><td width="100">H6</td>
     <td><input type="text" name="H6" id="Keyword" /></td>
</tr>

<tr><td colspan="2" align="center"><input type="submit" name="btnOK" id="btnOK" value="Thêm" />
  <input type="reset" name="btnxoa" id="btnxoa" value="Làm lại" /></td>
</tr>
</table>
</form>