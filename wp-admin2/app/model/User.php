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

		$query = "SELECT idUser, idGroup FROM $this->table WHERE BINARY `User` = BINARY '$user' AND BINARY `Pass` = BINARY  '$pass'";

		return $this->result($query);
	}

	function checkPass($idUser, $pass){
		$query = "SELECT idUser FROM $this->table WHERE BINARY `idUser` = BINARY $idUser AND BINARY `Pass` = BINARY  '$pass'";

		return $this->result($query);
	}

	public function getAllUser(&$totalRow, $pageNum, $pageSize, $TieuDe){

		$startRow = ($pageNum-1)*$pageSize;

		if ($TieuDe != ""){
			$query = "SELECT u.idUser, u.User, gu.task
			FROM  $this->table AS u
			INNER JOIN group_users AS gu
			ON gu.id = u.idGroup
			WHERE User like '%$TieuDe%'
			ORDER BY idUser DESC
			LIMIT $startRow , $pageSize
			";
			$result = $this->result($query);
			$query = "SELECT count(*)
			FROM  $this->table
			WHERE User like '%$TieuDe%'
			";
		}else{
			$query = "SELECT u.idUser, u.User, gu.task
			FROM  $this->table AS u
			INNER JOIN group_users AS gu
			ON gu.id = u.idGroup
			ORDER BY idUser DESC
			LIMIT $startRow , $pageSize
			";
			$result = $this->result($query);
			$query = "SELECT count(*) FROM  $this->table";
		}

		$rs = $this->result($query);
		$totalRow = mysqli_fetch_row($rs)[0];
		
		return $result;
	}

	function changePass($idUser, $pass){

		$query = "UPDATE $this->table SET Pass = '$pass' WHERE idUser = $idUser";

		return $this->execute($query);

	}
	function changeTask($idUser, $idGroup){

		$query = "UPDATE $this->table SET idGroup = $idGroup WHERE idUser = $idUser";

		return $this->execute($query);

	}

	function delete($idUser){

		$query = "DELETE  FROM $this->table WHERE idUser = $idUser";

		return $this->execute($query);
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