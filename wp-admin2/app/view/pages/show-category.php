<select onchange="window.location='main.php?p=dm_xem&idCha='+this.value">
  <option value="-1">Chọn chuyên khoa</option>

  <?php
  echo $sql_dmc = "select idLoai,TieuDe from loai where parent=0";
  $danhmucha = mysql_query($sql_dmc);

  while($row_dmc = mysql_fetch_array($danhmucha)){

    ?>

    <option <?php if($row_dmc["idLoai"]==$idCha) echo "selected"; ?> value="<?php echo $row_dmc["idLoai"] ?>"><?php echo $row_dmc["TieuDe"] ?></option>

    <?php } ?>

  </select>

  <form action="" method="get" name="form2" id="form2">
   <input type="hidden" name="p" id="p" value="dm_xem" />
   <input type="text" id="TieuDe" name="TieuDe" value="Nhập tiêu đề cần tìm" onclick="nhapchuot()" />
   <input type="submit" value="Tìm" id="btnLocMa" name="btnLocMa" />
 </form>

 <div style="clear: both; height: 10px"></div>
 <table id="dsloaitin" border="1" cellpadding="4" cellspacing="0" width="680" align="center" />
 <tr>
  <th width="20">Mã</th>
  <th width="180">Tiêu đề</th>
  <th width="180">Cha</th>
  <th width="50">Menu</th>
  <th width="50">Home</th>
  <th width="50">Ẩn/Hiện</th>
  <th width="50">Thứ Tự</th>
  <th width="100">Thao Tác</th>
</tr>
<?php if($data['category'] != false): ?>
  <?php while ($row = mysqli_fetch_assoc($data['category']) ): ?>
    <?php ob_start(); ?>

    <tr>  	
      <td>{id}</td>
      <td>{TieuDe}</td>
      <td>{Parent}</td>
      <td class="anhien"><a class="smallButton checkmenu" id="me_{id}"  AnHien="bang=loai&ma=idLoai&id={id}"  href="#"><img  src="images/ah_{Menu}.png"></a></td>
      <td class="anhien"><a class="smallButton checkhome" id="ho_{id}"  AnHien="bang=loai&ma=idLoai&id={id}"  href="#"><img  src="images/ah_{Home}.png"></a></td>
      <td class="anhien"><a class="smallButton anhien" id="ma_{id}"  AnHien="bang=loai&ma=idLoai&id={id}"  href="#"><img  src="images/ah_{AnHien}.png"></a></td>
      <td>
       <input type="text" name="ThuTu" bien="{id}" id="ThuTu_{id}" class="ThuTu" value="{ThuTu}">
     </td>

     <td width="100" align="center">
      <a class="smallButton" href="main.php?p=dm_chinh&id={id}"><img  src="images/pencil.png" title="Sửa Danh Mục"></a>
      <a class="smallButton" href="dm_xoa.php?id={id}" onclick="return confirm('Bạn có muốn xóa !!! ');"><img src="images/close.png" title="Xóa Danh Mục"></a>
    </td>
  </tr>

  <?php

  $str = ob_get_clean();
  $str = str_replace("{id}", $row['idLoai'], $str);
  $str = str_replace("{TieuDe}", $row['TieuDe'], $str);
  $str = str_replace("{AnHien}", $row['AnHien'], $str);
  $str = str_replace("{ThuTu}", $row['ThuTu'], $str);
  $str = str_replace("{Menu}", $row['Menu'], $str);
  $str = str_replace("{Home}", $row['Home'], $str);
  $Parent = $row['Parent'];

  if ($Parent > 0)
   $TieuDe = $category->getTieuDe($Parent);
 else
   $TieuDe = "Không";
 $str = str_replace("{Parent}", $TieuDe, $str);

 echo $str;
 ?>

<?php endwhile; ?>
<?php endif; ?>

<?php if ($data['totalRow'] > $data['pageSize']): ?>

<tr>
  <td colspan="8" align="left">
   <p id=thanhphantrang>
     <?=$category->pageList($data['totalRow'], $data['pageNum'], $data['pageSize'], 3);?>
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

input[type="text"].ThuTu {
  width: 50px;
  text-align: center;
}

</style>
