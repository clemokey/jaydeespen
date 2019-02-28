<?php 
Class Connection{
	

	public function connect(){

		$servername = "localhost";
		$username = "root";
		$password = "";
		$db = "jaydeesp_2018";
		$conn = new mysqli($servername, $username, $password, $db);
		if (!$conn){
			die("unable to connect to db");

		}
		return $conn;
	}

	
}
?>