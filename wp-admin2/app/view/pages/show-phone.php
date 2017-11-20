<script>
  $(document).ready(function(){
    setTimeout(function(){
      window.location.reload();
    }, 30000);
  });
</script>
<form action="" method="get" name="form2" id="form2">
  <input type="hidden" name="nameCtr" id="" value="PhoneController" />
  <input type="hidden" name="action" id="" value="showPhone" />
  Số Điện Thoại <input type="text" id="sdt" name="sdt" value="" style="width:300px" />
  IP <input type="text" id="IP" name="IP" value="" style="width:300px" />
  <input type="submit" value="Tìm" id="btnLocMa" name="btnLocMa" />
</form>

<div style="clear: both; height: 10px"></div>
<p>
  <a href="index.php?nameCtr=PhoneController&action=showPhone"><input type="button" style="width:200px" value="Cập Nhật" /></a>

  <a href="index.php?nameCtr=PhoneController&action=showPhone&khongcapnhat=1"><input type="button" style="width:200px" value="Dừng Cập Nhật" /></a>

</p>
<br/>
<table id="dsloaitin" border="1" cellpadding="4" cellspacing="0" width="100%" align="center" />

<tr>

  <th width="50">Mã</th>
  <th >Ngày Giờ DK</th>
  <th width="150">Điện Thoại</th>
  <th width="350">Link web người dùng xem</th>
  <th width="100">IP người dùng</th>
  <th width="200">Ghi chú</th>
  <th>Thao tác</th>
</tr>

<?php if($data['phone'] != false):  ?>
  <?php while ($row = mysqli_fetch_assoc($data['phone']) ): ?>
    <?php ob_start(); ?>

    <tr class="mau{ghichu}">    
      <td class="anhien">{id}</td>
      <td>{NgayGioDK}</td> 
      <td>{sdt}</td>
      <td style="overflow:scroll;">{linkweb}</td>
      <td>{IP}</td>        
      <td>{ghichu}</td>
      <td width="100" align="center"
      <a class="smallButton" href="main.php?p=dk_chinh&id={id}"><img src="images/pencil.png" title="Ghi chú"></a>            
    </td>
  </tr>

  <?php

  $str = ob_get_clean();
  $str = str_replace("{id}",$row['id_sdt'],$str);
  $str_sdt = $row['sdt'];
  $mangdienthoai_link = explode("---",$str_sdt);
  $str = str_replace("{sdt}",$mangdienthoai_link[0],$str);
  $str = str_replace("{linkweb}",$mangdienthoai_link[1],$str);
  $str = str_replace("{NgayGioDK}",date("H:i:s --- d/m/Y",strtotime($row['NgayGioDK'])+7*3600),$str);
  $str = str_replace("{IP}",$row['IP'],$str);
  $str = str_replace("{ghichu}",$row['Ghichu'],$str);
  $str = str_replace("{AnHien}",$row['AnHien'],$str);

  echo $str;

  ?>

<?php endwhile; ?>
<?php endif; ?>

<?php if ($data['totalRow'] > $data['pageSize']): ?>

  <tr>

    <td colspan="8" align="left">

     <p id=thanhphantrang>

      <?=$phone->pageList($data['totalRow'], $data['pageNum'], $data['pageSize']);?>

    </p>

  </td>

</tr>

<?php endif; ?>

</table>

<?php if($data['totalRow'] > 0):	?>

  <script type="text/javascript">

   window.onload = playSound;

   function playSound(){   

    document.getElementById("sound").innerHTML='<audio autoplay="autoplay"><source src="bing.mp3" type="audio/mpeg" /><embed hidden="true" autostart="true" loop="false" src="bing.mp3" /></audio>';

    setTimeout("refreshPage();", 20000);

  }

</script>

<div id="sound"></div>

<?php else: ?>

	<?php if($_GET['khongcapnhat']==""):  ?>

    <script type="text/javascript">    

      window.onload = Refresh;

      function Refresh() {

        setTimeout("refreshPage();", 10000);

      }   

      function refreshPage() {
        window.location = location.href;
      }
    </script>
  <?php  endif; ?>

<?php endif; ?>

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

  table { table-layout:fixed; }

  table tr { height:1em;  }

</style>