<?php 
	session_start();
	include "dbConfig.php";

	$id = $_GET['id'];
	$sql = "DELETE FROM videos WHERE id = '$id'";
	$result = mysqli_query($db, $sql) or die (mysqli_error($db));

	if($result == TRUE){
				echo '<script language="javascript">';
				echo 'alert("Deleted!");';
				echo 'window.location.href="video.php";';
				echo '</script>';
			}else{
				echo '<script language="javascript">';
				echo 'alert("delete Fail");';
				echo '</script>';
			}

	mysqli_close($db);
		
?>