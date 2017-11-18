<?php

class News extends DB {
	protected $table = 'tintuc';
	protected $primaryKey = 'idTT';

	function store($data){
		$NgayDang = date('Y-m-d H:i:s');
		$query = "INSERT INTO $this->table(`idCL`, `idLoai`, `idCon`, `TieuDe`, `TieuDeKD`, `Title`, `Des`, `Keyword`, `TomTat`, `NoiDung`, `UrlHinh`, `NgayDang`, `AnHien`, `LuotXem`) 
				VALUES ($data[idCL], $data[idLoai], $data[idCon], '$data[TieuDe]', '$data[TieuDeKD]', '$data[Title]', '$data[Des]', '$data[Keyword]', '$data[TomTat]', '$data[NoiDung]', '$data[UrlHinh]', '$NgayDang', 1, 0)";

		return $this->insert($query);
				
	}

	function getAllNews(&$totalRow, $pageNum, $pageSize, $TieuDe){

		$startRow = ($pageNum-1)*$pageSize;

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

				$result = $this->result($query) or die (mysqli_error());

				$query = "SELECT count(*) FROM  tintuc";

			}

			$rs = $this->result($query) or die(mysql_error());

			$totalRow = mysqli_num_rows($rs);

			return $result;
	}

	function updateTieuDeKD($idTT, $TieuDeKD){

		$TieuDeKD = $TieuDeKD.'-'.$idTT;

		$query ="UPDATE $this->table SET TieuDeKD = '$TieuDeKD' WHERE idTT = $idTT";

		return $this->alterColumn($query);
	}
}