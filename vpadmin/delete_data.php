<?php
if (isset($_GET['user_id'])) {
  $user_id = $_GET['user_id'];
  include 'includes/connection.php';
  $sql_user_details = $cid->query("DELETE FROM `user_details` WHERE `user_id` ='$user_id'");
  if ($sql_user_details == TRUE) {
    $sql_delete_partner = $cid->query("DELETE FROM `partner_preference` WHERE `user_id` ='$user_id'");
    if ($sql_delete_partner == TRUE) {
      header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
  }
}
