<?php

class HomeController extends Controller {

	function index(){
		$loai = new Loai();
		$data['menu'] = $loai->getMainMenu();


		$this->view('home',$data);
	}
}