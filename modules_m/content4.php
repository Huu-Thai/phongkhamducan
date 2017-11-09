<div class="content3_main">
	<div class="box class_inherit">
		<div class="title_main">
			<h3>BỆNH CHUYÊN KHOA</h3>	
		</div>
		<div class="clear20"></div>

		<ul class="list_ngang tabbl">
			<li class="left tablinks active" onclick="tab_dmk(event)">
				<img src="images/icon_dm1.png" title="Nam Khoa" alt="Nam Khoa">
				<p>Nam Khoa</p>
			</li>
			<li class="left tablinks" onclick="tab_dmk(event)">
				<img src="images/icon_dm2.png" title="Bệnh Xã Hội" alt="Bệnh Xã Hội">
				<p>Bệnh Xã Hội</p>
			</li>
			<li class="left tablinks" onclick="tab_dmk(event)">
				<img src="images/icon_dm3.png" title="Bệnh Trĩ" alt="Bệnh Trĩ">
				<p>Bệnh Trĩ</p>
			</li>
			<li class="left tablinks" onclick="tab_dmk(event)">
				<img src="images/icon_dm4.png" title="Tai Mũi Họng" alt="Tai Mũi Họng">
				<p>Tai Mũi Họng</p>
			</li>
			<li class="left tablinks" onclick="tab_dmk(event)">
				<img src="images/icon_dm5.png" title="Phụ Khoa" alt="Phụ Khoa">
				<p>Phụ Khoa</p>
			</li>
			<div class="clear"></div>
		</ul>
		
		<script>
			function tab_dmk(evt) {	
				tablinks = document.getElementsByClassName("tablinks");
				for (i = 0; i < tablinks.length; i++) {
					tablinks[i].className = tablinks[i].className.replace(" active", "");
				}
				console.log(evt.currentTarget.className);
				evt.currentTarget.className += " active";
			}
		</script>

	</div><!-- box -->	
</div>
<style>
	.list_ngang {
		margin: 0 auto;
		padding: 0 20px;
	}
	.tablinks img {
		width: 42%;
	}
	@media only screen and (max-width:400px) {
		.tablinks {
			width: 32% !important;
			min-height: 75px;
			padding-bottom: 5px !important;
		}
		.tablinks p {
			font-size: 9px !important;
		}
		.list_ngang {
			padding: 0 10px;
		}
	}
</style>