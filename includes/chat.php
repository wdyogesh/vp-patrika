<?php
include 'init.php';
if(isset($_POST['sender_id']) AND isset($_POST['reciver_id'])) {
    $sender_profile_id = $_POST['sender_id'];
    $reciver_profile_id = $_POST['reciver_id'];
    $messages_lists = user::chat_list($sender_profile_id, $reciver_profile_id);
    foreach ($messages_lists as $messages_list):
        ?>
        <?php if ($messages_list->sender_id == $sender_profile_id): ?>
        <div class="incoming_msg">
            <div class="incoming_msg_img"><img style="border-radius: 50%"
                                               src="uploads/350/<?= strtolower($messages_list->fileToUpload) ?>" alt="sunil"></div>
            <div class="received_msg">
                <div class="received_withd_msg">
                    <p><?= $messages_list->message ?></p>
                    <span
                        class="time_date"> <?= date("F jS, Y, | g:i a", strtotime($messages_list->date_time)); ?></span>
                </div>
            </div>
        </div>
    <?php endif; ?>
        <?php if ($messages_list->sender_id == $reciver_profile_id): ?>
        <div class="outgoing_msg">
            <div class="sent_msg">
                <p><?= $messages_list->message ?></p>
                <span class="time_date"> <?= date("F jS, Y, | g:i a", strtotime($messages_list->date_time)); ?></span>
            </div>
        </div>
    <?php endif; ?>
    <?php endforeach;
}


if (isset($_POST['message_chat'])) {
    $sender_id = $_POST['sender_id'];
    $reciver_id = $_POST['reciver_id'];
    $message = $_POST['message'];
    $data = ['sender_id'=>$sender_id, 'reciver_id'=>$reciver_id,'message'=>$message];
    $response = user::save_chat($data);
}

?>