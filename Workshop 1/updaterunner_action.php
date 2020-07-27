<?php
session_start();
include "connectionworkshop.php";

$UserId = $_POST ["UserId"];
$FirstName = $_POST ["FirstName"];
$LastName = $_POST ["LastName"];
$Gender = $_POST ["Gender"];
$Country = $_POST ["CountryCode"];
$Email = $_POST ["Email"];

$sql = "UPDATE User 
		SET FirstName = '$FirstName' , LastName = '$LastName' , Gender = '$Gender', CountryCode = '$Country', Email = '$Email' 
		WHERE UserId = '$UserId'";

$execute = mysqli_query ($conn, $sql) or die (mysqli_error($conn));

		echo "<script>alert('Update Runner Information Success.');</script>";
		echo "<meta http-equiv='refresh' content='0; url=listrunner.php'/>";
?>