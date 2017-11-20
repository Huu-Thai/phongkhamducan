<?php

class Phone extends DB {
	protected $table = 'sodienthoai';
	protected $primaryKey = 'id_sdt';

	public function getAll(&$totalRow, $pageNum, $pageSize, $sdt, $IP){

		$startRow = ($pageNum-1)*$pageSize;
		if ($sdt != ""){
			$where = " AND sdt like '%$sdt%' ";
		}

		if ($IP != ""){
			$where .= " AND IP like '%$IP%' ";
		}

		$query ="SELECT *
		FROM  $this->table
		Where 1=1 $where
		ORDER BY id_sdt DESC
		LIMIT $startRow , $pageSize
		";

		$result = $this->result($query);
		$query = "SELECT count(*)
		FROM  $this->table
		Where 1=1 $where 
		";

		$rs= $this->result($query);
		$totalRow = mysqli_fetch_row($rs)[0];

		return $result;

	}
}