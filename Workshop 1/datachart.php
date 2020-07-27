<?php

header('Content-Type: application/json');

$conn = mysqli_connect("localhost","root","","marathon");

// Check connection
if (mysqli_connect_errno($conn))
{
    echo "Failed to connect to DataBase: " . mysqli_connect_error();
}else
{
    $data_points = array();
    
    $result = mysqli_query($conn, "SELECT EventId, EventName, COUNT(EventId) AS TotalRunner
									FROM event 
									JOIN registration
									USING(EventId)
									JOIN user
									USING (UserId)
									WHERE Type = 'runner'
									GROUP BY EventId");

    while($row = mysqli_fetch_array($result))
    {        
        $point = array("label" => $row['EventName'] , "y" => $row['TotalRunner']);
        
        array_push($data_points, $point);        
    }
    
    echo json_encode($data_points, JSON_NUMERIC_CHECK);
}
mysqli_close($conn);

?>