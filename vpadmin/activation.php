<?php
include 'includes/connection.php';
$code = $_GET['code'];
$user_id = $_GET['user_id'];

if ($code == 'approved') {
	$sql_update = $cid->query("UPDATE `user_details` SET `id_conform`='1' WHERE user_id = '$user_id'");
		if ($sql_update == TRUE) {
		header('Location: ' . $_SERVER['HTTP_REFERER'] );
	}
}

if ($code == 'disapproved') {
	$sql_update = $cid->query("UPDATE `user_details` SET `id_conform`='0' WHERE user_id = '$user_id'");
	if ($sql_update == TRUE) {
		header('Location: ' . $_SERVER['HTTP_REFERER']);
	}
}

$date_time = date('d-m-Y H:i:s');

if ($code == 'payment') {
	$sql_update = $cid->query("UPDATE `user_details` SET `payment`='1' , `payment_date` = '$date_time' WHERE `user_id` = '$user_id'");
	if ($sql_update == TRUE) {
		header('Location: ' . $_SERVER['HTTP_REFERER']);
	}
}

if ($code == 'disapprovedPayment') {
	$sql_update = $cid->query("UPDATE `user_details` SET `payment`= null WHERE `user_id` = '$user_id'");
	if ($sql_update == TRUE) {
		header('Location: ' . $_SERVER['HTTP_REFERER']);
	} else {
		echo $sql_update->$cid->error_log();
	}
}
