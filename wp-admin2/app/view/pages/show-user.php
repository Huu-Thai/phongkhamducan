<script type="text/javascript">
	function nhapchuot(){
		var dulieu = $("#TieuDe").val();
		if (dulieu == "Nhập tiêu đề cần tìm")
			$("#TieuDe").val("");
	}
</script>
<form action="" method="get">
	<input type="hidden" name="nameCtr" id="" value="UserController" />
	<input type="hidden" name="action" id="" value="showUser" />
	<input type="text" id="TieuDe" name="TieuDe" value="Nhập tiêu đề cần tìm" onclick="nhapchuot()" />
	<input type="submit" value="Tìm" id="btnLocMa" name="btnLocMa" />
</form>
<div style="clear: both; height: 10px"></div>
<table id="dsloaitin" border="1" cellpadding="4" cellspacing="0" width="450" align="center" />

<tr>
	<th width="20">ID</th>
	<th width="200">User</th>
	<th width="150">Chức Vụ</th>
	<th width="200">Thao Tác</th>
</tr>
<?php if($data['users'] != false): $i = 1;?>
	<?php while ($row = mysqli_fetch_assoc($data['users'])): ?>
		<tr>  	
			<td><?=$row['idUser']; ?></td>
			<td><?=$row['User'] ?></td>
			<td><?=$row['task'] ?></td>
			<td width="100" align="center">
				<a class="smallButton" href="index.php?nameCtr=UserController&action=showChangePass&idUser=<?=$row['idUser']?>"><img  src="images/pencil.png" title="Đổi Mật Khẩu"></a>
				<a class="smallButton" href="index.php?nameCtr=UserController&action=showChangeTask&idUser=<?=$row['idUser']?>"><img  src="images/pencil.png" title="Thay Đổi Quyền"></a>
				<a class="smallButton" href="index.php?nameCtr=UserController&action=deleteUser&idUser=<?=$row['idUser']?>" onclick="return confirm('Bạn có muốn xóa !!! ');"><img src="images/close.png" title="Xóa Tài Khoản"></a>
			</td>
		</tr>

		<?php 	

		$str = ob_get_clean(); 
		$str = str_replace("{ID}", $row['idUser'], $str);
		$str = str_replace("{User}", $row['User'], $str);
		$str = str_replace("{CV}", $row['task'] , $str);

		echo $str;

		?>

		<?php $i++; ?>
	<?php endwhile; ?>
<?php endif; ?>
<?php if ($data['totalRow'] > $data['pageSize']): ?>
	<tr>
		<td colspan="8" align="left"> 
			<p id=thanhphantrang>

				<?=$user->pageList($data['totalRow'], $data['pageNum'], $data['pageSize']);?>

			</p>
		</td>
	</tr>
<?php endif; ?>
</table>

<style>

#thanhphantrang a {text-decoration:none; padding-left:5px; padding-right:5px; margin-left:5px; margin-right:5px;}

#thanhphantrang span {

	padding-left:5px;

	padding-right:5px;

	margin-left:5px;

	margin-right:5px;

	color:#F00;

	font-size: 24px;

	font-weight: bolder;

}

.smallButton{

	border: 1px solid #cdcdcd;

	padding: 5px 5px;

	display: inline-block;

	background: #f6f6f6;

	margin:0 10px 0 0;

}

</style>