<!DOCTYPE html>

<?php
session_start();
include "connectionworkshop.php";

$UserId = $_SESSION ["UserId"];
$sql = "SELECT UserId, FirstName, LastName, Gender, CountryCode, Email, CountryName
		FROM user
		JOIN country
		USING (CountryCode)
		WHERE UserId = '$UserId'";
				
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
					<td><input class="button" type="submit" value="Go Back"onclick="goBack()"></td>
					<td width="30%" align="center"><a href="changepass.php" class="menu">Change Password</a></td>
					<td width="37%" align="right"><a href="logout.php" class="menu" onClick="return confirm('Are You Sure?')">LOGOUT</a></td>			
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
              <td width="26%" align="center"><h2><font color="#000063">Your Profile</font></h2></td>
              <td><hr></td>
            </table>
			<br></br>
            <!-- Register Books Content -->
            <form action="editprofile.php" method="post" align="center">
              <table align="center" border="0" width="30%" cellpadding="8" cellspacing="0">
                <tr>
                  <th align="center" width="50%">First Name</th>
				  <td><?php echo $data ["FirstName"];?></td>
                 </tr>
				<tr>
                  <th align="center">Last Name</th>
                  <td><?php echo $data ["LastName"];?></td>
                </tr>
				<tr>
                  <th align="center">Gender</th>
                  <td><?php echo $data ["Gender"];?></td>
                </tr>
				<tr>
                  <th align="center">Country</th>
                  <td><?php echo $data ["CountryName"];?></td>
                </tr>
				<tr>
				  <th align="center">Email</th>
                  <td><?php echo $data ["Email"];?></td>
                </tr>				
                </table>
				<br></br>
				</tr>
				<td></td>
                  <td><input class="Lbtn" type="submit" name="submit" value="EDIT PROFILE"></td>
                </tr>			
			</form>
			
					
			<br></br><br></br><br></br>

</body>
</html>