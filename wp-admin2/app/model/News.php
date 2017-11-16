<?php

class News extends DB {
	protected $table = 'tintuc';
	protected $primaryKey = 'idTT';

	function store(){

		// $query = "INSERT INTO $this->table(`idTT`, `idCL`, `idLoai`, `idCon`, `TieuDe`, `TieuDeKD`, `Title`, `Des`, `Keyword`, `TomTat`, `NoiDung`, `UrlHinh`, `NgayDang`, `AnHien`, `LuotXem`) 
		// 		VALUES ( )";

		// return insert($query);
	}
}