<?php

class Loai extends DB {
	public $table = 'loai';
	public $primaryKey = 'idLoai';

	function getLoaiById($idLoai){

		$query = "SELECT `idLoai`, `TieuDe`, `TieuDeKD`, `UrlHinh`, `TomTat`, `Title`, `Des`, `Keyword` 
				  FROM $this->table 
				  WHERE idLoai = $idLoai AND AnHien = 1
				 ";

		$result = mysqli_query($this->conn, $query);
		if(mysqli_num_rows($result) > 0){
			return mysqli_fetch_assoc($result);
		}
		return false;
	}

	function getSubNewsByIdLoai($idLoai){
		
		$query = "SELECT `idLoai`, `TieuDe`, `TieuDeKD`, `UrlHinh`, `TomTat`, `Title`, `Des`, `Keyword`, `Parent` 
				  FROM $this->table  
				  WHERE Parent = $idLoai AND AnHien = 1
				 ";

		$result = mysqli_query($this->conn, $query);
		if(mysqli_num_rows($result) > 0){
			return $result;
		}
		return false;
	}

	function getChildId($idLoai){

		$query = "SELECT `idLoai` 
				  FROM $this->table 
				  WHERE Parent = $idLoai AND AnHien = 1 LIMIT 0, 1
				 ";

		$result = mysqli_query($this->conn, $query);
		if(mysqli_num_rows($result) > 0){
			return mysqli_fetch_assoc($result);
		}
		return false;
	}
} 