<?php
require("../pull_out_print/fpdf.php"); 
$box_number1 = $_GET['box_number1'];
$box_number2 = $_GET['box_number2'];


$pdf=new fpdf();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pull_out";
$conn = new mysqli($servername, $username, $password, $dbname);
if($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$sql = "SELECT distinct `stock_number`,`stock_desc` FROM information where  box_number between '$box_number1' and '$box_number2' order by stock_number asc,stock_desc asc";
$result = $conn->query($sql);
$sql5 = "SELECT count(box_number),sum(qty),sum(qty1),sum(qty2) FROM information where  box_number between '$box_number1' and '$box_number2' order by stock_number asc,stock_desc asc";
$result5 = $conn->query($sql5);

$pdf->Addpage();
$pdf->SetFont("Arial","B","12");

	if ($result->num_rows > 0) {
	$pdf->Image('logo.png',10,10,95,30);
	$pdf->Cell(95,10,"",0,0);
	$pdf->Cell(0,10,"ITEM ENCODE",1,1,"C");
	$pdf->Cell(95,10,"",0,0);
	$pdf->Cell(0,10,"From : $box_number1       Date To : $box_number2 ",1,1,"C");
	$pdf->Cell(95,10,"",0,0);
	$pdf->Cell(0,10,"Type  :  ITEM ENCODE",1,1,"C");
	$pdf->SetFont("Arial","","12");
	
	$pdf->Cell(38,7,"Stock Number",1,0,"C");
	$pdf->Cell(38,7,"Store Description",1,0,"C");
	$pdf->Cell(38,7,"Quantity",1,0,"C");
	$pdf->Cell(38,7,"Date OUT",1,0,"C");
	$pdf->Cell(38,7,"BOX NUMBER",1,1,"C");
	
	while($row = $result->fetch_assoc()) {
		  $a=$row["stock_number"];
        $b=$row["stock_desc"];
		$sql2 = "SELECT * FROM information where stock_number='$a' and stock_desc='$b' and box_number between '$box_number1' and '$box_number2' order by stock_number asc,stock_desc asc";
		$result2 = $conn->query($sql2);
		while($row2 = $result2->fetch_assoc()) {
			

	$c = $row2['qty']+$row2['qty1']+$row2['qty2'];
	$d = $row2['date_out'];
	$e = $row2['box_number'];
	$pdf->Cell(38,7,"$a",1,0,"C");
	$pdf->Cell(38,7,"$b",1,0,"C");
	$pdf->Cell(38,7,"$c",1,0,"C");
	$pdf->Cell(38,7,"$d",1,0,"C");
	$pdf->Cell(38,7,"$e",1,1,"C");
		}
		$sql1 = "SELECT count(box_number),SUM(qty),SUM(qty1),SUM(qty2) FROM information where stock_number='$a' and stock_desc='$b' and box_number between '$box_number1' and '$box_number2' order by stock_number asc,stock_desc asc";
		$result1 = $conn->query($sql1);
		while($row1 = $result1->fetch_assoc()) {
			$renz=$row1["SUM(qty)"];
			$renz5=$row1["count(box_number)"];
			$renz1=$row1["SUM(qty1)"];
			$renz2=$row1["SUM(qty2)"];
			$total=$renz+$renz1+$renz2;
			$pdf->Cell(38,7,"",1,0,"C");
			$pdf->Cell(38,7,"",1,0,"C");
			$pdf->Cell(76,7,"$total",1,0,"C");
			
			$pdf->Cell(38,7,"$renz5",1,1,"C");
			
		}
		
	}
	while($row5 = $result5->fetch_assoc()) {
		
		$z=$row5["sum(qty)"];
		$m=$row5["count(box_number)"];
		$x=$row5["sum(qty1)"];
		$y=$row5["sum(qty2)"];
		$totala=$z+$x+$y;
			$pdf->Cell(38,7,"",0,0,"C");
			$pdf->Cell(38,7,"",0,0,"C");
			$pdf->Cell(76,7,"TOTAL = $totala ",1,0,"C");
			
			$pdf->Cell(38,7,"$m boxes",1,1,"C");	
	
	}			
}
$pdf->Output();


?>
