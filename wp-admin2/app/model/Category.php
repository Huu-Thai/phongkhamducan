<?php 

class Category extends DB {
	protected $table = 'loai';
	protected $primayKey = 'idLoai';

	function store($data){
		
		$query = "INSERT INTO $this->table(`TieuDe`, `TieuDeKD`, `UrlHinh`, `TomTat`, `Title`, `Des`, `Keyword`, `Parent`, `AnHien`, `Menu`, `Home`, `ThuTu`) VALUES ('$data[TieuDe]', '$data[TieuDeKD]', '$data[UrlHinh]', '$data[TomTat]', '$data[Title]', '$data[Des]', '$data[Keyword]', $data[Parent], 0, 0, 1, 99)";

		return $this->insert($query);
	}

	function getCategory(){

		$query = "SELECT idLoai, TieuDe FROM $this->table WHERE Parent = 0 AND AnHien = 1";

		return $this->result($query);
	}

	function getChildCategory($parentId){

		$query = "SELECT idLoai, TieuDe FROM $this->table WHERE Parent = $parentId AND AnHien = 1";

		return $this->result($query);
	}


	
}