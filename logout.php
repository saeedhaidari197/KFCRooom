<?php
include("connection.php");
session_start();

$user_id = $_SESSION['user_id'];
$update = "update users set user_last_active = now() , user_status = '0' where user_id = '$user_id'";
$run = $conn->query($update);

session_destroy();
header("location:login.php");
?>
