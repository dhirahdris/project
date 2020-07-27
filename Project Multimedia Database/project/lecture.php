<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>FTMK - Lecture Room</title>
  <link rel="icon" href="../logo.png" type="image/gif" sizes="16x16">

  <!-- Bootstrap core CSS -->
  <link href="../project/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../project/style.css">
</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
    <div class="container">
      <a class="navbar-brand" href="#">Start Bootstrap</a>
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
          <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Department
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="../project/comp_sci.php">Computer System & Communication</a>
                <a class="dropdown-item" href="../project/intelligent.php">Intelligent Computing and Analyts</a>
                <a class="dropdown-item" href="../project/interactive.php">Interactive Media</a>
                <a class="dropdown-item" href="../project/soft_eng.php">Software Engineering</a>
              </div>
           </li>
           <li class="nav-item active">
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
  <div class="container">
  <div class="row">
    <div class="col-lg-12 text-center">
      <h1 class="mt-5">LECTURE ROOM <br/>FACULTY INFOMATION & COMMUNICATION TECHNOLOGY</h1><br/>
    </div>
  </div>
  <div class="row">
    <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for lecture room.." title="Type in a name">
  </div>
  <div class="row">
  <table class="table table-bordered table-dark" id="myTable">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Lecture Room</th>
      <th scope="col">Level</th>
      <th scope="col">Block</th>
      <th scope="col">Percon Incharge</th>
    </tr>
  </thead>
  <tbody>
     <?php
	include('../conn.php');
	$sql = "SELECT room.Name as 'Name', room.Location as 'Location', block.Name as 'Block', in_charge.Name as 'InCharge' 
		FROM `room`
		JOIN in_charge ON room.person_id = in_charge.person_id
        	JOIN block ON block.block_id = room.block_id
        	WHERE room.Name LIKE '%Bilik Kuliah%' 
        	ORDER BY room.room_id ASC";
	$result = mysqli_query ($con, $sql) or die (mysqli_error ($con));
	$x=1;		
	while($row= mysqli_fetch_array($result)){
      ?>
    <tr>
      <th scope="row"><?php echo $x++;?></th>
      <td><?php echo $row['Name'];?></td>
      <td><?php echo $row['Location'];?></td>
      <td><?php echo $row['Block'];?></td>
      <td><?php echo $row['InCharge'];?></td>
    </tr>
    <?php
    }
    ?>
  </tbody>
  </table>
  </div>
  </div>

  <!-- Bootstrap core JavaScript -->
  <script src="../project/vendor/jquery/jquery.slim.min.js"></script>
  <script src="../project/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  
<script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>
</body>

</html>
