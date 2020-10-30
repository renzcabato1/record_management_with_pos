<div class="container">
  <h3>CUSTOMER VIEW</h3>
  <p style="font-size:13px">this module can add,view/search,delete,update/modify customer/s information</p>
  
  
		<table class='table'  width='100%'  >
		<tr >
		<td>
		<div style='width:100%; height:500px; overflow:auto;'>
			<form method='post'>
		<table style='border: 0; text-align:left;' width='100%'>
		<tr >
		<td>
		<div style='width:650px; height:450px; overflow:auto;'>
		<table   cellspacing='0' border='1' width='100%' >
		<tr style='background:#0f0f0a;color:white'>
       
		<td  align='center'  >
		NAME
        </td>
		<td  align='center'  >
        ADDRESS
        </td>
		<td  align='center'  >
        CONTACT NUMBER
        </td>
		<td  align='center'  >
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
		$sql = "SELECT * FROM customer where delete_cus = '0'";
		$result = $conn->query($sql);	
		if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$id_renz= $row["id"];
		echo"<tr>
		
		<td align='center'>".$row["customer_name"]."</td>
		<td align='center'>".$row["address"]."</td>
		<td align='center'>".$row["contact_number"]."</td>
		<td align='center'><a style='background-color: ORANGE;
		color: white;
		padding: 2px 10px;
		text-align: center;
		text-decoration: none;
		display: inline-block;' href='index.php?page=edit_cus&ID=".$id_renz."'>EDIT</a> |
		<a style='background-color: RED;
		color: white;
		padding: 2px 10px;
		text-align: center;
		text-decoration: none;
		display: inline-block;'  href='index.php?page=delete_cus&ID=".$id_renz." 'onclick='return confirm(\"Are you sure you want to delete  ?\");' >DELETE</a>
        
		</td>";
		
		
		
		
			}
		}
				else
				{
					echo"<tr>
		<td colspan='4' align='center'>NO RECORD FOUND!</td>
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
		NEW CUSTOMER
		</td>
		
		</tr>
		<tr>
		<td width='100' align='right'>
		NAME:
		</td>
		<td width='300' align='left' style="padding:10px">
		<input style="width:230px" type='text' name='name_cus'  placeholder='NAME' required/>
		</td>
		</tr>
		<tr>
		<td width='100' align='right'>
		ADDRESS:
		</td>
		<td width='300' align='left' style="padding:10px">
		<input style="width:230px" type='text' name='address'  placeholder='ADDRESS' required/>
		</td>
		</tr>
		<tr>
		<td width='100' align='right'>
		CONTACT #:
		</td>
		<td width='300' align='left' style="padding:10px">
		<input style="width:230px" type='text' name='contact_number'  placeholder='CONTACT NUMBER' required/>
		</td>
		</tr>
		<tr>
		<td colspan='2' align = 'center' >
        <input  style=' width: 50%;
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