<?php 
	require_once("new_config.php");
	class Database {
		public $connection; // Makes this variable public
		// Runs automatically to connect to the database.
		function __construct(){
			$this->connection = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);
			if($this->connection->connect_errno) {
				die("Database not connected" . $this->connection->connect_error);
			}
		}
		// Runs a query to Mysql Databse
		public function query($sql) {
			$result = $this->connection->query($sql);
			$this->confirm_query($result);
			return $result;		
		}
		// Confirms that the query has been successful
		public function confirm_query($result) {
			if(!$result){
				die("Query Failed " . $this->connection->error);
			}			
		}
		// Stops hackers from injecting code into our Database
		public function escape_string($string){
			$escaped_string = $this->connection->real_escape_string($string);
			return $escaped_string;
		}
		// Insert Id
		public function insert_id(){
			return $this->connection->insert_id;
		}


}
// Creates a instance of the database
$database = new Database();
?>