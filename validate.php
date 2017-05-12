<?php 
	echo "<div class='section'>here</div>";
  	if(isset($_GET["uname"]) && isset($_GET["pass"]) && isset($_GET["emailid"])){
		
		$user = $_GET["uname"];
		$email = $_GET["em"];
		$pass = $_GET["pass"];
		$mysqli = mysqli_connect("localhost", "user", "toor", "IMGbPsswds", 3306);
		if ($mysqli->connect_errno) {
			echo "Failed to connect to database: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
		}
		if (!($stmt = $mysqli->prepare("INSERT INTO data('username','email','passphrase') VALUES (?,?,?)"))) {
			echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
		}
		if (!$stmt->bind_param("username", $user) && !$stmt->bind_param("email", $email) && !$stmt->bind_param("passphrase", $pass)) {
			echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
		}
		if (!$stmt->execute()) {
			echo "Cannot create user! Check fields and retry.";
		}
		else{
			echo "Successfully created user!";	
		}
	}
  
 ?>
