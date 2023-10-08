<?php
include "dbconnect.php";



$filename = $_FILES["fileToUpload2"]["name"];
// echo $filename;
$temp= $_FILES["fileToUpload2"]["tmp_name"];
// echo $temp;

$folder="uploads/".$filename;
// echo $folder, $filename, $temp;
move_uploaded_file($temp,$folder);


$name=$_POST['f_name'];
$description=$_POST['f_description'];
$price=$_POST['f_price'];
$quantity=$_POST['f_quantity'];

// echo $name,$description,$price,$quantity;

$sql = "INSERT INTO product (id, name,description,price,quantity,image) 
		VALUES (NULL,'$name', '$description', '$price','$quantity','$folder')";

		
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