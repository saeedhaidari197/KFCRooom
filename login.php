<?php
include("log.php");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
    <link rel="stylesheet" type="text/css" href="link/login.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
</head>
<body>
<img class="wave" src="pics/loginWave.png">
<div class="container">
    <div class="img">
        <img src="pics/login.svg">
    </div>
    <div class="login-content">
        <form action="" method="post">
            <img src="pics/loginAvatar.svg">
            <h2 class="title">Welcome Back!</h2>
            <div class="input-div one">
                <div class="i">
                    <i class="fas fa-user"></i>
                </div>
                <div class="div">
                    <h5>Username</h5>
                    <input type="text" name="username" class="input" required>
                </div>
            </div>
            <div class="input-div pass">
                <div class="i">
                    <i class="fas fa-lock"></i>
                </div>
                <div class="div">
                    <h5>Password</h5>
                    <input type="password" name="pass" class="input" required>
                </div>
            </div>
            <a href="#">Forgot Password?</a>
            <?php echo $message; ?>
            <input type="submit" name="login" class="btn" value="Login">
        </form>
    </div>
</div>
<script type="text/javascript" src="link/login.js"></script>
</body>
</html>