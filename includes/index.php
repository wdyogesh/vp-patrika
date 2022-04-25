<?php include_once 'init.php';
if(!$session->is_signed_in()){ redirect("logout.php");} $id = $_SESSION['user_id'];
$sp_list = user::find_admin_by_id($id);

echo $sp_list->name;

?>
<br>
<a href="logout.php">Logout</a>

