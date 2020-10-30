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
	";?> | <a href="index.php?page=stock" style=' width: 100%;
    background-color: red;
    color: white;
   margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;'>NEW STOCK</a>
	</h3>
  <p style="font-size:13px">&nbsp;&nbsp;&nbsp;&nbsp;this module can add,view/search,delete,update/modify inventory information</p>
  
     
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
        </td><td  align='center'  >
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
	
		<td align='center'>
		<a style='background-color: #004d00;
		color: white;
		padding: 2px 10px;
		text-align: center;
		text-decoration: none;
		display: inline-block;' href='index.php?page=edit_inventory&ID=".$id_renz."'>EDIT</a>
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
		<td>
		<div style='width:400px; height:450px; overflow:auto;'>
		<table   cellspacing='0' border='1' width='100%' >
		<tr style='background:#0f0f0a;color:white'>
       
		<td colspan='2' align='center'>
		NEW PARTS
		</td>
		</tr>
		<tr>
		<td width='100' align='right'>
		PARTS NUMBER:
		</td>
		<td width='300' align='left' style="padding:10px">
		<input style="width:230px" type='text' name='parts_num'  placeholder='PARTS NUMBER' required/>
		</td>
		</tr>
		<tr>
		<td width='100' align='right'>
		DESCRIPTION:
		</td>
		<td width='300' align='left' style="padding:10px">
		<input style="width:230px" type='text' name='description'  placeholder='DESCRIPTION' required/>
		</td>
		</tr>
		<tr>
		<td width='100' align='right'>
		LOCATION:
		</td>
		<td width='300' align='left' style="padding:10px">
		<input style="width:230px" type='text' name='location'  placeholder='LOCATION' required/>
		</td>
		</tr>
		<tr>
		<td width='100' align='right'>
		PRICE:
		</td>
		<td width='300' align='left' style="padding:10px">
		<input style="width:230px" type='text' name='price'  placeholder='PRICE' required/>
		</td>
		</tr>
		<tr>
		<td width='100' align='right'>
		STATUS:
		</td>
		<td width='300' align='left' style="padding:10px">
		 <select style="width:230px" name="status"  required>
		  <option value=''></option>
		  <option value="S2">S2</option>
		  <option value="S3">S3</option>
		  <option value="S4">S4</option>
		  <option value="SA">SA</option>
		  <option value="SH">SH</option>
		  <option value="SJ">SJ</option>
		  </select>
		</td>
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