<?php
error_reporting(0);
session_start();

session_unset();

// // destroy the session
session_destroy();
header("location:login.php ");



?>