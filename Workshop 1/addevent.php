<!DOCTYPE html>

<?php
session_start();
include "connectionworkshop.php";

if (isset ($_POST['register'])){
	
		$eventid = $_POST ["eventid"];
		$eventname = $_POST['eventname'];
		$startdate = $_POST['startdate'];
		$starttime = $_POST['starttime'];
		$cost = $_POST['cost'];
		$maxparticipant = $_POST['maxparticipant'];
		$eventtypeid = $_POST['eventtypeid'];
		
		
	$sql = "INSERT INTO event(EventId, EventName, StartDate, StartTime, Cost, MaxParticipant, SponsorAmount, EventTypeId) 
				VALUES ('$eventid', '$eventname', '$startdate', '$starttime', '$cost', '$maxparticipant', '', '$eventtypeid')";
				
		$execute = mysqli_query ($conn,$sql) or die (mysqli_error ($conn));
		
		if($execute){
			echo "<script>alert('Add Event Success!');</script>";
			echo "<meta http-equiv='refresh' content='0; url=listevent.php'/>";
		}
		else{
			echo "<script>alert('Add Event Fail!');</script>";
		}
	}

mysqli_close ($conn);
?>


<html>

<head>

	<title>ADD EVENT</title>
	<link rel="icon" href="logo.png" type="image/gif" sizes="16x16">
	<link rel = "stylesheet" type = "text/css" href = "interface.css">
	
</head>

	<!-- remove underline at link -->
		<head>
		<style>
		a:link {
			text-decoration: none;
		}

		a:visited {
			text-decoration: none;
		}

		a:hover {
			text-decoration: underline;
		}

		a:active {
			text-decoration: underline;
		}
		</style>
		</head>

<body>

<table align = center border="0" width="0" cellpadding="0" cellspacing="0">
            <tr>
			    <td><img class="logo" src="logo2018.png" alt="Logo" style="width:370px;height:160px;"></td>
            </tr>
</table>

	<div class="header">
        <?php include 'menuadmin.php'; ?>
    </div>

<br></br>

	  
		  
	<center>
	<form action="" method="post">

<br></br>

                  <td width="30%"><h2><font color="#000063">ADD AN EVENT</font></h2>
				  
				  <table align="center" border="0" cellpadding="0" cellspacing="0"  style="font-size:17px">
                      <tr>
                        <td width="38%" align="left"><i><b><font color="#e00000">* </font><font color="black">All field required</font></b></i></td>
                      </tr>
			      </table>
				  <br></br>
				  
                    <table border="0" cellpadding="7" cellspacing="0" >
					  <tr>
						<th>Event Id</th>
                        <td><input class="input" type="text" name="eventid" size = "10" maxlength="6" autofocus required></td>
                      </tr>
			  
                      <tr>
						<th>Event Name</th>
                        <td><input class="input" type="text" name="eventname" size = "40" maxlength="50" autofocus required></td>
                      </tr>
									  
					  <tr>
                        <th>Start Date</th>
                        <td><input class="input" type="date" name="startdate" style="text-transform: uppercase;" autofocus required></td>
                      </tr>
					  
					   <tr>
                        <th>Start Time</th>
						<td><input class="input" type="time" name="starttime" style="text-transform: uppercase;" autofocus required></td> 
                      </tr>
		  
					   <tr>
                        <th>Cost Event ($)</th>
						<td><input class="email" type="number" step = "0.01" name="cost"  autofocus required></td>
					   </tr>

					   <tr>
                        <th>Maximum Participant</th>
						<td><input class="email" type="number" step = "1.00" name="maxparticipant" maxlength="4" autofocus required></td>
					   </tr>
					   
					   <tr>
                        <th>Event Type</th>
						<td>
						  <input required type="radio" name="eventtypeid" value="FM" checked> Full Marathon<br>
						  <input required type="radio" name="eventtypeid" value="FR"> 5km Fun Run<br>
						  <input required type="radio" name="eventtypeid" value="HM"> Half Marathon
						</td>
					   </tr>
			  
                      <tr>
                        <td></td>
                        <td><br/><input class="btn" type="submit" name="register" value="ADD EVENT"></td>
                      </tr>
                    </table>
                  </td>
                  </form>
	
	<br></br><br></br><br></br><br></br><br></br><br></br>
	
</center>
</body>
</html>