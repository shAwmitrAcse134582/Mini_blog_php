<?php
     error_reporting(0);
	include "dbconnect.php";
	// include "header.php";
	
	session_start();
	// $s="SELECT * FROM post";
	// $result=$conn->query($s);

	$email = $_SESSION["email"];
	$password = $_SESSION["password"];

	// echo $_SESSION["email"];

	if(empty($email) || empty ($password)){
		// header("location:login.php");
	}
	
	
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
       <header>
            <div class="navbar">

                <div class="top-left">
                    <p>Bu Tutorial Point</p>
                </div>

                <div class="top-right">

                    <div class="top-right-text">
                        <a href="home.php">Home</a>
						<a href="postForm.php">Create Post</a>
                        <a href="dashboard.php">Dashboard</a>
                       
                       <?php
					    if(empty($email)) {
							echo "<a href='login.php'>Login</a>";
						} 
						else{
                            echo   "<span class='text-success' > ". $_SESSION['username']. "</span>";
	                        echo	"<a href='logout.php'>Logout  </a>";
	
	
						}
						
						?>  
                      
						
                    </div>
                    <div class="icon">
                        <i class="fa-sharp fa-solid fa-magnifying-glass"></i>


                        <i class="fa-regular fa-paper-plane-top"></i>
                    </div>


                </div>

            </div>

        </header>
<!-- main part -->



<body>	
</html>