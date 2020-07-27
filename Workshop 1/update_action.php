<?php
session_start();
include "connectionworkshop.php";

$sponsoramount = $_POST ["sponsoramount"];
$eventid = $_POST ["eventid"];
$userid = $_SESSION ["UserId"];
$registrationdate = $_POST['date'];


$sql = "SELECT Cost
		FROM event
		WHERE EventId = '$eventid'";
		
$execute = mysqli_query ($conn, $sql) or die (mysqli_error($conn));

$data = mysqli_fetch_assoc ($execute); 

$sql2 = "SELECT SponsorAmount
		FROM event
		WHERE EventId = '$eventid'";
		
$execute2 = mysqli_query ($conn, $sql2) or die (mysqli_error($conn));

$data2 = mysqli_fetch_assoc ($execute2); 

if ($data2 ['SponsorAmount'] == 0){

if ($data ['Cost'] <= $sponsoramount){
	
	$sql2 = "UPDATE event 
			SET SponsorAmount = '$sponsoramount' 
			WHERE EventId = '$eventid'";
		
	$sql3 = "INSERT INTO registration(RegistrationDate, UserId, EventId) 
			VALUES ('$registrationdate', '$userid', '$eventid')";
		
$execute2 = mysqli_query ($conn, $sql2) or die (mysqli_error($conn));
		
$execute3 = mysqli_query ($conn, $sql3) or die (mysqli_error($conn));

		echo "<script>alert('Amount Sponsored Success!');</script>";
		echo "<meta http-equiv='refresh' content='0; url=sponsored_done.php?EventId=$eventid'/>";
	}
	else{
		echo "<script>alert('Amount Sponsored Fail. Sponsor amount must more than cost!');</script>";
		echo "<meta http-equiv='refresh' content='0; url=sponsored.php'/>";
	}

}

else{
	echo "<script>alert('This Event Is Already Sponsored');</script>";
	echo "<meta http-equiv='refresh' content='0; url=sponsor.php'/>";
}

		
mysqli_close ($conn);
?>