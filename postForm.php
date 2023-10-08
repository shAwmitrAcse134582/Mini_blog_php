<?php 
    error_reporting(0);
	include "dbconnect.php";
	include "header.php";
    session_start();

$email = 	$_SESSION["email"];
$password = $_SESSION["password"];


if(empty($email) || empty ($password)){
	header("location:login.php");
}

?>

<!DOCTYPE html>
<html lang="en">
	<head> 

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </head>
<body>	


	 <center>
	 <div  style="width:80%">
	<h1 class="text-primary">	Post Your Blog Here!</h1>

	 <form method="POST" action="post.php" enctype="multipart/form-data">
  <div class="form-group">
    <label for="exampleFormControlInput1">Post title</label>
    <input type="text" name="title" class="form-control" id="exampleFormControlInput1" placeholder="">
  </div>

  <div class="form-group">
    <label for="exampleFormControlTextarea1">Write here: </label>
    <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
	<br> <br>
            <label>Select your file:</label>
			<input type="file" name="fileToUpload2" id="fileToUpload2"> <br/> <br/>
  </div>
  <input class="btn btn-primary " type="submit" value="Post">
</form>
</div>
</center>
</body>
</html>