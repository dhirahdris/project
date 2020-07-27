<!DOCTYPE html>

<html>

<head>

	<title>LOGIN</title>
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
<!-- header -->

    <div class="header">
        <table align = center border="0" width="0" cellpadding="0" cellspacing="0">
            <tr>
			<br></br>
            <td><img class="logo" src="logo2018.png" alt="Logo" style="width:370px;height:160px;"></td>
            </tr>
        </table>
		
	<br></br>
    </div>

<!-- welcome dgn login -->

<disc>

<!-- new paragraph with space -->
<br></br>

	<table align = center border=0 width = "100%">


<td align = center width = "50%" class = "stylefont">Hi welcome!</td>


	<table align = center border=0 cellpadding = "10" width = "50%">
	

	
      <form action="login.php" method="post">
        <td align = center width="30%"><h2><font color="#000063">LOGIN</font></h2>
           EMAIL &emsp; &ensp; &nbsp; &emsp; &nbsp;                      <input class="input" type="text" name="email" autofocus required><br><br>
           PASSWORD &ensp; &emsp;            <input class="input" type="password" name="password" autofocus required><br><br>
           <input class="Lbtn" type="submit" name="login" value="LOGIN"><br><br>
           Don't have an account? <a href="signup.php"> Sign Up Here </a>
        </td>
      </form>
	 

	
	</table>
	
	<br></br><br></br><br></br>
	
</disc>
</div>
</body>
</html>