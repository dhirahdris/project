<?php
	$servername = "localhost";
	$email = "root";
	$password = "";
	$dbname = "marathon";
	
	//create connection
	$conn = mysqli_connect ($servername, $email, $password, $dbname);
	
	//check connection
	if (!$conn) {
		die ("connection failed" . mysqli_connect_error ());
	}
	
	else {
		//echo "connected sucessfully";  //echo sama mcm cout
	}
	
?>