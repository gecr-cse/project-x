<?php

class DbConnection {

	var $host;			// Database hostname
	var $user;			// Database username
	var $password;		// Database password
	var $db;			// Database name
	var $connected;		// Flag indicates whether the database is connected right now or not
	var $newLink;		// To open new connection link
	
	/* CONSTRUCTOR FUNCTION */
	function dbConnect($host = null, $user = null, $password = null, $db = null) {
		$this->connected = false;
		$this->host = $host;
		
		$this->user = $user;
		$this->password = $password;
		$this->db = $db;
		
		// Get the connection
		$this->dbConn = @mysqli_connect($this->host, $this->user, $this->password) or $this->dbError->throwErr("Connection Failed");
		
		if($this->dbConn) {
			// Set connected flag
			$this->connected = true;

			// Select database
			if(!is_null($this->db)) {
				mysqli_select_db($this->dbConn,$this->db) or $this->dbError->throwErr("Database Selection Failed");
				return $this->dbConn;
			}
		}
	}
}
?>