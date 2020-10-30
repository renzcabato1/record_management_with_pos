	<?php
function validate_loggedin(){

	if(isset($_POST['username'])&&isset($_POST['password'])){
			$username = $_POST['username'];
			$password = $_POST['password'];
			if(!empty($username)&&!empty($password)){
				
				include ("models/admin_model.php");
				$query_run = model_validate_loggedin($username,$password);
				if($query_run!=null){
					$query_num_rows = mysqli_num_rows($query_run);
					if($query_num_rows==0)
						echo "<script type='text/javascript'>alert('Invalid username/password combination');</script>";
					else if($query_num_rows==1){
						if( $row = mysqli_fetch_array($query_run) ){
							$user_id  = $row['id'];
							
							$_SESSION['user_id']=$user_id;
						
							header('Location: index.php');
						}
					}
				
				}
			}
			else
				echo "<script type='text/javascript'>alert('*You must supply a username and password');</script>";
	}
}


?>