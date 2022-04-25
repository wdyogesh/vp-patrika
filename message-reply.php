<?php
include "asset/header.php";
if(!$session->is_signed_in()) { redirect("logout.php");} $id = $_SESSION['user_id'];
$my_profile_details = user::find_admin_by_id($id);
if ($_GET['profile_id']) {
      $sender_profile_id = base64_decode($_GET['profile_id']);
      $sender_details = user::find_by_user_id($sender_profile_id);
}
?>
<style>
    .bottom-left {
        position: absolute;
        bottom: 373px;
        left: 18px;
    }

    .bottom-left-img {
        position: absolute;
        bottom: 108px;
        left: 18px;
    }
    .bottom-left-img-delete {
        position: absolute;
        bottom: 7px;
        left: 94px;
    }
</style>
<link rel="stylesheet" href="assets/css/message.css">
<title>Vishwakarma Patrika | My Messages </title>
<?php include "asset/navbar.php"; ?>
<div class="grid_3">
    <div class="container">
        <div class="breadcrumb1">
            <ul>
                <a href="index.php"><i class="fa fa-home home_1"></i></a>
                <span class="divider">&nbsp;|&nbsp;</span>
                <li class="current-page">My Messages</li>
            </ul>
        </div>
        <hr/>
        <!--php code here -->

            <div class="col-lg-3 list-group">
                <span href="#" class="list-group-item active message-box">
                    Messages
                </span>
                <a href="message.php" class="list-group-item">
                    <i class="fa fa-arrow-circle-down"></i> Inbox
                </a>
                <a href="message-sent.php" class="list-group-item">
                    <i class="fa fa-arrow-circle-up"></i> Sent
                </a>
            </div>

            <div class="col-lg-8 col-md-7 list-group">
                <span href="#" class="list-group-item active message-box"><i class="fa fa-comment-o"></i> <?=$sender_details->name?></span>
                <div class="list-group-item" id="list-group-item">
                    <div class="msg_history">
                        <div id="write_msg_chat"></div>
                    </div>
                    <div class="type_msg">
                        <div class="input_msg_write">
                            <input type="hidden" name="mesage_chat" id="message_chat">
                            <input type="text" class="write_msg" placeholder="Type a message">
                            <button class="msg_send_btn" type="button"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    <div class="clearfix"></div>
</div>
</div>
<!--image delete confirmation-->
<!--Uppdate password Details-->
<?php include "asset/model.php";?>

<div class="footer">
    <div class="container">
        <?php
        include 'asset/footer.php';
        // update update_personal
        if (isset($_POST['update_personal'])) {
            echo $name = $_POST['name'];
        }
        ?>
    </div>
    <div id="snackbar">Profile Updated successfully..</div>
    <script src="assets/js/common.js"></script>
    <script type="text/javascript" src="http://beneposto.pl/jqueryrotate/js/jQueryRotateCompressed.js"></script>
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <script>
        //$("#write_msg_chat").scrollTop(800);
        $(".msg_history").scrollTop(1000);
    </script>
    <script>
        $(".msg_send_btn").click(function(){
            var message = $(".write_msg").val();
            var message_chat = $("#message_chat").val();
            var sender_id = "<?= $my_profile_details->user_id; ?>";
            var reciver_id = "<?= $sender_profile_id; ?>";
            if (message == '') {
                alert("Please Enter Some message");
                exit();
            }
            else {
                $.ajax({
                    type: "post",
                    url: "includes/chat.php",
                    data: {sender_id: sender_id, reciver_id:reciver_id, message:message, message_chat:message_chat},
                    success:  function(data){
                        $(".write_msg").val('');
                        chat();
                        $(".msg_history").scrollTop(1000);
                    }
                });
            }
        });
    </script>
    <script>
        setInterval(function(){
            chat();
        },1000);
        function chat() {
            var sender_id = "<?=$sender_profile_id;?>";
            var reciver_id = "<?=$my_profile_details->user_id;?>";
            $.ajax({
                type: "post",
                url: "includes/chat.php",
                data: {sender_id: sender_id, reciver_id:reciver_id},
                success:  function(data){
                    $('#write_msg_chat').html(data);
                }
            });
        }
    </script>
</div>
</body>
</html>