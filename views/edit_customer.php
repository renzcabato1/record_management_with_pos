<div class="container">
  <h3>CUSTOMER EDIT</h3>

  
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
		NAME:
		</td>
		<td width='300' align='left' style="padding:10px">
		<input style="width:230px" type='text' name='name_cus'  value='<?php echo "$customer_name";?>' placeholder='NAME' required/>
		</td>
		</tr>
		<tr>
		<td width='100' align='right'>
		ADDRESS:
		</td>
		<td width='300' align='left' style="padding:10px">
		<input style="width:230px" type='text' name='address'  value='<?php echo "$address";?>'  placeholder='ADDRESS' required/>
		</td>
		</tr>
		<tr>
		<td width='100' align='right'>
		CONTACT #:
		</td>
		<td width='300' align='left' style="padding:10px">
		<input style="width:230px" type='text' name='contact_number' value='<?php echo "$contact_number";?>'  placeholder='CONTACT NUMBER' required/>
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