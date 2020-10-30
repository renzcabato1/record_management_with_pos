<div >
  <h3> &nbsp;&nbsp;&nbsp;&nbsp;  NEW STOCK DELIVERY
	</h3>
  
     
		<table class='table'  width='100%'  >
		<tr >
		<td>
		<div style='width:100%; height:500px; overflow:auto;'>
			<form method='post'>
		<table style='border: 0; text-align:left;' width='100%'>
		<tr >
		<td>
		<div style='width:850px; height:430px; overflow:auto;'>
		<table   cellspacing='0' border='1' width='100%' >
		<tr style='background:#0f0f0a;color:white'>
       
		<td  align='center'  >
		Parts Number
        </td>
		<td  align='center'   >
        DATE DELIVERED
        </td>
		<td  align='center'  >
        QTY
        </td>
		<td  align='center'  >
        REMARKS
        </td>
		<td  align='center'  >
        Action
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
		$sql = "SELECT * FROM new_stock order by id desc";
		$result = $conn->query($sql);	
		if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$id_renz= $row["id"];
			$date_compare= $row['date_encode'];
		echo"<tr>
		
		<td align='center'>".$row["parts_number"]."</td>
		<td align='center'>".$row["date_delivered"]."</td>
		<td align='center'>".$row["qty"]."</td>
		<td align='center'>".$row["remarks"]."</td>
	";
	$date_today=date('Y-m-d');
	if($date_compare == $date_today){
	echo"
		<td align='center'>
		
		<a style='background-color: #004d00;
		color: white;
		padding: 2px 10px;
		text-align: center;
		text-decoration: none;
		display: inline-block;' href='index.php?page=delete_stock&ID=".$id_renz."' onclick='return confirm(\"Are you sure you want to delete this item?  ?\");'>DELETE</a>
		</td>
	</tr>";}
	else{
	echo"
		<td align='center'>
			
		DELETE
		</td>
	</tr>";}
	
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
		<td>
		<div style='width:400px; height:450px; overflow:auto;'>
		<table   cellspacing='0' border='1' width='100%' >
		<tr style='background:#0f0f0a;color:white'>
       
		<td colspan='2' align='center'>
		NEW STOCK
		</td>
		</tr>
		<tr>
		
		<td align='center' colspan='2' style="padding:20px">
		<input style="width:230px" type='text' name='parts_num' autofocus='autofocus'   placeholder='PARTS NUMBER' list="name1" required/>
		</td>
		<datalist id="name1">
		<?php
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "rmpos_db";								
		$conn = new mysqli($servername, $username, $password, $dbname);
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		} 
		$sql = "SELECT * FROM parts_info";
		$result = $conn->query($sql);		  
		 while($row = $result->fetch_assoc()) {	
		 $secret=$row['parts_number'];
			echo "<option value='$secret'>";
		 }
	?>
		</tr>
		<tr>
		
		<td align='center' colspan='2'   align='center' style="padding:10px">
		<input style="width:230px" type='text' name='qty'  placeholder='QUANTITY' required/>
		</td>
		</tr>
		<tr>
	
		<td align='center' colspan='2'   align='center' style="padding:10px">
		REMARKS<textarea name="remarks" cols="45"></textarea></td>
		</tr>
		<tr>
	
		<td align='center' colspan='2'   align='center' style="padding:10px">
		DATE DELIVERED<input style="width:230px" type='date' name='date_delivered'  ></input></td>
		</tr>
	
		<tr>
		<td colspan='2' align = 'center' >
        <input  style='width: 50%;
		background-color: #4CAF50;
		color: white;
		padding: 14px 20px;
		margin: 8px 0;
		border: none;
		border-radius: 4px;
		cursor: pointer;'type="submit" value="Submit"/>
        </td> 
		</tr>
		</table>
		</div>
		
		</td>
</tr>
</body>
</div>