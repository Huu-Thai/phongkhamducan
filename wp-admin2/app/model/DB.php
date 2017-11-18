<?php 

abstract class DB {
	private $host = 'localhost';
	private $username = 'root';
	private $password = '';
	private $database = 'admin_webseo';
	public $conn;

	function __construct(){
		$this->conn = mysqli_connect($this->host,$this->username,$this->password,$this->database);

		if(!$this->conn){
			echo "Error: Unable to connect to MySQL." . PHP_EOL;
			echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
			echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
			exit;
		}
		mysqli_query($this->conn, 'SET names "utf8"');
	}

	function findId($id){
		$query = "SELECT * FROM $this->table WHERE $this->primaryKey = $id";

		$result = mysqli_query($this->conn, $query);
		if($result){
			if(mysqli_num_rows($result) > 0){
				return mysqli_fetch_assoc($result);
			}
		}
		
		return false;
	}

	function insert($query){

		if(mysqli_query($this->conn, $query)){

			return mysqli_insert_id($this->conn);
		}

		return false;
	}

	function result($query){

		$result = mysqli_query($this->conn, $query);

		if($result){
			if(mysqli_num_rows($result)){
				return $result;
			}
		}

		return false;
	}

	function alterColumn($query){

		if(mysqli_query($this->conn, $query)){

			return true;
		}

		return false;
	}

	public function deleteFormat($string){

		$string = trim(strip_tags($string));

		return mysqli_real_escape_string($this->conn, $string);
	}

	function stripUnicode($str){
		$str = str_replace(array(',', '<', '>', '&', '{', '}', '*', '?', '/', '"'), array(' '), $str);
		$str = mb_convert_case($str, MB_CASE_LOWER, "UTF-8");
		if(!$str) return false;
		$unicode = array
		(
			'a'=>'á|à|ả|ã|ạ|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ',
			'A'=>'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ằ|Ẳ|Ẵ|Ặ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
			'd'=>'đ',
			'D'=>'Đ',
			'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
			'E'=>'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
			'i'=>'í|ì|ỉ|ĩ|ị',
			'I'=>'Í|Ì|Ỉ|Ĩ|Ị',
			'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
			'O'=>'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
			'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
			'U'=>'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
			'y'=>'ý|ỳ|ỷ|ỹ|ỵ',
			'Y'=>'Ý|Ỳ|Ỷ|Ỹ|Ỵ'
			);

		foreach($unicode as $khongdau=>$codau)
		{
			$arr = explode("|",$codau);
			$str = str_replace($arr,$khongdau,$str);
			$str = trim(strip_tags($str));
			if (get_magic_quotes_gpc()== false) {
				$str = mysql_real_escape_string($str);
			}
			$str = preg_replace('/\s+/',' ',$str);
			$str = str_replace(" ","-",$str);
		}
		return $str;
	}

	function cutString($string, $size, $type = '...'){

		$string = trim($string);
		$strlen = strlen($string);

		$str = substr($string, $size, 20);
		$arr = explode(' ', $str);
		$a = strlen($arr[0]);

		$sub = substr($string, 0, $size + $a);
		if($strlen - $size > 0)
			$sub .= $type;
		
		return $sub;
	}

	function pageList($totalRow , $pageNum = 1, $pageSize = 5, $offset = 5){
		$baseUrl = $_SERVER['PHP_SELF'];
		parse_str($_SERVER['QUERY_STRING'], $arr);

		foreach($arr as $key => $value){
			$str .= "$key=$value";
		}
		$baseUrl .= $str;

		if($totalRow <= 0){
			return '';
		}
		$totalPage = ceil($totalRow/$pageSize);

		if($totalPage <= 1){
			return '';
		}

		$firstLink="";  $prevLink="";  $lastLink="";  $nextLink="";
		if($pageNum > 1){
			$firstLink = "<a href='$baseURL'><img src='img/phantrang_first.png' width=16px height=16px /></a>";
			$prevPage = $pageNum - 1;
			$prevLink="<a href='$baseURL&pageNum=$prevPage'><img src='img/phantrang_previous.png' width=16px height=16px /></a>";
		}

		$from = $pageNum - $offset;
		$to = $pageNum + $offset;
		if($from <= 0 ){
			$from = 1;
			$to = $offset*2;
		}
		if($to > $totalPage){

			$to = $totalPage;
		}
		$link = '';

		for($j = $from; $j <= $to; $j++){
			
		}
	}

}