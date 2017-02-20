<?php
/*************************************************************************
 * Copyright (c) 2017 GEC CS Department
 * Author: <Name> <Sem>
 * Purpose : This page is defines database connection
 * Created on : <Date of creation>
 * NOTICE:  All information contained herein is, and remains
 * the property of GEC Raipur CS Department. The intellectual and technical concepts contained
 * herein are originated as part Industry Orientation program.
 * Dissemination of this information or reproduction of this material
 * is restricted unless prior written permission is obtained
 * from GEC Raipur CS Department.
 */
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