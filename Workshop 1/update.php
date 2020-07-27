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

	<title>SPONSOR AMOUNT</title>
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


	<table align = "center" width="50%" border="0" cellpadding="1" cellspacing="0">
	<br></br>
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
		
            <table align="center" border="0" width="70%" cellpadding="0" cellspacing="0">
              <td><hr></td>
              <td width="30%" align="center"><h2><font color="#000063">Update Sponsor Amount</font></h2></td>
              <td><hr></td>
            </table>
			<br></br>
            <!-- Register Books Content -->
            <form action="update_action.php" method="post" align="center">
              <table align="center" border="0" width="33%" cellpadding="7" cellspacing="0">
                <tr>
                  <th align="center" width="30%">Event Name</th>
				  <td><input type = "hidden" name = "eventid" value="<?php echo $data ["EventId"];?>"><?php echo $data ["EventName"];?></td>
                 </tr>
				<tr>
                  <th align="center" width="30%">Event Cost ($)</th>
                  <td><?php echo $data ["Cost"];?></td>
                </tr>
				<tr>
                  <th align="center" width="30%">Start Date</th>
                  <td><?php echo $data ["StartDate"];?></td>
                </tr>
				<tr>
                  <th align="center" width="30%">Start Time</th>
                  <td><?php echo $data ["StartTime"];?></td>
                </tr>
				<tr>
				  <th align="center">First Name</th>
                  <td><?php echo $_SESSION ["FirstName"];?> &nbsp <?php echo $_SESSION ["LastName"];?></td>
                </tr>
                <tr>
                  <th align="center" width="30%">Amount Sponsored ($)</th>
                  <td><input class="Minput" type="number" name="sponsoramount" step = "0.10" value="<?php echo $data ["SponsorAmount"];?>" autofocus required></td>
                </tr>
				<tr>
				  <th align="center">Date Registered</th>
				  <td><input name = "date" value="<?php echo date("Y-m-d");?>" size = "10" readonly></td>
                </tr>
                <tr>
                  <td></td>
                  <td><input class="Lbtn" type="submit" name="submit" value="SUBMIT"></td>
                </tr>
              </table>
			</form>
			
			<br></br><br></br><br></br>
		  
</body>
</html>