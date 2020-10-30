<?php
require("../exclusive_print/fpdf.php"); 

$pdf=new fpdf();

$pdf->Addpage('L');
$pdf->SetFont("Arial","B","12");
$id = $_GET['id'];

		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "exclusive";
		
		
		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		} 
		
		$sql = "SELECT * FROM image where id_information ='$id'";
		$result = $conn->query($sql);	
		
		
		while($row = $result->fetch_assoc()){
			$image1=$row['image_path'];
		
	$pdf->Cell(260,170,$pdf->Image($image1, $pdf->GetX(), $pdf->GetY(), 200),1,1,'C',false);
	$pdf->Addpage('L');
			
	}
$pdf->Output();



?>
