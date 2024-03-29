<?php 

$connect= mysqli_connect("localhost","root","","slide");

function make_query($connect){
	$query="SELECT * FROM images ORDER BY img_id ASC";
	$result=mysqli_query($connect, $query);
	return $result;
}

function make_slide_inidicator($connect) {
	$output=' ';
	$count= 0;
	$result = make_query($connect);
	while($row = mysqli_fetch_array($result)) {
		if( $count == 0)
		{
			$output .='
				<li data-target= "#dynamic_slide_show" data-slide-to="' .$count.'" class="active"></li>
			';
		}
		else
		{
			$output .='
				<li data-target="#dynamic_slide_show" data-slide-to="'.$count.'"></li>
			';
		}
		$count=$count + 1;
	}
	return $output;
}

function make_slides($connect) {
	$output = ' ';
	$count = 0;
	$result = make_query($connect);
	while($row = mysqli_fetch_array($result) {
		if($count == 0) 
		{
			$output . =' <div class="item active"> ';
		}
		else
		{
			$output . =' <div class="item"> ';
		}
		$output .='
		<img src="slide\ '.$row["air_img"].'" alt="'.$row["air_name"].'" />
		<div class="carousel-caption">
		<h3>'.$row["air_img"].'</h3>
		</div>
		</div>
		';
		$count= $count + 1;
	}
	return $output;
}	

?>

<!DOCTYPE html>
<html>
<head>
	<title>Image slide</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
	<div id="dynamic_slide_show" class="carousel slide" data-ride="carousel">
	 <ol class="carousel-indicators">
		<?php echo make_slide_inidicator($connect); ?>
	 </ol>
	 
	 <div class="carousel-inner">
		<?php echo make_slides($connect); ?>
	</div>
   
	
    <a class="left carousel-control" href="#dynamic_slide_show" data-slide="prev">
     <span class="glyphicon glyphicon-chevron-left"></span>
     <span class="sr-only">Previous</span>
    </a>

    <a class="right carousel-control" href="#dynamic_slide_show" data-slide="next">
     <span class="glyphicon glyphicon-chevron-right"></span>
     <span class="sr-only">Next</span>
    </a>	
</div>
</div>
 </body>
</html>