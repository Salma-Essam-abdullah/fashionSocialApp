<?php

require "dbicon.php";
$uname= $_POST["username"];
$pass= $_POST["password"];
$repass= $_POST["repassword"];
$mail= $_POST["email"];
if($uname=="" || $pass=="" || $repass=="" || $mail=="")
{
	echo '<script> alert("Empty Field")</script>';
	require "login.html";
}
else if($pass!=$repass)
{
	echo '<script> alert("Password doesnot match")</script>';
	require "login.html";	
}
else if(!filter_var($mail,FILTER_VALIDATE_EMAIL))
{
	echo '<script> alert("Invalid Email")</script>';
	require "login.html";
	
}
else{
	 $sql="select * from login where name='$uname'";
	 $res=mysqli_query($con,$sql) or die(mysqli_error($con));
	 if(mysqli_num_rows($res)>=1)
     {
		 echo '<script> alert("Username Already Taken")</script>';
	     require "login.html";
	 }
else
{
    mysqli_query($con,"insert into login(name,password,email) values('$uname', '$pass' , '$mail')");          
	 echo '<script> alert("Registration success")</script>';
	 require "log.html";
}
}
mysqli_close($con);
?>