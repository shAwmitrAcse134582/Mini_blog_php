<?php
// error_reporting(0);
include "dbconnect.php";

session_start();

$filename = $_FILES["fileToUpload2"]["name"];
//echo $filename;
$temp= $_FILES["fileToUpload2"]["tmp_name"];
// echo $temp;

$folder="uploads/".$filename;
// echo $folder, $filename, $temp;
move_uploaded_file($temp,$folder);


$title=$_POST['title'];
$description=$_POST['description'];
$username=$_SESSION["username"] ? $_SESSION["username"] : "root" ;
$date=time();


$sql = "INSERT INTO post (id,username,title, description,date,image) 
		VALUES (NULL,'$username','$title', '$description','$date','$folder')";

		
		if($conn->query($sql))
		{

			header('location:index.php');
		
			
		}
		else
		{
			echo "insertion failed";
		}
		
		
		$conn->close();
?>