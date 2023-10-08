<?php
error_reporting(0);
include "dbconnect.php";

session_start();

$email = $_SESSION['email'];
$username=$_SESSION["username"];

if(empty($email)){
    header('location:login.php');
}
else{
    $ID=$_GET['edit_ID'];
// if(isset($_POST['submit'])){
    
    // $password=$_POST['f_password'];
    
    // echo $ID;

    $description=$_POST['description'];
    
    $username=$_SESSION["username"];
    echo $description;
    echo $username;
    // echo $name,$description,$price,$quantity;
    
    $sql = "INSERT INTO comments (comment_id,description,post_id,username) 
            VALUES (NULL,'$description','$ID','$username' )";
	
    if($conn->query($sql))
    {

        header("location:postDetails.php?edit_ID=$ID");
    
        
    }
    else
    {
        echo "comment failed";
    }
    
    
    $conn->close();

}


// }



?>



