<?php

class PhoneController extends Controller {

	function showPhone(){
		$phone = new Phone();
		$data['pageSize'] = 20;

		$pageNum = 1;

		if (isset($_GET['pageNum'])==true) $pageNum = $_GET['pageNum'];

		if ($pageNum <=0 ) $pageNum = 1; settype($pageNum, "int");

		$sdt = $_GET['sdt'];
		$sdt = $phone->deleteFormat($sdt);

		$IP = $_GET['IP'];
		$IP = $phone->deleteFormat($IP);

		$data['phone'] = $phone->getAll($totalRow, $pageNum, $data['pageSize'], $sdt, $IP);
		$data['totalRow'] = $totalRow;
		$data['pageNum'] = $pageNum;

		$this->view('show-phone', $data);
	}

	function editPhone(){
		
		$this->view('edit-phone');
	}

	function handleEditPhone(){
		$phone = new Phone();
		$this->getLink();

		if (isset($_POST['btnOK']) == true){
			$id_sdt = $_POST['id_sdt'];
			$Ghichu = $_POST['Ghichu'];

			$phone->editPhone($id_sdt, $Ghichu);

			header("location:index.php?nameCtr=PhoneController&action=showPhone");
		}
	}
}