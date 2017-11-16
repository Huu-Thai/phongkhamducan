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

	public function deletFormat($string){

		$string = trim(trip_tags($string));

		return mysqli_real_escape_string($string);
	}

}