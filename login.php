<?php
error_reporting(0);
include "dbconnect.php";

session_start();

if(isset($_POST['submit'])){
    $email = $_POST['f_email'];
    $password=$_POST['f_password'];

    $sql = "SELECT * FROM user WHERE email = '$email' AND password = '$password'  ";
    $arr=$conn->query($sql);
    // print_r($result);
	// $arr=$result->fetch_assoc();
	
	

    if($arr==NULL){

        $sql = "SELECT * FROM user WHERE email = '$email' ";
        $arr=$conn->query($sql);
        // $arr=$result->fetch_assoc();

        if($arr == NULL){
                          echo '<script>alert(""No  user exists with this email"");</script>';
        }
        else{
                            echo '<script>alert("password is incorrect");</script>';
        }


    }


    else{
      while($result = $arr->fetch_assoc()){
        
        $_SESSION["username"] = $result['username'];
        
      }
      $_SESSION["email"] = "$email";
      $_SESSION["password"] = "$password";
      // $_SESSION["username"] = $_SESSION["username"] ? $_SESSION["username"] : "ashik763" ;


     
			header('location:index.php');
			
	}
	$conn->close();

}



?>



<!DOCTYPE html>
<html lang="en">
<head>
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
	<center>
		<h1> Log In  </h1>
		<form method="POST" action="login.php">
		
			<label>email</label>
			<input type="email"  placeholder="email " name="f_email" required > <br> <br>
			<label>password</label>
			<input type="password"  placeholder="password " name="f_password" required > <br> <br>
			<input type="submit" name="submit"  value="Login">
		</form>

		Don't have an account?<a href="register.php">Register </a> 
	</center>	
	
</body>
</html>