<?php
include("classes.php");
$func = new allfunctions;
?>
<?php 
    $func->update_user_profile();
?>
<!DOCTYPE html>
<html>
<head> <title> Account Profile </title>
<link rel="stylesheet" type="text/css" href="link/bootstrap.min.css">
<link rel="stylesheet" href="../../cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link type="text/css" rel="stylesheet" href="link/profile_update.css">
    <meta name='viewport' content='width=device-width, initial-scale=1'>
<script src='https://kit.fontawesome.com/a076d05399.js'></script>        

</head>
<body>
    <div class="container">
    <div class="row">
        <div class="col-md-3"></div>
        
        <div class="col-md-6 main">
            
            <form method="POST" action="" >
            
                <div class="row"> 
            <div > 
                 <img src="images/<?php echo $update_image ?>" >
            </div>
            </div>
            <div class="row">
                
                    <div class="col-md-7"></div>
                <div class="col-md-5">
                    <input type="file" name="img" id="img"> </div>
            </div>
            <div class="row name">
            <div class="col-md-2">
            <span>
                <i class="far fa-address-book" style="margin-left: 25px; margin-top: 8px; font-size: 25px;"></i>
            </span>
            </div>
                <div class="col-md-2"> <p>Name</p><hr> </div>
                <div class="col-md-6"> <input type="text" class="input1" name="name1" value="<?php
                    echo $update_name ?>" /></div>
                <div class="col-md-2">
            <span>
                <i class="fa fa-angle-right" style="color: darkgray;"></i> 
            </span>
                </div>  
            </div>
            <div class="row Bio">
            <div class="col-md-2">
            <span>
                <i class="fa fa-address-card" style="margin-left: 25px; margin-top: 8px; font-size: 25px;"></i>
            </span>
            </div>
                <div class="col-md-2"> <p>Bio</p><hr> </div>
                <div class="col-md-6"> <input type="text" class="input1" name="bio1" value="<?php
                    echo $update_bio ?>"/> </div>
                <div class="col-md-2">
            <span>
                <i class="fa fa-angle-right" style="color: darkgray;"></i> 
            </span>
                </div>  
            </div>
                
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-3"> 
                <button href="index.php" id="cancel">Cancel</button>
            </div>
            <div class="col-md-3">
           <button ><input type="submit" id="save" id="update" name="update" value="save Changes"/> </button>
            </div>
            <div class="col-md-3"></div>
        </div>
        </form>
    </div>
    </div>
    </div>
    
</body></html>