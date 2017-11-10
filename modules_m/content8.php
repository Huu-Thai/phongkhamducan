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