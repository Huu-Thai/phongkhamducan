<?php

class News extends DB {
	protected $table = 'tintuc';
	protected $primaryKey = 'idTT';

	function store($data){

		$query = "INSERT INTO $this->table(`idCL`, `idLoai`, `idCon`, `TieuDe`, `TieuDeKD`, `Title`, `Des`, `Keyword`, `TomTat`, `NoiDung`, `UrlHinh`, `NgayDang`, `AnHien`, `LuotXem`) 
				VALUES ($data[idCL], $data[idLoai], $data[idCon], '$data[TieuDe]', '$data[TieuDeKD]', '$data[Title]', '$data[Des]', '$data[Keyword]', '$data[TomTat]', '$data[NoiDung]', $data[UrlHinh], date('Y-m-d H:i:s'), 1, 0";

		return insert($query);
	}
}