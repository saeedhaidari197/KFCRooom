<!DOCTYPE html>
<html lang="en">
<?php include("reg.php");
include("classes.php");
$func = new allfunctions;
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register Page</title>

    <!-- Owl-Carousel -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"/>

    <!-- Font Awesome CDN -->
    <script src="https://kit.fontawesome.com/23412c6a8d.js"></script>

    <!-- Custom Style-->
    <link rel="stylesheet" href="Link/register.css">
</head>
<body>

    <div class="container">
        <div class="panel">
            <div class="row">
                <div class="col liquid ">
                    <h4><i class="fas fa-drafting-compass"></i>KFC Room</h4>

                    <!-- Owl-Carousel -->

                    <div class="owl-carousel owl-theme">
                        <img src="pics/register1.svg" alt="" class="reg_img">
                        <img src="pics/register2.svg" alt="" class="reg_img">
                        <img src="pics/register3.svg" alt="" class="reg_img">
                    </div>

                    <!-- /Owl-Carousel -->

                    <div class="follow">
                        Follow us <i class="fab fa-facebook-f"></i>
                        <i class="fab fa-twitter"></i>
                    </div>
                </div>
                <div class="col reg">

                    <a href="login.php"><button type="button" class="btn btn-login">Log In</button></a>
                    <form action="" method="post">
                        <div class="titles">
                            <h6>Hey! New Friend</h6>
                            <h3>Ready to SignUp</h3>
                        </div>
                        <div class="form-group">
                            <input type="text" name="user_name" placeholder="Name" class="form-input" required>
                            <div class="input-icon">
                                <i class="fas fa-user"></i>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="text" name="user_username" placeholder="Username" class="form-input" required>
                            <div class="input-icon">
                                <i class="fas fa-envelope"></i>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="password" name="user_password" placeholder="Password" class="form-input" required>
                            <div class="input-icon">
                                <i class="fas fa-user-lock"></i>
                            </div>
                        </div>
                        <?php echo $message ?>
                        <button type="submit" name="register" class="btn btn-reg">Sign Up</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script>
        $(document).ready(function () {

            $('.owl-carousel').owlCarousel({
                loop: true,
                autoplay: true,
                autoplayTimeout: 2000,
                autoplayHoverPause: true,
                items: 1
            });
        });
    </script>
</body>

</html>