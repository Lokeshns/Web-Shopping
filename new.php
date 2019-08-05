<!DOCTYPE html>
<html>
<head>
<title>Shoping</title>
<link rel="stylesheet" href="style.css">
<style>

* {box-sizing: border-box}
body {font-family: Verdana, sans-serif; margin:0}
.mySlides {display: none}
img {vertical-align: middle;}
.container
{
	max-width:980px;
	margin:auto;
	position:relative;
}
.prev, .next {
  cursor: pointer;
  position: absolute;
  top: 50%;
  width: auto;
  padding: 16px;
  margin-top: -22px;
  color: white;
  background-color:blue;
  font-weight: bold;
  font-size: 18px;
  transition: 0.6s ease;
  border-radius: 0 3px 3px 0;
}
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}
.prev:hover, .next:hover {
  background-color: rgba(0,0,0,0.8);
}
ul li ul li
{
	float:right;
}
</style>
</head>
<body>
<h1>This is FREE SHOPPING WEBSITE</h1> 
<ul>
<li><a href="https://www.google.com">Home</a></li>
<li><a href="#products">Products
  <ul>
	<li><a href="#">Cloths</li>
	<li><a href="#">Electronics</li>
	<li><a href="#">Vegetables</li>
  </ul>
</li>
<div class="heading">
<li><button class="register"><a href="#model" class="registerlink">Sign in</a></button></li>
</div>
</ul>
<div class="model_container" id="model">
  <div class="model">
    <a href="#" class="close">X</a>
	<span class="model_heading">LOGIN<span>
	<form action="#">
		<input type="text" placeholder="Email"><br>
		<input type="text" placeholder="Username"><br>
		<input type="password" placeholder="Password"><br>
		<input type="submit" class="btnRegister" value="Login"><br>
	</form>
	<a href="#" class="signin">Have you already registered?</a>
	<a href="#" class="forgotPassword">Forgot Password?</a>
  </div>
</div>
<br>
<br>
<br>
<div class="container">
<div class="mySlides fade" ><a onclick=href="https://www.yahoo.com"><img src="shrit1.jpg"></a></div>
<div class="mySlides fade" ><a onclick=href="https://www.youtube.com"><img src="shrit2.jpg"></a></div>
<div class="mySlides fade" ><a onclick=href="https://www.vvd.com"><img src="shrit3.jpg"></a></div>

<a class="prev" onclick="getdiv(-1)"> &#10094; </a>
<a class="next" onclick="getdiv(1)"> &#10095; </a>
</div>
<script>
	var slideIndex = 1;
showSlides(slideIndex);

function getdiv(n) {
  showSlides(slideIndex += n);
}
function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
	}	  
  slides[slideIndex-1].style.display = "block";  
}
</script>
</body>