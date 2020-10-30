<div class="container">
  <h3>ACCOUNT VIEW</h3>
  <p style="font-size:13px">this module only admin can access. can reset password,deactivate account,create new account</p>
  <p style="font-size:9px">reset password: 123456</p>
  
  
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
		USERNAME
        </td>
		<td  align='center'  >
        PASSWORD
        </td>
		<td  align='center'  >
        TYPE
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
		$sql = "SELECT * FROM account order by active asc";
		$result = $conn->query($sql);	
		if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$id_renz= $row["id"];
			$active= $row["active"];
		echo"<tr>
		
		<td align='center'>".$row["name"]."</td>
		<td align='center'>".$row["username"]."</td>
		<td align='center'>*******</td>
		<td align='center'>".$row["type"]."</td>
		";
		if ($active == '0')
		{
		echo"
		<td align='center'><a style='background-color: ORANGE;
		color: white;
		padding: 2px 10px;
		text-align: center;
		text-decoration: none;
		display: inline-block;' href='index.php?page=reset_acc&ID=".$id_renz." 'onclick='return confirm(\"Are you sure you want to reset this account?  ?\");'>RESET</a> |
		<a style='background-color: RED;
		color: white;
		padding: 2px 10px;
		text-align: center;
		text-decoration: none;
		display: inline-block;'  href='index.php?page=deacc_acc&ID=".$id_renz." 'onclick='return confirm(\"Are you sure you want to deactivate this account?  ?\");' >DEACTIVATE</a>
        
		</td>";
		}
		else
		{
		echo"	<td align='center'>
		<a style='background-color: RED;
		color: white;
		padding: 2px 10px;
		text-align: center;
		text-decoration: none;
		display: inline-block;'  href='index.php?page=ac_acc&ID=".$id_renz." 'onclick='return confirm(\"Are you sure you want to activate this account?  ?\");' >ACTIVATE</a>
        
		</td>";
		}
			
		
		
		
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
		NEW ACCOUNT
		</td>
		
		</tr>
		<tr>
		<td width='100' align='right'>
		NAME:
		</td>
		<td width='300' align='left' style="padding:10px">
		<input style="width:230px" type='text' name='name'  placeholder='NAME' required/>
		</td>
		</tr>
		<tr>
		<td width='100' align='right'>
		USERNAME:
		</td>
		<td width='300' align='left' style="padding:10px">
		<input style="width:230px" type='text' name='username'  placeholder='USERNAME' required/>
		</td>
		</tr>
		<tr>
		<td width='100' align='right'>
		TYPE:
		</td>
		<td width='300' align='left' style="padding:10px">
		 <select style="width:230px" name="type"  required>
		 <option value=''></option>
          <option value="ADMIN">ADMIN</option>
          <option value="EMPLOYEE">EMPLOYEE</option>
         
          </select>
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