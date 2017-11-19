<?php

class News extends DB {
	protected $table = 'tintuc';
	protected $primaryKey = 'idTT';

	function store($data){
		$NgayDang = date('Y-m-d H:i:s',time());
		$query = "INSERT INTO $this->table(`idCL`, `idLoai`, `idCon`, `TieuDe`, `TieuDeKD`, `Title`, `Des`, `Keyword`, `TomTat`, `NoiDung`, `UrlHinh`, `NgayDang`, `AnHien`, `LuotXem`) 
		VALUES ($data[idCL], $data[idLoai], $data[idCon], '$data[TieuDe]', '$data[TieuDeKD]', '$data[Title]', '$data[Des]', '$data[Keyword]', '$data[TomTat]', '$data[NoiDung]', '$data[UrlHinh]', '$NgayDang', 1, 0)";

		return $this->insert($query);

	}

	function update($data){
		$NgayDang = date('Y-m-d H:i:s');
		$query = "UPDATE $this->table 
		SET `idCL` = $data[idCL], `idLoai` = $data[idLoai], `idCon` = $data[idCon], 
			`TieuDe` = '$data[TieuDe]', `TieuDeKD` = '$data[TieuDeKD]', 
			`Title` = '$data[Title]', `Des` = '$data[Des]', 
			`Keyword` = '$data[Keyword]', `TomTat` = '$data[TomTat]', 
			`NoiDung` = '$data[NoiDung]', `UrlHinh` = '$data[UrlHinh]', 
			`NgayDang` = '$NgayDang', `AnHien` = 1, `LuotXem` = 0
		WHERE $this->primaryKey = $data[idTT]
		";

		return $this->execute($query);
	}

	function delete($idTT){

		$query = "DELETE FROM $this->table WHERE $this->primaryKey = $idTT";

		return $this->execute($query);
	}

	function getAllNews(&$totalRow, $pageNum, $pageSize, $TieuDe){

		$startRow = ($pageNum - 1)*$pageSize;

		if ($TieuDe != ""){

			$query ="SELECT idTT, TieuDe, TieuDeKD, TomTat, AnHien, UrlHinh
			FROM  $this->table
			WHERE TieuDe like '%$TieuDe%'
			ORDER BY idTT DESC
			LIMIT $startRow , $pageSize
			";

			$result = $this->result($query);

			$query = "SELECT count(*) FROM  $this->table WHERE TieuDe like '%$TieuDe%'";

		}else{

			$query ="SELECT idTT, TieuDe, TieuDeKD, TomTat, AnHien, UrlHinh
			FROM  tintuc
			ORDER BY idTT DESC
			LIMIT $startRow , $pageSize
			";

			$result = $this->result($query) or die(mysqli_error());

			$query = "SELECT count(*) FROM  $this->table";

		}

		$rs = $this->result($query) or die(mysqli_error());

		$totalRow = mysqli_fetch_row($rs)[0];

		return $result;
	}

	function getAllNews2(){

		$query ="SELECT idTT, TieuDe, TieuDeKD, TomTat, AnHien, UrlHinh FROM  $this->table";

		return $this->result($query);
	}

	function updateTieuDeKD($idTT, $TieuDeKD){

		$TieuDeKD = $TieuDeKD.'-'.$idTT;

		$query ="UPDATE $this->table SET TieuDeKD = '$TieuDeKD' WHERE idTT = $idTT";

		return $this->execute($query);
	}

}