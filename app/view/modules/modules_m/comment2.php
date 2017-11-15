<div class="box_show_mess">
	<div class="message">
		<?php if(isset($data['comment'])): ?>
			<?php while($row = mysqli_fetch_assoc($data['comment'])): ?>
				<div class="message_parent">
					<img src="images/profile.png">
					<div class="right_mess">
						<h2><?=$row['HoTen'] ?></h2>
						<p><?=$row['NoiDung'] ?></p>
						<a id="<?=$row['idBL']?>" class="reply" href="javascript:void(0)">Trả lời</a>
						<input type="hidden" name="parentId" value="<?=$row['idBL']?>">
					</div>
					<div id="list_message_child_<?=$row['idBL']?>" class="list_message_child">
						<?php $data['commentChild'] = $comments->getChildComment($row['idBL']); ?>			
						<?php if($data['commentChild'] != false): ?>
							<?php while($rowChild = mysqli_fetch_assoc($data['commentChild'])): ?>
								<div class="message_child">
									<img src="images/profile.png">
									<div class="right_mess">
										<h2><?=$rowChild['HoTen']?></h2>
										<p><?=$rowChild['NoiDung']?></p>
									</div>
								</div>
							<?php endwhile; ?>
						<?php endif; ?>
					</div>
					<div id="box_rep_<?=$row['idBL']?>" class="box_rep">
						<input type="text" name="name" placeholder="nhập tên của bạn">
						<textarea name="commentChild" class="commentChild" rows="1" placeholder="nhập tin nhắn của bạn"></textarea>
						<a href="javscript:void(0)" class="btnSendChil">Gửi</a>
					</div>
				</div>
			<?php endwhile; ?>
		<?php endif; ?>

	</div>
</div>
<div style="width: 100%;  border: 1px solid #e6e6e6; border-radius: 10px 10px 10px 10px; padding: 10px; position: relative; margin-bottom:10px; margin-top: 20px;box-sizing:border-box;">
	<!-- dat cau hoi -->
	<div class="clearfix"></div>
	<h3 style="text-transform: uppercase; color: #2aabd2 ">Đặt Câu Hỏi Với Bác Sỹ Chuyên Khoa</h3>
	<div style="margin-bottom:10px;top:10px; background-color: #FCFCFC">
		<form action="" method="post" id="frm-cmt">
			<div style=" margin-bottom: 20px;border: 1px solid #e6e6e6;  padding: 10px;">
				<label for="focusedInput">Số Điện Thoại:</label>
				<input class="form-control phone" id="phone_cmt" type="text" name="email" placeholder="0902922066"><br>
				<label for="comment">Họ Tên:</label>
				<input class="form-control" id="ho_ten" name="ho_ten" placeholder="Nguyễn Văn A"><br>

				<label for="comment">Nội Dung:</label>
				<textarea class="form-control" rows="5" id="comment" name="noi_dung" placeholder="xin hỏi bác sĩ..."></textarea><br> 

				<button type="button" class="btn btn-info" id="send_comment">Gửi</button>

				<input type="hidden" id="idTT" name="idTT" value="<?=$_GET['idTT']?>">
				<input type="hidden" id="idLoai" name="idLoai" value="<?=$data['idLoai']?>">
				
			</div>
		</form>
	</div>
	<!-- end dat cau hoi -->
	<!-- Phần comment tra loi cau hoi -->
	<style type="text/css">
		/* PHÂN TRANG */
		.phantrang{border: 1px solid #ccc; padding: 5px; float: right;margin-top: 10px; }
		.tofu{ position: relative; padding: 6px 12px; margin-left: -1px; line-height: 1.42857143; text-decoration: none; border: 1px solid #ddd; margin: 0 1px;}
	</style>

	<div class="clearfix"></div>
	<!-- end tra loi cau hoi -->
</div>

<style>
	textarea.form-control {
		height: auto;
	}
	.form-control {
		box-sizing: border-box;
		display: block;
		width: 100%;
		height: 34px;
		padding: 6px 12px;
		font-size: 14px;
		line-height: 1.42857143;
		color: #555;
		background-color: #fff;
		background-image: none;
		border: 1px solid #ffc30b;
		border-radius: 4px;
		-webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
		box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
		-webkit-transition: border-color ease-in-out .15s,-webkit-box-shadow ease-in-out .15s;
		-o-transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
		transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
	}
	.btn{

		display: inline-block;
		padding: 6px 12px;
		margin-bottom: 0;
		font-size: 14px;
		font-weight: 400;
		line-height: 1.42857143;
		text-align: center;
		white-space: nowrap;
		vertical-align: middle;
		-ms-touch-action: manipulation;
		touch-action: manipulation;
		cursor: pointer;
		-webkit-user-select: none;
		-moz-user-select: none;
		-ms-user-select: none;
		user-select: none;
		background-image: none;
		border: 1px solid transparent;
		border-radius: 4px;
	}
	.btn:active {
		background-image: none;
		outline: 0;
		-webkit-box-shadow: inset 0 3px 5px rgba(0,0,0,.125);
		box-shadow: inset 0 3px 5px rgba(0,0,0,.125);
	}
	.btn-info {
		color: #ffc30b;
		background-color: #005ca1;
		border-color: #ffc30b;
	}
	.btn-info:active:hover {
		color: #fff;
		background-color: #269abc;
		border-color: #1b6d85;
	}
}
</style>