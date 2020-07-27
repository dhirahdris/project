
<!DOCTYPE html>

<?php
	include 'connectionworkshop.php';
	if (isset ($_POST['register'])){
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$gender = $_POST['gender'];
		$type = $_POST['type'];
		$country = $_POST['countrycode'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$retypepassword = $_POST['password2'];
		
	if($password == $retypepassword){	
		
	$sql = "INSERT INTO user(FirstName, LastName, Gender, Email, Type, CountryCode, Password) 
			VALUES ('$firstname', '$lastname', '$gender', '$email', '$type', '$country', '$password')";
	$execute = mysqli_query ($conn,$sql) or die (mysqli_error ($conn));
	
		if($execute){
			echo "<script>alert('Register Success!');</script>";
			echo "<meta http-equiv='refresh' content='0; url=listsponsor.php'/>";
		}
		else{
			echo "<script>alert('Register Fail!');</script>";
			echo "<meta http-equiv='refresh' content='0; url=listsponsor.php'/>";
		}
	
	}else{
			echo "<script>alert('Retype Password!');</script>";
			echo "<meta http-equiv='refresh' content='0; url=listsponsor.php'/>";
	}
	}
	
	mysqli_close ($conn);
?>

<html>

<head>

	<title>REGISTER</title>
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


	<table align = "left"  border="0" cellpadding="1" cellspacing="0" >
	<br></br>
                <tr>
				<td width = "83%"></td>
					<td><input class="button" type="submit" value="Go Back"onclick="goBack()"></td>
                </tr>
	</table>

<script>
function goBack() {
    window.history.back();
}
</script>


	<div class="signup">
	<center>
	<form action="" method="post">

<br></br>

			<table align="center" border="0" width="70%" cellpadding="0" cellspacing="0">
              <td width="30%" align="center"><h2><font color="#ff9d2b">Add Runner</font></h2></td>
            </table>
			
			<table border="0" cellpadding="0" cellspacing="0"  style="font-size:17px">
                      <tr>
                        <td width="30%" align="left"><i><b><font color="#e00000">* </font><font color="black">indicates required</font></b></i></td>
                      </tr>
			</table>
			
				  
				  			  
                    <table border="0" cellpadding="7" cellspacing="0" >
                      <tr>
						<td><font color="#e00000">* </font><font color="black">FIRST NAME</font></td>
                        <td><input class="input" type="text" name="firstname" style="text-transform: uppercase;" size = "40" maxlength="20" autofocus required></td>
                      </tr>
									  
					  <tr>
                        <td><font color="#e00000">* </font><font color="black">LAST NAME</font></td>
                        <td><input class="input" type="text" name="lastname" style="text-transform: uppercase;" size = "40" maxlength="20" autofocus required></td>
                      </tr>
					  
					   <tr>
                        <td><font color="#e00000">* </font><font color="black">GENDER</font></td>
                        <td> 
						<input type="radio" name="gender" value="male" required> MALE   &nbsp; &nbsp; 
						<input type="radio" name="gender" value="female" required> FEMALE &nbsp; 
						</td>
                      </tr>
		  
					   <tr>
                        <td><font color="#e00000">* </font><font color="black">TYPE</font></td>
						<td><input name = "type" value="sponsor" size = "10" readonly></td>
                      </tr>
					  
				  
					   <tr>
                        <td><font color="#e00000">* </font><font color="black">COUNTRY</font></td>
                        <td>
							<select required name="countrycode">
							<option value="">Select country: </option>
							<option value="AND">ANDORRA</option>
							<option value="ARG">ARGENTINA</option>
							<option value="AUS">AUSTRALIA</option>
							<option value="AUT">AUSTRIA</option>
							<option value="BEL">BELGIUM</option>
							<option value="BOT">BOTSWANA</option>
							<option value="BRA">BRAZIL</option>
							<option value="BUL">BULGARIA</option>
							<option value="CAF">CENTRAL AFRICAN REPUBLIC</option>
							<option value="CAN">CANADA</option>
							<option value="CHI">CHILE</option>
							<option value="CHN">CHINA</option>
							<option value="CIV">IVORY COAST</option>
							<option value="CHN">CAMEROON</option>
							<option value="COL">COLOMBIA</option>
							<option value="CRO">CROATIA</option>
							<option value="CZE">CZECH REPUBLIC</option>
							<option value="DEN">DENMARK</option>
							<option value="DOM">DOMINICAN REPUBLIC</option>
							<option value="ECU">ECUADOR</option>
							<option value="EGY">EGYPT</option>
							<option value="ESA">EL SALVADOR</option>
							<option value="ESP">SPAIN</option>
							<option value="EST">ESTONIA</option>
							<option value="FIN">FINLAND</option>
							<option value="FRA">FRANCE</option>
							<option value="GBR">UNITED KINGDOM</option>
							<option value="GBS">GUINEA-BISSAU</option>
							<option value="GEQ">EQUATORIAL GUINEA</option>
							<option value="GER">GERMANY</option>
							<option value="GRE">GREECE</option>
							<option value="GUA">GUATEMALA</option>
							<option value="GUI">GUINEA</option>
							<option value="HKG">HONG KONG</option>
							<option value="HON">HONDURAS</option>
							<option value="HUN">HUNGARY</option>
							<option value="INA">INDONESIA</option>
							<option value="IND">INDIA</option>
							<option value="IRL">IRELAND</option>
							<option value="ITA">ITALY</option>
							<option value="JAM">JAMAICA</option>
							<option value="JOR">JORDAN</option>
							<option value="JPN">JAPAN</option>
							<option value="KEN">KENYA</option>
							<option value="KOR">SOUTH KOREA</option>
							<option value="KSA">SAUDI ARABIA</option>
							<option value="LAT">LATVIA</option>
							<option value="LIE">LIECHTENSTEIN</option>
							<option value="LTU">LITHUANIA</option>
							<option value="LUX">LUXEMBOURG</option>
							<option value="MAC">MACAU</option>
							<option value="MAD">MADAGASCAR</option>
							<option value="MAS">MALAYSIA</option>
							<option value="MDA">MOLDOVA</option>
							<option value="MEX">MEXICO</option>
							<option value="MKD">MACEDONIA</option>
							<option value="MLI">MALI</option>
							<option value="MLT">MALTA</option>
							<option value="MNE">MONTENEGRO</option>
							<option value="MON">MONACO</option>
							<option value="MRI">MAURITIUS</option>
							<option value="NCA">NICARAGUA</option>
							<option value="NED">NETHERLANDS</option>
							<option value="NIG">NIGER</option>
							<option value="NOR">NORWAY</option>
							<option value="NZL">NEW ZEALAND</option>
							<option value="PAN">PANAMA</option>
							<option value="PAR">PARAGUAY</option>
							<option value="PER">PERU</option>
							<option value="PHI">PHILIPPINES</option>
							<option value="POL">POLAND</option>
							<option value="POR">PORTUGAL</option>
							<option value="PUR">PUERTO RICO</option>
							<option value="QAT">QATAR</option>
							<option value="ROU">ROMANIA</option>
							<option value="RSA">SOUTH AFRICA</option>
							<option value="RUS">RUSSIA</option>
							<option value="SEN">SENEGAL</option>
							<option value="SIN">SINGAPORE</option>
							<option value="SUI">SWITZERLAND</option>
							<option value="SVK">SLOVAKIA</option>
							<option value="SWE">SWEDEN</option>
							<option value="THA">THAILAND</option>
							<option value="TPE">CHINESE TAIPEI</option>
							<option value="TUR">TURKEY</option>
							<option value="UAE">UNITED ARAB EMIRATES</option>
							<option value="URU">URUGUAY</option>
							<option value="USA">UNITED STATES</option>
							<option value="VAT">VATICAN</option>
							<option value="VEN">VENEZUELA</option>
							<option value="VIE">VIETNAM</option>

						</select></td>
                      </tr>
					  
					   <tr>
                        <td><font color="#e00000">* </font><font color="black">EMAIL</font></td>
                        <td><input class="email" type="email" name="email" size = "40" autofocus required></td>
                      </tr>
					  
					  <tr>
                        <td></td>
                        <td style = "font-style: italic">You can use letters & numbers</td>
                      </tr>
					  
                      <tr>
                        <td><font color="#e00000">* </font><font color="black">PASSWORD</font></td>
                        <td><input class="input" type="password" name="password" maxlength="15" required></td>
                      </tr>
					  
					  <tr>
                        <td></td>
                        <td style = "font-style: italic">Use characters with a mix of letters & numbers</td>
                      </tr>
					  
                      <tr>
                        <td><font color="#e00000">* </font><font color="black">CONFIRM PASSWORD</font></td>
                        <td><input class="input" type="password" name="password2" maxlength="15" required></td>
                      </tr>
					  
					  <tr>
						<br/>
                        <td></td>
                        <td style = "font-style: italic" required>Retype your password</td>
                      </tr>
					  
                      <tr>
                        <td></td>
                        <td><br/><input class="btn" type="submit" name="register" value="REGISTER"></td>
                      </tr>
                    </table>
                  </td>
                  </form>
				  
				  
	
	<br></br><br></br><br></br><br></br><br></br><br></br>
	
</center>
</div>
</body>
</html>