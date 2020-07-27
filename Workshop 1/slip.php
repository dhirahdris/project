<?php
//call the FPDF library
require('fpdf17/fpdf.php');

include "connectionworkshop.php";
session_start();


//get invoices data

$eventid = $_GET ['EventId'];
$firstname = $_SESSION ["FirstName"];
$lastname = $_SESSION ["LastName"];
$email = $_SESSION ["Email"];

$sql = "SELECT EventId, EventName, StartDate, StartTime, SponsorAmount, Cost, EventTypeId, EventTypeName
		FROM event JOIN eventtype
		USING (EventTypeId)
		WHERE EventId = '$eventid'";

$data = mysqli_query($conn,$sql);
$query=mysqli_fetch_assoc($data);




//A4 width : 219mm
//default margin : 10mm each side
//writable horizontal : 219-(10*2)=189mm

//create pdf object
$pdf = new FPDF('P','mm','A4');
//add new page
$pdf->AddPage();
//set font to arial, bold, 14pt
$pdf->SetFont('Arial','B',26);

//Cell(width , height , text , border , end line , [align] )

$pdf->Cell(200 ,5,'WORLD SKILL BRAZIL 2018',0,1,'C');


$pdf->SetFont('Arial','B',22);
$pdf->Cell(10 ,10,'',0,1);
$pdf->Cell(200 ,10,'SPONSORSHIP',0,1,'C');
$pdf->Cell(10 ,10,'',0,1);//end of line

//set font to arial, regular, 12pt
$pdf->SetFont('Arial','',12);

$pdf->Cell(45 ,10,'Sponsor Amount ($) :',1,0);
$pdf->Cell(50 ,10,$query['SponsorAmount'],1,0,'L');
$pdf->Cell(45 ,10,'Event Cost ($) :',1,0);
$pdf->Cell(50 ,10,$query['Cost'],1,1,'L');


$pdf->Cell(45 ,10,'Name :',1,0);
$pdf->Cell(145 ,10,$_SESSION ["FirstName"]." ".$_SESSION ["LastName"],1,1,'L');


$pdf->Cell(45 ,10,'Email :',1,0);
$pdf->Cell(145 ,10,$_SESSION ["Email"],1,0,'L');

//make a dummy empty cell as a vertical spacer
$pdf->Cell(189 ,10,'',0,1);//end of line
//make a dummy empty cell as a vertical spacer
$pdf->Cell(189 ,10,'',0,1);//end of line
$pdf->Cell(45 ,10,'Event Name:',1,0);
$pdf->Cell(50 ,10,$query['EventName'],1,0,'L');
$pdf->Cell(45 ,10,'Event Type :',1,0);
$pdf->Cell(50 ,10,$query['EventTypeName'],1,1,'L');

$pdf->Cell(45 ,10,'Start Date :',1,0);
$pdf->Cell(50 ,10,$query['StartDate'],1,0,'L');
$pdf->Cell(45 ,10,'Start Time :',1,0);
$pdf->Cell(50 ,10,$query['StartTime'],1,1,'L');



//output the result
$pdf->Output();
?>

