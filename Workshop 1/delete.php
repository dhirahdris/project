<?php
session_start();
include "connectionworkshop.php";

$eventId = $_GET ['EventId'];

$sql1 = "SELECT *
		 FROM registration
		 WHERE EventId = (SELECT EventId
						  FROM event
						  WHERE EventId = '$eventId')";




$execute1 = mysqli_query ($conn, $sql1) or die (mysqli_error($conn));

if (mysqli_num_rows ($execute1) > 0){
	echo "<script>alert('Delete Event Fail! There are participants join this event.');</script>";
	echo "<meta http-equiv='refresh' content='0; url=delevent.php'/>";
}

else{
	
	$sql = "DELETE FROM event WHERE EventId ='$eventId'";
	
	$execute = mysqli_query ($conn, $sql) or die (mysqli_error($conn));

	echo "<script>alert('Delete Event Success!');</script>";
	echo "<meta http-equiv='refresh' content='0; url=listevent.php'/>";
}

?>