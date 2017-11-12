<div class="comment edit_comment">
	<h1>0 comment</h1>
	<?php if (!isset($_SESSION['user'])): ?>
		<a href="javascript:void(0)" class="show_login">Đăng nhập comment</a>
	<?php else: ?>
		<a href="javascript:void(0)" class="user"><?=$_SESSION['user']['name'] ?></a>
	<?php endif ?>
	
	<div class="box_message">
		<img src="images/profile.png" alt="">
		<textarea name="" id=""  rows="3"></textarea>
		<a href="javascript:void(0)" class="btnSendPar">Gửi</a>
	</div>
	<div class="clear"></div>
	<div class="box_show_mess">
		<div class="message">
			<div class="message_parent">
				<img src="images/profile.png">
				<div class="right_mess">
					<h2>John</h2>
					<p>asdfasfsdgdfhfgjhg  sdgfsdsd fgsdg  sdfgsd  sdfs s  s sdf sg dfhjty  tyhtr  er  te tr rt t  rrt t asdfasfsdgdfhfgjhg  sdgfsdsd fgsdg  sdfgsd  sdfs s  s sdf sg dfhjty  tyhtr  er  te tr rt t  rrt t</p>
					<a href="javascript:void(0)">Trả lời</a>
				</div>
				<div class="message_child">
					<img src="images/profile.png">
					<div class="right_mess">
						<h2>John</h2>
						<p>asdfasfsdgdfhfgjhg  sdgfsdsd fgsdg  sdfgsd  sdfs s  s sdf sg dfhjty  tyhtr  er  te tr rt t  rrt t asdfasfsdgdfhfgjhg  sdgfsdsd fgsdg  sdfgsd  sdfs s  s sdf sg dfhjty  tyhtr  er  te tr rt t  rrt t</p>
					</div>
				</div>
				<div class="box_rep">
					<textarea name="" id="" rows="1"></textarea>
					<a href="javscript:void(0)" class="btnSendChil">Gửi</a>
				</div>
			</div>
			<div class="message_parent">
				<img src="images/profile.png">
				<div class="right_mess">
					<h2>John</h2>
					<p>asdfasfsdgdfhfgjhg  sdgfsdsd fgsdg  sdfgsd  sdfs s  s sdf sg dfhjty  tyhtr  er  te tr rt t  rrt t asdfasfsdgdfhfgjhg  sdgfsdsd fgsdg  sdfgsd  sdfs s  s sdf sg dfhjty  tyhtr  er  te tr rt t  rrt t</p>
					<a href="javascript:void(0)">Trả lời</a>
				</div>
				<div class="message_child">
					<img src="images/profile.png">
					<div class="right_mess">
						<h2>John</h2>
						<p>asdfasfsdgdfhfgjhg  sdgfsdsd fgsdg  sdfgsd  sdfs s  s sdf sg dfhjty  tyhtr  er  te tr rt t  rrt t asdfasfsdgdfhfgjhg  sdgfsdsd fgsdg  sdfgsd  sdfs s  s sdf sg dfhjty  tyhtr  er  te tr rt t  rrt t</p>
					</div>
				</div>
				<div class="box_rep">
					<textarea name="" id="" rows="1"></textarea>
					<a href="javscript:void(0)" class="btnSendChil">Gửi</a>
				</div>
			</div>
			
		</div>
	</div>
</div>
<div id="box_form">
	<div class="box_login">
		<del class="close_form">X</del>
		<form action="index.php?nameCtr=UserController&action=login" method="POST" id="form_login">
			<label>Username</label>
			<input type="" name="username">
			<label>Password</label>
			<input type="password" name="password">
		</form>
		<button type="submit" form="form_login" name="btnLogin">Login</button>
		<a href="javascript:void(0)" class="show_register">Register</a>
	</div>
	<div class="box_register">
		<del class="close_form">X</del>
		<form action="index.php?nameCtr=UserController&action=register" method="post" id="form_register">
			<label>Username</label>
			<input type="" name="username">
			<label>Password</label>
			<input type="password" name="password">
		</form>
		<button type="submit" form="form_register" name="btnRegister">Submit</button>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function(){

		$('.show_login').click(function(){
			$("#box_form, .box_login").show(500);
			$('#box_form .box_register').hide(500);
		});
		$('.show_register').click(function(){
			$("#box_form, .box_register").show(500);
			$('#box_form .box_login').hide(500);
		});
		$('.close_form').click(function() {
			// var parent = $(this).parents('.box_register').last().parent().attr('id');
			$("#box_form").hide(1000);
		});

	});
</script>
<style type="text/css">

#box_form {
	box-sizing: border-box;
	position: fixed;
	top: 100px;
	margin: 0 auto;
	width: 30%;
	min-width: 200px;
	background: #fff;
	border-radius: 5px;
	padding: 10px;
	display: none;
}
.box_login, .box_register {
	max-width: 100%;
	
	box-sizing: border-box;
	display: none;
}
.box_login form, .box_register form {

}
.box_login label, .box_login input, .box_login button,
.box_register label, .box_register input, .box_register button {
	box-sizing: border-box;
	width: 100%;
	border-radius: 5px;
}
.box_login input,
.box_register input {
	padding: 10px;
	font-style: italic;
}
.box_login button,
.box_register button {
	background: #21aee6;
	padding: 5px 10px;
	color: #fff;
}
.close_form {
	margin-bottom: 5px;
	padding: 3px;
	background: #bf0404;
	color: #fff;
	cursor: pointer;
	float: right;
	transition: all 0.5s;
	-webkit-transition: all 0.5s;
	-moz--transition: all 0.5s;
}
.close_form:hover {
	background: #ff4040;
}
.close_form::selection {
	background: none;
}
</style>