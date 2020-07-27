<!DOCTYPE html>

<?php
session_start();
include "connectionworkshop.php";

$FirstName = $_SESSION ["FirstName"];
$LastName = $_SESSION ["LastName"];

$sql = "SELECT EventId, EventName, StartDate, MaxParticipant, StartTime, COUNT(RegistrationId) as total
		FROM registration
		RIGHT JOIN event
		USING (EventId)
		GROUP BY EventId
		ORDER BY EventName";
		
		
$result = mysqli_query ($conn, $sql) or die (mysqli_error ($conn));

mysqli_close ($conn);
?>

<html>

<head>

	<title>Runner</title>
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

			<table align="center" border="0" width="70%" cellpadding="0" cellspacing="0">
              
              <td align="center"><h2><i><font color="black">Welcome, <?php echo $FirstName; ?> <?php echo $LastName; ?> ..</font></i></h2></td>
              
            </table>
			

<style>
* {
  box-sizing: border-box;
}

#myInput {
  background-position: 10px 10px;
  background-repeat: no-repeat;
  width: 35%;
  font-size: 17px;
  padding: 6px 14px 6px 34px;
  border: 1px solid #787878;
   margin-left: 296px;
  margin-bottom: 22px;
}

</style>


	<table align = "center" width="60%" border="0" cellpadding="1" cellspacing="0">
                <tr>
					
					<td width="25%" align="left"><a href="profilerunner.php" class="menu">PROFILE</a></td>
					<td width="35%" align="center"><a href="listrunnerjoin.php" class="menu">EVENT LIST THAT YOU JOINED</a></td>
					<td width="24%" align="right"><a href="logout.php" class="menu" onClick="return confirm('Are You Sure?')">LOGOUT</a></td>			
                </tr>
	</table>
	
	<br></br>
	<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for event.." title="Type in a name">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

</script>
<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
	<br></br>
		  
	<?php 
		if (mysqli_num_rows ($result) > 0){
					
	?>

            <table align="center" border="0" width="70%" cellpadding="0" cellspacing="0">
              <td><hr></td>
              <td width="35%" align="center"><h2><font color="#000063">Click JOIN to join an event</font></h2></td>
              <td><hr></td>
            </table>
			
            <!-- List of Books Content -->
            <form action="" method="post">
              <table align="center" border="0" width="70%" cellpadding="5" cellspacing="0">
                <tr align="center">
                  <th  width="7%" style="background-color: #ededed;"><p></p>No.<p></p></th> 
                  <th  style="background-color: #ededed;"><p></p>Event Name<p></p></th>
				  <th  style="background-color: #ededed;"><p></p>Start Date<p></p></th>
				  <th  style="background-color: #ededed;"><p></p>Start Time<p></p></th>
				  <th  style="background-color: #ededed;"><p></p>Maximum Participant<p></p></th>
				  <th  style="background-color: #ededed;"><p></p>Current Participant<p></p></th>
				  <th  style="background-color: #ededed;"><p></p> <p></p></th>
                </tr>
				
			<?php
				$rowNum = 1;
				while ($row = mysqli_fetch_assoc ($result)){
					 
			?>
				<tbody id="myTable">
                <tr>
                  <td style="border-bottom: 1px solid #b3b3b3;" align="center"> <?php echo $rowNum; ?><p></p></td>
                  <td style="border-bottom: 1px solid #b3b3b3;" align="center"> <?php echo $row ["EventName"]; ?> </td>
				  <td style="border-bottom: 1px solid #b3b3b3;" align="center"> <?php echo $row ["StartDate"]; ?> </td>
				  <td style="border-bottom: 1px solid #b3b3b3;" align="center"> <?php echo $row ["StartTime"]; ?> </td>
				  <td style="border-bottom: 1px solid #b3b3b3;" align="center"> <?php echo $row ["MaxParticipant"]; ?> </td>
				  <td style="border-bottom: 1px solid #b3b3b3;" align="center"> <?php echo $row ["total"]; ?> </td>
                  <td style="border-bottom: 1px solid #b3b3b3;" align="center"><a href = "runnerjoin.php?EventId=<?php echo $row ["EventId"]; ?>">Join</a></td>
                </tr>
				
			<?php
				$rowNum ++;
				}
			?>
			  </tbody>
              </table>
			  
			 <?php
			  }else {
				  echo "No record found!";
			  }
			 ?>
			
            </form>
			
			
	<br></br><br></br><br></br>

</body>
</html>