
<!DOCTYPE html>

<?php
session_start();
include "connectionworkshop.php";

$sql2 = "SELECT COUNT(EventId) AS TotalEvent
		FROM event";
		
$result2 = mysqli_query ($conn, $sql2) or die (mysqli_error ($conn));

$data = mysqli_fetch_assoc ($result2);

$sql = "SELECT EventId, EventName, StartDate, StartTime, Cost, MaxParticipant, SponsorAmount, EventTypeId, EventTypeName
		FROM event NATURAL JOIN eventtype
		ORDER BY StartDate";
									  
$result = mysqli_query ($conn, $sql) or die (mysqli_error ($conn));

mysqli_close ($conn);
?>

<html>

<head>

	<title>Full Marathon</title>
	<link rel="icon" href="logo.png" type="image/gif" sizes="16x16">
	<link rel = "stylesheet" type = "text/css" href = "interface.css">
	
<style>

#myInput {
  background-position: 10px 10px;
  background-repeat: no-repeat;
  width: 35%;
  font-size: 17px;
  padding: 6px 14px 6px 34px;
  border: 1px solid #ddd;
   margin-left: 296px;
  margin-bottom: 12px;
}

</style>
	
</head>

<body>

	<div class="header">
        <?php include 'menuadmin.php'; ?>
    </div>

<br></br>

<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for events.." title="Type in a name">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


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

<br></br>



			<table align="center" border="1" width="30%" cellpadding="10" cellspacing="0">
				<tr>
                    <td width="50%" align="center">Click on an event to know the list runner join.</a></td>
                </tr>
			</table>
		  <br></br>
		  
		  <table align="center" border="0" width="70%" cellpadding="0" cellspacing="0" >
              <td width="15%" style="font-size: 130%"> Total &nbsp event : </td>
              <td width="30%" style="font-size: 130%"><?php echo $data ["TotalEvent"]; ?> events</td>
              <td></td>
            </table>
		  
		  
		  
	<?php 
		if (mysqli_num_rows ($result) > 0){
					
	?>

            <table align="right" border="0" width="86%" cellpadding="0" cellspacing="0">
              <td><hr></td>
              <td width="30%" align="center"><h2><font color="#000063">List Of Event</font></h2></td>
              <td><hr></td>
            </table>
			
            <!-- List of Books Content -->
			<center>
            <form action="" method="post">
			<div id="dvData">
              <table align="right" border="0" width="86%" cellpadding="9" cellspacing="0">
                <tr align="center">
                  <th  width="7%" style="background-color: #ededed;"><p></p>No.<p></p></th> 
                  <th  style="background-color: #ededed;"><p></p>Event Name<p></p></th>
				  <th  style="background-color: #ededed;"><p></p>Start Date<p></p></th>
				  <th  style="background-color: #ededed;"><p></p>Start Time<p></p></th>
				  <th  style="background-color: #ededed;"><p></p>Event Cost ($)<p></p></th>
				  <th  style="background-color: #ededed;"><p></p>Maximum Participant<p></p></th>
				  <th  style="background-color: #ededed;"><p></p>Sponsor Amount ($)<p></p></th>
				  <th  style="background-color: #ededed;"><p></p>Event Type Name<p></p></th>
                </tr>
				
			<?php
				$rowNum = 1;
				while ($row = mysqli_fetch_assoc ($result)){
					 
			?>
				<tbody id="myTable">
                <tr>
                  <td style="border-bottom: 1px solid #b3b3b3;" align="center"> <?php echo $rowNum; ?><p></p></td>
				  <td style="border-bottom: 1px solid #b3b3b3;" align="center"> <a href = "listrunnerjoineachevent.php?EventId=<?php echo $row ["EventId"]; ?>"><?php echo $row ["EventName"]; ?></a></td>
				  <td style="border-bottom: 1px solid #b3b3b3;" align="center"> <?php echo $row ["StartDate"]; ?> </td>
				  <td style="border-bottom: 1px solid #b3b3b3;" align="center"> <?php echo $row ["StartTime"]; ?> </td>
				  <td style="border-bottom: 1px solid #b3b3b3;" align="center"> <?php echo $row ["Cost"]; ?> </td>
				  <td style="border-bottom: 1px solid #b3b3b3;" align="center"> <?php echo $row ["MaxParticipant"]; ?> </td>
				  <td style="border-bottom: 1px solid #b3b3b3;" align="center"> <?php echo $row ["SponsorAmount"]; ?> </td>
				  <td style="border-bottom: 1px solid #b3b3b3;" align="center"> <?php echo $row ["EventTypeName"]; ?> </td>
                </tr>
				
			<?php
				$rowNum ++;
				}
			?>
			</tbody>
			</div>
              </table>
			  
			 <?php
			  }else {
				  echo "No record found!";
			  }
			 ?>
			
            </form>
			</center>
			
			</br><br></br>
			
			
			
			<!-- Scripts ----------------------------------------------------------- -->
        <script type='text/javascript' src='https://code.jquery.com/jquery-1.11.0.min.js'></script>
        <!-- If you want to use jquery 2+: https://code.jquery.com/jquery-2.1.0.min.js -->
        <script type='text/javascript'>
        $(document).ready(function () {

            console.log("HELLO")
            function exportTableToCSV($table, filename) {
                var $headers = $table.find('tr:has(th)')
                    ,$rows = $table.find('tr:has(td)')

                    // Temporary delimiter characters unlikely to be typed by keyboard
                    // This is to avoid accidentally splitting the actual contents
                    ,tmpColDelim = String.fromCharCode(11) // vertical tab character
                    ,tmpRowDelim = String.fromCharCode(0) // null character

                    // actual delimiter characters for CSV format
                    ,colDelim = '","'
                    ,rowDelim = '"\r\n"';

                    // Grab text from table into CSV formatted string
                    var csv = '"';
                    csv += formatRows($headers.map(grabRow));
                    csv += rowDelim;
                    csv += formatRows($rows.map(grabRow)) + '"';

                    // Data URI
                    var csvData = 'data:application/csv;charset=utf-8,' + encodeURIComponent(csv);

                // For IE (tested 10+)
                if (window.navigator.msSaveOrOpenBlob) {
                    var blob = new Blob([decodeURIComponent(encodeURI(csv))], {
                        type: "text/csv;charset=utf-8;"
                    });
                    navigator.msSaveBlob(blob, filename);
                } else {
                    $(this)
                        .attr({
                            'download': filename
                            ,'href': csvData
                            //,'target' : '_blank' //if you want it to open in a new window
                    });
                }

                //------------------------------------------------------------
                // Helper Functions 
                //------------------------------------------------------------
                // Format the output so it has the appropriate delimiters
                function formatRows(rows){
                    return rows.get().join(tmpRowDelim)
                        .split(tmpRowDelim).join(rowDelim)
                        .split(tmpColDelim).join(colDelim);
                }
                // Grab and format a row from the table
                function grabRow(i,row){
                     
                    var $row = $(row);
                    //for some reason $cols = $row.find('td') || $row.find('th') won't work...
                    var $cols = $row.find('td'); 
                    if(!$cols.length) $cols = $row.find('th');  

                    return $cols.map(grabCol)
                                .get().join(tmpColDelim);
                }
                // Grab and format a column from the table 
                function grabCol(j,col){
                    var $col = $(col),
                        $text = $col.text();

                    return $text.replace('"', '""'); // escape double quotes

                }
            }


            // This must be a hyperlink
            $("#export").click(function (event) {
                // var outputFile = 'export'
                var outputFile = window.prompt("What do you want to name your output file (Note: This won't have any effect on Safari)") || 'export';
                outputFile = outputFile.replace('.csv','') + '.csv'
                 
                // CSV
                exportTableToCSV.apply(this, [$('#dvData > table'), outputFile]);
                
                // IF CSV, don't do event.preventDefault() or return false
                // We actually need this to be a typical hyperlink
            });
        });
    </script>
			
	<br></br><br>

</body>
</html>