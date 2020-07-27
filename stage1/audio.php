<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Audio</title>
    <link rel="icon" href="" type="image/gif" sizes="16x16">
  	<link rel="stylesheet" href="styleHome.css">
  	<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
  	<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script>
		$(document).ready(function(){
			$(".hamburger").click(function(){
			   $(".wrapper").toggleClass("collapse");
			});
		});
	</script>
</head>
<body>

<div class="wrapper">
  <div class="top_navbar">
    <div class="hamburger">
       <div class="one"></div>
       <div class="two"></div>
       <div class="three"></div>
    </div>
    <div class="top_menu">
      <div class="logo">Stage 1 Multimedia Database</div>
    </div>
  </div>
  
  <div class="sidebar">
      <ul>
        <li>
          <a href="index.php">
            <span class="icon"><i class="fas fa-images"></i></span>
            <span class="title">Image</span>
          </a>
        </li>
        <li>
          <a href="video.php">
            <span class="icon"><i class="fas fa-video"></i></span>
            <span class="title">Video</span>
          </a>
        </li>
        <li>
          <a href="audio.php" class="active">
            <span class="icon"><i class="fas fa-file-audio"></i></span>
            <span class="title">Audio</span>
          </a>
        </li>
    </ul>
  </div>
  
  <div class="main_container">
    <div class="image">
      <form action="" method="post" enctype="multipart/form-data">
          <label>Select Audio File:</label>
          <input type="file" name="file" accept="audio/*"><br/><br/>
          <label>Audio File Name: </label>
          <input type="text" name="audioname"><br/><br/>
          <input type="submit" name="submit" value="Upload"> &nbsp
          <button type="reset" class="btn default">Reset</button>
      </form>
    </div>
    <div class="check">

      <?php
      include ("dbConfig.php");

      $sql = "SELECT * FROM audio";
          $result = mysqli_query($db,$sql);
          if(mysqli_num_rows($result) > 0 )
          {
          while($row = mysqli_fetch_array($result))
          {
      ?>

    
      <table class="content-table">
        <thead>
          <tr>
            <th style="width:20%">Name</th>
            <th>Audio</th>
            <th>Update</th>
            <th>Delete</th>
          </tr>
        </thead>
        <tbody>
          <tr>            
            <input name="audio_id" value="<?php echo $row['audio_id']; ?>" hidden />
            <td><?php echo $row['audioname']; ?></td>
            <td><audio src="<?php echo $row['filename']; ?>" controls></audio></td>
            <td><a href="updateaudio.php?audio_id=<?php echo $row['audio_id'];?>">Update</a></td>
            <td><a href="deleteaudio.php?audio_id=<?php echo $row['audio_id'];?>" onclick="return confirm('Are You Sure?')" class="danger">Delete</a></td>
          </tr>
        </tbody>
      </table>
    
      <?php
          }
            }
      ?>
    </div>    
  </div>
</div>
	
<!-- This is insert coding -->
<?php
    include("dbConfig.php");

    if(isset($_POST['submit'])){
      $name= $_FILES['file']['name'];
      $tmp_name= $_FILES['file']['tmp_name'];
      $position= strpos($name, "."); 
      $fileextension= substr($name, $position + 1);
      $fileextension= strtolower($fileextension);
      $audioname= $_POST['audioname'];
      $path= 'audio/';
      $name2=$path.$name;

      if (!empty($name)){
      if (move_uploaded_file($tmp_name, $path.$name)) {
        $insert = mysqli_query($db, "INSERT INTO audio (filename,audioname) VALUES ('$name2','$audioname')");
        if($insert){



        echo '<script language="javascript">';
        echo 'alert("Audio file uploaded!");';
        echo 'window.location.href="audio.php";';
        echo '</script>';
      }

      }
      }
    }

  ?>  

</body>
</html>