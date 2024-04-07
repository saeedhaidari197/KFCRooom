<?php
    session_start();
    include("connection.php");


    if(isset($_POST['save-user'])) {
        $bio = $_POST['bio'];
        $username = $_SESSION['reg_username'];

        $dir = "images/";
        $upload = $dir . basename($_FILES["profileImage"]["name"]);
        if(move_uploaded_file($_FILES["profileImage"]["tmp_name"], $upload))
        {
            $image = $dir . $_FILES["profileImage"]["name"];
        }

        $insert = "update users set user_bio = '$bio' , user_img = '$image' where user_username = '$username'";
        $run = $conn->query($insert);
        if($run){
            header('location:login.php');
        }
    }
?>