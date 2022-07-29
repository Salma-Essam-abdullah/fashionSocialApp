<?php
  // Create database connection
  $db = mysqli_connect("localhost", "root", "", "image_upload");

  // Initialize message variable
  $msg = "";

  // If upload button is clicked ...
  if (isset($_POST['upload'])) {
  	// Get image name
  	$image = $_FILES['image']['name'];
  	// Get text
  	$image_text = mysqli_real_escape_string($db, $_POST['image_text']);

  	// image file directory
  	$target = "images/".basename($image);

  	$sql = "INSERT INTO images (image, image_text) VALUES ('$image', '$image_text')";
  	// execute query
  	mysqli_query($db, $sql);

  	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
  		$msg = "Image uploaded successfully";
  	}else{
  		$msg = "Failed to upload image";
  	}
  }
  $result = mysqli_query($db, "SELECT * FROM images");
?>
<!DOCTYPE html>
<html>
<head>
<title>Image Upload</title>
<style type="text/css">
   #content{
   	width: 50%;
   	margin: 20px auto;
   	border: 1px solid #cbcbcb;
   }
   form{
   	width: 50%;
   	margin: 20px auto;
   }
   form div{
   	margin-top: 5px;
   }
   #img_div{
   	width: 80%;
   	padding: 5px;
   	margin: 15px auto;
   	border: 1px solid #cbcbcb;
   }
   #img_div:after{
   	content: "";
   	display: block;
   	clear: both;
   }
   img{
   	float: left;
   	margin: 5px;
   	width: 300px;
   	height: 140px;
   }
   
  body{
    margin: 0;
    padding: 0;
}
nav{
    width:100%;
	height:60px;
    overflow:hidden;
    background: rgb(209, 169, 121);
}

ul{
    padding: 0;
    margin: 0 0 0 250px;
    list-style: none;
}
li{
    float: left;
}
li a{
	 
    width: 100px;
    display: block;
    padding: 20px 15px;
    text-decoration: none;
    font-family: arial;
    color: rgb(121, 84, 32);
    text-align: center;
}

li a:hover{
    background: #ac934a;
    text-transform: uppercase;
}
.logo img{
    position: absolute;
    margin-top: 5px;
    margin-left: 10px;
}
</style>
</head>
<body>
<div class="logo">
            <a href="#">
        </a>
    </div>
        <nav> 
            <ul>
            <li ><a href="home.html">Home</a></li>
            <li "><a href="newa.html">Events</a></li>
            
            
            </ul>
        </nav>
<div id="content">
  <?php
    while ($row = mysqli_fetch_array($result)) {
      echo "<div id='img_div'>";
      	echo "<img src='images/".$row['image']."' >";
      	echo "<p>".$row['image_text']."</p>";
      echo "</div>";
    }
  ?>
  <form method="POST" action="index.php" enctype="multipart/form-data">
  	<input type="hidden" name="size" value="1000000">
  	<div>
  	  <input type="file" name="image">
  	</div>
  	<div>
      <textarea 
      	id="text" 
      	cols="40" 
      	rows="4" 
      	name="image_text" 
      	placeholder="You should insert your whatsapp and your closet url"></textarea>
  	</div>
  	<div>
  		<button type="submit" name="upload">POST</button>
  	</div>
  </form>
</div>

</body>
</html>