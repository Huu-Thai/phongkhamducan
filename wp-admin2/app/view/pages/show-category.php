<select class="choose_cate" onchange="window.location='index.php?nameCtr=CategoryController&action=showCategory&idCha='+this.value">
  <option value="-1" <?php if($data['idCha'] == -1) echo "selected";?>>Chọn chuyên khoa</option>

  <?php if($data['cateParent'] != false): ?>
    <?php while($row = mysqli_fetch_assoc($data['cateParent'])): ?>

      <option <?php if($row["idLoai"] == $data['idCha']) echo "selected"; ?> value="<?=$row[idLoai] ?>"><?=$row['TieuDe'] ?></option>
    <?php endwhile; ?>
  <?php endif; ?>
</select>

<script>
  $(document).ready(function() {

    $(".anhien").click(function() {
      var bien = $(this).attr('AnHien');
      var ma = $(this).attr('id');
      $.get('index.php?nameCtr=CategoryController&action=changeAnHien', bien, function(data) {
        var chuoi = "<img  src=images/ah_"+data+".png>";
        $("#"+ma).html(chuoi);
      });
      return false;
    });

    $(".checkmenu").click(function() {
      var bien = $(this).attr('AnHien');
      var ma = $(this).attr('id');
      $.get('index.php?nameCtr=CategoryController&action=changeAnHien', bien, function(data) {
        var chuoi = "<img  src=images/ah_"+data+".png>";
        $("#"+ma).html(chuoi);
      });
      return false;
    });

    $(".checkhome").click(function() {
      var bien = $(this).attr('AnHien');
      var ma = $(this).attr('id');
      $.get('index.php?nameCtr=CategoryController&action=changeAnHien', bien, function(data) {
        var chuoi = "<img  src=images/ah_"+data+".png>";
        $("#"+ma).html(chuoi);
      });
      return false;
    });

    $(".ThuTu").ForceNumericOnly();

    $(".ThuTu").on("keypress", this, function(e){
      var ma = $(this).attr('bien');
      suathutu($(e.target),ma);
    });
  });
  function nhapchuot(){
    var dulieu = $("#TieuDe").val();
    if (dulieu == "Nhập tiêu đề cần tìm")
      $("#TieuDe").val("");
  }
  jQuery.fn.ForceNumericOnly =
  function()
  {
    return this.each(function()
    {
      $(this).keydown(function(e)
      {
        var key = e.charCode || e.keyCode || 0;
              // allow backspace, tab, delete, arrows, numbers and keypad numbers ONLY
              // home, end, period, and numpad decimal
              return (
                key == 8 ||
                key == 9 ||
                key == 46 ||
                key == 110 ||
                key == 190 ||
                (key >= 35 && key <= 40) ||
                (key >= 48 && key <= 57) ||
                (key >= 96 && key <= 105));
            });
    });
  };
  var typingTimeout;
  function suathutu(e,ma){
    if (typingTimeout != undefined)
      clearTimeout(typingTimeout);

    typingTimeout = setTimeout( function(){
      var ttu = $("#ThuTu_"+ma).val();
      var bien = "id="+ma+"&ttu="+ttu+"&table=loai";

      $.get('index.php?nameCtr=CategoryController&action=editIndex', bien, function(data) {});
    }
    , 500);
  }
</script>
<form action="" method="get" name="form2" id="form2">
 <input type="hidden" name="nameCtr" id="" value="categoryController" />
 <input type="hidden" name="action" id="" value="showCategory" />
 <input type="text" id="TieuDe" name="TieuDe" placeholder="Nhập tiêu đề cần tìm" onclick="nhapchuot()" />
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
      <td class="anhien"><a class="smallButton checkmenu" id="me_{id}"  AnHien="table=loai&ma=idLoai&id={id}&col=Menu"  href="javascript:void(0)"><img  src="images/ah_{Menu}.png"></a></td>
      <td class="anhien"><a class="smallButton checkhome" id="ho_{id}"  AnHien="table=loai&ma=idLoai&id={id}&col=Home"  href="javascript:void(0)"><img  src="images/ah_{Home}.png"></a></td>
      <td class="anhien"><a class="smallButton anhien" id="ma_{id}"  AnHien="table=loai&ma=idLoai&id={id}&col=AnHien"  href="javascript:void(0)"><img  src="images/ah_{AnHien}.png"></a></td>
      <td>
       <input type="text" name="ThuTu" bien="{id}" id="ThuTu_{id}" class="ThuTu" value="{ThuTu}">
     </td>

     <td width="100" align="center">
      <a class="smallButton" href="index.php?nameCtr=CategoryController&action=updateCategory&id={id}"><img  src="images/pencil.png" title="Sửa Danh Mục"></a>
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
  
  .choose_cate {
    margin-right: 10px;
  }
  .choose_cate, #form2 #TieuDe{
    width: 30%;
  }
  .choose_cate, #form2 input{
    padding: 3px 10px;
    float: left;
  }
  #btnLocMa {
    margin-left: 10px;
    background: #fff;
    border: 1px solid #DDD;
    box-shadow: 0 0 0 2px #f4f4f4;
  }

</style>
