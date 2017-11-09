<div class="standpoint edit_standpoint m640">
	<div class="img_message" style="min-width:54px;">
		<img src="images/icon_meseger.png" alt="" >
	</div>
	
	<div>
		<p>"ĐỪNG NGẰN NGẠI HÃY BÀY TỎ QUAN ĐIỂM VỚI CHÚNG TÔI"</p>
	</div>
</div>
<style>
	.standpoint {
		
	}
	.img_message{
		float: left;
		width: 13%;
		position:relative;
		overflow:hidden;
		min-width: 54px;
	}
	.img_message:after{
		position:absolute;
		top:0;
		left:0;
		width:100%;
		height:100%;
		background:rgba(255,255,255,0.5);
		content:'';
		-webkit-transition:-webkit-transform 0.6s;
		transition:transform 0.6s;
		-webkit-transform:scale3d(2.2,1.4,1) rotate3d(0,0,1,45deg) translate3d(0,-128%,0);
		transform:scale3d(2.2,1.4,1) rotate3d(0,0,1,45deg) translate3d(0,-128%,0);
	}
	.img_message:hover:after{
		-webkit-transform:scale3d(2.2,1.4,1) rotate3d(0,0,1,45deg) translate3d(0,128%,0);
		transform:scale3d(2.2,1.4,1) rotate3d(0,0,1,45deg) translate3d(0,128%,0);
	}
	.standpoint .img_message img {
		width: 100%;
	}
	.standpoint div:last-child {
		float: right;
		background-color: #ffc107;
		color: #fff;
		padding: 2%;
		width: 72%;
		margin-right: 9.5%;
	}
	.standpoint p{
		text-transform: uppercase;
		text-indent: 25px;
	}

	@media only screen and (max-width: 400px) {
		.standpoint div:last-child {
			margin-right: 3%;
		}
	}
	
</style>