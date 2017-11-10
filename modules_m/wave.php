<div class="class_inherit">
	<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="-466.4 259.6 280.2 47.3" enable-background="new -466.4 259.6 280.2 47.3" xml:space="preserve">
		<polyline fill="none" stroke="#4289A3" class="ekg" stroke-width="2" stroke-linecap="square" stroke-miterlimit="10" points="-465.4,281 -436,281 -435.3,280.6 -431.5,275.2 -426.9,281 -418.9,281 -423.9,281 -363.2,281 -355.2,269 -345.2,303 -335.2,263 -325.2,291 -319.2,281 -187.2,281 "></polyline>
	</svg>

	<style>
		@-webkit-keyframes dash {
			to {
				stroke-dashoffset: -1200;
			}
		}

		@keyframes dash {
			to {
				stroke-dashoffset: -1200;
			}
		}

		@-webkit-keyframes fade {
			0% {
				opacity: 1;
			}
			20% {
				opacity: 0;
			}
		}

		@keyframes fade {
			0% {
				opacity: 1;
			}
			20% {
				opacity: 0;
			}
		}

		svg {
			margin: 0 -1rem;
		}

		.ekg {
			opacity: 1;
			stroke-dasharray: 600;
			-webkit-animation: dash 7s linear forwards infinite, fade 3s linear infinite;
			animation: dash 3s linear forwards infinite, fade 3s linear infinite;
		}
	</style>
</div>