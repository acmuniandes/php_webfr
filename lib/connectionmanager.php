<?php
class ConnectionManager{
	
	private $conn;
	
	public function __construct(){
		try{
			$this->conn = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PASSWORD);
			$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch (Exception $e) {
  			die("Unable to connect: " . $e->getMessage());
		}
	}
	
	public function getConnection(){
		return $this->conn;
	}
		
	public function executePreparedStmt($sql, $data, $queryFlag){
		try {
			$sth = $this -> conn -> prepare($sql);
			$sth -> execute($data);
			if($queryFlag){
				return $sth -> fetchAll(PDO::FETCH_ASSOC);
			} else {
				return $sth -> rowCount();
			}
		} catch (Exception $e) {
			echo "sql: $sql <br>";
			var_dump($data);
			die("Unable to execute sql: " . $e->getMessage());
		}
	}
	
	public function executeStmt($sql, $queryFlag){
		try {
			if($queryFlag){
				return $this->conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);
			} else {
				return $this->conn->query($sql)->rowCount();
			}
		} catch (Exception $e) {
			echo "sql: $sql <br>";
			die("Unable to execute sql: " . $e->getMessage());
		}
	}
	
	public function __destruct(){
		$this->conn = null;
	}
	
}