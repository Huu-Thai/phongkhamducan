<form action="index.php?nameCtr=UserController&action=handleChangePass" method="post" enctype="multipart/form-data">
	<table border="1" align="center" cellpadding="4" cellspacing="0">
		<tr> <td colspan="2" align="center">ĐỔI MẬT KHẨU</td> </tr>
		<tr><td width="100">Mật Khẩu</td>
			<td><input type="password" name="Pass" id="Pass"/></td>
		</tr>
		<input type="hidden" name="idUser" value="<?=$data['idUser']?>">
		<tr><td colspan="2" align="center"><input type="submit" name="btnOK" id="btnOK" value="Sửa" />

		</tr>
	</table>
</form>