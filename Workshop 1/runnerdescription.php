<!DOCTYPE html>

<?php
session_start();
include "connectionworkshop.php";

$eventid = $_GET ['EventId'];
$sql = "SELECT EventId, EventName, StartDate, StartTime, SponsorAmount 
		FROM event 
		WHERE EventId = '$eventid'";
		
$sql2 = "SELECT FirstName, LastName, Gender, Email, CountryCode, CountryName
		 FROM user
		 JOIN country
		 USING (CountryCode)";
		
$result = mysqli_query ($conn, $sql) or die (mysqli_error ($conn));
$result2 = mysqli_query ($conn, $sql2) or die (mysqli_error ($conn));


$data = mysqli_fetch_assoc ($result);
$data2 = mysqli_fetch_assoc ($result2);



		

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

	<table align = "center" width="48%" border="0" cellpadding="1" cellspacing="0">
                <tr>
					<td width="8%" align="center"><a href="runner.php" class="menu">HOME</a></td>
					<td width="80%" align="right"><a href="logout.php" class="menu" onClick="return confirm('Are You Sure?')">LOGOUT</a></td>			
                </tr>
	</table>

		<br></br>
		  
		  <table align="center" border="0" width="50%" cellpadding="0" cellspacing="0">
              <td></td>
              <td width="50%" align="center"><h2><font color="#000063">Join Event Description</font></h2></td>
              <td></td>
            </table>
			<br></br>
            <!-- Register Books Content -->
            <form action="" method="post" align="center">
              <table align="center" border="0" width="28%" cellpadding="10" cellspacing="0">
                <tr>
                  <th align="left" width="30%">Event Name</th>
				  <th width="1%">:</th>
				  <td align="left"><input type = "hidden" name = "EventId" value="<?php echo $data ["EventId"];?>"><?php echo $data ["EventName"];?></td>
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
                  <td align="left"><?php echo date("d/m/Y");?></td>
                </tr>
				<tr>
				  <th></th>
                  <th  width="30%"></th>
				  <td align="left"><a href = "slip2.php?EventId=<?php echo $eventid; ?>">Print Slip</a></td>
                </tr>
              </table>
			</form>
			
			<br></br><br></br><br></br>
		  
</body>
</html>