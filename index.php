<?php
require 'controllers/core.php';
require 'controllers/connect.php';


if(loggedin()){
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
		$usertype = $row["type"];
	}
	if($usertype == 'ADMIN'){
	include ("views/header1.php");
	include ("views/body.php");
	include ("controllers/page_controller.php");
	}
	else if($usertype == 'EMPLOYEE'){
	include ("views/header1.php");
	include ("views/body_employee.php");
	include ("controllers/page_controller.php");
	}
	
}
else{
	include ("views/header.php");
	include ("views/login.php");
	include ("controllers/admin_controller.php");
	include ("views/footer.php");
	validate_loggedin();
}
?>