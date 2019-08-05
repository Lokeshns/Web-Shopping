<?php
$db_username = 'root';
$db_password = '';
$db_name = 'shopping';
$db_host = 'localhost';
$con = new mysqli($db_host, $db_username, $db_password,$db_name);                        
if ($con->connect_error) {
    die('Error : ('. $con->connect_errno .') '. $con->connect_error);
}
session_start();
if($_SERVER["REQUEST_METHOD"] == "POST") {
	$myemail =mysqli_real_escape_string($con,$_POST['email']);
	$myusername =mysqli_real_escape_string($con,$_POST['username']);
	$mypassword =mysqli_real_escape_string($con,$_POST['password']);
	$sql = "select id from slogin where email = '$myemail' and username = '$myusername' and password = '$mypassword'";
	$result = mysqli_query($con,$sql);
	$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
	$active = $row['active'];
	$count = mysqli_num_rows($result);
	if($count == 1) {
		$_SESSION['login_user'] = $myusername;
		
		header("location: lls.html");
	}else{
		$error ="your Login name or password is invalid";
		echo $error;
	}
}
?>