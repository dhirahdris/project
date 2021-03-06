<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Video</title>
    <link rel="icon" href="" type="image/gif" sizes="16x16">
  	<link rel="stylesheet" href="styleHome.css">
  	<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
  	<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> 
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
          <a href="video.php" class="active">
            <span class="icon"><i class="fas fa-video"></i></span>
            <span class="title">Video</span>
          </a>
        </li>
        <li>
          <a href="audio.php">
            <span class="icon"><i class="fas fa-file-audio"></i></span>
            <span class="title">Audio</span>
          </a>
        </li>
    </ul>
  </div>
  
  <div class="main_container">
    <div class="image">
      <form action="" method="post" enctype="multipart/form-data">
          <label>Select Video File:</label>
          <input type="file" name="file"><br/>
          <input type="submit" name="submit" value="Upload"> &nbsp
          <button type="reset" class="btn default">Reset</button>
      </form>
    </div>
    <div class="check">

      <?php
      include ("dbConfig.php");

      $fetchVideos = mysqli_query($db, "SELECT * FROM videos ORDER BY id DESC");
        while($row = mysqli_fetch_assoc($fetchVideos)){
            $location = $row['location'];

      ?>

    
      <table class="content-table">
        <thead>
          <tr>
            <th style="width: 60%">Video</th>
            <th>Update</th>
            <th>Delete</th>
          </tr>
        </thead>
        <tbody>
          <tr>
          <form action="" method="post">            
            <input name="id" value="<?php echo $row['id']; ?>" hidden />
            <td><?php echo "<video src='".$location."' controls width='320px' height='200px'></video>";?></td>
            </form>
            <td><a href="updatevideo.php?id=<?php echo $row['id'];?>">Update</a></td>
            <td><a href="deletevideo.php?id=<?php echo $row['id'];?>" onclick="return confirm('Are You Sure?')" class="danger">Delete</td>
          </tr>
        </tbody>
      </table>
    
      <?php
          }
      ?>
    </div>      
  </div>
</div>
	
<?php
    include("dbConfig.php");
 
    if(isset($_POST['submit'])){
        $maxsize = 5242880; // 5MB
                   
        $name = $_FILES['file']['name'];
        $target_dir = "videos/";
        $target_file = $target_dir . $_FILES["file"]["name"];

        // Select file type
        $videoFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        // Valid file extensions
        $extensions_arr = array("mp4","avi","3gp","mov","mpeg");

        // Check extension
        if( in_array($videoFileType,$extensions_arr) ){
            
            // Check file size
            if(($_FILES['file']['size'] >= $maxsize) || ($_FILES["file"]["size"] == 0)) {
                echo '<script language="javascript">';
                echo 'alert("File too large. File must be less than 5MB.");';
                echo 'window.location.href="video.php";';
                echo '</script>';
            }else{
                // Upload
                if(move_uploaded_file($_FILES['file']['tmp_name'],$target_file)){
                    // Insert record
                    $query = "INSERT INTO videos(name,location) VALUES('".$name."','".$target_file."')";

                    mysqli_query($db,$query);
                    echo '<script language="javascript">';
                    echo 'alert("Upload successfully.");';
                    echo 'window.location.href="video.php";';
                    echo '</script>';
                }
            }

        }else{

            echo '<script language="javascript">';
            echo 'alert("Invalid file extension.");';
            echo 'window.location.href="video.php";';
            echo '</script>';
                
        }
    
    }
?>

</body>
</html>