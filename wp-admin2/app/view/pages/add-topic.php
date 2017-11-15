<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
<table border="1" align="center" cellpadding="4" cellspacing="0" class="khungk">
<tr> <td colspan="2" align="center">Thêm Chủ Đề Tin Tức</td> </tr>

<tr><td width="100">Tiêu Đề</td>
     <td><input type="text" name="TieuDe" id="TieuDe" /></td>
</tr>
<tr>
	<td>Mô Tả Chức</td>
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
<tr><td colspan="2" align="center"><input type="submit" name="btnOK" id="btnOK" value="Thêm" />
  <input type="reset" name="btnxoa" id="btnxoa" value="Làm lại" /></td>
</tr>
</table>
</form>