<!DOCTYPE html>

<?php
session_start();
include "connectionworkshop.php";

$eventid = $_GET ['EventId'];
$sql = "SELECT EventId, EventName, StartDate, StartTime, SponsorAmount, Cost 
		FROM event 
		WHERE EventId = '$eventid'";
				
$result = mysqli_query ($conn, $sql) or die (mysqli_error ($conn));
$data = mysqli_fetch_assoc ($result);



mysqli_close ($conn);
?>

<html>

<head>

	<title>Full Marathon</title>
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

	<table align = "center" width="48%" border="0" cellpadding="1" cellspacing="0">
                <tr>
					<td width="8%" align="center"><a href="sponsor.php" class="menu">HOME</a></td>
					<td width="80%" align="right"><a href="logout.php" class="menu" onClick="return confirm('Are You Sure?')">LOGOUT</a></td>			
                </tr>
	</table>
		  
		<br></br>
		
            <table align="center" border="0" width="70%" cellpadding="0" cellspacing="0">
              <td><hr></td>
              <td width="30%" align="center"><h2><font color="#000063">Sponsor Amount Details</font></h2></td>
              <td><hr></td>
            </table>
			<br></br>
            <!-- Register Books Content -->
            <form action="update_action.php" method="post" align="center">
              <table align="center" border="0" width="30%" cellpadding="8" cellspacing="0">
                <tr>
                  <th align="center" width="50%">Event Name</th>
				  <td><input type = "hidden" name = "eventid" value="<?php echo $data ["EventId"];?>"><?php echo $data ["EventName"];?></td>
                 </tr>
				<tr>
                  <th align="center">Event Cost ($)</th>
                  <td><?php echo $data ["Cost"];?></td>
                </tr>
				<tr>
                  <th align="center">Start Date</th>
                  <td><?php echo $data ["StartDate"];?></td>
                </tr>
				<tr>
                  <th align="center">Start Time</th>
                  <td><?php echo $data ["StartTime"];?></td>
                </tr>
				<tr>
				  <th align="center">First Name</th>
                  <td><?php echo $_SESSION ["FirstName"];?> &nbsp <?php echo $_SESSION ["LastName"];?></td>
                </tr>
                <tr>
                  <th align="center" width="30%">Amount Sponsored ($)</th>
                  <td><?php echo $data ["SponsorAmount"];?></td>
                </tr>
				<tr>
                  <th align="center" width="30%"></th>
                  <td><a href = "slip.php?EventId=<?php echo $eventid; ?>">Print Slip</a></td>
                </tr>
              </table>
			</form>
			
			<br></br><br></br><br></br>
</body>
</html>