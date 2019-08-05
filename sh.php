<?php 

 $dbhost = "localhost";
 $dbuser = "root";
 $dbpass = "";
 $dbname = "shopping";
 // Create connection
$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname) or die($conn->connect_error);
$result="SELECT COUNT(*) FROM slogin";
 
$username= $_POST['username'];
$email   = $_POST['email'];
$password= $_POST['password'];
$mobile  = $_POST['mobile'];
if($id < 1)
{
	$id=0;
}

$query   = "INSERT into slogin(email,username,password,mobile) VALUES('" . $email . "','" . $username . "','" . $password . "','" . $mobile . "')";
$success = $conn->query($query);
$row_cnt = $query->num_rows;
if (!$success) {
    die("Couldn't enter data: ".$conn->error);
}
else if($dbname == "" || $dbuser == "" || $dbpass == "" || $email =="" || $username == "" || $password == "" || $mobile == "")
{
	echo "Invalid";
}
else
{
	header("Location: lls.html");
}
$conn->close();
?>