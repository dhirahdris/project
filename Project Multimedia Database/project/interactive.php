<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Interactive Media</title>
  <link rel="icon" href="../logo.png" type="image/gif" sizes="16x16">

  <!-- Bootstrap core CSS -->
  <link href="../project/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
   <link rel="stylesheet" href="../project/style.css">	
</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
    <div class="container">
      <a class="navbar-brand" href="#"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="../project/index.php">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../project/about.php">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../project/chart.php">Chart</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../project/projdesc.php">Proj Desc</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../project/errors.php">Errors&Solutions</a>
          </li>
          <li class="nav-item dropdown active">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Department
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="../project/comp_sci.php">Computer System & Communication</a>
                <a class="dropdown-item" href="../project/intelligent.php">Intelligent Computing and Analyts</a>
                <a class="dropdown-item active" href="../project/interactive.php">Interactive Media</a>
                <a class="dropdown-item" href="../project/soft_eng.php">Software Engineering</a>
              </div>
           </li>
           <li class="nav-item">
            <a class="nav-link" href="../project/lecture.php">Lecture Room
              <span class="sr-only">(current)</span>
            </a>
          </li>
           <li class="nav-item">
            <a class="nav-link" href="../project/lab.php">Lab
              <span class="sr-only">(current)</span>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Page Content -->
  <div class="team-boxed">
        <div class="container">
            <div class="intro">
                <h2 class="text-center">Department Interactive Media</h2>
                <p class="text-center"></p>
            </div>
            <div class="row people">
                <?php
			include('../conn.php');
			$sql = "SELECT lecturer.Name as 'Name', lecturer.RoomNo as 'RoomNo', lecturer.Audio as 'Audio', lecturer.Pic as 'Pic', block.Name as 'Block' 
				FROM `lecturer`
        			JOIN block ON block.block_id = lecturer.block_id 
        			WHERE lecturer.department_id = '3'";
			$result = mysqli_query ($con, $sql) or die (mysqli_error ($con));
					
			while($fetch = mysqli_fetch_array($result)){
				echo "<div class='col-md-6 col-lg-4 item'>";
				echo "<div class='box'><img class='rounded-circle' src='../".$fetch['Pic']."' >";
				echo "<h3 class='name'>".$fetch['Name']."</h3>";
				echo "<p class='description'>Room Number: ".$fetch['RoomNo']." || Block: ".$fetch['Block']."</p>";
				echo "<p class='description'><audio controls><source src='../".$fetch['Audio']."'></audio> </p>";
				echo "</div>";			
				echo "</div>";
			}
			
		?>
            </div>
        </div>
    </div>
  <!-- Bootstrap core JavaScript -->
  <script src="../project/vendor/jquery/jquery.slim.min.js"></script>
  <script src="../project/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
