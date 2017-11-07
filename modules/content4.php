<div class="content3_main">
	<div class="box w1000">
		<div class="title_main hidden kdm15">
			<h3>BỆNH CHUYÊN KHOA</h3>	
		</div>
		<div class="clear20"></div>

		<ul class="list_ngang tabbl">
			<li class="tablinks active hvr-wobble-vertical hidden kdm6 zoomIn2" onclick="tab_dmk(event, 'dm1')">
				<img src="images/icon_dm1.png" title="Nam Khoa" alt="Nam Khoa">
				<p>Nam Khoa</p>
			</li>
			<li class="tablinks hvr-wobble-vertical hidden kdm7 zoomIn3" onclick="tab_dmk(event, 'dm2')">
				<img src="images/icon_dm2.png" title="Bệnh Xã Hội" alt="Bệnh Xã Hội">
				<p>Bệnh Xã Hội</p>
			</li>
			<li class="tablinks hvr-wobble-vertical hidden kdm8 zoomIn4" onclick="tab_dmk(event, 'dm3')">
				<img src="images/icon_dm3.png" title="Bệnh Trĩ" alt="Bệnh Trĩ">
				<p>Bệnh Trĩ</p>
			</li>
			<li class="tablinks hvr-wobble-vertical hidden kdm9 zoomIn5" onclick="tab_dmk(event, 'dm4')">
				<img src="images/icon_dm4.png" title="Tai Mũi Họng" alt="Tai Mũi Họng">
				<p>Tai Mũi Họng</p>
			</li>
			<li class="tablinks hvr-wobble-vertical hidden kdm10 zoomIn6" onclick="tab_dmk(event, 'dm5')">
				<img src="images/icon_dm5.png" title="Phụ Khoa" alt="Phụ Khoa">
				<p>Phụ Khoa</p>
			</li>
			<div class="clear"></div>
		</ul>

		<div id="dm1" class="tabblcontent tabblactive hidden kdm11 fadeInUp">
			<div class="clear20"></div>
			<div class="ndtableft left"></div><!-- ndtableft -->			
			<div class="ndtabright right">
				
				<div class="clear"></div>
			</div>
			<div class="clear"></div>
		</div>
		<div id="dm2" class="tabblcontent hidden kdm11 fadeInUp" style="">
			<div class="clear20"></div>
			<div class="ndtableft left">
			</div><!-- ndtableft -->			
			<div class="ndtabright right">
				
				<div class="clear"></div>
			</div>
			<div class="clear"></div>			
		</div>
		<div id="dm3" class="tabblcontent hidden kdm11 fadeInUp" style="">
			<div class="clear20"></div>
			<div class="ndtableft left">
			</div><!-- ndtableft -->			
			<div class="ndtabright right">
				
				<div class="clear"></div>
			</div>
			<div class="clear"></div>	
		</div>
		<div id="dm4" class="tabblcontent hidden kdm11 fadeInUp" style="">
			<div class="clear20"></div>
			<div class="ndtableft left">
			</div><!-- ndtableft -->			
			<div class="ndtabright right">
				
				<div class="clear"></div>
			</div>
			<div class="clear"></div>
		</div>
		<div id="dm5" class="tabblcontent hidden kdm11 fadeInUp" style="">
			<div class="clear20"></div>
			<div class="ndtableft left">
			</div><!-- ndtableft -->			
			<div class="ndtabright right">
				
				<div class="clear"></div>
			</div>
			<div class="clear"></div>
		</div>

		<script>
			function tab_dmk(evt, tabdm) {
				var i, tabcontent, tablinks;
				tabcontent = document.getElementsByClassName("tabblcontent");
				for (i = 0; i < tabcontent.length; i++) {
					tabcontent[i].style.display = "none";
				}
				tablinks = document.getElementsByClassName("tablinks");
				for (i = 0; i < tablinks.length; i++) {
					tablinks[i].className = tablinks[i].className.replace(" active", "");
				}
				document.getElementById(tabdm).style.display = "block";
				evt.currentTarget.className += " active";
			}
		</script>

	</div><!-- box -->	
</div>