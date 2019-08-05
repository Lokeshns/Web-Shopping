<?php
session_start();
$x=$_SESSION["username"];
?>
<html>
<head>
<title>Shoping</title>
<link rel="stylesheet" href="llss.css">
</head>
<body>
<div>
<table>
<th>Name</th>
<th>Quantity</th>
<th>Price</th>
<th>Remove</th>
<?php
$dbhost = "localhost";
 $dbuser = "root";
 $dbpass = "";
 $dbname = "shopping";
 // Create connection
$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname) or die($conn->connect_error);
$sql1="select *from products";

