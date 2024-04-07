<?php
    include("connection.php");

    session_start();

    if(isset($_SESSION['user_id']))
        {
            header('location:index.php');
        }

     $message = '';

    if(isset($_POST['register'])){
        $name = $_POST['user_name'];
        $username = $_POST['user_username'];
        $pass = $_POST['user_password'];
        
        if(strlen($pass)<8){
            $message ="<p style='color:red; font-size:14px;'>Password Should be More than 8 characters</p>";
        }
        
        $check_username = "select * from users where user_username = '$username'";
        $run = $conn->query($check_username);
        $row = $run->num_rows;
        if($row > 0){
            $message = "<p style='color:red; font-size:14px;'>Username Already Exists</p>";
        }
        $epass = md5($pass);
        if($message == '') {
            $insert = "insert into users(user_name , user_username , user_password) values('$name' , '$username' , '$epass')";
            $runs = $conn->query($insert);
            if ($runs) {
                $_SESSION['reg_username'] = $username;
                header("location:add.php");
            } else
                $message = "<p style='color:red; font-size:14px;'>Registration Failed! Try Again.</p>";
        }
    }
    
?>