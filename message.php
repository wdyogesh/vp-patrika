<?php
include "asset/header.php";
if(!$session->is_signed_in()) { redirect("logout.php");} $id = $_SESSION['user_id'];
$my_profile_details = user::find_admin_by_id($id);
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
                <a style="background-color: #ffbf09b8;" href="message.php" class="list-group-item">
                    <i class="fa fa-arrow-circle-down"></i> Inbox
                </a>
                <a href="message-sent.php" class="list-group-item">
                    <i class="fa fa-arrow-circle-up"></i> Sent
                </a>
            </div>

            <div class="col-lg-8 col-md-7 list-group">
                <span href="#" class="list-group-item active message-box">New Messages</span>

                    <div class="list-group-item" id="list-group-item" style="height: 400px;overflow: auto;">
                        <?php $messages_users = user::find_message_list($my_profile_details->user_id);
                                //print_r($messages_users);
                                if (!empty($messages_users)) {
                                    foreach ($messages_users as $messages_user):
                                    $profile_decode = base64_encode($messages_user->user_pri_id);
                                ?>
                                <div class="chat_list active_chat">
                                    <div class="chat_people">
                                        <div class="chat_img"><a href=""><img style="border-radius: 50%;" src="uploads/150/<?=strtolower($messages_user->fileToUpload)?>" alt="sunil"></a> </div>
                                        <div class="chat_ib">
                                            <h5><a href="view_profile.php?profile_id=<?= $profile_decode?>"><?=$messages_user->name?>, <?=$messages_user->sender_id?></a>
                                                <span class="chat_date">
                                                   <?= date("F jS, Y, | g:i a", strtotime($messages_user->date_time));?>
                                                </span>
                                            </h5>
                                            <p><?= $messages_user->message?></p>
                                            <div class="pull-right">
                                                <a title="View Profile" class="btn btn-primary xs" href="view_profile.php?profile_id=<?= $profile_decode?>"><i class="fa fa-eye"></i></a>
                                                <a title="Reply Message" class="btn btn-default xs" href="message-reply.php?profile_id=<?= base64_encode($messages_user->user_id) ?>"><i class="fa fa-reply"></i></a>
                                                <a title="Delete Message" class="btn btn-danger xs" href="view_profile.php?profile_id=<?= $profile_decode?>"><i class="fa fa-trash-o"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach;
                                }
                                else { echo "<h4 style='text-align: center;' class='text-primary'>Message Box Empty !!</h4>";
                                 }
                            ?>
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
</div>
</body>
</html>