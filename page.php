<?php
     
require "dbcon.php";
$addPost=$_POST["textArea"];

if($addPost =="")
{
   echo '<script> alert("you do not add post") </script>';
   require "home.html" ;
}
else
{
  
 $sql="SELECT * FROM addtext";
 mysqli_query($con,"insert into addtext (textpost) values ('$addPost')");
 $result= mysqli_query($con,$sql);

while ($row = mysqli_fetch_assoc($result))
{
    echo $row["textpost"];
}
   require "home.html" ;
}

?>