<div class="container">
  <h3>EDIT INVENTORY</h3>

  
		<table class='table'  width='100%'  >
		<tr >
		
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
		EDIT
		</td>
		
		</tr>
		<tr>
		<td width='100' align='right'>
		PARTS NUMBER:
		</td>
		<td width='300' align='left' style="padding:10px">
		<input style="width:230px" type='text' name='parts_num' value='<?php echo"$parts_number";?>' placeholder='PARTS NUMBER' required/>
		</td>
		</tr>
		<tr>
		<td width='100' align='right'>
		DESCRIPTION:
		</td>
		<td width='300' align='left' style="padding:10px">
		<input style="width:230px" type='text' name='description' value='<?php echo"$description";?>'   placeholder='DESCRIPTION' required/>
		</td>
		</tr>
		<tr>
		<td width='100' align='right'>
		LOCATION:
		</td>
		<td width='300' align='left' style="padding:10px">
		<input style="width:230px" type='text' name='location' value='<?php echo"$location";?>'  placeholder='LOCATION' required/>
		</td>
		</tr>
		<tr>
		<td width='100' align='right'>
		PRICE:
		</td>
		<td width='300' align='left' style="padding:10px">
		<input style="width:230px" type='text' name='price' value='<?php echo"$price";?>'   placeholder='PRICE' required/>
		</td>
		</tr>
		<tr>
		<td width='100' align='right'>
		QTY:
		</td>
		<td width='300' align='left' style="padding:10px">
		<input style="width:230px" type='text' name='qty' value='<?php echo"$qty";?>'   placeholder='PRICE' readonly/>
		</td>
		</tr>
		<tr>
		<td width='100' align='right'>
		STATUS:
		</td>
		<?php

		if ($status=='S2')
		{
			
		
	echo'	<td width="300" align="left" style="padding:10px">
		 <select style="width:230px" name="status"  required>
		 
		  <option value="S2">S2</option>
		  <option value="S3">S3</option>
		  <option value="S4">S4</option>
		  <option value="SA">SA</option>
		  <option value="SH">SH</option>
		  <option value="SJ">SJ</option>
		  </select>';
		}
		  else if($status=='S3')
		{
			
		
	echo'	<td width="300" align="left" style="padding:10px">
		 <select style="width:230px" name="status"  required>
		 
		 
		  <option value="S3">S3</option>
		   <option value="S2">S2</option>
		  <option value="S4">S4</option>
		  <option value="SA">SA</option>
		  <option value="SH">SH</option>
		  <option value="SJ">SJ</option>
		  </select>';
		}
		else if($status=='S4')
		{
			
		
	echo'	<td width="300" align="left" style="padding:10px">
		 <select style="width:230px" name="status"  required>
		 
		 <option value="S4">S4</option>
		 
		   <option value="S2">S2</option>
		    <option value="S3">S3</option>
		  
		  <option value="SA">SA</option>
		  <option value="SH">SH</option>
		  <option value="SJ">SJ</option>
		  </select>';
		}
		else if($status=='SA')
		{
			
		
	echo'	<td width="300" align="left" style="padding:10px">
		 <select style="width:230px" name="status"  required>
		  <option value="SA">SA</option>
		 
		   <option value="S2">S2</option>
		    <option value="S3">S3</option>
		  
		 <option value="S4">S4</option>
		 
		  <option value="SH">SH</option>
		  <option value="SJ">SJ</option>
		  </select>';
		}
		else if($status=='SH')
		{
			
		
	echo'	<td width="300" align="left" style="padding:10px">
		 <select style="width:230px" name="status"  required>
		  
		  <option value="SH">SH</option>
		   <option value="S2">S2</option>
		    <option value="S3">S3</option>
		  
		 <option value="S4">S4</option>
		 
		 <option value="SA">SA</option>
		 
		  <option value="SJ">SJ</option>
		  </select>';
		}
		else if($status=='SJ')
		{
			
		
	echo'	<td width="300" align="left" style="padding:10px">
		 <select style="width:230px" name="status"  required>
		   <option value="SJ">SJ</option>
		 
		
		   <option value="S2">S2</option>
		    <option value="S3">S3</option>
		  
		 <option value="S4">S4</option>
		 
		 <option value="SA">SA</option>  <option value="SH">SH</option>
		 
		  </select>';
		}
		?>	
		
		
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