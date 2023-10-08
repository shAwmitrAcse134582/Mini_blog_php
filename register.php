<?php
include "dbconnect.php";

@session_start();


if(isset($_POST['submit'])){
    $email = $_POST['f_email'];
    $name=$_POST['f_name'];
    $username=$_POST['f_username'];
    $password=$_POST['f_password'];

    $phone=$_POST['f_phone'];

    $sql = "SELECT * FROM user WHERE email = '$email' OR username = '$username'";
    $result=$conn->query($sql);
	
	$arr=$result->fetch_assoc();

    if($arr!=NULL){
		$sql = "SELECT * FROM user WHERE email = '$email' ";
       $result=$conn->query($sql);
	
	   $arr=$result->fetch_assoc();
	   if($arr!=NULL){
		    echo '<script>alert("Username or Email Already Exist");</script>';
	   }
	   else{
                 echo '<script>alert("Your username has to be unique like you are !");</script>';
	   }


       
    }else{
        $sql = "INSERT INTO user (id, name, username, email, phone,password) 
		VALUES ( NULL,'$name', '$username', '$email','$phone','$password')";

		
		if($conn->query($sql))
		{
			$_SESSION["email"] = "$email";
		        $_SESSION["password"] = "$password";
			header('location:index.php');

			
		}
		else
		
			 echo '<script>alert("Username or Email Already Exist");</script>';

		$conn->close();
        
    }

}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Registration Form</title>
  <link rel="stylesheet" href="stylereg.css">
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color:white;
    }

    h1 {
      text-align: center;
      color: #333;
    }

    form {
      max-width: 500px;
      margin: 0 auto;
      padding: 20px;
      background-color: #fff;
      border-radius: 10px;
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    }

    label {
      display: block;
      margin-bottom: 8px;
      font-weight: bold;
    }

    input[type="email"],
    input[type="password"],
    input[type="text"],
    textarea {
      width: 80%;
      padding: 10px;
      margin-bottom: 15px;
      border: 1px solid #ccc;
      border-radius: 10px;
    }



    input[type="submit"] {
      background-color: #e74c3c;
      color: #fff; 
      padding: 10px 40px; 
      border: none;
      border-radius: 10px;
      cursor: pointer;
      display: block; 
      margin: 0 auto; 
    }

    input[type="submit"]:hover {
      background-color:#1abc9c;
      border-radius: 10px;
    }
  </style>
</head>

<body>	
	
		<h1> Registration  </h1>
		<form method="POST" action="register.php">
			<label>Name</label>
			<input type="text" placeholder="Enter name" name="f_name" required> <br> <br>
			<label>username</label>
			<input type="text" placeholder="username" name="f_username" required> <br> <br>
			<label>email</label>
			<input type="email"  placeholder="email " name="f_email" required > <br> <br>
			<label>password</label>
			<input type="password"  placeholder="password " name="f_password"required > <br> <br>
			<label>Phone</label>
			<input type="text"  placeholder="Enter phone no. " name="f_phone" required> <br> <br>
			
			<input type="submit" name='submit' value="Register">
		</form>

		<div class="center">
  <center> <b><p>Already  have an account? <a href="login.php">Login</a></p></b></center>
</div>
		
	
</body>
</html>