<?php
    
    include("connection.php");
    
    session_start();
    
    if(isset($_SESSION['user_id']))
        {
            header('location:index.php');
        }

    $message = '';

    if(isset($_POST['login'])){
        
        $uname=$conn->real_escape_string($_POST['username']);
        $pass=mysqli_real_escape_string($conn, $_POST['pass']);
        $epass = md5($pass);
        
        $select_user="select * from users where user_username='$uname' and user_password='$epass'";
		
		$result=$conn->query($select_user);
		$rows=$result->num_rows;
        
        if($rows == 1){
            $change_status = "UPDATE users SET user_status='1' where user_username='$uname'";
            $result = $conn->query($change_status);

            $sql="SELECT *FROM users WHERE user_username='$uname'" ;
            $run=$conn->query($sql);
            while($row=$run->fetch_array(MYSQLI_ASSOC))
            {
                $_SESSION['user_id'] = $row['user_id'];
                $_SESSION['user_name'] = $row['user_name'];
                $_SESSION['user_username'] = $row['user_username'];
            }
                header("location:index.php");
          
        }
        else
            $message = "<P style='color:red; font-size:14px;'>Wrong Username or Password</p>";
    }
?>