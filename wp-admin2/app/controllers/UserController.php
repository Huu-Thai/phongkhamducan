<?php

class UserController extends Controller {

	public function addUser(){
		
		$this->view('add-user');
	}
	public function showChangePass(){
		$data['idUser'] = $_GET['idUser'];
		
		$this->view('change-pass-user', $data);
	}
	public function showChangeTask(){
		$data['idUser'] = $_GET['idUser'];
		
		$this->view('change-task-user', $data);
	}

	function handleAddUser(){
		$this->getLink();
		$user= new User();

		if(isset($_POST['btnOK'])){
			$username = $_POST['User'];
			$pass = md5($_POST['Pass']);
			$idGroup = $_POST['idGroup'];

			if($user->checkUser($username, $pass) == false){

				if($user->store($username, $pass, $idGroup) != flase){
					$_SESSION['script'] = "alert('Đăng ký tài khoản thành công')";
				}else{
					$_SESSION['script'] = "alert('Đăng ký lỗi')";
				}
			}else {
				$_SESSION['script'] = "alert('Tài khoản đã tồn tại')";
			}
			header("location:".$_SESSION['oldLink']);
		}
	}

	function getAllUser(){
		$user = new User();
		$data['users'] = $user->getAllUser();

		$this->view('show-user', $data);
	}

	function handleChangePass(){
		$user = new User();
		$this->getLink();

		if(isset($_POST['btnOK'])){
			$idUser = $_POST['idUser'];

			if(strlen($_POST['Pass']) < 6){
				$_SESSION['script'] = "alert('Mật khẩu ít nhất 6 ký tự')";
				header('location:'.$_SESSION['oldLink']);
				exit;
			}
			$newPass = md5($_POST['Pass']);

			if($user->changePass($idUser, $newPass)){

				$_SESSION['script'] = "alert('đổi mật khẩu thành công')";
				header('location:index.php?nameCtr=UserController&action=getAllUser');
			}else{

				$_SESSION['script']= "alert('dổi mật khẩu thất bại')";
				header('location:'.$_SESSION['oldLink']);
			}
		}else{
			header('location:'.$_SESSION['oldLink']);
		}
		
	}

	function handleChangeTask(){
		$user = new User();
		$this->getLink();

		if(isset($_POST['btnOK'])){
			$idUser = $_POST['idUser'];
			$idGroup= $_POST['idGroup'];

			if($user->changeTask($idUser, $idGroup)){

				$_SESSION['script'] = "alert('Thây đổi phân quyền thành công')";
				header('location:index.php?nameCtr=UserController&action=getAllUser');
			}else{

				$_SESSION['script']= "alert('Thây đổi phân quyền thất bại')";
				header('location:'.$_SESSION['oldLink']);
			}
		}else{

			header('location:'.$_SESSION['oldLink']);
		}	
	}

	function deleteUser(){
		$user = new User();
		$this->getLink();

		$idUser = $_GET['idUser'];
		if($user->delete($idUser)){

			header('location:'.$_SESSION['oldLink']);
		}else{

			$_SESSION['script'] = 'alert("xóa user xãy ra lỗi")';
			header('location:'.$_SESSION['oldLink']);
		}
	}
}