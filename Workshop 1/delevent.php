<!DOCTYPE html>

<?php
session_start();
include "connectionworkshop.php";

$sql = "SELECT EventId, EventName, EventTypeName
		FROM event, eventtype
		WHERE event.EventTypeId = eventtype.EventTypeId
		";
		
$result = mysqli_query ($conn, $sql) or die (mysqli_error ($conn));

mysqli_close ($conn);
?>


<html>

<head>

	<title>DELETE EVENT</title>
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

	<div class="header">
        <?php include 'menuadmin.php'; ?>
    </div>

		  
	<?php 
		if (mysqli_num_rows ($result) > 0){
					
	?>

		
			<br></br>
			<table align="center" border="1" width="30%" cellpadding="10" cellspacing="0">
				<tr>
                    <td width="20%" align="center">Click on an event to delete.</a></td>
                </tr>
			</table>
			<br></br>
			
            <!-- List of Books Content -->
            <form action="" method="post">
              <table align="right" border="0" width="85%" cellpadding="5" cellspacing="0">
                <tr align="center">
                  <th width="10%" style="background-color: #ededed;"><p></p>No.<p></p></th> 
                  <th  width="35%" style="background-color: #ededed;"><p></p>Event Type<p></p></th>
				  <th  width="35%" style="background-color: #ededed;"><p></p>Event Name<p></p></th>
                </tr>	
			<?php

				$rowNum = 1;
				while ($data = mysqli_fetch_assoc ($result)){
					 
			?>
			<tr>
                  <td style="border-bottom: 1px solid #b3b3b3;" align="center"> <?php echo $rowNum; ?><p></p></td>
				  <td style="border-bottom: 1px solid #b3b3b3;" align="center"> <?php echo $data ["EventTypeName"]; ?> </td>
                  <td style="border-bottom: 1px solid #b3b3b3;" align="center"> <a href = "delete.php?EventId=<?php echo $data ["EventId"]; ?>"><?php echo $data ["EventName"]; ?></a></td>
                </tr>
				
			<?php
				$rowNum ++;
				}
			?>
			
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