<?php

class Comment extends DB {
	protected $table = 'binhluan';
	protected $primaryKey = 'idBL';


	public function getComment(){
		$query = "SELECT bl.*, tt.TieuDe, tt.idTT 
		FROM $this->table AS bl
		INNER JOIN tintuc AS tt 
		ON tt.idTT = bl.idBaiViet
		";

		$result = mysqli_query($this->conn, $query);

		if($result){
			if(mysqli_num_rows($result) > 0){
				return $result;
			}
		}
		return false;
	}

	public function getAllComment(&$totalRow, $pageNum, $pageSize, $SoDT, $HoTen){

		$startRow = ($pageNum-1)*$pageSize;
		$where = '';

		if ($SoDT != ""){
			$where = " AND SoDT like '%$SoDT%' ";
		}

		if ($HoTen != ""){
			$where .= " AND HoTen like '%$HoTen%' ";
		}

		$query = "SELECT bl.*, tt.TieuDe, tt.idTT 
		FROM  $this->table AS bl
		LEFT JOIN tintuc AS tt 
		ON tt.idTT = bl.idBaiViet
		Where 1=1 $where
		ORDER BY $this->primaryKey DESC
		LIMIT $startRow , $pageSize
		";

		$result = $this->result($query);
		$query = "SELECT count(*) FROM  $this->table Where 1=1 $where";

		$rs= $this->result($query);
		$totalRow = mysqli_fetch_row($rs)[0];

		return $result;

	}
}