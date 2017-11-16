<form action="" method="get">
	<input type="hidden" name="p" id="p" value="tk_xem" />
	<input type="text" id="TieuDe" name="TieuDe" value="Nhập tiêu đề cần tìm" onclick="nhapchuot()" />
	<input type="submit" value="Tìm" id="btnLocMa" name="btnLocMa" />
</form>
<div style="clear: both; height: 10px"></div>
<table id="dsloaitin" border="1" cellpadding="4" cellspacing="0" width="450" align="center" />

<tr>
	<th width="20">STT</th>
	<th width="200">User</th>
	<th width="80">Chức Vụ</th>
	<th width="150">Thao Tác</th>
</tr>
<?php if(isset($data['users'])): $i = 1;?>
	<?php while ($row = mysqli_fetch_assoc($data['users'])): ?>
		<tr>  	
			<td><?=$i ?></td>
			<td><?=$row['User'] ?></td>
			<td><?=$row['task'] ?></td>
			<td width="100" align="center">
				<a class="smallButton" href="index.php?nameCtr=UserController&action=showChangePass&idUser=<?=$row['idUser']?>"><img  src="images/pencil.png" title="Đổi Mật Khẩu"></a>
				<a class="smallButton" href="index.php?nameCtr=UserController&action=showChangeTask&idUser=<?=$row['idUser']?>"><img  src="images/pencil.png" title="Thay Đổi Quyền"></a>
				<a class="smallButton" href="index.php?nameCtr=UserController&action=deleteUser&idUser=<?=$row['idUser']?>" onclick="return confirm('Bạn có muốn xóa !!! ');"><img src="images/close.png" title="Xóa Tài Khoản"></a>
			</td>
		</tr>
		<?php $i++; ?>
	<?php endwhile; ?>
<?php endif; ?>
</table>