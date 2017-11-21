
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<form action="index.php?nameCtr=PhoneController&action=handleEditPhone" method="post" enctype="multipart/form-data" name="form1" id="form1">
	<table border="1" align="center" cellpadding="4" cellspacing="0">
		<tr> <td colspan="2" align="center">GHI CHÚ</td> </tr>

		<tr>
			<td width="100">Ghi Chú</td>
			<td><input type="text" name="Ghichu" id="Ghichu" value="" /></td>
			<input type="hidden" name="id_sdt" value="<?=$_GET['id']?>">
		</tr>
		<tr><td colspan="2" align="center"><input type="submit" name="btnOK" id="btnOK" value="Ghi" /> 
		</tr>
	</table>
</form>