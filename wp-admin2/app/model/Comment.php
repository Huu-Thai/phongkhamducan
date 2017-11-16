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
}