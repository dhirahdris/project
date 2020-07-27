<!DOCTYPE html>

<?php
session_start();
include "connectionworkshop.php";

$FirstName = $_SESSION ["FirstName"];
$LastName = $_SESSION ["LastName"];

$sql = "SELECT *
		FROM event";

$result = mysqli_query ($conn, $sql) or die (mysqli_error ($conn));

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

			<table align="center" border="0" width="70%" cellpadding="0" cellspacing="0">
              
              <td align="center"><h2><font color="black">Welcome, <?php echo $FirstName; ?> <?php echo $LastName; ?> ..</font></h2></td>
              
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
  margin-bottom: 18px;
}

</style>

<br></br>
          <div class="header">
        <?php include 'menusponsored.php'; ?>
          </div>
		  
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
		  
	<?php 
		if (mysqli_num_rows ($result) > 0){
					
	?>


			<br></br>
			<table align="center" border="1" width="30%" cellpadding="10" cellspacing="0">
				<tr>
                    <td width="20%" align="center">Click on an event to sponsor.</a></td>
                </tr>
			</table>
			<br></br>
			
            <!-- List of Books Content -->
            <form action="" method="post">
              <table align="center" border="0" width="70%" cellpadding="5" cellspacing="0">
                <tr align="center">
                  <th  width="7%" style="background-color: #ededed;"><p></p>No.<p></p></th> 
                  <th  style="background-color: #ededed;"><p></p>Event Name<p></p></th>
				  <th  style="background-color: #ededed;"><p></p>Event Cost ($)<p></p></th>
				  <th  style="background-color: #ededed;"><p></p>Start Date<p></p></th>
				  <th  style="background-color: #ededed;"><p></p>Start Time<p></p></th>
				  <th  style="background-color: #ededed;"><p></p>Sponsored Amount ($)<p></p></th>
                </tr>
				
			<?php
				$rowNum = 1;
				while ($row = mysqli_fetch_assoc ($result)){
					 
			?>
				<tbody id="myTable">
                <tr>
                  <td style="border-bottom: 1px solid #b3b3b3;" align="center"> <?php echo $rowNum; ?><p></p></td>
                  <td style="border-bottom: 1px solid #b3b3b3;" align="center"> <a href = "update.php?EventId=<?php echo $row ["EventId"]; ?>"><?php echo $row ["EventName"]; ?></a></td>
				  <td style="border-bottom: 1px solid #b3b3b3;" align="center"> <?php echo $row ["Cost"]; ?> </td>
				  <td style="border-bottom: 1px solid #b3b3b3;" align="center"> <?php echo $row ["StartDate"]; ?> </td>
				  <td style="border-bottom: 1px solid #b3b3b3;" align="center"> <?php echo $row ["StartTime"]; ?> </td>
				  <td style="border-bottom: 1px solid #b3b3b3;" align="center"> <?php echo $row ["SponsorAmount"]; ?> </td>
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