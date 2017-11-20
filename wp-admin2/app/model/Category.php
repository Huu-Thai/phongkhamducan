<?php 

class Category extends DB {
	protected $table = 'loai';
	protected $primaryKey = 'idLoai';

	function store($data){
		
		$query = "INSERT INTO $this->table(`TieuDe`, `TieuDeKD`, `UrlHinh`, `TomTat`, `Title`, `Des`, `Keyword`, `Parent`, `AnHien`, `Menu`, `Home`, `ThuTu`) VALUES ('$data[TieuDe]', '$data[TieuDeKD]', '$data[UrlHinh]', '$data[TomTat]', '$data[Title]', '$data[Des]', '$data[Keyword]', $data[Parent], 0, 0, 1, 99)";

		return $this->insert($query);
	}

	function update($data){
		$query = "UPDATE $this->table
		SET TieuDe = '$data[TieuDe]',
		UrlHinh = '$data[UrlHinh]',
		TomTat = '$data[TomTat]',
		Title = '$data[Title]',
		Des = '$data[Des]',
		Parent = '$data[Parent]',
		Keyword = '$data[Keyword]',
		TieuDeKD = '$data[TieuDeKD]'
		WHERE $this->primaryKey = $data[idLoai]
		";
		return $this->execute($query) or die(mysqli_error($this->conn));
	}

	function getCategory(){

		$query = "SELECT idLoai, TieuDe FROM $this->table WHERE Parent = 0 AND AnHien = 1";

		return $this->result($query);
	}

	function getChildCategory($parentId){

		$query = "SELECT idLoai, TieuDe FROM $this->table WHERE Parent = $parentId AND AnHien = 1";

		return $this->result($query);
	}


	public function getParentId($childId){

		$query = "SELECT Parent, TieuDe FROM $this->table WHERE idLoai = $childId AND AnHien = 1";

		return $this->result($query);
	}

	public function getTieuDe($childId){

		$result = $this->getParentId($childId);
		if($result != false){

			return mysqli_fetch_assoc($result)['TieuDe'];
		}
		
	}

	// tìm đệ quy lên
	function findRecursive($childId){

		$result = $this->getParentId($childId);
		if($result != false){
			$row = mysqli_fetch_assoc($result);
			if($row['Parent'] == 0){
				return $childId;
			}else{
				return self::findRecursive($row['Parent']);
			}
		}
	}

	function findParentId($childId){

		$result = $this->getParentId($childId);
		if($result != false){
			return mysqli_fetch_assoc($result)['Parent'];
		}
		return 0;
	}

	function getAllCategory(&$totalRow, $pageNum, $pageSize, $TieuDe, $idCha =-1){
		$startRow = ($pageNum-1)*$pageSize;

		if ($TieuDe != ""){
			$query ="SELECT idLoai, TieuDe, AnHien, Parent, Menu, Home, ThuTu
			FROM  $this->table
			WHERE ($idCha = -1 OR Parent = $idCha ) and TieuDe like '%$TieuDe%'
			ORDER BY $this->primaryKey DESC
			LIMIT $startRow , $pageSize
			";

			$result = $this->result($query) or die (mysqli_error($this->conn));
			$query = "SELECT count(*)
			FROM  $this->table
			WHERE ($idCha = -1 OR Parent = $idCha ) and TieuDe like '%$TieuDe%'
			";
		}else{

			$query ="SELECT idLoai, TieuDe, AnHien, Parent, Menu, Home, ThuTu
			FROM  $this->table
			WHERE ($idCha = -1 OR Parent = $idCha ) 
			ORDER BY idLoai DESC
			LIMIT $startRow , $pageSize
			";

			$result = $this->result($query) or die (mysqli_error($this->conn));

			$query = "SELECT count(*) FROM  $this->table WHERE ($idCha = -1 OR Parent = $idCha )";

		}

		$rs = $this->result($query) or die(mysqli_error($this->conn));
		$totalRow = mysqli_fetch_row($rs)[0];

		return $result;
	}

	public function editIndex($table, $id, $doi){

		$query = "UPDATE $table SET ThuTu = $doi WHERE $this->primaryKey = $id";

		return $this->execute($query) or die(mysqli_error($this->conn));

	}


}