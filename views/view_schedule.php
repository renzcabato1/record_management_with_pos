<div class="container">
  <h3>CUSTOMER SCHEDULED</h3>
<table class='table'  width='100%' border='1'  >
		<tr >
		
		<td >
		<div style='width:100%; height:500px; overflow:auto;'>
			<form method='post'>
		<table style='border: 0; text-align:left;' width='100%'>
		<tr >
		<td  style="padding:10px"  >
		<div style='width:400px; height:450px; overflow:auto;'>
		<table   cellspacing='0' border='1' width='100%' >
		<tr style='background:#0f0f0a;color:white'>
		<td colspan='2' align='center'>
		CUSTOMER
		</td>
		</tr>
		<tr>
		<td width='100' align='right'>
		NAME:
		</td>
		<td width='300' align='left' style="padding:10px">
		<input style="width:230px" type='text' name='name_cus' value="<?php echo"$name";?>" placeholder='NAME' readonly>
		</td>
		</tr>
		<tr>
		<td width='100' align='right'>
		ADDRESS:
		</td>
		<td width='300' align='left' style="padding:10px">
		<input style="width:230px" type='text' name='address'  value="<?php echo"$address";?>" placeholder='ADDRESS' readonly>
		</td>
		</tr>
		<tr>
		<td width='100' align='right'>
		CONTACT #:
		</td>
		<td width='300' align='left' style="padding:10px">
		<input style="width:230px" type='text' name='contact_number'  value="<?php echo"$contact_number";?>" placeholder='CONTACT NUMBER' readonly>
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
		VIEW SCHEDULE
		</td>
		
		</tr>
		<tr>
		<td width='100' align='right'>
		BRAND:
		</td>
		<td width='300' align='left' style="padding:10px">
		<input style="width:230px" type='text' name='brand'  value="<?php echo"$brand";?>"  placeholder='BRAND' readonly>
		</td>
		</tr>
		<tr>
		<td width='100' align='right'>
		UNIT:
		</td>
		<td width='300' align='left' style="padding:10px">
		<input style="width:230px" type='text' name='unit' value="<?php echo"$unit";?>"  placeholder='UNIT' readonly>
		</td>
		</tr>
		<tr>
		<td width='100' align='right'>
		MODEL:
		</td>
		<td width='300' align='left' style="padding:10px">
		<input style="width:230px" type='text' name='model'  value="<?php echo"$model";?>" placeholder='MODEL' readonly>
		</td>
		</tr>
		<tr>
		<td width='100' align='right'>
		SERIAL:
		</td>
		<td width='300' align='left' style="padding:10px">
		<input style="width:230px" type='text' name='serial'  value="<?php echo"$serial";?>" placeholder='SERIAL' readonly>
		</td>
		</tr>
		<tr>
		<td width='100' align='right'>
		TROUBLE REPORT:
		</td>
		<td width='300' align='left' style="padding:10px">
		<input style="width:230px" type='text' name='trouble_found'  value="<?php echo"$trouble_report";?>" placeholder='TROUBLE FOUND' readonly>
		</td>
		</tr>
		<tr>
		<td width='100' align='right'>
		REMARKS:
		</td>
		<td width='300' align='left' style="padding:10px">
		<input style="width:230px" type='text' name='remarks'  value="<?php echo"$remarks";?>"  placeholder='REMARKS' readonly>
		</td>
		</tr>
		<tr>
		<td width='100' align='right'>
		DATE CALL:
		</td>
		<td width='300' align='left' style="padding:10px">
		<input style="width:230px" type='date' name='date_call'  value="<?php echo"$date_call";?>" readonly>
		</td>
		</tr>
		<tr>
		<td width='100' align='right'>
		DATE SCHEDULED:
		</td>
		<td width='300' align='left' style="padding:10px">
		<input style="width:230px" type='date' name='date_scheduled' value="<?php echo"$date_scheduled";?>" readonly>
		</td>
		</tr>
		
		
		
		</table>
		</div>
		
		</td>
		<td>
		<div style='width:100%; height:500px; overflow:auto;'>
			<form method='post'>
		<table style='border: 0; text-align:left;' width='100%'>
		<tr >
		<td width='40%' style="padding:10px">
		<div style='width:400px; height:450px; overflow:auto;'>
		<table   cellspacing='0' border='1' width='100%' >
		<tr style='background:#0f0f0a;color:white'>
       
		<td colspan='2' align='center' >
		ACTION
		</td>
		
		</tr>
		<tr>
		<td width='100' align='right'>
		DATE VISIT:
		</td>
		<td width='300' align='left' style="padding:10px">
		<input style="width:230px" type='date' name='date_visit' required>
		</td>
		</tr>
		<tr>
		<td width='100' align='right'>
		DATE DONE:
		</td>
		<td width='300' align='left' style="padding:10px">
		<input style="width:230px" type='date' name='date_done' >
		</td>
		</tr>
		
		<tr>
		<td width='100' align='right'>
		TROUBLE FOUND:
		</td>
		<td width='300' align='left' style="padding:10px">
		<input style="width:230px" type='text' name='trouble_found' placeholder='TROUBLE FOUND' required>
		</td>
		</tr>
		<tr>
		<td width='100' align='right'>
		TECHNICIAN:
		</td>
		<td width='300' align='left' style="padding:10px">
		<input style="width:230px" type='text' name='technician' placeholder='TECHNICIAN' required>
		</td>
		</tr><tr>
		<td width='100' align='right'>
		CHARGE:
		</td>
		<td width='300' align='left' style="padding:10px">
		<input style="width:230px" type='text' name='charge' placeholder='CHARGE' required>
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