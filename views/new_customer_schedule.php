<div class="container">
  <h3>NEW CUSTOMER SCHEDULE</h3>

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
		
		
		
		</table>
		</div>
		
		</td><td>
		<div style='width:100%; height:500px; overflow:auto;'>
			<form method='post'>
		<table style='border: 0; text-align:left;' width='100%'>
		<tr >
		<td>
		<div style='width:400px; height:450px; overflow:auto;'>
		<table   cellspacing='0' border='1' width='100%' >
		<tr style='background:#0f0f0a;color:white'>
       
		<td colspan='2' align='center'>
		NEW SCHEDULE
		</td>
		
		</tr>
		<tr>
		<td width='100' align='right'>
		BRAND:
		</td>
		<td width='300' align='left' style="padding:10px">
		<input style="width:230px" type='text' name='brand'  placeholder='BRAND' required/>
		</td>
		</tr>
		<tr>
		<td width='100' align='right'>
		UNIT:
		</td>
		<td width='300' align='left' style="padding:10px">
		<input style="width:230px" type='text' name='unit'  placeholder='UNIT' required/>
		</td>
		</tr>
		<tr>
		<td width='100' align='right'>
		MODEL:
		</td>
		<td width='300' align='left' style="padding:10px">
		<input style="width:230px" type='text' name='model'  placeholder='MODEL' required/>
		</td>
		</tr>
		<tr>
		<td width='100' align='right'>
		SERIAL:
		</td>
		<td width='300' align='left' style="padding:10px">
		<input style="width:230px" type='text' name='serial'  placeholder='SERIAL' required/>
		</td>
		</tr>
		<tr>
		<td width='100' align='right'>
		TROUBLE REPORT:
		</td>
		<td width='300' align='left' style="padding:10px">
		<input style="width:230px" type='text' name='trouble_found'  placeholder='TROUBLE FOUND' required/>
		</td>
		</tr>
		<tr>
		<td width='100' align='right'>
		REMARKS:
		</td>
		<td width='300' align='left' style="padding:10px">
		<input style="width:230px" type='text' name='remarks'  placeholder='REMARKS' required/>
		</td>
		</tr>
		<tr>
		<td width='100' align='right'>
		DATE CALL:
		</td>
		<td width='300' align='left' style="padding:10px">
		<input style="width:230px" type='date' name='date_call' value="<?php $date_today_1 = date('Y-m-d'); echo"$date_today_1";?>" required/>
		</td>
		</tr>
		<tr>
		<td width='100' align='right'>
		DATE SCHEDULED:
		</td>
		<td width='300' align='left' style="padding:10px">
		<input style="width:230px" type='date' name='date_scheduled' required/>
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