<?php 

class Category extends DB {
	protected $table = 'loai';
	protected $primayKey = 'idLoai';

	function getCategory(){

		$query = "SELECT idLoai, TieuDe FROM $this->table WHERE Parent = 0 AND AnHien = 1";

		return $this->result($query);
	}

	function getChildCategory($parentId){

		$query = "SELECT idLoai, TieuDe FROM $this->table WHERE Parent = $parentId AND AnHien = 1";

		return $this->result($query);
	}

	
}