<div >
  <h3> &nbsp;&nbsp;&nbsp;&nbsp;  INVENTORY VIEW  <?php
		echo"
	  <a href='rmpos_print/1.php'  target='_blank' style=' width: 100%;
    background-color: #4CAF50;
    color: white;
   margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;'/>PRINT</a>
	";
	
	?>
	</h3>
  <p style="font-size:13px">&nbsp;&nbsp;&nbsp;&nbsp; inventory information</p>
  
     
		<table class='table'  width='100%'  >
		<tr >
		<td>
		<div style='width:100%; height:500px; overflow:auto;'>
			<form method='post'>
		<table style='border: 0; text-align:left;' width='100%'>
		<tr >
		<td>
		<div style=' height:430px; overflow:auto;'>
		<table   cellspacing='0' border='1' width='100%' >
		<tr style='background:#0f0f0a;color:white'>
       
		<td  align='center' style='width:10%;' >
		Parts Number
        </td>
		<td  align='center' style='width:50px;'  >
        Description
        </td>
		<td  align='center'  >
        Qty
        </td>
		<td  align='center'  >
        Location
        </td>
		<td  align='center'  >
        Price
        </td>
		<td  align='center'  >
        Status
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
		$sql = "SELECT * FROM parts_info order by parts_number";
		$result = $conn->query($sql);	
		if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$id_renz= $row["id"];
		echo"<tr>
		
		<td align='center'>".$row["parts_number"]."</td>
		<td align='center'>".$row["description"]."</td>
		<td align='center'>".$row["total_stock"]."</td>
		<td align='center'>".$row["location"]."</td>
		<td align='center'>".$row["map_price"]."</td>
		<td align='center'>".$row["status"]."</td>
	
		
		
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