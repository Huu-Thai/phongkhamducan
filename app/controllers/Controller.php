<?php 

class Controller {
	public $linkModule = 'app/view/modules/modules_pc/';
	public $linkPage = 'app/view/pages/page_pc/'; 

	function view($page, $data = []){
		$loai = new Loai();
		$data['menu'] = $loai->getMainMenu();

		require "app/view/master_pc.php";
	}
}