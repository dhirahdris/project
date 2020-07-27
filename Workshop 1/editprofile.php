<!DOCTYPE html>

<?php
session_start();
include "connectionworkshop.php";

$UserId = $_SESSION ["UserId"];
$country = " ";
$sql = "SELECT UserId, FirstName, LastName, Gender, CountryCode, Email, CountryName
		FROM user
		JOIN country
		USING (CountryCode)
		WHERE UserId = '$UserId'";	
							  
$result = mysqli_query ($conn, $sql) or die (mysqli_error ($conn));

$data = mysqli_fetch_assoc ($result);

$sql1 = "SELECT CountryCode, CountryName
		FROM country";
		
$result1 = mysqli_query ($conn, $sql1) or die (mysqli_error ($conn));

while($row = mysqli_fetch_assoc ($result1)){
		  $country .= "<option value = '{$row['CountryCode']}'>{$row['CountryName']} </option>";
	}

if ($data['Gender'] == 'female'){
	$gender = "male";}
else{
	$gender = "female";}

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
              <td width="50%" align="center"><h2><font color="#000063">Edit Profile</font></h2></td>
              <td><hr></td>
			  
			  <table align="center" border="0" cellpadding="0" cellspacing="0"  style="font-size:17px">
                      <tr>
                        <td width="58%" align="left"><i><b><font color="#e00000">* </font><font color="black">All field required</font></b></i></td>
                      </tr>
			  </table>
			 
            </table>
            <!-- Register Books Content -->
            <form action="updateprofilerunner.php" method="post">
              <table align="center" border="0" width="33%" cellpadding="7" cellspacing="0">
			   <br></br>
                <tr>
                  <th align="center" width="40%">First Name</th>
                  <td><input type = "hidden" maxlength="25" name = "UserId" value="<?php echo $data ["UserId"];?>"><input class="Minput" type="text" name="FirstName" value="<?php echo $data ["FirstName"];?>" autofocus required></td>
                </tr>
				<tr>
                  <th align="center" width="30%">Last Name</th>
                  <td><input class="Minput" maxlength="25" type="text" name="LastName" value="<?php echo $data ["LastName"];?>" autofocus required></td>
                </tr>
                <tr>
                  <th align="center" width="30%">Gender</th>
				  <td> 
				  <select required name="Gender">
				  <option value="<?php echo $data ["Gender"];?>"><?php echo $data ["Gender"];?></option>
				  <option value="<?php echo $gender;?>"><?php echo $gender;?></option>
				  </select>
				  </td>
				</tr>
				<tr>
					<th align="center" width="30%">Country</th>
					<td> <select name = "CountryCode">
				  <option value ="<?php echo $data ["CountryName"];?>"><?php echo $data ["CountryName"];?></option>
				  <?php echo $country;?>
				<tr>
				<tr>
                  <th align="center" width="30%">Email</th>
                  <td><input class="Minput" type="text" name="Email" maxlength = "100" size = "30" step = "0.01" value="<?php echo $data ["Email"];?>" autofocus required></td>
				</tr>
				<tr>
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