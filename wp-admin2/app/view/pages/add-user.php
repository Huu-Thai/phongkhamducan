<form action="index.php?nameCtr=UserController&action=handleAddUser" method="post" enctype="multipart/form-data">
<table border="1" align="center" cellpadding="4" cellspacing="0">
<tr> <td colspan="2" align="center">THÊM TÀI KHOẢN</td> </tr>

<tr><td width="100">Nhóm</td>
     <td>
        <select  id="idGroup" name="idGroup">
          <option value="1">Nhân Viên</option>
          <option value="2">Quản Trị</option>
          <option value="3">Admin</option>
        </select>
     </td>
</tr>
<tr><td width="100">Tài Khoản</td>
     <td><input type="text" name="User" id="User" /></td>
</tr>
<tr><td width="100">Mật Khẩu</td>
     <td><input type="password" name="Pass" id="Pass" /></td>
</tr>
<tr><td colspan="2" align="center"><input type="submit" name="btnOK" id="btnOK" value="Thêm" />
  <input type="reset" name="btnxoa" id="btnxoa" value="Làm lại" /></td>
</tr>
</table>
</form>