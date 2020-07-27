<!DOCTYPE html>

<?php
session_start();
include "connectionworkshop.php";

	if (isset ($_POST['join'])){
		$registrationdate = $_POST['date'];
		$userid = $_SESSION ["UserId"];
		$eventid = $_POST['eventid'];
		
	$sql4 = "SELECT COUNT(EventId) AS TotalJoin
			FROM registration
			WHERE EventId = '$eventid'";
	
	$execute4 = mysqli_query ($conn,$sql4) or die (mysqli_error ($conn));
	
	$data4 = mysqli_fetch_assoc ($execute4);
	
	$sql5 = "SELECT MaxParticipant
			FROM event
			WHERE EventId = '$eventid'";
			
	$execute5 = mysqli_query ($conn,$sql5) or die (mysqli_error ($conn));
	
	$data5 = mysqli_fetch_assoc ($execute5);
	
		if($data4 ['TotalJoin'] < $data5 ['MaxParticipant']){
			
			$sql3 = "INSERT INTO registration(RegistrationDate, UserId, EventId) 
			VALUES ('$registrationdate', '$userid', '$eventid')";
				
			$execute = mysqli_query ($conn,$sql3) or die (mysqli_error ($conn));
			
			echo "<script>alert('Join Success!');</script>";
			echo "<meta http-equiv='refresh' content='0; url=runnerdescription.php?EventId=$eventid'/>";
		}
		
		else{
			echo "<script>alert('Join Fail. Already maximum participant!');</script>";
			echo "<meta http-equiv='refresh' content='0; url=runner.php'/>";
		}
	}


	
$eventid = $_GET ['EventId'];
$sql = "SELECT EventId, EventName, StartDate, StartTime, SponsorAmount 
		FROM event 
		WHERE EventId = '$eventid'";

$result = mysqli_query ($conn, $sql) or die (mysqli_error ($conn));

$data = mysqli_fetch_assoc ($result);

mysqli_close ($conn);
?>


<html>

<head>

	<title>JOIN EVENT</title>
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
			<br></br>
            <td><img class="logo" src="logo2018.png" alt="Logo" style="width:370px;height:160px;"></td>
            </tr>
</table>

<br></br>

	<table align = "center" width="50%" border="0" cellpadding="1" cellspacing="0">
                <tr>
					<td><input class="button" type="submit" value="Go Back" onclick="goBack()"></td>
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
              <td></td>
              <td width="50%" align="center"><h2><font color="#000063">Join Event Registration</font></h2></td>
              <td></td>
            </table>
			<br></br>
            <!-- Register Books Content -->
            <form action="" method="post" align="center">
              <table align="center" border="0" width="28%" cellpadding="10" cellspacing="0">
                <tr>
                  <th align="left" width="30%">Event Name</th>
				  <th width="1%">:</th>
				  <td align="left"><input type = "hidden" name = "eventid" value="<?php echo $data ["EventId"];?>"><?php echo $data ["EventName"];?></td>
                 </tr>
                <tr>
                  <th align="left" width="30%">Start Date</th>
				  <th>:</th>
                  <td align="left"><?php echo $data ["StartDate"];?></td>
                </tr>
				<tr>
                  <th align="left" width="30%">Start Time</th>
				  <th>:</th>
                  <td align="left"><?php echo $data ["StartTime"];?></td>
                </tr>

				<tr>
				  <th align="left">First Name</th>
				  <th>:</th>
                  <td align="left"><?php echo $_SESSION ["FirstName"] ;?></td>
                </tr>
				
				<tr>
				  <th align="left">Last Name</th>
				  <th>:</th>
                  <td align="left"><?php echo $_SESSION ["LastName"];?></td>
                </tr>
				
				<tr>
				  <th align="left">Gender</th>
				  <th>:</th>
                  <td align="left"><?php echo $_SESSION ["Gender"];?></td>
                </tr>
				
				<tr>
				  <th align="left">Email</th>
				  <th>:</th>
                  <td align="left"><?php echo $_SESSION ["Email"];?></td>
                </tr>
				
				<tr>
				  <th align="left">Country</th>
				  <th>:</th>
                  <td align="left"><?php echo $_SESSION ["CountryName"];?></td>
                </tr>

				<tr>
				  <th align="left">Date Registered</th>
				  <th>:</th>
				  <td align="left"><input name = "date" value="<?php echo date("Y-m-d");?>" size = "10" readonly></td>
                </tr>
					  
                <tr>
                  <td></td>
				  <td></td>
                  <td align="left"><input class="Lbtn" type="submit" name="join" value="JOIN!"></td>
                </tr>
              </table>
			</form>
			
			<br></br><br></br><br></br>
		  
</body>
</html>