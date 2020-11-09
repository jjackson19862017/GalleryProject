<?php 
	require_once("new_config.php");
	class Database {
		public $connection; // Makes this variable public
		// Runs automatically to connect to the database.
		function __construct(){
			$this->connection = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
			if(mysqli_connect_errno()) {
				die("Database not connected" . mysqli_error());
			}
		}
		// Runs a query to Mysql Databse
		public function query($sql) {
			$result = mysqli_query($this->connection, $sql);
			return $result;		
		}
		// Confirms that the query has been successful
		public function confirm_query($result) {
			if(!$result){
				die("Query Failed");
			}			
		}
		// Stops hackers from injecting code into our Database
		public function escape_string($string){
			$escaped_string = mysqli_real_escape_string($this->connection, $string);
			return $escaped_string;
		}
}
// Creates a instance of the database
$database = new Database();
?>