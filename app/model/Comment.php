<?php 

class Comment extends DB {
	protected $table = 'binhluan';

	function store($name, $phone, $message, $idTT){

		$query = "INSERT INTO $this->table(idBL, HoTen, SoDT,NoiDung, idBaiViet, AnHien)VALUES(null, '$name', $phone, '$message', $idTT, 0)";

		if(mysqli_query($this->conn, $query)){
			return true;
		}
		return false;

	}
	function getComment($idTT){

		$query = "SELECT HoTen, NoiDung FROM $this->table WHERE idBaiViet = $idTT AND AnHien = 1";

		$result = mysqli_query($this->conn, $query);
		if(mysqli_num_rows($result) > 0){
			return $result;
		}
		return false;
	}


}