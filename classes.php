<?php

class msql {
private $conn;
public function connect(){
     $this->con = new mysqli("localhost", "root", "" , "mychat");
       if($this->con){
        return $this->con;
       }
    } 
}

class allfunctions {
    private $con;
    function __construct() {
        $db = new msql;
        $this->con = $db->connect() or die ($this->con->connect_error);
    }
    
    public function head($title){
        echo <<<_head
      <meta charset="UTF-8">
    <title>$title</title>
    <link type="text/css" rel="stylesheet" href="link/index.css"/>
    <link type="text/css" rel="stylesheet" href="link/bootstrap.css"/>
    <link type="text/css" rel="stylesheet" href="link/bootstrap.min.css"/>
    <link type="text/css" rel="stylesheet" href="link/bootstrap-grid.css"/>
    <link type="text/css" rel="stylesheet" href="link/bootstrap-grid.min.css"/>
    <link type="text/css" rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
    <script src="link/jquery-3.4.1.min.js"></script>
    <script src="link/index.js"></script>
    </head>
  
_head;
    }
        //Change User Status
    public function userstatus($user_id){
        $select = "select * from users where user_id = '$user_id'";
        $run = $this->con->query($select);
        $row = $run->fetch_assoc();
        if($row['user_status'] == 0)
        {
            return $row['user_last_active'];
        }
        else{
            $display =  "<div style='background: green; height: 15px; width: 15px; border-radius: 100%;'></div>";
            return $display;
        }
    }

    //Fetch user Table
    public function fetchusertable(){
        session_start();
    $user_id = $_SESSION['user_id'];
$sql= "SELECT * FROM users where user_id != '$user_id'" ;
$run= $this->con->query($sql);
/*$data['res']="";
$data['iddd']=0;
*/
    while($row= $run->fetch_assoc())
    {
        echo "<div class='friend-drawer fetchuser friend-drawer--onhover' id='".$row['user_id']."'>
                    <img src='".$row['user_img']."' alt='friend-photo' class='profile-img'>
                    <div class='text'>
                        <h6 class='friend-name'>".$row['user_name']."</h6>
                        <p class='friend-bio'>".$row['user_bio']."</p>
                    </div>
                    <span class='time small'>".$this->userstatus($row['user_id'])."</span>
                </div><hr>";
       // $data['iddd']=$row['user_id'];
    }
   // echo json_encode($data);
}



    //fetch chatter Data
    public function chatterData($id)
    {
        $chatter_id = $id;
        $select = "select * from users where user_id = '$chatter_id'";
        $run = $this->con->query($select);
        $row = $run->fetch_assoc();

        echo '    
                            <div class="friend-drawer no-gutters friend-drawer--grey">
                                <img class="profile-img" src="'.$row["user_img"].'" alt="Friend Image">
                                <div class="text">
                                    <h6 class="chatter-name">'.$row["user_name"].'</h6>
                                    <p class="chatter-bio">'.$row["user_bio"].'</p>
                                </div>
                                <span class="float-right"><i class="fa fa-icon"></i></span>
                            </div>  
 
            ';

    }

    //Fetch All Messaged
    public function catchData($id){
        session_start();
        $login = $_SESSION['user_id'];
        $chatter = $id;

        $select1 = "select * from users where user_id = '$login'";
        $run1 = $this->con->query($select1);
        $row1 = $run1->fetch_assoc();
        $login_img = $row1['user_img'];

        $select2 = "select * from users where user_id = '$chatter'";
        $run2 = $this->con->query($select2);
        $row2 = $run2->fetch_assoc();
        $chatter_img = $row2['user_img'];

        $sel_msg = "SELECT * FROM message WHERE (msg_from_user_id = '$login' and msg_to_user_id = '$chatter') or (msg_to_user_id = '$login' and msg_from_user_id = '$chatter') ORDER by 1 ASC";
        $run_msg = $this->con->query($sel_msg);

        while($row=$run_msg->fetch_array(MYSQLI_ASSOC))
        {
            $sender_id = $row['msg_from_user_id'];
            $receiver_id = $row['msg_to_user_id'];
            $msg_content = $row['msg_content'];
            $msg_date = $row['msg_date'];

            if($sender_id == $login and $receiver_id == $chatter)
            {
                echo '
                                            <div class="outgoing-chats">
                                                <div class="outgoing-chats-msg">
                                                    <p>'.$row["msg_content"].'</p>
                                                    <span class="msg-time">
                                                        '.$row["msg_date"].'
                                                    </span>
                                                </div>
                                                <div class="outgoing-chats-img">
                                                    <img src="'.$login_img.'">
                                                </div>
                                            </div>
                        ';
            }
            elseif ($sender_id == $chatter and $receiver_id == $login)
            {
                echo'
                                            <div class="recieved-chats">
                                                <div class="recieved-chats-img">
                                                    <img src="'.$chatter_img.'">
                                                </div>
                                                <div class="recieved-msg">
                                                    <div class="recieved-msg-inbox">
                                                        <p>'.$row["msg_content"].'</p>
                                                        <span class="msg-time">
                                                            '.$row["msg_date"].'
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                        ';
            }
        }
    }
    //send Message
    public function send_msg($receiver, $msg)
    {
        session_start();
        $sender = $_SESSION['user_id'];
// (msg_to_user_id , msg_from_user_id , msg_content , msg_date)
        /*echo "rec:" . $receiver;
        echo "sender " . $sender;
        echo "msg " . $msg;*/
                $insert = "insert into message values (msg_id,'$receiver', '$sender', '$msg', '1' , NOW());";
                $prestat = $this->con->prepare($insert) or die ("Message Error: " . $this->con->error);
                $prestat->execute();
    }

    //Send Image
    public function send_img($receiver , $picture)
    {
        session_start();
        $sender = $_SESSION['user_id'];

        $dir = "images/";
        $upload = $dir . basename($_FILES["profileImage"]["name"]);
        if(move_uploaded_file($_FILES["profileImage"]["tmp_name"], $upload))
        {
            $image = $dir . $_FILES["profileImage"]["name"];
        }

        $insert = "insert into message values (msg_id, '$receiver' , '$sender' , '$picture' , '2' , NOW())";
    }


// User data fatch
    public function fetch_user_data($user_id) {
        $select_user="select * from users where user_id = '$user_id'";
        $run = $this->con->query($select_user);
        $row = $run->fetch_assoc();
        
         echo  '<div class="settings-tray">
                    <img class="profile-img" src="'.$row["user_img"].'">
                    <div class="text" style="display: inline-block;">
                        <h6 class="friend-name">'.$row["user_name"].'</h6>
                        <p class="friend-bio">'.$row["user_bio"].'</p>
                    </div>
                    <span class="settings-tray--right float-right">
                        <a href="update.php"><i class="icons fa fa-edit"></i></a>
                        <a href="logout.php"><i class=" icons fa fa-sign-out"></i></a>
                    </span>
                </div>';
    }

// Update profile

    public function update_user_profile(){
        session_start();
        $id = $_SESSION['user_id'];
        $sql="SELECT *FROM users WHERE user_id='$id'" ;
        $run=$this->con->query($sql);
        while($row=$run->fetch_assoc())
        {
            $GLOBALS['update_name']=$row['user_name'];
            $GLOBALS['update_bio']=$row['user_bio'];
            $GLOBALS['update_image']=$row['user_img'];
            // $email=$row['email'];
            // $phone=$row['phone'];
        }

       if(isset($_POST['update']))
    {

            $update_image = $_POST['img'];
            $update_name=$_POST['name1'];
            $update_bio=$_POST['bio1'];
           // $email=$_POST['email'];
            //$phone=$_POST['phone'];

            $sql="UPDATE `users` SET user_img='$update_image', user_name='$update_name',user_bio='$update_bio' WHERE user_Id='$id'";
            if($this->con->query($sql)==true)
            {
                echo "Data have been Updated";
            }
            else
            {
                echo"Data is not Updated";
            }

            }
            }


                    }

// set ups

if(isset($_POST['chat_id'])){
    $id = $_POST['chat_id'];
    $operate = new allfunctions;
    $operate->chatterData($id);
}

if(isset($_POST['row_id'])){
    $id = $_POST['row_id'];
    $operate = new allfunctions;
    $operate->catchData($id);
}


if(isset($_POST['message_content'])){
    $id = $_POST['message_id'];
    $content = $_POST['message_content'];
    $operate = new allfunctions;
    $operate->send_msg($id, $content);
}


if(isset($_POST['check_msg'])){
    $operate = new allfunctions;
    $operate->fetchusertable();
}