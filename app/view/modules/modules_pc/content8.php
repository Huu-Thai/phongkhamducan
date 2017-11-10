<div class="list_icon_dm w1000">
	<div class="dm">
		<img src="images/icon_dm1.png" alt="">
		<h3>Nam Khoa</h3>
	</div>
	<div class="dm">
		<img src="images/icon_dm2.png" alt="">
		<h3>Bệnh Xã Hội</h3>
	</div>
	<div class="dm">
		<img src="images/icon_dm3.png" alt="">
		<h3>Bệnh Trĩ</h3>
	</div>
	<div class="dm">
		<img src="images/icon_dm4.png" alt="">
		<h3>Tai Mũi Họng</h3>
	</div>
	<div class="dm">
		<img src="images/icon_dm5.png" alt="">
		<h3>Phụ Khoa</h3>
	</div>
	<div class="dm">
		<img src="images/icon_dm1.png" alt="">
		<h3>Phá Thai</h3>
	</div>
</div>
<style>
	.list_icon_dm {
		overflow: hidden;

	}
	.list_icon_dm .dm{
		float: left;
		width: 16%;
		text-align: center;
		border: 1px solid #6e99d7;
		color: #6e99d7;
		margin-right: 5px;
		padding: 30px 0;
		border-radius: 5px;
		transition: all 0.5s;
		-webkit-transition: all 0.5s;
		-moz-transition: all 0.5s;
		box-sizing: border-box;
	}
	.list_icon_dm .dm:last-child{
		margin-right: 0;
	}
	.list_icon_dm .dm:nth-child(2) {
		border-color: #16ccd9;
		color: #16ccd9;
	}
	.list_icon_dm .dm:nth-child(3) {
		border-color: #2aed78;
		color: #2aed78;
	}
	.list_icon_dm .dm:nth-child(4) {
		border-color: #ffc107;
		color: #ffc107;
	}
	.list_icon_dm .dm:nth-child(5) {
		border-color: #e91e63;
		color: #e91e63;
	}
	.list_icon_dm .dm:nth-child(6) {
		/*border-color: #16ccd9;*/
	}
	.list_icon_dm .dm:hover{
		color: #fff;
	}
	.list_icon_dm .dm img{
		width: 48%;
		display: inline-block;
	}
	.list_icon_dm .dm h3 {
		font-size: 100%;
	}	
</style>
<script>
	$(document).ready(function(){
		$(".list_icon_dm .dm").each(function(){
			$(this).hover(function(){
				var background = $(this).css('border-color');
				$(this).css('background',background);
			});
			$(".list_icon_dm .dm").mouseleave(function(){

				$(".list_icon_dm .dm").css('background','none');
			});
			
		});
	})
	
</script>