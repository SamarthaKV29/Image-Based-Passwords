<?php 
  	if(isset($_GET["uname"]) && isset($_GET["pass"])){
		
		$user = $_GET["uname"];
		$pass = $_GET["pass"];
		$mysqli = mysqli_connect("localhost", "user", "toor", "IMGbPsswds", 3306);
		if ($mysqli->connect_errno) {
			echo "Failed to connect to database: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
		}
		$q = "select * from data where username=".$user." and password=".$pass.";";
		if (!$mysqli->query($q)) {
			echo "Cannot create user! Check fields and retry.";
		}
		else{
			echo "Successfully logged in";	
		}
	}
  
 ?>
