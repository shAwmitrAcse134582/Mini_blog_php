<?php
error_reporting(0);
include "dbconnect.php";
include "header.php";

session_start();

$username = $_SESSION["username"];
$password = $_SESSION["password"];

if (empty($email) || empty($password)) {
    header("location: login.php");
    exit();
}

// Modify your SQL query to select only the posts associated with the logged-in user
$s = "SELECT * FROM post WHERE username = '$username'";
$result = $conn->query($s);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/ea8d639258.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<?php
while ($r = $result->fetch_assoc()) {
    $username = $r['username'];
    $title = $r['title'];
    $ID = $r['id'];
    $image = $r['image'];
    $description = $r['description'];
    $date = $r['date'];
    ?>

    <!-- New bootstrap design -->
    <center>
        <div class="card mb-3" style="max-width: 900px;">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="<?= $image ?>" class="img-fluid rounded-start" alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title"><h3><b><?= $title ?></b><h3></h5>
                        <p class="card-text">
                            <?=substr($description,0,100) ?>
                            <a href='postDetails.php?edit_ID=<?= $ID ?>' class='card-link'>..read more....</a>
                        </p>
                        <p class="card-text">
                            <small class="text-body-secondary">
                                <b> posted on:</b> <?= date('d-M-Y', strtotime($date)) ?>
                                <b> by: <?= " " . $username ?>  </b>
                            </small>
                        </p>
                    </div>
                    <div class=" w-50 d-flex justify-content-around">
                        <?php
                        if (!empty($_SESSION['username']) && $_SESSION['username'] === $username) {
                            echo "<a class='btn btn-warning' href='editForm.php?edit_ID=$ID'>Edit</a>";
                            echo "<a class='btn btn-danger' href='delete.php?del_ID=$ID'>Delete</a>";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </center>

<?php
}
?>

</body>
</html>
