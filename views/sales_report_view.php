<div class="container">
  <h3>SALES REPORT <?php
		echo"
	  <a href='rmpos_print/sales_report_view.php?from=".$from."&to=".$to."'  target='_blank' style=' width: 100%;
    background-color: #4CAF50;
    color: white;
   margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;'/>PRINT</a>
	";?></h3>FROM:<?php echo"$from";?> TO <?php echo"$to";?> 

	
		
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
		PARTS NUMBER
		</td>
		<td colspan='1' align='center'>
		STOCK AVAILABE
		</td>
		<td colspan='1' align='center'>
		QUANTITY SOLD
		</td>
			<td colspan='1' align='center'>
			PRICE
			</td><td colspan='1' align='center'>
			TOTAL
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
		echo"<tr>
		
		<td align='center'>".$row["parts_number"]."</td>
		<td align='center'>".$qty2."</td>
		<td align='center'>".$qty."</td>
		<td align='center'>".$row["price"]."</td>
		<td align='center'>".$total_amount."</td>
		</tr>";
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
		echo"<tr>
		
		<td align='center'>SERVICE</td>
		<td align='center'>-</td>
		<td align='center'>-</td>
		<td align='center'>-</td>
		<td align='center'>$service_total</td>
		</tr>";
		}
		else {
			$service_total=0;
		}
		$renz3=$renz3 + $service_total;
		echo"<tr style='border: 0;' ><td colspan='5' align='center' >-----------------</td></tr><tr>
		
		<td align='center'>TOTAL</td>
		<td align='center'>$renz</td>
		<td align='center'>$renz1</td>
		<td align='center'>$renz2</td>
		<td align='center'>$renz3</td>
		
		
		</tr>";
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
</body>
</div>