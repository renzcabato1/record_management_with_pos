<?php

function model_validate_loggedin(&$username,&$password){
global $conn;

$query = "SELECT `id` FROM `account` WHERE `username`='$username' AND `password`='$password' and active='0' ";
$result = mysqli_query($conn, $query);

return $result;
}


?>