<?php
class User extends DB {
	protected $table = 'users';

	function store($username, $password){

		$query = "INSERT INTO $this->table(idUser, User, Pass, idGroup)VALUES(null, '$username', '$password', 0)";

		if(mysqli_query($this->conn, $query)){
			return mysqli_insert_id($this->conn);
		}
		return false;
	}

	function getUser(){

	}
	function checkUser($username, $password){

		$query = "SELECT idUser FROM $this->table WHERE User = '$username' AND Pass = '$password'";

		$result = mysqli_query($this->conn, $query);
		if($result){
			if(mysqli_num_rows($result) > 0) {
				return true;
			}
		}
		
		return false;
	}

}