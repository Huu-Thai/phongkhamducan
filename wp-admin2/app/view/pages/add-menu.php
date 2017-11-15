<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
	<table border="1" align="center" cellpadding="4" cellspacing="0" class="khungk">
		<tr> <td colspan="2" align="center">THÊM DANH MỤC</td> </tr>

		<tr><td width="100">Mục Cha</td>
			<td>
				<select  id="Parent" name="idCapCha">
					<option value="0">Không Có</option>
					<?php while ($row_dm = mysql_fetch_assoc($danhmuc)) { ?>
					<option value="<?php echo $row_dm['idMenu']; ?>" style="font-weight:bold"><?php echo $row_dm['TieuDe']; ?></option>
			<?php /*
				$danhmuccon = $qt->DanhMuc(-1, $row_dm['idLoaiTin']);
				while($row_dmc = mysql_fetch_assoc($danhmuccon)){
			?>
				<option value="<?php echo $row_dmc['idLoaiTin']?>">--<?php echo $row_dmc['TieuDe']?></option>
				<?php } */?>
				<?php } ?>
			</select>
		</td>
	</tr>
	<tr><td width="100">Tiêu Đề</td>
		<td><input type="text" name="TieuDe" id="TieuDe" /></td></tr>
		<tr><td colspan="2" align="center"><input type="submit" name="btnOK" id="btnOK" value="Thêm" />
			<input type="reset" name="btnxoa" id="btnxoa" value="Làm lại" /></td>
		</tr>
	</table>
</form>