<div class="container">
  <h3>INVOICE HISTORY</h3>
<table class='table'  width='100%' border='1'  >
		<tr >
		
		<td >
		<div style='width:100%; height:500px; overflow:auto;'>
			<form method='post'>
		<table style='border: 0; text-align:left;' width='100%'>
		<tr >
		<td  style="padding:10px"  >
		<div style='width:100%; height:450px; overflow:auto;'>
		<table   cellspacing='0' border='1' width='100%' >
		<tr style='background:#0f0f0a;color:white'>
		<td colspan='1' align='center'>
		INVOICE NUMBER
		</td>
		<td colspan='1' align='center'>
		NAME
		</td>
		<td colspan='1' align='center'>
		DATE INVOICE
		</td>
		<td colspan='1' align='center'>
		ACTION
		</td>
		</tr>
		<?php
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
		$sql = "SELECT DISTINCT customer,invoice_number,service_charge,discount,date_invoice  FROM payment order by date_invoice desc";
		$result = $conn->query($sql);	
		if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			
		echo"<tr>
		
		<td align='center'>".$row["invoice_number"]."</td>
		<td align='center'>".$row["customer"]."</td>
		<td align='center'>".$row["date_invoice"]."</td>
		<td align='center'>
	
		<a  href='rmpos_print/index.php?invoice_number=".$row["invoice_number"]."&customer=".$row["customer"]."&date_invoice=".$row["date_invoice"]."&service_charge=".$row["service_charge"]."&discount=".$row["discount"]."'  target='_blank'>VIEW</a>
		</td>
		</tr>";
		}
		}
				else
				{
					echo"<tr>
		<td colspan='7' align='center'>NO RECORD FOUND!</td>
		</tr>";
		}
	
		?>
		
		
		
		
		</table>
		</div>
		
		</td>
		
</tr>
</body>
</div>