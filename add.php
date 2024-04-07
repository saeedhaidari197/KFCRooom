<?php
    include('connection.php');
    include('add-process.php');
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="link/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="link/add.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-4 offset-md-4 form-div">
                <form method="post" enctype="multipart/form-data">
                    <h3 class="text-center">Create Profile</h3>
                    <div class="form-group">
                        <label for="profileImage">Profile Image</label>
                        <input type="file" name="profileImage" id="profileImage" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="bio">Bio</label>
                        <textarea name="bio" id="bio" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="save-user" class="btn btn-primary btn-block">Save</button>
                    </div>
                </form>
            </div>
            <div class="col-md-6">

            </div>
        </div>
    </div>
</body>
</html>