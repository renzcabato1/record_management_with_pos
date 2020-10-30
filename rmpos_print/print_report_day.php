<?php
require("../pull_out_print/fpdf.php"); 
$date = $_GET['date'];
$date1 = $_GET['date1'];
$type = $_GET['type'];
if($type=='item_out'){
	

$pdf=new fpdf();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "outright";
$conn = new mysqli($servername, $username, $password, $dbname);
if($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$sql = "SELECT * FROM outright where del_date between '$date' and '$date1' and store='$store' and cancel=0 order by store asc";
$result = $conn->query($sql);
$pdf->Addpage();
$pdf->SetFont("Arial","B","12");
$h =$result->num_rows;
	if ($result->num_rows > 0) {
	$pdf->Image('logo.png',10,10,95,30);
	$pdf->Cell(95,10,"",0,0);
	$pdf->Cell(0,10,"Delivery Outright Report",1,1,"C");
	$pdf->Cell(95,10,"",0,0);
	$pdf->Cell(0,10,"Date From :  $date         Date To :  $date1",1,1,"C");
	$pdf->Cell(95,10,"",0,0);
	$pdf->Cell(0,10,"Type  :  Delivered Items",1,1,"C");
	$pdf->SetFont("Arial","","7.5");
	
	$pdf->Cell(20,7,"Delivered Date",1,0,"C");
	$pdf->Cell(50,7,"Store Name",1,0,"C");
	$pdf->Cell(20,7,"Box Number",1,0,"C");
	$pdf->Cell(20,7,"Packing List",1,0,"C");
	$pdf->Cell(20,7,"Invoice Number",1,0,"C");
	$pdf->Cell(30,7,"DRIVER",1,0,"C");
	$pdf->Cell(30,7,"TRUCK ID",1,1,"C");
	while($row = $result->fetch_assoc()) {
	$a = $row['del_date'];
	$store = $row['store'];
	$b = substr($store,0,28);
	$c = $row['box_num'];
	$d = $row['packinglist'];
	$e = $row['invoice_num'];
	$driver = $row['driver'];
	$f = substr($driver,0,15);
	$g = $row['truck_id'];
	$pdf->Cell(20,7,"$a",1,0,"C");
	$pdf->Cell(50,7,"$b",1,0,"C");
	$pdf->Cell(20,7,"$c",1,0,"C");
	$pdf->Cell(20,7,"$d",1,0,"C");
	$pdf->Cell(20,7,"$e",1,0,"C");
	$pdf->Cell(30,7,"$f",1,0,"C");
	$pdf->Cell(30,7,"$g",1,1,"C");
	
	
		}
	$pdf->Cell(20,7,"",0,0,"C");
	$pdf->Cell(50,7,"",0,0,"C");
	$pdf->Cell(20,7,"",0,0,"C");
	$pdf->Cell(20,7,"",0,0,"C");
	$pdf->Cell(20,7,"",0,0,"C");
	$pdf->Cell(30,7,"Total Box:",1,0,"C");
	$pdf->Cell(30,7,"$h",1,1,"C");
	
	
		
		
}
$pdf->Output();

}


?>
