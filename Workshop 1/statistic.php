<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php 
	session_start();
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Statistic Event</title>

<link rel="stylesheet" type="text/css" href="adminpagestyle.css" />
<meta name="viewport" content-type="width=device-width initial-scale=1" />
<script src="canvas.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
<script src="../admin/active.js"></script>

</head>
<body>
<table align = center border="0" width="0" cellpadding="0" cellspacing="0">
<table align="center" width= "100%" >
<tr>

<div class="tbl" id="chartContainer" style="height: 340px; width: 95%; margin-left:30px; margin-top:2px;">
<script>
$(document).ready(function () {

            $.getJSON("datachart.php", function (result) {

                var chart = new CanvasJS.Chart("chartContainer", {
					
					title:{
		text: "TOTAL RUNNER JOIN EVENT"
						},
					
					axisX:
                        {
                            title: "EVENT NAME",
                            titleFontColor: "#006400",
                        },
                    axisY:
                        {
                            title: "TOTAL RUNNER",
                            titleFontColor: "#006400",
                        },
                    data: [
                        {
                            dataPoints: result,
							type: "column",
                            /*startAngle: 240,
                            yValueFormatString:"##0.00\"%\"",*/
                            indexLabel:"{label} {y}",
               
                        }
                    ]
                });

                chart.render();
            });
        });
</script>

</div>
</tr>

</table>




<br></br><br></br>
</body>
</html>