<?php
	class koneksi{
		//mendekelarisakn variable
		var $host = "localhost";
		var $username = "root";
		var $password = "";
		var $database = "dbtokobuku";
		//membuat konstruk class
		function __construct(){
			//melakukan koneksi
			mysql_connect($this->host, $this->username, $this->password);
			mysql_db_select($this->database);
		}
		
	
?>