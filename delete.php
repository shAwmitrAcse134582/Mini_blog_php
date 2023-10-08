<?php
    error_reporting(0);
	include "dbconnect.php";
	
    session_start();

	$email = 	$_SESSION["email"];
	$password = $_SESSION["password"];


if(empty($email) || empty ($password)){
	// alert("please login");
	header("location:login.php");
}
else{
	$ID=$_GET['del_ID'];
	


	$sql2="DELETE FROM post WHERE id='$ID'";
	$sql="DELETE FROM comments WHERE post_id='$ID'";

	
	if($conn->query($sql))
	{
		if($conn->query($sql2))
		{
			
			header('location:index.php');
			//echo "Successfully deleted.";
		}
		else{
			echo "Failed delete!";
		}
		
		// header('location:index.php');
		//echo "Successfully deleted.";
	}
	else
	echo "Failed delete!";

}

$conn->close();
?>