<?php 

class Comment extends DB {
	protected $table = 'binhluan';

	function store($name, $phone, $idLoai, $message, $idTT, $parentId = 0){
		$anHien = 0;
		if($parentId != 0)
			$anHien = 1;
		$time = date("Y-m-d H:i:s");
		$query = "INSERT INTO $this->table(idBL, HoTen, SoDT, ChuyenKhoa, NoiDung, idBaiViet, parent, AnHien, NgayDang)VALUES(null, '$name', $phone, $idLoai, '$message', $idTT, $parentId, $anHien, '$time')";

		if(mysqli_query($this->conn, $query)){
			return true;
		}
		return false;

	}
	function getComment($idTT){

		$query = "SELECT idBL, HoTen, NoiDung, parent FROM $this->table WHERE idBaiViet = $idTT AND AnHien = 1";

		$result = mysqli_query($this->conn, $query);
		if($result){
			if(mysqli_num_rows($result) > 0){
				return $result;
			}
		}
		
		return false;
	}

	function getChildComment($parentId){

		$query = "SELECT HoTen, NoiDung FROM $this->table WHERE parent = $parentId AND AnHien = 1";

		$result = mysqli_query($this->conn, $query);
		if($result){
			if(mysqli_num_rows($result) > 0){
				return $result;
			}
		}
		
		return false;
	}


}