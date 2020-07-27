<?php
session_start();
include "connectionworkshop.php";

$query = "SELECT COUNT(UserId) AS TotalGender, Gender
		  FROM user
		  GROUP BY Gender";  //this is the begining of pie chart
		  
$result = mysqli_query($conn, $query);  
 
 
?>

<html>
<head>

	<title>STATISTIC GENDER</title>
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



<div class="header">
        <?php include 'menuadmin.php'; ?>
    </div>

</body>
 
	  <div class="footer" align= 'center'>
	  
	  
           <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>  
           <script type="text/javascript">  
           google.charts.load('current', {'packages':['corechart']});  
           google.charts.setOnLoadCallback(drawChart);  
           function drawChart()  
           {  
                var data = google.visualization.arrayToDataTable([  
                          ['Gender', 'TotalGender'],  
                          <?php  
                          while($row = mysqli_fetch_array($result))  
                          {  
                               echo "['".$row["Gender"]."', ".$row["TotalGender"]."],";  
                          }  
                          ?>  
                     ]);  
                var options = {  
                      title: 'Percentage Gender for User',  
                      //is3D:true,  
                      pieHole: 0.0
                     };  
                var chart = new google.visualization.PieChart(document.getElementById('piechart'));  
                chart.draw(data, options);  
           }  
           </script>  
      </head>  
	  </html>
      <body>  
           <div style="width:740px;">  
		   <br></br>
         
                <div id="piechart" style="width: 950px; height: 700px;"></div>  
           </div> 
  </body>
