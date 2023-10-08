<?php
	// error_reporting(0);
	include "dbconnect.php";
	
	session_start();
	
	$filename = $_FILES["fileToUpload"]["name"];
	$temp= $_FILES["fileToUpload"]["tmp_name"];

	$folder="uploads/".$filename;

	move_uploaded_file($temp,$folder);

$ID=$_GET['edit_ID'];
$title=$_POST['title'];
$description=$_POST['description'];

	

	// echo $name,$description,$phone,$date;
	
	$sql="UPDATE post SET title='$title', description='$description' ,
	image='$folder'
	 where id='$ID'";
	
	if($conn->query($sql)){
		// echo "<script> alert('Updated Successfully') </script>";
		header('location:index.php');

		//echo "updated succesfully";
		}
	else 
	echo "update failed";

	$conn->close();
?>