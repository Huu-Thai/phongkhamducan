<?php 

class Banner extends DB {
	protected $table = 'quangcao';
	protected $primaryKey = 'idSlider';

	public function getAllSlider(&$totalRow, $pageNum, $pageSize, $TieuDe){

		$startRow = ($pageNum-1)*$pageSize;

		if ($TieuDe != ""){

			$query = "SELECT idSlider, TieuDe, UrlHinh, AnHien, ThuTu
			FROM  $this->table
			WHERE TieuDe like '%$TieuDe%'
			ORDER BY idSlider DESC
			LIMIT $startRow , $pageSize
			";

			$result = $this->result($query);
			$query = "SELECT count(*)
			FROM  $this->table
			WHERE TieuDe like '%$TieuDe%'
			";

		}else{

			$query = "SELECT idSlider, TieuDe, UrlHinh, AnHien, ThuTu
			FROM  $this->table
			ORDER BY idSlider DESC
			LIMIT $startRow , $pageSize
			";

			$result = $this->result($query);
			$query = "SELECT count(*) FROM  $this->table";
		}

		$rs = $this->result($query);
		$totalRow = mysqli_fetch_row($rs)[0];

		return $result;

	}


}