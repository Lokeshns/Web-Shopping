<?php
session start;
$con=mysqli_connect("localhost","root","","shopping");

?>
<html>
<head>
<title>Shoping</title>
<link rel="stylesheet" href="llss.css">
</head>
<body>
<div class="nav">
	<center><ul>	
				<li><a href="#" onclick="laptop()">Laptops</li>
				<li><a href="#" onclick="mobile()">Mobiles</li>
				<li><a href="#" onclick="camera()">Cameras</li>
				<li><a href="#" onclick="watch()">Watches</li>
	</ul></center>
</div>

<div>
<center>
	<?php 
	$query="select *form products where id=1";
	$result=mysqli_query($con,$query);
	if(mysqli_num_rows($result) > 0)
	{
	while($row=mysqli_fetch_array($result))
	{
	?>
	<div>
	<form method"post" action="pro_reg.php<?php echo $row['id']?>">
	<div>
		<img src="<?php echo $row['img']; ?>" /></br>
		<h4><?php echo $row['name']; ?></h4></br>
		<h4><?php echo $row['price']; ?></h4></br>
		<input type="text" name="quantity" value="1" /></br>
		<input type="hidden" name="hidden_name" value="<?php echo $row['name']; ?>" /></br>
		<input type="hidden" name="hidden_price" value="<?php echo $row['price']; ?>" /></br>
		<input type="submit" name="add_to_cart" class="btn btn-success" value="ADD_TO_CART" /></br>
	</div>
	</form>
	</div>
	<?php
	}
	}
	?>
</center>
</div>
</body>
</html>