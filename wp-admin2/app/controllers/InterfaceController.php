<?php

class InterfaceController extends Controller {

	function showSlider(){
		$banner = new Banner();

		$data['pageSize'] = 20;
		$pageNum = 1;

		if (isset($_GET['pageNum'])==true) $pageNum = $_GET['pageNum'];

		if ($pageNum <=0 ) $pageNum=1; settype($pageNum,"int");

		$TieuDe = $_GET['TieuDe'];
		$TieuDe = $banner->deleteFormat($TieuDe);

		$data['slider'] = $banner->getAllSlider($totalRow, $pageNum, $data['pageSize'], $TieuDe);
		$data['totalRow'] = $totalRow;
		$data['pageNum'] = $pageNum;

		$this->view('show-slider', $data);
	}
}