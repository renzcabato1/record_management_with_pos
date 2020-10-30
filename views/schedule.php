<div >
  <h3> &nbsp;&nbsp;&nbsp;&nbsp;  PENDING JOB VIEW 
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
       
		<td  align='center' >
		DATE CALL
        </td>
		<td  align='center'  >
		CUSTOMER NAME
        </td>
		<td  align='center'  >
		CONTACT #
        </td>
		<td  align='center'  >
		ADDRESS
        </td>
		<td  align='center'  >
        BRAND
        </td>
		<td  align='center'  >
		UNIT
        </td><td  align='center'  >
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
		$sql = "SELECT * FROM schedule where date_done ='0' order by date_call desc";
		$result = $conn->query($sql);	
		if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$id_renz= $row["id"];
		echo"<tr>
		
		<td align='center'>".$row["date_call"]."</td>
		<td align='center'>".$row["name"]."</td>
		<td align='center'>".$row["contact_number"]."</td>
		<td align='center'>".$row["address"]."</td>
		<td align='center'>".$row["brand"]."</td>
		<td align='center'>".$row["unit"]."</td>
	
		<td align='center'>
		<a style='background-color: #004d00;
		color: white;
		padding: 2px 10px;
		text-align: center;
		text-decoration: none;
		display: inline-block;' href='index.php?page=view_schedule&ID=".$id_renz."'>VIEW</a>
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
		<table   cellspacing='0' border='0' width='100%' >
		<tr style='background:#0f0f0a;color:white'>
       
		<td colspan='2' align='center'>
		NEW SCHEDULE
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
		 <?php
		echo"
		<a href='index.php?page=new_customer' style='width: 50%;
		background-color: #4CAF50;
		color: white;
		padding: 14px 20px;
		margin: 8px 0;
		border: none;
		border-radius: 4px;
		cursor: pointer;'/>NEW CUSTOMER</a>
		";
	
		?></td>
		</tr>
		<tr>
		<td width='100' align='right'>
		&nbsp;
		</td>
		<td width='300' align='left' style="padding:10px">
		</td>
		</tr>
		<tr>
		<td width='100' align='right'>
		 &nbsp;
		</td>
		<td width='300' align='left' style="padding:10px">
		 <?php
		echo"
	  <a href='index.php?page=old_customer' style='width: 50%;
		background-color: #4CAF50;
		color: white;
		padding: 14px 20px;
		margin: 8px 0;
		border: none;
		border-radius: 4px;
		cursor: pointer;'/>OLD CUSTOMER</a>
	";
	
	?></td>
		</tr>
		<tr>
		<td width='100' align='right'>
	
		</td>
		<td width='300' align='left' style="padding:10px">
		 
		</td>
		</tr>
		<tr>
		<td colspan='2' align = 'center' >
       </td> 
		</tr>
		</table>
		</div>
		
		</td>
</tr>
</body>
</div>