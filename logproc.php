<?php
 
 require "dbicon.php";
 $mail=$_POST["email"];
 $pass=$_POST["password"];
 
 $query="select * from login where email='$mail' and password='$pass'";
 $res=mysqli_query($con, $query);
 if(mysqli_num_rows($res)>=1)
 {
	if($mail=="salma@gmail.com"){
		header("Location:profile.html");
	die;
	}
	else if($mail=="engy@gmail.com"){
		header("Location:profile2.html");
	die;}
 }
 else{
	  echo '<script> alert("Invalid Username Or Password")</script>';
	 require "log.html";
 }
?>