<?php

class User extends DB {
	protected $table = 'users';
	protected $primaryKey = 'idUser';


	function store ($user, $pass, $idGroup){

		$query = "INSERT INTO `users`(`idUser`, `User`, `Pass`, `idGroup`) 
				VALUES (null, '$user', '$pass', $idGroup)";

		return $this->insert($query);
	}

	function checkUser($user, $pass){

		$query = "SELECT idUser FROM $this->table WHERE User = '$user' AND Pass = '$pass'";

		return $this->result($query);
	}

	function getAllUser(){

		$query = "SELECT u.idUser, u.User, gu.task
				FROM $this->table AS u
				INNER JOIN group_users AS gu
				ON gu.id = u.idGroup
				";

		return $this->result($query);
	}

	function changePass($idUser, $pass){

		$query = "UPDATE $this->table SET Pass = '$pass' WHERE idUser = $idUser";

		return $this->alterColumn($query);

	}
	function changeTask($idUser, $idGroup){

		$query = "UPDATE $this->table SET idGroup = $idGroup WHERE idUser = $idUser";

		return $this->alterColumn($query);

	}

	function delete($idUser){

		$query = "DELETE  FROM $this->table WHERE idUser = $idUser";

		return $this->alterColumn($query);
	}

	function search($keyword){

		$query = "SELECT idUser FROM $this->table WHERE User LIKE '%$keyword%'";

		return $this->result($query);
	}

	function countIdGroup(){

		$query = "SELECT count(id) as numGroup FROM group_users
				";
		$result = $this->result($query);
		if($result != false){
			return mysqli_fetch_assoc($result)['numGroup'];
		}
		return false;
	}

}