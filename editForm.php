<?php
	include "dbconnect.php";
	include "header.php";
	error_reporting(0);
	session_start();
	$ID=$_GET['edit_ID'];

	$email = $_SESSION["email"];
	$password = $_SESSION["password"];
	

	if(empty($email) || empty ($password)){
		header("location:login.php");
	}
	else{
		$sql="SELECT * FROM post where ID='$ID'" ;
	$arr=$conn->query($sql);

	
	while($result = $arr->fetch_assoc()){
        $title = $result['title'];
        $description = $result['description'];
        // $image = $result['image'];
    
        
      }
	
	

 
	}
	
?>


<!DOCTYPE html>
<html lang="en">
<body>	
<center>
	 <div  style="width:80%">
	<h1>	Update </h1>

	 <form method="POST" action="edit.php?edit_ID=<?= $ID ?>" enctype="multipart/form-data">
  <div class="form-group">
    <label for="exampleFormControlInput1">Post title</label>
    <input type="text" value='<?php echo $title ?>'   name="title" class="form-control" id="exampleFormControlInput1" placeholder="">
  </div>

  <div class="form-group">
    <label for="exampleFormControlTextarea1">Description: </label>
    <textarea value='<?php echo $description ?>'  name="description" class="form-control" id="exampleFormControlTextarea1" rows="3">
		<?php echo $description ?>
	</textarea>
	<br> <br>
            <label>Select your file:</label>
			<input type="file" name="fileToUpload" id="fileToUpload" required> <br/> <br/>
  </div>
  <input class="btn btn-primary" type="submit" value="Update">
</form>
</div>
</center>
	
</body>