<!DOCTYPE html>

<?php
session_start();
include "connectionworkshop.php";

$userid = $_SESSION ["UserId"];

$sql = "SELECT event.EventId, EventName, StartDate, StartTime, Cost, MaxParticipant, SponsorAmount, RegistrationId, user.UserId, eventtype.EventTypeName
		FROM event, registration , user, eventtype 
		WHERE event.EventId = registration.EventId
		AND registration.UserId = user.UserId
		AND event.EventTypeId = eventtype.EventTypeId
		AND user.UserId = $userid";
							  
$execute = mysqli_query ($conn, $sql) or die (mysqli_error ($conn));

$sql1 = "SELECT SUM(SponsorAmount) AS TotalSponsored
		FROM event
		JOIN registration
		USING(EventId)
		WHERE UserId = $userid";
		
$execute1 = mysqli_query ($conn, $sql1) or die (mysqli_error ($conn));

$data = mysqli_fetch_assoc ($execute1);

if(mysqli_num_rows($execute) > 0){
	echo "<meta url=eventorgtusponsor.php'/>";
}

else{
	echo "<script>alert('You does not sponsor any event yet.');</script>";
	echo "<meta http-equiv='refresh' content='0; url=sponsor.php'/>";
}

mysqli_close ($conn);
?>

<html>

<head>

	<title>List Sponsored</title>
	<link rel="icon" href="logo.png" type="image/gif" sizes="16x16">
	<link rel = "stylesheet" type = "text/css" href = "interface.css">
	
</head>

<body>

<table align = center border="0" width="0" cellpadding="0" cellspacing="0">
            <tr>
			<br></br>
            <td><img class="logo" src="logo2018.png" alt="Logo" style="width:370px;height:160px;"></td>
            </tr>
</table>

<br></br>

	<table align = "center" width="50%" border="0" cellpadding="1" cellspacing="0">
                <tr>
					<td><input class="button" type="submit" value="Go Back"onclick="goBack()"></td>
					<td width="20%" align="right"><a href="logout.php" class="menu" onClick="return confirm('Are You Sure?')">LOGOUT</a></td>			
                </tr>
	</table>

<script>
function goBack() {
    window.history.back();
}
</script>
		  
		  <br></br>
			<table align="center" border="0" width="70%" cellpadding="0" cellspacing="0" >
              <td width="25%" style="font-size: 130%"> Total sponsored amount : </td>
              <td width="30%" style="font-size: 130%">$ <?php echo $data ["TotalSponsored"]; ?></td>
              <td></td>
            </table>
		  
	<?php 
		if (mysqli_num_rows ($execute) > 0){
					
	?>

            <table align="center" border="0" width="70%" cellpadding="0" cellspacing="0">
              <td><hr></td>
              <td width="30%" align="center"><h2><font color="#000063">List Of Event You Sponsored</font></h2></td>
              <td><hr></td>
            </table>
			
            <!-- List of Books Content -->
            <form action="" method="post">
              <table align="center" border="0" width="90%" cellpadding="5" cellspacing="0">
                <tr align="center">
                  <th  width="7%" style="background-color: #ededed;"><p></p>No.<p></p></th> 
                  <th  style="background-color: #ededed;"><p></p>Event Name<p></p></th>
				  <th  style="background-color: #ededed;"><p></p>Start Date<p></p></th>
				  <th  style="background-color: #ededed;"><p></p>Start Time<p></p></th>
				  <th  style="background-color: #ededed;"><p></p>Event Cost ($)<p></p></th>
				  <th  style="background-color: #ededed;"><p></p>Maximum Participant<p></p></th>
				  <th  style="background-color: #ededed;"><p></p>Sponsor Amount ($)<p></p></th>
				  <th  style="background-color: #ededed;"><p></p>Event Type Name<p></p></th>
                </tr>
				
			<?php
				$rowNum = 1;
				while ($row = mysqli_fetch_assoc ($execute)){
					 
			?>
				
                <tr>
                  <td style="border-bottom: 1px solid #b3b3b3;" align="center"> <?php echo $rowNum; ?><p></p></td>
                  <td style="border-bottom: 1px solid #b3b3b3;" align="center"> <?php echo $row ["EventName"]; ?> </td>
				  <td style="border-bottom: 1px solid #b3b3b3;" align="center"> <?php echo $row ["StartDate"]; ?> </td>
				  <td style="border-bottom: 1px solid #b3b3b3;" align="center"> <?php echo $row ["StartTime"]; ?> </td>
				  <td style="border-bottom: 1px solid #b3b3b3;" align="center"> <?php echo $row ["Cost"]; ?> </td>
				  <td style="border-bottom: 1px solid #b3b3b3;" align="center"> <?php echo $row ["MaxParticipant"]; ?> </td>
				  <td style="border-bottom: 1px solid #b3b3b3;" align="center"> <?php echo $row ["SponsorAmount"]; ?> </td>
				  <td style="border-bottom: 1px solid #b3b3b3;" align="center"> <?php echo $row ["EventTypeName"]; ?> </td>
                </tr>
				
			<?php
				$rowNum ++;
				}
			?>
			
              </table>
			  
			 <?php
			  }else {
				  echo "No record found!";
			  }
			 ?>
			
            </form>
			
			
	<br></br><br></br><br></br>

</body>
</html>