<style>
	@keyframes heightAuto {
		0%{ height: 0; }
		100% { height: 400px; }
	}
	.show-md-message {
		height: 400px !important;
		animation: heightAuto 0.5s;
	}
	.md-message {
		width: 450px;
		height: 0;
		overflow: hidden;
		position: fixed;right: 0;bottom: 0;
		z-index: 999999;
	}
	.md-message > .alert {
		color: #a94442;
		padding: 15px;
		font-size: 120%;
		background: #f2dede;
		border-radius: 4px 4px 0 0;
		border: 1px solid #ebccd1;
	}
	.md-message > .alert > .close {
		cursor: pointer;
		float: right;
		color: #000;
		opacity: .2;
		font-weight: 600;
		font-size: 150%;
		text-shadow: 0 1px 0 #fff;
		text-decoration: none !important;
	}
	.md-message > .content {
		display: block;
		height: 87.5%;
		overflow: hidden;
		background: #fff;
		box-sizing: border-box;
		border: 10px solid #ebccd1;
	}
	.md-message > .content > div {
		padding: 10px;
		white-space: nowrap;
		vertical-align: middle;
		border-bottom: 1px dotted #555;
	}
	.md-message > .content > div .id_ghichu {
		color: blue;
		height: 25px;
		outline: none;
		border-radius: 4px;
		width: 60% !important;
		box-sizing: border-box;

	}
	.md-message > .content > div > p {
		white-space: normal !important;
	}
	span.error { margin-left: 2%; }
</style>
<script>
	$(function(){
		$('#alert-close').click(function(){
			$('#md-message').removeClass('show-md-message');
		});
		// 
		setInterval(function(){
			$.ajax({
				url: "message_ajax.php",
				type: "post",
				dataType: "text",
				success: function(results){
					if (results != '') {
						$('#md-ms-content').empty().html(results);
						var txt = $('#count-bell').val();
						$('#span-num').text(txt);
						$('#md-message').addClass('show-md-message');
						setTimeout(function(){ $('#md-message').removeClass('show-md-message'); }, 20000);
					}
		        }
	        });
		}, 180000);
		// 
		$(document).on('keyup blur', '#id_ghichu',function(e){
			if (!e.keyCode || (e.keyCode != '' && e.keyCode == 13)) {
				var id_ghichu = $(this).val();
				var id_sdt = $(this).next().val();
				if (id_ghichu !='') {
					$.ajax({
						url: "message_ajax_check.php",
						type: "post",
						dataType: "text",
						data: {'ghichu':id_ghichu,'sdt':id_sdt},
						success: function(result){
							var kq = result.split("---");
				            if (kq[1] == 'false') {
				            	$('span.error').remove();
				            	$('#wait'+kq[0]).find('strong').after('<span class="error">Nhập lại ghi chú</span>');
				            }else {
				            	$('#wait'+kq[0]).hide();
				            }
				        }
			        });
			    }
			}
		});
	});
</script>
<?php
	$val = array('tuvan');
	if (isset($_SESSION['tg_login_user']) && in_array($_SESSION['tg_login_user'], $val)) { ?>
	<div id="md-message" class="md-message">
		<div class="alert">
		    <a id="alert-close" class="close" title="close">×</a>
		    <strong>Nhắc nhở!</strong> Gọi nhanh cho <strong id="span-num"></strong>Số Điện Thoại
		</div>
		<div id="md-ms-content" class="content">
		</div>
	</div>
<?php } ?>

