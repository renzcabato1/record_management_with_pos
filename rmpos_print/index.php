<?php

require('../rmpos_print/fpdf.php');  

$invoice_number=$_GET['invoice_number'];
$customer=$_GET['customer'];
$date_invoice=$_GET['date_invoice'];
$service_charge=$_GET['service_charge'];
$discount=$_GET['discount'];
$pdf=new fpdf();

$pdf->Addpage();

$pdf->SetFont("Arial","B","14");
	$pdf->Cell(38,9,"COMPANY NAME",0,0,"");
	$pdf->Cell(90,9,"",0,0,"");
	$pdf->Cell(50,9,"INVOICE",0,1,"C");
	$pdf->SetFont("Arial","","8");
	$pdf->Cell(38,5,"[ADDRESS]",0,0,"");
	$pdf->Cell(90,5,"",0,0,"");
	$pdf->Cell(30,5,"DATE:",0,0,"L");
	$pdf->Cell(30,5,"$date_invoice",0,1,"C");
	$pdf->Cell(38,5,"[CITY,ZI 	P]",0,0,"");
	$pdf->Cell(90,5,"",0,0,"");
	$pdf->Cell(30,5,"INVOICE NUMBER:",0,0,"L");
	$pdf->Cell(30,5,"$invoice_number",0,1,"C");
	$pdf->Cell(38,5,"PHONE: [CONTACT]",0,1,"");
	$pdf->Cell(38,5,"FAX: [FAX]",0,1,"");
	$pdf->Cell(90,5,"",0,1,"");
	$pdf->Cell(90,5,"",0,1,"");
	$pdf->SetFont("Arial","B","10");
	$pdf->Cell(38,5,"BILL TO:",0,1,"");
	$pdf->SetFont("Arial","","8");
	$pdf->Cell(38,5,"NAME: $customer ",0,1,"");
	$pdf->Cell(38,5,"ADDRESS:",0,1,"");
	$pdf->Cell(38,5,"CONTACT:",0,1,"");
	$pdf->Cell(90,5,"",0,1,"");
	$pdf->Cell(90,5,"",0,1,"");
	$pdf->Cell(125,5,"DESCRIPTION",1,0,"C");
	$pdf->Cell(10,5,"QTY",1,0,"C");
	$pdf->Cell(30,5,"AMOUNT",1,0,"C");
	$pdf->Cell(30,5,"TOTAL AMOUNT",1,1,"C");
	
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
		$sql = "SELECT * FROM payment where customer='$customer' and  invoice_number='$invoice_number'  and  date_invoice='$date_invoice'";
		$result = $conn->query($sql);
		
		if ($result->num_rows > 0) {
			$renz=0;
		while($row = $result->fetch_assoc()) {
			if($row['parts_number']=='')
			{
				$description = "";
			}
			else{
			$sql5 = "SELECT * FROM parts_info where parts_number='$row[parts_number]' ";
			$result5 = $conn->query($sql5);
				while($row5 = $result5->fetch_assoc()) {
					$description = $row5['description'];
				
				}
			}
			$pdf->Cell(125,5,"$description",1,0,"L");
	$pdf->Cell(10,5,"$row[qty]",1,0,"C");
	$pdf->Cell(30,5,"$row[price]",1,0,"C");
	$total_amount = $row['qty'] * $row['price'];
	$pdf->Cell(30,5,"$total_amount",1,1,"C");
		$renz = $renz + $total_amount;
		}
		}
				
		$pdf->Cell(125,5,"",0,0,"L");
	$pdf->Cell(10,5,"",0,0,"C");
	$pdf->Cell(30,5,"SERVICE CHARGE:",1,0,"C");

	$pdf->Cell(30,5,"$service_charge",1,1,"C");
		$pdf->Cell(125,5,"",0,0,"L");
	$pdf->Cell(10,5,"",0,0,"C");
	$pdf->Cell(30,5,"DISCOUNT:",1,0,"C");

	$pdf->Cell(30,5,"$discount",1,1,"C");
		$pdf->Cell(125,5,"",0,0,"L");
	$pdf->Cell(10,5,"",0,0,"C");
	$pdf->Cell(30,5,"TOTAL DUE:",1,0,"C");
$renz_final = $renz + $service_charge - $discount;
	$pdf->Cell(30,5,"$renz_final",1,1,"C");
	
	
		
	
$pdf->Output();
?>
