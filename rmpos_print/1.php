<?php
require("../rmpos_print/fpdf.php"); 

$date_today = date("Y-m-d");
$pdf=new fpdf();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "rmpos_db";
$conn = new mysqli($servername, $username, $password, $dbname);
if($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$pdf->Addpage();
$pdf->SetFont("Arial","","10");
$pdf->Cell(196,5,"INVENTORY TITLE DATE PRINTED: $date_today",1,1,"C");
$pdf->SetFont("Arial","","7");
$pdf->Cell(22,4,"PARTS NUMBER",1,0,"C");
$pdf->Cell(100,4,"DESCRIPTION",1,0,"C");
$pdf->Cell(15,4,"QTY",1,0,"C");
$pdf->Cell(24,4,"PRICE",1,0,"C");
$pdf->Cell(35,4,"TOTAL VALUE",1,1,"C");
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
		$sql = "SELECT * FROM parts_info order by parts_number";
		$result = $conn->query($sql);
		$sql1 = "SELECT SUM(total_stock) FROM parts_info";
		$result1 = $conn->query($sql1);	
			$renz = 0;
		if ($result->num_rows > 0) {
		
		while($row = $result->fetch_assoc()) {
			
			$total_price= round($row['map_price'],2);
			$total_value= round(($row['map_price']*$row['total_stock']),2);
			$renz = $renz + $total_value;
			$pdf->Cell(22,4,"$row[parts_number]",1,0,"C");
			$pdf->Cell(100,4,"$row[description]",1,0,"C");
			$pdf->Cell(15,4,"$row[total_stock]",1,0,"C");
			$pdf->Cell(24,4,"$total_price",1,0,"C");
			$pdf->Cell(35,4,"$total_value",1,1,"C");
		}
		
		while($row1 = $result1->fetch_assoc()) {
			$secret=$row1['SUM(total_stock)'];
			$pdf->Cell(22,4,"",1,0,"C");
			$pdf->Cell(100,4,"",1,0,"C");
			$pdf->Cell(15,4,"$secret",1,0,"C");
			$pdf->Cell(24,4,"",1,0,"C");
			$pdf->Cell(35,4,"$renz",1,1,"C");
		}
		
		}
		

    
     
      

$pdf->Output('');



?>
