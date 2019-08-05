<?php  
 $dbhost = "localhost";
 $dbname = "shopping";
 $dbuser = "root";
 $dbpass = "";
 $db = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die($db->connect_error);

  session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
	  $email = mysqli_real_escape_string($db,$_POST['email']);
      $username = mysqli_real_escape_string($db,$_POST['username']);
      $password = mysqli_real_escape_string($db,$_POST['password']); 
 
	  $sql = "select *from slogin where email = '$email' and username = '$username' and passcode = '$password'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
	  
	  $count = mysqli_num_rows($result);	// If result matched $myusername and $mypassword, table row must be 1 row
	  
	  if($count == 1) {
         session_register("username");
         header("location: lls.html");
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }
?>  