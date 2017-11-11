<?php

class News extends DB {
	protected $table = 'tintuc';
	protected $primaryKey = 'idTT';

	function getNewsByIdLoai($idLoai) {

		$query = "SELECT `idTT`, `idCL`, `idLoai`, `idCon`, `TieuDe`, `TieuDeKD`, `Title`, `Des`, `Keyword`, `TomTat`, `NoiDung`, `UrlHinh`, `NgayDang`, `LuotXem` 
				FROM $this->table 
				WHERE idCL = $idLoai AND AnHien = 1 LIMIT 0, 1
				";

		$result = mysqli_query($this->conn, $query);
		if(mysqli_num_rows($result) > 0){
			return mysqli_fetch_assoc($result);
		}
		return false;
	}

	function postRelated($idTT, $idLoai){

		$query = "SELECT `idTT`, `idCL`, `idLoai`, `idCon`, `TieuDe`, `TieuDeKD`, `Title`, `Des`, `Keyword`, `TomTat`, `NoiDung`, `UrlHinh`, `NgayDang`, `LuotXem` 
				FROM $this->table 
				WHERE idTT <> $idTT AND idCL = $idLoai AND AnHien = 1 LIMIT 0, 5
				";

		$result = mysqli_query($this->conn, $query);

		if(mysqli_num_rows($result) > 0){
			return $result;
		}
		return false;
	}

	function getNewsByIdCl($idCl){

		$query = "SELECT `idTT`, `idCL`, `idLoai`, `idCon`, `TieuDe`, `TieuDeKD`, `Title`, `Des`, `Keyword`, `TomTat`, `NoiDung`, `UrlHinh`, `NgayDang`, `LuotXem` 
				FROM $this->table 
				WHERE idCL = $idCl AND AnHien = 1
				";

		$result = mysqli_query($this->conn, $query);
		if(mysqli_num_rows($result) > 0){
			return $result;
		}
		return false;
	}

	function getMoodable($idTT, $idLoai){

		$query = "SELECT `idTT`, `idCL`, `idLoai`, `idCon`, `TieuDe`, `TieuDeKD`, `Title`, `Des`, `Keyword`, `TomTat`, `NoiDung`, `UrlHinh`, `NgayDang`, `LuotXem` 
				FROM $this->table 
				WHERE idTT <> $idTT AND idCL <> $idLoai AND AnHien = 1 LIMIT 0, 3
				";

		$result = mysqli_query($this->conn, $query);

		if(mysqli_num_rows($result) > 0){
			return $result;
		}
		return false;
	}
	
	function search($keyword){

		$query = "SELECT `idTT`, `idCL`, `idLoai`, `idCon`, `TieuDe`, `TieuDeKD` 
				FROM $this->table
				WHERE TieuDe LIKE '%$keyword%'
				";

		$result = mysqli_query($this->conn, $query);
		if(mysqli_num_rows($result)){
			$array = '';
			while($row = mysqli_fetch_assoc($result)){
				$array[] = $row;
			}
			return $array;
		}
		return false;
	}
}