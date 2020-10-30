<?php

require('../rmpos_print/fpdf.php');  

$from=$_GET['from'];
$to=$_GET['to'];

$pdf=new fpdf();

$pdf->Addpage();

$pdf->SetFont("Arial","B","14");
	$pdf->Cell(38,9,"PRODUCT SALES REPORT",0,0,"");
	$pdf->Cell(90,9,"",0,1,"");
	$pdf->SetFont("Arial","","8");
	$pdf->Cell(38,7,"FROM: $from TO: $to ",0,1,"");
	$pdf->Cell(38,5,"",0,1,"");
	$pdf->Cell(110,5,"DESCRIPTION",1,0,"C");
	$pdf->Cell(20,5,"AVAILABLE",1,0,"C");
	$pdf->Cell(20,5,"SOLD",1,0,"C");
	$pdf->Cell(20,5,"PRICE",1,0,"C");
	$pdf->Cell(20,5,"TOTAL",1,1,"C");
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "rmpos_db";
		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		} 
		$sql = "SELECT DISTINCT parts_number,price  FROM payment where parts_number!='' and date_invoice between '$from' and '$to' order by parts_number asc";
		$result = $conn->query($sql);	
		if ($result->num_rows > 0) {
			$renz = 0;
			$renz1 = 0;
			$renz2 = 0;
			$renz3 = 0;
		while($row = $result->fetch_assoc()) {
			
			$sql1 = "SELECT *  FROM payment where parts_number='$row[parts_number]' and price='$row[price]'";
		$result1 = $conn->query($sql1);
		while($row1 = $result1->fetch_assoc()) {
			$qty=$row1["qty"];
		}
		$sql2 = "SELECT *  FROM parts_info where parts_number='$row[parts_number]'";
		$result2 = $conn->query($sql2);
		while($row2 = $result2->fetch_assoc()) {
			$qty2=$row2["total_stock"];
		}
		$total_amount = $qty * $row['price'];
		
		$pdf->Cell(110,5,$row["parts_number"],1,0,"C");
		$pdf->Cell(20,5,"$qty2",1,0,"C");
		$pdf->Cell(20,5,"$qty",1,0,"C");
		$pdf->Cell(20,5,"$row[price]",1,0,"C");
		$pdf->Cell(20,5,"$total_amount",1,1,"C");
			
		$renz = $renz + $qty2;
		$renz1 = $renz1 + $qty;
		$renz2 = $renz2 + $row["price"];
		$renz3 = $renz3 + $total_amount;
		}
		$sql6 = "SELECT DISTINCT invoice_number,date_invoice,customer,discount,service_charge  FROM payment where date_invoice between '$from' and '$to' order by parts_number asc";
		$result6 = $conn->query($sql6);
		if ($result6->num_rows > 0) {
			$service_total=0;
			while($row6 = $result6->fetch_assoc()) {
			$service=$row6["service_charge"];
			$service_total=$service_total + $service;
			
		}
		
		$pdf->Cell(110,5,"SERVICE",1,0,"C");
		$pdf->Cell(20,5,"-",1,0,"C");
		$pdf->Cell(20,5,"-",1,0,"C");
		$pdf->Cell(20,5,"-",1,0,"C");
		$pdf->Cell(20,5,"$service_total",1,1,"C");
		
		}
		else {
			$service_total=0;
		}
		$renz3=$renz3 + $service_total;
		$pdf->Cell(110,3,"",0,1,"C");
		$pdf->Cell(110,5,"TOTAL",1,0,"C");
		$pdf->Cell(20,5,"$renz",1,0,"C");
		$pdf->Cell(20,5,"$renz1",1,0,"C");
		$pdf->Cell(20,5,"$renz2",1,0,"C");
		$pdf->Cell(20,5,"$renz3",1,1,"C");
		
		
		
		
		
		
		}
				
	
	
	
$pdf->Output();
?>
