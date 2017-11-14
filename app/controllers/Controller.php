<?php 

class Controller {
	public $linkModule = 'app/view/modules/modules_pc/';
	public $linkPage = 'app/view/pages/page_pc/'; 
	public $linkModuleMobile = 'app/view/modules/modules_m/';
	public $linkPageMobile = 'app/view/pages/page_m/';


	function view($page, $data = []){
		ob_start();
		$comments = new Comment();

		$_SESSION['linkCurrent'] = (isset($_SERVER['HTTPS']) ? 'https' : 'http')."://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
		$loai = new Loai();
		if ($loai->getMainMenu()) {
			$data['menu'] = $loai->getMainMenu();
		}
		
		if(!is_mobile()){
			require "app/view/master_pc.php";
		}else{
			require "app/view/master_m.php";
		}
		$content = ob_get_contents();
		ob_end_clean();
		
	    // Xuất kết quả
	    echo $content;
	}

	function getLink(){
		if(isset($_SESSION['linkCurrent']))
			$_SESSION['linkOld'] = $_SESSION['linkCurrent'];
		$_SESSION['linkCurrent'] = (isset($_SERVER['HTTPS']) ? 'https' : 'http')."://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

	}
}