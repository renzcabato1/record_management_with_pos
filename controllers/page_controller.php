<?php
if (isset($_GET['page'])) {
	if($_GET['page'] == "home")
	{	
	include ("views/home.php");
	}
	if($_GET['page'] == "invoice_history")
	{	
	include ("views/invoice_history.php");
	}
	if($_GET['page'] == "sales_report")
	{
if( $_SERVER['REQUEST_METHOD']=='POST' )
		sales_report();
	else		
	include ("views/sales_report.php");
	}
	else if($_GET['page'] == "inventory")
	{
	if( $_SERVER['REQUEST_METHOD']=='POST' )
		inventory();
	else	
	include ("views/inventory.php");
	}
	else if($_GET['page'] == "inventory_employee")
	{
	
	include ("views/inventory_employee.php");
	}
	else if($_GET['page'] == "schedule")
	{
		
	include ("views/schedule.php");
	}
	else if($_GET['page'] == "view_schedule")
	{
	if( $_SERVER['REQUEST_METHOD']=='POST' )
		save_view_schedule();
	else
		view_schedule();
	}
	else if($_GET['page'] == "stock")
	{
	if( $_SERVER['REQUEST_METHOD']=='POST' )
		stock();
	else	
	include ("views/new_stock.php");
	}
	else if($_GET['page'] == "customer")
	{	
	if( $_SERVER['REQUEST_METHOD']=='POST' )
		customer();
	else
	include ("views/customer.php");
	}
	else if($_GET['page'] == "customer_employee")
	{	
	if( $_SERVER['REQUEST_METHOD']=='POST' )
		customer();
	else
	include ("views/customer_employee.php");
	}
	else if($_GET['page'] == "edit_cus")
	{	
	if( $_SERVER['REQUEST_METHOD']=='POST' )
		save_customer();
	else
		edit_customer();
	}
	else if($_GET['page'] == "edit_inventory")
	{	
	if( $_SERVER['REQUEST_METHOD']=='POST' )
		save_inventory();
	else
		edit_inventory();
	}
	else if($_GET['page'] == "delete_cus")
	{	
	
		delete_cus();
	}
	else if($_GET['page'] == "reset_acc")
	{	
	
		reset_acc();
	}
	else if($_GET['page'] == "account")
	{
	if( $_SERVER['REQUEST_METHOD']=='POST' )
		account();
	else
	include ("views/account.php");
	}
	else if($_GET['page'] == "payment")
	{
	if( $_SERVER['REQUEST_METHOD']=='POST' )
		payment();
	else
	include ("views/payment.php");
	}
	else if($_GET['page'] == "new_customer")
	{
	if( $_SERVER['REQUEST_METHOD']=='POST' )
		new_customer_schedule();
	else
	include ("views/new_customer_schedule.php");
	}
	else if($_GET['page'] == "old_customer")
	{
	if( $_SERVER['REQUEST_METHOD']=='POST' )
		old_customer_schedule();
	else
	include ("views/old_customer_schedule.php");
	}
	else if($_GET['page'] == "delete_stock")
	{
		delete_stock();
	}
	else if($_GET['page'] == "remove_payment")
	{
		remove_payment();
	}
	else if($_GET['page'] == "done_all_item")
	{
	if( $_SERVER['REQUEST_METHOD']=='POST' )
		save_invoice_na();
	else	
	include ("views/invoice_na.php");
	}
	else if($_GET['page'] == "deacc_acc")
	{
		deacc_acc();
	}
	else if($_GET['page'] == "ac_acc")
	{
	ac_acc();
	}
	else if($_GET['page'] == "password")
	{
		if( $_SERVER['REQUEST_METHOD']=='POST' )
		save_password();
		else
	
		include ("views/password.php");
	
	}
	else if($_GET['page'] == "schedule_report")
	{
		if( $_SERVER['REQUEST_METHOD']=='POST' )
		schedule_report();
		else
	
		include ("views/schedule_report.php");
	
	}
	}
else
{	
	
	include ("views/home.php");
	
}
function customer(){
$name_cus =$_POST['name_cus'];
$address =$_POST['address'];
$contact_number =$_POST['contact_number'];

$conn = mysqli_connect("localhost","root","","rmpos_db");	 
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "INSERT INTO customer (customer_name,address,contact_number)
VALUES (\"$name_cus\",\"$address\",\"$contact_number\")";
if ($conn->query($sql) === TRUE) {
   header("Location: index.php?page=customer");	
}
else{
	 echo "Error Inserting record: " . mysqli_error($conn);
}

}
function delete_cus(){
	
$id=$_GET['ID'];

$conn = mysqli_connect("localhost","root","","rmpos_db");	 
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "UPDATE customer set delete_cus='1' where id='$id'";
if ($conn->query($sql) === TRUE) {
   header("Location: index.php?page=customer");	
}
else{
	 echo "Error Updating record: " . mysqli_error($conn);
}

}
function edit_customer(){
$id=$_GET['ID'];

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

$sql = "SELECT * FROM customer where id='$id'";
$result = $conn->query($sql);	

if ($result->num_rows > 0) {

  while($row = $result->fetch_assoc()) {
	   $customer_name= $row['customer_name'];
	 $address= $row['address'];
	$contact_number=  $row['contact_number'];

	}
include "views/edit_customer.php";
}
}
function edit_inventory(){
$id=$_GET['ID'];

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

$sql = "SELECT * FROM parts_info where id='$id'";
$result = $conn->query($sql);	

if ($result->num_rows > 0) {

  while($row = $result->fetch_assoc()) {

	   $parts_number= $row['parts_number'];
	 $description= $row['description'];
	$location=  $row['location'];
	$price=  $row['map_price'];
	$qty=  $row['total_stock'];
	$status=  $row['status'];

	}
include "views/edit_inventory.php";
}
}	
function save_customer(){
	
$id=$_GET['ID'];
$name_cus =$_POST['name_cus'];
$address =$_POST['address'];
$contact_number =$_POST['contact_number'];

$conn = mysqli_connect("localhost","root","","rmpos_db");	 
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "UPDATE customer set  customer_name=\"$name_cus\",address=\"$address\",contact_number=\"$contact_number\" where id ='$id'";
if ($conn->query($sql) === TRUE) {
	
   header("Location: index.php?page=customer");	
}
else{
	 echo "Error Updating record: " . mysqli_error($conn);
}
}
function reset_acc(){
	$id=$_GET['ID'];

$conn = mysqli_connect("localhost","root","","rmpos_db");	 
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "UPDATE account set password='123456'";
if ($conn->query($sql) === TRUE) {
   header("Location: index.php?page=account");	
}
else{
	 echo "Error Updating record: " . mysqli_error($conn);
}
	
}
function inventory(){
$parts_num =$_POST['parts_num'];
$description =$_POST['description'];
$location =$_POST['location'];
$price =$_POST['price'];
$status =$_POST['status'];
$date_today = date('Y-m-d');;

$conn = mysqli_connect("localhost","root","","rmpos_db");	 
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "INSERT INTO parts_info (parts_number,description,location,map_price,status,date_update)
VALUES (\"$parts_num\",\"$description\",\"$location\",\"$price\",\"$status\",\"$date_today\")";
if ($conn->query($sql) === TRUE) {
   header("Location: index.php?page=inventory");	
}
else{
	 echo "Error Inserting Record: " . mysqli_error($conn);
}

}
function save_inventory(){
	
$id=$_GET['ID'];
$parts_num =$_POST['parts_num'];
$description =$_POST['description'];
$location =$_POST['location'];
$price =$_POST['price'];
$status =$_POST['status'];
$date_today = date('Y-m-d');;

$conn = mysqli_connect("localhost","root","","rmpos_db");	 
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "Update parts_info  set parts_number=\"$parts_num\",description=\"$description\",location=\"$location\",map_price=\"$price\",status=\"$status\",date_update=\"$date_today\"
where id ='$id'";
if ($conn->query($sql) === TRUE) {
   header("Location: index.php?page=inventory");	
}
else{
	echo "Error Inserting Record: " . mysqli_error($conn);
}

}
function stock(){
	$parts_num =$_POST['parts_num'];
	$qty =$_POST['qty'];
	$remarks =$_POST['remarks'];
	$date_delivered =$_POST['date_delivered'];
	$date_encode =date('Y-m-d');

$conn = mysqli_connect("localhost","root","","rmpos_db");	 
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$sql = "select * from parts_info where parts_number = '$parts_num'";
$result = $conn->query($sql);	
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				$stock=$row['total_stock'];
				$new_stock=$stock+$qty;
				$sql1= "UPDATE parts_info SET total_stock='$new_stock' where parts_number='$parts_num' ";
				if ($conn->query($sql1) === TRUE) {
					
$sql = "INSERT INTO new_stock (parts_number,remarks,date_encode,date_delivered,qty)
VALUES (\"$parts_num\",\"$remarks\",\"$date_encode\",\"$date_delivered\",\"$qty\")";
if ($conn->query($sql) === TRUE) {
   header("Location: index.php?page=stock");	
}
else{
	 echo "Error Inserting record: " . mysqli_error($conn);
}
					
				
				}
				else{
					 echo "Error Inserting record: " . mysqli_error($conn);
			}
				
			}
			
		}
		else
		{
			echo ' <script type="text/javascript">
             alert("THE PARTS NUMBER YOU ENTERED IS INVALID!")
			</script>';
			header("refresh: .1;");
			
			
		}

	
}
function delete_stock(){
	$id=$_GET['ID'];

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
		$sql = "SELECT * FROM new_stock where id='$id'";
		$result = $conn->query($sql);	
		
		while($row = $result->fetch_assoc()) {
			
			$parts_number=$row['parts_number'];
			$qty=$row['qty'];
		
			$sql1 = "SELECT * FROM parts_info where parts_number='$parts_number'";
		$result1 = $conn->query($sql1);
		while($row1 = $result1->fetch_assoc()) {
			$qty1=$row1['total_stock'];
			$new_qty=$qty1-$qty;
			$sql2 = "update parts_info set total_stock='$new_qty' where parts_number ='$parts_number'";
		if ($conn->query($sql2) === TRUE) {
  
$sql = "delete  FROM new_stock where id='$id'";
if ($conn->query($sql) === TRUE) {
   header("Location: index.php?page=stock");	
}
else{
	 echo "Error Deleting record: " . mysqli_error($conn);
}
}
else{
	echo "Error Updating Record: " . mysqli_error($conn);
}
			
		}
		
			
			
		}
		
		
}
function new_customer_schedule(){
$name_cus =$_POST['name_cus'];
$address =$_POST['address'];
$contact_number =$_POST['contact_number'];
$brand =$_POST['brand'];
$unit =$_POST['unit'];
$model =$_POST['model'];
$serial =$_POST['serial'];
$trouble_found =$_POST['trouble_found'];
$remarks =$_POST['remarks'];
$date_call =$_POST['date_call'];
$date_encode =date('Y-m-d');
$conn = mysqli_connect("localhost","root","","rmpos_db");	 
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$sql = "INSERT INTO customer (customer_name,address,contact_number)
VALUES (\"$name_cus\",\"$address\",\"$contact_number\")";
if ($conn->query($sql) === TRUE) {
 $sql1 = "INSERT INTO schedule (name,address,contact_number,brand,unit,model,serial,trouble_report,date_call,date_encode,date_scheduled)
VALUES (\"$name_cus\",\"$address\",\"$contact_number\",\"$brand\",\"$unit\",\"$model\",\"$serial\",\"$trouble_found\",\"$date_call\",\"$date_encode\",\"$date_scheduled\")";
if ($conn->query($sql1) === TRUE) {
	  header("Location: index.php?page=schedule");	
}
else{
	 echo "Error Inserting record: " . mysqli_error($conn);
}
}
else{
	 echo "Error Inserting record: " . mysqli_error($conn);
}
}
function old_customer_schedule(){
$name_cus =$_POST['name_cus'];

$brand =$_POST['brand'];
$unit =$_POST['unit'];
$model =$_POST['model'];
$serial =$_POST['serial'];
$trouble_found =$_POST['trouble_found'];
$remarks =$_POST['remarks'];
$date_call =$_POST['date_call'];
$date_encode =date('Y-m-d');
$conn = mysqli_connect("localhost","root","","rmpos_db");	 
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$sql = "select * from customer where customer_name = '$name_cus' and delete_cus='0'";
$result = $conn->query($sql);	
if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$name_cus =$row['customer_name'];
			$address =$row['address'];
			$contact_number =$row['contact_number'];
			$sql1 = "INSERT INTO schedule (name,address,contact_number,brand,unit,model,serial,trouble_report,date_call,date_encode,date_scheduled)
			VALUES (\"$name_cus\",\"$address\",\"$contact_number\",\"$brand\",\"$unit\",\"$model\",\"$serial\",\"$trouble_found\",\"$date_call\",\"$date_encode\",\"$date_scheduled\")";
		if ($conn->query($sql1) === TRUE) {
   header("Location: index.php?page=schedule");	
}
else{
	 echo "Error Inserting record: " . mysqli_error($conn);
}
		}
	}
		else
			
			{
				echo ' <script type="text/javascript">
             alert("THE NAME YOU ENTERED IS INVALID!")
			</script>';
			header("refresh: .1;");
			
			}

}
function view_schedule(){
$id=$_GET['ID'];

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

$sql = "SELECT * FROM schedule where id='$id'";
$result = $conn->query($sql);	

if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
	$name= $row['name'];
	$contact_number= $row['contact_number'];
	$address=  $row['address'];
	$brand=  $row['brand'];
	$unit=  $row['unit'];
	$model=  $row['model'];
	$serial=  $row['serial'];
	$trouble_report=  $row['trouble_report'];
	$date_call=  $row['date_call'];
	$date_scheduled=  $row['date_scheduled'];
	$remarks=  $row['remarks'];
	}
	include "views/view_schedule.php";
	}
}
function save_view_schedule(){
	
$id=$_GET['ID'];
$date_visit =$_POST['date_visit'];
$date_done =$_POST['date_done'];
$trouble_found =$_POST['trouble_found'];
$technician =$_POST['technician'];
$charge =$_POST['charge'];

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


if($date_done==''){
	$sql = "INSERT INTO action (schedule_id,technician,trouble_found,charge,date_visit)
VALUES (\"$id\",\"$technician\",\"$troube_found\",\"$charge\",\"$date_visit\")";
if ($conn->query($sql) === TRUE) {
   header("Location: index.php?page=schedule");	
}
else{
	 echo "Error Inserting record: " . mysqli_error($conn);
}
}
else
{	
$sql = "UPDATE schedule set  date_done=\"$date_done\" where id ='$id'";
if ($conn->query($sql) === TRUE) {
	
  
$sql1 = "INSERT INTO action (schedule_id,technician,trouble_found,charge,date_visit)
VALUES (\"$id\",\"$technician\",\"$troube_found\",\"$charge\",\"$date_visit\")";
if ($conn->query($sql1) === TRUE) {
   header("Location: index.php?page=schedule");	
}
else{
	 echo "Error Inserting record: " . mysqli_error($conn);
}
}
else{
	 echo "Error Updating record: " . mysqli_error($conn);
}

}

	
}
function payment(){
$barcode =$_POST['barcode'];
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
$sql = "SELECT * FROM parts_info where parts_number='$barcode'";
		$result = $conn->query($sql);	
		if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			if($row['total_stock'] > 0){
			$iminus = $row['total_stock'] - 1;
			$b=$row['map_price'];
			$sql1 = "SELECT * FROM payment where parts_number='$barcode' and done=0 ";
			$result1 = $conn->query($sql1);	
			if ($result1->num_rows > 0) {
				while($row1 = $result1->fetch_assoc()) {
				
					$b=$row1['price'];
					$new_qty=$row1['qty']+1;
					
					
					$sql2 = "Update payment  set qty=\"$new_qty\" where parts_number ='$barcode' and done=0";
					if ($conn->query($sql2) === TRUE) {
							
					$sql10 = "Update parts_info  set total_stock=\"$iminus\" where parts_number ='$barcode'";
					if ($conn->query($sql10) === TRUE) {
					   header("Location: index.php?page=payment");	
					}
					else{
						echo "Error Inserting Record: " . mysqli_error($conn);
					}
					   	
					}
					else{
						echo "Error Inserting Record: " . mysqli_error($conn);
					}
				}
			}
			
			else{
				$sql5 = "INSERT INTO payment (parts_number,qty,price)
				VALUES (\"$barcode\",'1',\"$b\")";
				if ($conn->query($sql5) === TRUE) {
				$sql10 = "Update parts_info  set total_stock=\"$iminus\" where parts_number ='$barcode'";
					if ($conn->query($sql10) === TRUE) {
					   header("Location: index.php?page=payment");	
					}
					else{
						echo "Error Inserting Record: " . mysqli_error($conn);
					}
				}
				else{
				 echo "Error Inserting record: " . mysqli_error($conn);
					}
			
					}
					}
			else{
				echo ' <script type="text/javascript">
             alert("NO STOCK AVAILABLE")
			</script>';
			header("refresh: .1;");
				
			}
			
		}
		}
		
		else
		{
			echo ' <script type="text/javascript">
             alert("INVALID BARCODE")
			</script>';
			header("refresh: .1;");
		}
}
function remove_payment(){
	$id=$_GET['ID'];

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

$sql = "SELECT * FROM payment where id='$id'";
$result = $conn->query($sql);	


  while($row = $result->fetch_assoc()) {
	 $parts_number= $row['parts_number'];
	 $qty= $row['qty'];
	
	}
	$sql2 = "SELECT * FROM parts_info where parts_number='$parts_number'";
	$result2 = $conn->query($sql2);	
	while($row2 = $result2->fetch_assoc()) {
		$total= $row2['total_stock'] + $qty;
		
		$sql2 = "Update parts_info  set total_stock=\"$total\" where parts_number ='$parts_number'";
				if ($conn->query($sql2) === TRUE) {
					$sql4 = "delete from payment where id='$id'";
					if ($conn->query($sql4) === TRUE) {
				header("Location: index.php?page=payment");	
					}
					else{
				 echo "Error REMOVING record: " . mysqli_error($conn);
					}	
				}
				else{
				 echo "Error Inserting record: " . mysqli_error($conn);
					}	
	}

		

	

}
function deacc_acc(){
	
	$id = $_GET['ID'];
$conn = mysqli_connect("localhost","root","","rmpos_db");	 
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "Update account set active = 1 where id ='$id'";
if ($conn->query($sql) === TRUE) {
   header("Location: index.php?page=account");	
}
else{
	echo "Error Inserting Record: " . mysqli_error($conn);
}
	
}
function ac_acc(){
	
	$id = $_GET['ID'];
$conn = mysqli_connect("localhost","root","","rmpos_db");	 
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "Update account set active = 0 where id ='$id'";
if ($conn->query($sql) === TRUE) {
   header("Location: index.php?page=account");	
}
else{
	echo "Error Inserting Record: " . mysqli_error($conn);
}
	
}
function account(){



$name =$_POST['name'];
$username =$_POST['username'];
$type =$_POST['type'];

$conn = mysqli_connect("localhost","root","","rmpos_db");	 
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
-
$sql = "INSERT INTO account (name,username,password,type)
VALUES (\"$name\",\"$username\",'123456',\"$type\")";
if ($conn->query($sql) === TRUE) {
   header("Location: index.php?page=account");	
}
else{
	 echo "Error Inserting record: " . mysqli_error($conn);
} 

	
}
function save_password(){
	$current_password=$_POST['current_password'];
	$new_password=$_POST['new_password'];
	$renz = $_SESSION['user_id'];
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "rmpos_db";
	$conn = new mysqli($servername, $username, $password, $dbname);
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
	$sql = "SELECT * FROM account where id=".$renz;
	$result = $conn->query($sql);

	 while($row = $result->fetch_assoc()) {
		$password = $row["password"];
	}
	
	
	if("$current_password"=="$password")
	{
	$sql = "update account set password=\"$new_password\" where id='$renz'";
if ($conn->query($sql) === TRUE) {
   header("Location: index.php?page=home");	
}
else{
	 echo "Error Inserting record: " . mysqli_error($conn);
}
	}
	
	else
	{
		echo ' <script type="text/javascript">
             alert("INVALID CURRENT PASSWORD!")
			</script>';
			header("refresh: .1;");
		
}
	
}
function save_invoice_na(){
$invoice_number =$_POST['invoice_number'];
$name =$_POST['name'];
$service_charge =$_POST['service_charge'];
$discount =$_POST['discount'];
$date_today =date('Y-m-d');


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
		$sql = "SELECT * FROM payment where done='0' order by id desc";
		$result = $conn->query($sql);	
		if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$sql = "update payment set customer=\"$name\",invoice_number=\"$invoice_number\",service_charge=\"$service_charge\",discount=\"$discount\",done='1',date_invoice='$date_today'
				where done = 0";
					if ($conn->query($sql) === TRUE) {
					header("Location: index.php?page=payment");	
				}
				else{
					 echo "Error Inserting record: " . mysqli_error($conn);
				}
			
		}
		}
				else
				{
					$sql = "INSERT INTO payment (customer,invoice_number,service_charge,discount,done,date_invoice)
					VALUES (\"$name\",\"$invoice_number\",\"$service_charge\",\"$discount\",'1','$date_today')";
					if ($conn->query($sql) === TRUE) {
					header("Location: index.php?page=payment");	
				}
				else{
					 echo "Error Inserting record: " . mysqli_error($conn);
				}
				}
	
		
}
function sales_report(){
$from=$_POST['from'];
$to=$_POST['to'];

		include ("views/sales_report_view.php");

}
function schedule_report(){
	$from=$_POST['from'];
	$to=$_POST['to'];

	include ("views/schedule_report.php");

	
	}
?>