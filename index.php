<!DOCTYPE html>
<?php
session_start();
/*if(!isset($_SESSION['user_id']))
{
    header("location:login.php");
}*/
include ("classes.php");
$func = new allfunctions;
?>
<html lang="en">
<head>
    <?php
    $func->head("KFC Room");
    ?>
</head>
<body id="body">
    <div class="container">
        <div class="row no-gutters box">
            <div class="col-md-4">
                <?php
                    $func->fetch_user_data($_SESSION['user_id']);
                ?>
                <div class="search-box">
                    <div class="input-wrapper">
                        <i class="fa fa-search icon"></i>
                        <input class="search" type="text" placeholder="Search here">
                    </div>
                </div>
                <div id="msgs">
                </div>
            </div>
            <div class="col-md-8" id="belowpart">
                <div class="row">
                    <div class="col-md-12">
                        <div class="settings-tray" id="chatter">

                        </div>
                    </div>
                </div>
                <div class="chat-panel">
                    <div class="row">
                       <div class="col-md-12">
                                <div class="msg-inbox">
                                    <div class="chats">
                                        <div class="msg-page">


                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                    <div class="row" id="sending">
                            <div class="col-12">
                                <div class="input-box">
                                    <i class="fas fa-smile icoons"></i>
                                    <input class="send" id="message" name="msg" type="text" placeholder="Text Your Message in here.....">
                                    <i class="fa fa-microphone icoons"></i>
                                    <button type="button"  name="sending" class="butn"><i class="fa fa-send icoons"></i></button>
                                   <div id="now">
<input type="text"  id="hidden" class="form-control col-md-12" hidden/>
                                   </div>

                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<script>

    $(document).ready(function() {
        function fetchusers () {
            var type = "check"
            $.ajax({
                url: "classes.php",
                method: "post",
                data: {check_msg: type},
                success: function (data) {
                    $('#msgs').html(data);
                }
            })
        }
        fetchusers();
            setInterval(function () {
fetchusers();
            }, 5000);

function ret(id){
    var x = setInterval(function () {
        console.log(id)
        $.ajax({
            url: "classes.php",
            method: "post",
            data: {row_id: id},
            success: function (data) {
                $('.msg-page').html(data);
            }
        })
    }, 500);
    return x;
}
    $(document).on('click', '.fetchuser', function() {
        clearInterval(x)
        var id = $(this).attr("id");
        var x = ret(id);
        if($(document).on('click', '.fetchuser', function () {
            clearInterval(x);
        }))
var idd=id;
        $.ajax({
            url: "classes.php",
            method: "post",
            data: {chat_id: id},
            success: function (data) {
document.getElementById('hidden').value=idd;
                $('#chatter').html(data);
            }
        })

    })

     $('#chatter').click(function () {

         var height = $('.msg-page').height
        $('.msg-page').animate({scrollTop: 10000}, 1000);
     })
/*function  go(id){
   var msg= document.getElementById('message').value();
    $.ajax({
        method:"POST",
        url:"classes.php,
        data:{idforsending:id,message:msg},
        dataType:"JSON",
        success:function(data){

        },
        error:function(){

    }

    });
}*/

       document.getElementById('message').addEventListener("keyup", function (e) {
            e.preventDefault();
            if (e.keyCode === 13) {
                e.preventDefault();
                var msg = $(this).val();
                var id = document.getElementById('hidden').value;
                $.ajax({
                    url : "classes.php",
                    method: "POST",
                    data :{
                        message_content : msg,
                        message_id : id
                    },
                    success: function (data){
                        $('#message').val("");

                    }
                })
            }
        });


    });

</script>