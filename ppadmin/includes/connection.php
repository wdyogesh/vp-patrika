<?php
$dbserver="localhost";
//$dbserver="localhost";
$dbuser="vish_patrika";
//$dbuser="root";
$dbpwd="vish_patrika";
$dbname="vish_patrika";
$cid= new mysqli($dbserver,$dbuser,$dbpwd,$dbname);

if ($cid== TRUE) {
$date = date("Y-m-d H:i:s");
	
	
	if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
     $ip = $_SERVER['REMOTE_ADDR'];
}
	
$relative_path = $_SERVER['PHP_SELF'];
$complete_path = $_SERVER['SCRIPT_FILENAME'];

$query = "INSERT INTO log_file (date_time, ip, relative_path, complete_path)
    VALUES ('$date', '$ip', '$relative_path','$complete_path')";

$es= $cid->query($query);
if ($es==TRUE) {
	
}

} else {
	die("Connection Faild:". $cid->error);
}

 
?>