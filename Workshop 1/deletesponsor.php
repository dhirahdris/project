<?php
session_start();
include "connectionworkshop.php";

$UserId = $_GET ["UserId"];


$sql = "SELECT *
		FROM registration
		WHERE UserId = (SELECT UserId
						FROM user
						WHERE UserId = '$UserId')";

$execute = mysqli_query ($conn, $sql) or die (mysqli_error($conn));

if (mysqli_num_rows ($execute) > 0){
	echo "<script>alert('Delete Sponsor Fail because this sponsor sponsored an event!');</script>";
	echo "<meta http-equiv='refresh' content='0; url=listevent.php'/>";
}

else{
	
	$sql1 = "DELETE FROM user 
			WHERE UserId ='$UserId'";
	
	$execute1 = mysqli_query ($conn, $sql1) or die (mysqli_error($conn));

	echo "<script>alert('Delete Sponsor Success!');</script>";
	echo "<meta http-equiv='refresh' content='0; url=listevent.php'/>";
}

?>