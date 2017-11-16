
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<!-- Mirrored from jannek.fi/themeforest/proadmin/login.html by HTTrack Website Copier/3.x [XR&CO'2008], Wed, 26 Nov 2008 20:37:25 GMT -->
<head>
<title>ProAdmin - Login</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<!--// FOLLOWING SCRIPT IS FOR PNG FIX IE5.5/IE6-->
    

<!--[if lt IE 7]>
<script defer type="text/javascript" src="js/pngfix.js"></script> 
<![endif]--> 


<!--//  Styles starts -->


<link href="css/login.css" rel="stylesheet" type="text/css" />


</head>
<body>


<div id="logo">
	<img src="images/logo.png" alt="logopng" width="116" height="34" /> <!--//  Logo on upper corner -->
</div>


<div class="box">
	<div class="welcome" id="welcometitle">Chào bạn, mời bạn đăng nhập : <!--//  Welcome message -->
</div>
  

  <div id="fields">
  <form action="index.php?nameCtr=UserController&action=login" method="post" >
	  <div align="center" id="error" style="width:400px; color:#F00; ">
    <?php 
    if(isset($_SESSION['error']))
    {
    	echo $_SESSION['error']; unset( $_SESSION['error'] );
    }
    ?>
    </div>   
    <div style="clear:both"></div>
    <table width="333">
      <tr>
        <td width="100" height="35"><span class="login">Tên đăng nhập: </span></td>
        <td width="244" height="35"><label>
          <input name="username" type="text" class="fields" id="username" size="30" />  <!--//  Username field  -->
        </label></td>
      </tr>
      
      
      <tr>
        <td height="35"><span class="login">Mật khẩu: </span></td>
        <td height="35"><input name="password" type="password" class="fields" id="password" size="30" />
        </td> <!--//  Password field -->
      </tr>
      
      
      <tr>
        <td height="65">&nbsp;</td>
        <td height="65" valign="middle"><label>
          <input name="btnLog" type="submit" class="button" id="btnLog" value="Đăng nhập" />
          
          <!--//  login button -->
        </label></td>
      </tr>
    </table>
    </form>
  </div>
  
  
  <div class="login" id="lostpassword"><a href="#">Lost Password?</a></div> <!--//  lost password part -->
  
  



</body>

<!-- Mirrored from jannek.fi/themeforest/proadmin/login.html by HTTrack Website Copier/3.x [XR&CO'2008], Wed, 26 Nov 2008 20:37:26 GMT -->
</html>
