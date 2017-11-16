<form action="index.php?nameCtr=UserController&action=handleChangeTask" method="post" enctype="multipart/form-data" name="form1" id="form1">
<table border="1" align="center" cellpadding="4" cellspacing="0">
<tr> <td colspan="2" align="center">SỬA CHỨC VỤ</td> </tr>


<tr><td width="100">Nhóm</td>
     <td>
        <select  id="idGroup" name="idGroup">
          <option <?php echo (1 == $row_sanpham['idGroup']) ? 'selected' : '';?> value="1">Nhân Viên</option>
          <option <?php echo (2 == $row_sanpham['idGroup']) ? 'selected' : '';?> value="2">Quản Trị</option>
          <option <?php echo (3 == $row_sanpham['idGroup']) ? 'selected' : '';?> value="3">Admin</option>
        </select>
     </td>
</tr>
<input type="hidden" name="idUser" value="<?=$data['idUser']?>">
<tr><td colspan="2" align="center"><input type="submit" name="btnOK" id="btnOK" value="Sửa" />

</tr>
</table>
</form>
