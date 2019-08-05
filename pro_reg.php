<?php 

 $dbhost = "localhost";
 $dbuser = "root";
 $dbpass = "";
 $dbname = "shopping";
 // Create connection
$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname) or die($conn->connect_error);
$result="SELECT COUNT(*) FROM products";

$name= $_POST['name'];
$pro_code= $_POST['pro_code'];
$pro_desc= $_POST['pro_desc'];
$price	 = $_POST['price'];
$img_name= $_POST['img_name'];

$query   = "INSERT into products(name,pro_code,pro_desc,price,img_name) VALUES('" . $name . "','" . $pro_code . "','" . $pro_desc . "','" . $price . "','" . $img_name . "')";
$success = $conn->query($query);

if (!$success) {
    die("Couldn't enter data: ".$conn->error);
}
else if($dbname == "" || $dbuser == "" || $name == "" || $pro_code == "" || $pro_desc == "" || $price == "" || $img_name == "")
{
	echo "Invalid";
}
else
{
	header("Location: lls.html");
}
$conn->close();
?>