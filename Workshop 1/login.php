<?php

session_start();

include "connectionworkshop.php";

	$email= $_POST ['email'];
	$password = $_POST ['password'];
		
	$sql = "SELECT Email, Password 
				FROM user WHERE email = '$email' and password = '$password'";
	$sql2 = "SELECT UserId, Email, Password, FirstName, LastName, Gender, CountryCode, CountryName
				FROM user JOIN country USING (CountryCode) WHERE email = '$email' and password = '$password' and Type = 'admin'";
	$sql3 = "SELECT UserId, Email, Password, FirstName, LastName, Gender, CountryCode, CountryName
				FROM user JOIN country USING (CountryCode) WHERE email = '$email' and password = '$password' and Type = 'runner'";
	$sql4 = "SELECT UserId, Email, Password, FirstName, LastName, Gender, CountryCode, CountryName
				FROM user JOIN country USING (CountryCode) WHERE email = '$email' and password = '$password' and Type = 'sponsor'";				
	$execute = mysqli_query ($conn, $sql) or die (mysqli_error($conn));
	$execute2 = mysqli_query ($conn, $sql2) or die (mysqli_error($conn));
	$execute3 = mysqli_query ($conn, $sql3) or die (mysqli_error($conn));
	$execute4 = mysqli_query ($conn, $sql4) or die (mysqli_error($conn));
	
	//check row
	if(mysqli_num_rows($execute) == 1){
		
	echo "<script>alert('Login Success!');</script>";	
		
		if (mysqli_num_rows($execute2) == 1){
			
			while ($row = mysqli_fetch_assoc ($execute2)){
			
			//set the session
			$_SESSION ["UserId"] = $row ["UserId"];
			$_SESSION ["Email"] = $row ["Email"];
			$_SESSION ["password"] = $row ["Password"];
			$_SESSION ["FirstName"] = $row ["FirstName"];
			$_SESSION ["LastName"] = $row ["LastName"];
			$_SESSION ["Gender"] = $row ["Gender"];
			$_SESSION ["Country"] = $row ["CountryCode"];
			$_SESSION ["CountryName"] = $row ["CountryName"];
			 
		}
			echo "<meta http-equiv='refresh' content='0; url=listevent.php'/>";
		}
		
		else if (mysqli_num_rows($execute3) == 1){
			
			while ($row = mysqli_fetch_assoc ($execute3)){
			
			//set the session
			$_SESSION ["UserId"] = $row ["UserId"];
			$_SESSION ["Email"] = $row ["Email"];
			$_SESSION ["password"] = $row ["Password"];
			$_SESSION ["FirstName"] = $row ["FirstName"];
			$_SESSION ["LastName"] = $row ["LastName"];
			$_SESSION ["Gender"] = $row ["Gender"];
			$_SESSION ["Country"] = $row ["CountryCode"];
			$_SESSION ["CountryName"] = $row ["CountryName"];
			 
		}
			echo "<meta http-equiv='refresh' content='0; url=runner.php'/>";
		}
	
		else if (mysqli_num_rows($execute4) == 1){
			
			while ($row = mysqli_fetch_assoc ($execute4)){
			
			//set the session
			$_SESSION ["UserId"] = $row ["UserId"];
			$_SESSION ["Email"] = $row ["Email"];
			$_SESSION ["password"] = $row ["Password"];
			$_SESSION ["FirstName"] = $row ["FirstName"];
			$_SESSION ["LastName"] = $row ["LastName"];
			$_SESSION ["Gender"] = $row ["Gender"];
			$_SESSION ["Country"] = $row ["CountryCode"];			
			$_SESSION ["CountryName"] = $row ["CountryName"];
			 
		}
			
			echo "<meta http-equiv='refresh' content='0; url=sponsor.php'/>";
		}
		
	}else{
		
		echo "<script>alert('Login Failed!');</script>";
		echo "<meta http-equiv='refresh' content='0; url=index.php'/>";
		
	}
	
mysqli_close ($conn);
	
?>