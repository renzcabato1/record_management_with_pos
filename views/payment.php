<div class="container">
  <h3>PAYMENT MODULE</h3>
<table class='table'  width='100%' border='1'  >
		<tr >
		
		<td >
		<div style='width:100%; height:500px; overflow:auto;'>
			<form method='post'>
		<table style='border: 0; text-align:left;' width='100%'>
		<tr >
		<td  style="padding:10px"  >
		<div style='width:500px; height:450px; overflow:auto;'>
		<table   cellspacing='0' border='1' width='100%' >
		<tr style='background:#0f0f0a;color:white'>
		<td colspan='1' align='center'>
		PARTS NUMBER
		</td>
		<td colspan='1' align='center'>
		QTY
		</td>
		<td colspan='1' align='center'>
		PRICE PER PIECE
		</td>
		<td colspan='1' align='center'>
		TOTAL
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
		$sql = "SELECT * FROM payment where done='0' order by id desc";
		$result = $conn->query($sql);	
		if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$id_renz= $row["id"];
		echo"<tr>
		
		<td align='center'>".$row["parts_number"]."</td>
		<td align='center'>".$row["qty"]."</td>
		<td align='center'>".$row["price"]."</td>
		<td align='center'>".round(($row["price"] * $row["qty"]),2)."</td>
		<td align='center'>
		<a  href='index.php?page=remove_payment&ID=".$id_renz."'>REMOVE</a>
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
		<td>
		<div style='width:100%; height:500px; overflow:auto;'>
			<form method='post'>
		<table style='border: 0; text-align:left;' width='100%'>
		<tr >
		<td width='40%' >
		<div style='width:400px; height:450px; overflow:auto;'>
		<table   cellspacing='0' border='0' width='100%' >
		<tr style='background:#0f0f0a;color:white'>
       
		<td colspan='2' align='center' >
		BARCODE
		</td>
		
		</tr>
		<tr>
		<td width='100' align='right'>
	
		</td>
		<td width='300' align='left' style="padding:10px">
		</td>
		</tr>
		<tr>
		<td width='100' align='right'>
	
		</td>
		<td width='300' align='left' style="padding:10px">
		</td>
		</tr>
		
		<tr>
		<td width='100' align='right'>
		</td>
		<td width='300' align='left' style="padding:10px">
		<input style="width:350px;height:50px;font-size:30px" type='text' name='barcode' autofocus='autofocus' placeholder='BARCODE' required>
		</td>
		</tr>
		<tr>
		<td width='100' align='right'>
		
		</td>
		<td width='300' align='left' style="padding:10px">
		</td>
		</tr><tr>
		<td width='100' align='right'>
		
		</td>
	
		</tr>
		
		<tr>
			<td width='300' colspan='2' align='center' style="padding:100px" >
	
		<?php echo"<a  style='background-color: #f44336;
    color: white;
    padding: 14px 25px;
    text-align: center; 
    text-decoration: none;
    display: inline-block;'; href='index.php?page=done_all_item'>DONE</a>";?>
		
		</td>
		</tr>
		
		
		
		</table>
		</div>
		
		</td>
</tr>
</body>
</div>