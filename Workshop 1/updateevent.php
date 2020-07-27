<!DOCTYPE html>

<?php
session_start();
include "connectionworkshop.php";

$EventId = $_GET ['EventId'];
$sql = "SELECT EventId, EventName, StartDate, StartTime, Cost, MaxParticipant, SponsorAmount, EventTypeId, EventTypeName
		FROM event NATURAL JOIN eventtype
		WHERE EventId = '$EventId'";	
							  
$result = mysqli_query ($conn, $sql) or die (mysqli_error ($conn));

$data = mysqli_fetch_assoc ($result);

$eventtype = " ";

$sql2 = "SELECT * 
		FROM eventtype";
		
$run = mysqli_query($conn,$sql2) or die (mysqli_error ($conn));

while($row = mysqli_fetch_assoc($run)){
$eventtype .= "<option value = 'EventTypeId'>{$row['EventTypeName']}</option>";
}

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

            <table align="center" border="0" width="50%" cellpadding="0" cellspacing="0">
              <td><hr></td>
              <td width="50%" align="center"><h2><font color="#000063">Update Event</font></h2></td>
              <td><hr></td>
			 
            </table>
            <!-- Register Books Content -->
            <form action="updateevent_action.php" method="post">
              <table align="center" border="0" width="33%" cellpadding="7" cellspacing="0">
			   <br></br>
                <tr>
                  <th align="center" width="40%">Event Name</th>
                  <td><input type = "hidden" name = "EventId" value="<?php echo $data ["EventId"];?>"><input class="Minput" type="text" maxlength="50" name="EventName" value="<?php echo $data ["EventName"];?>" autofocus required></td>
                </tr>
				<tr>
                  <th align="center" width="30%">Start Date</th>
                  <td><input class="Minput" type="date" name="StartDate" value="<?php echo $data ["StartDate"];?>" autofocus required></td>
                </tr>
                <tr>
				  <th align="center" width="30%">Start Time</th> 
				  <td><input class="Minput" type="time" name="StartTime" value="<?php echo $data ["StartTime"];?>" autofocus required></td>
				</tr>
                <tr>
                  <th align="center" width="30%">Event Cost</th>
                  <td><input class="Minput" type="number" name="Cost" step = "0.01" value="<?php echo $data ["Cost"];?>" autofocus required></td>
                </tr>
				<tr>
                  <th align="center" width="30%">Maximum Participant</th>
                  <td><input class="Minput" type="number" name="MaxParticipant" step = "0.01" value="<?php echo $data ["MaxParticipant"];?>" autofocus required></td>
				<tr>
				<tr>
                  <th align="center" width="30%">Sponsor Amount</th>
                  <td><input class="Minput" type="number" name="SponsorAmount" step = "0.01" value="<?php echo $data ["SponsorAmount"];?>" autofocus required></td>
                </tr>
				<tr>
                  <th align="center" width="30%">Event Type Name</th>
                  <td>
				  <select required name="EventTypeName">
				  <option value="<?php echo $data ["EventTypeName"];?>"><?php echo $data ["EventTypeName"];?></option>
				  <option name = "EventTypeId"  value="<?php echo $eventtype;?>"><?php echo $eventtype;?></option>
				  </select>
				  </td>
                </tr>
				<td></td>
				<td></td>
				</tr>
                <tr>
                  <td></td>
                  <td><input class="Lbtn" type="submit" name="submit" value="SUBMIT"></td>
                </tr>
              </table>
            </form>
			
			 <br><br><br><br>
			 
</body>
</html>