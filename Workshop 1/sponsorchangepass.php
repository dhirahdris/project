
<!DOCTYPE html>

<?php
session_start();
	include 'connectionworkshop.php';
	if (isset ($_POST['change'])){
		$email = $_POST['email'];
		$oldpass = $_POST['oldpass'];
		$newpass = $_POST['newpass'];
		$newpass2 = $_POST['newpass2'];
		
	if($newpass == $newpass2){	
		
	$sql = "UPDATE user 
			SET Password = '$newpass2' 
			WHERE Email = '$email'";
		
	$execute = mysqli_query ($conn,$sql) or die (mysqli_error ($conn));
	
		if($execute){
			echo "<script>alert('Change Success!');</script>";
			echo "<meta http-equiv='refresh' content='0; url=profilesponsor.php'/>";
		}
		else{
			echo "<script>alert('Change Fail!');</script>";
			echo "<meta http-equiv='refresh' content='0; url=sponsorchangepass.php'/>";
		}
	
	}else{
			echo "<script>alert('Cannot Change Password!');</script>";
			echo "<meta http-equiv='refresh' content='0; url=profilesponsor.php'/>";

	}
	}

	mysqli_close ($conn);
?>

<html>

<head>

	<title>CHANGE PASS</title>
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


	<center>
	<form action="" method="post">


	<table align = "center" width="50%" border="0" cellpadding="1" cellspacing="0">
                <tr>
					<td><input class="button" type="submit" value="Go Back" onclick="goBack()"></td>	
                </tr>
	</table>

<script>
function goBack() {
    window.history.back();
}
</script>

                  <td width="30%"><h2><font color="#000063">CHANGE PASSWORD</font></h2>
				  
				  <table border="0" cellpadding="0" cellspacing="0"  style="font-size:17px">
                      <tr>
                        <td width="29%" align="left"><i><b><font color="#e00000">* </font><font color="black">All field required</font></b></i></td>
                      </tr>
				  </table>
				  
                    <table border="0" cellpadding="7" cellspacing="0" >
					  <tr>
						<td>EMAIL</td>
                        <td><input class="input" type="text" name="email" maxlength = "100" autofocus required></td>
                      </tr>
                      <tr>
						<td>OLD PASSWORD</td>
                        <td><input class="input" type="password" name="oldpass" maxlength = "25" autofocus required></td>
                      </tr> 
                      <tr>
                        <td>PASSWORD</td>
                        <td><input class="input" type="password" name="newpass" maxlength = "25" autofocus required></td>
                      </tr>
					  
					  <tr>
                        <td></td>
                        <td style = "font-style: italic">Use characters with a mix of letters & numbers</td>
                      </tr>
					  
                      <tr>
                        <td>CONFIRM PASSWORD</td>
                        <td><input class="input" type="password" name="newpass2" maxlength = "25" autofocus required></td>
                      </tr>
					  
					  <tr>
						<br/>
                        <td></td>
                        <td style = "font-style: italic">Retype your password</td>
                      </tr>
					  
                      <tr>
                        <td></td>
                        <td><br/><input class="btn" type="submit" name="change" value="CHANGE PASSWORD"></td>
                      </tr>
                    </table>
                  </td>
                  </form>
	
	<br></br><br></br><br></br><br></br><br></br><br></br>
</body>
</html>