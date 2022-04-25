<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once "init.php";

if($session->is_signed_in()){redirect("index.php"); }
if (isset($_POST['submit'])){
     $user_name = trim($_POST['username']);
     $password = trim($_POST['password']);
    // verify user name and password
    $user_found =  Admin::verify_user($user_name,$password);
    if ($user_found){
        $session->login($user_found);
        redirect("index.php");
    }
    else{
        $the_message = "your password and user name ncorrect";
    }
}
else
{
    $user_name = "";
    $password  = "";
}
?>

<form method="post" action="">
    User name <input type="text" name="username"> <br>
    Password <input type="password" name="password"> <br>
    <input type="submit" name="submit" value="Submit">
</form>
