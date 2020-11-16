<?php 
	require_once("new_config.php");
	class Database {
		public $connection; // Makes this variable public
		public $db;
		// Runs automatically to connect to the database.
		function __construct()
		{
			$this->db = $this->open_db_connection();
		}

		public function open_db_connection(){
			$this->db = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);
			if($this->db->connect_errno) {
				die("Database not connected" . $this->db->connect_error);
			}
			return $this->db;
		}
		// Runs a query to Mysql Databse
		public function query($sql) {
			$result = $this->db->query($sql);
			$this->confirm_query($result);
			return $result;		
		}
		// Confirms that the query has been successful
		public function confirm_query($result) {
			if(!$result){
				die("Query Failed " . $this->db->error);
			}			
		}
		// Stops hackers from injecting code into our Database
		public function escape_string($string){
			return $this->db->real_escape_string($string);
		}
		// Insert Id
		public function insert_id(){
			return $this->db->insert_id;
		}


}
// Creates a instance of the database
$database = new Database();
?>