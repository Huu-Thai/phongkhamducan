<?php

class News extends DB {
	protected $table = 'tintuc';

	function getNewsByIdLoai($idLoai) {

		$query = "SELECT `idTT`, `idCL`, `idLoai`, `idCon`, `TieuDe`, `TieuDeKD`, `Title`, `Des`, `Keyword`, `TomTat`, `NoiDung`, `UrlHinh`, `NgayDang`, `LuotXem` 
				FROM $this->table 
				WHERE idLoai = $idLoai AND AnHien = 1
				";

		$result = mysqli_query($this->conn, $query);
		if(mysqli_num_rows($result) > 0){
			return mysqli_fetch_assoc($result);
		}
		return false;
	}
}