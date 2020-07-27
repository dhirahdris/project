<?php

$ser="localhost";
$user="root";
$pass="abc123";
$db="ftmknavigation";

$con=mysqli_connect($ser, $user, $pass, $db) or die ("Connection Failed");

//echo "Connection Success";

//$sql="SELECT `lecturer_id`, `Name`, `Room No`, `Audio`, `Pic`, `department_id`, `block_id` FROM `lecturer` WHERE `lecturer_id` = '233'";
//$result=mysqli_query($con,$sql); 
//$row = mysqli_fetch_array($result);
//$name = $row['Name'];
//echo "$name";
   
	
?>
