<?php
session_start();
include "connectionworkshop.php";

$EventId = $_POST ["EventId"];
$EventName = $_POST ["EventName"];
$StartDate = $_POST ["StartDate"];
$StartTime = $_POST ["StartTime"];
$Cost = $_POST ["Cost"];
$MaxParticipant = $_POST ["MaxParticipant"];
$SponsorAmount = $_POST ["SponsorAmount"];
$EventTypeId = $_POST ["EventTypeId"];

$sql = "UPDATE event 
		SET EventName = '$EventName' , StartDate = '$StartDate' , StartTime = '$StartTime', Cost = '$Cost', MaxParticipant = '$MaxParticipant', SponsorAmount = '$SponsorAmount', EventTypeId = '$EventTypeId' 
		WHERE EventId = '$EventId'";

$execute = mysqli_query ($conn, $sql) or die (mysqli_error($conn));

		echo "<script>alert('Update Event Success.');</script>";
		echo "<meta http-equiv='refresh' content='0; url=listevent.php'/>";
?>