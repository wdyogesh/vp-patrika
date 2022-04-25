<?php
ob_start();
session_start();
if (!isset($_SESSION['admin_id'])) {
	header("Location:login.php");
}
else{
   $user_name =	$_SESSION['admin_id'];
?>

<!DOCTYPE html>
<html>
    
    <head>
        <title>Message Records </title>
        <!-- Bootstrap -->
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
        <link href="assets/styles.css" rel="stylesheet" media="screen">
        <link href="assets/DT_bootstrap.css" rel="stylesheet" media="screen">
        <!--[if lte IE 8]><script language="javascript" type="text/javascript" src="vendors/flot/excanvas.min.js"></script><![endif]-->
        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <script src="vendors/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    </head>
    
    <body>
        <?php
         include 'includes/header.php';
         ?>
        <div class="container-fluid">
            <div class="row-fluid">
               <div class="span3" id="sidebar">
                    <ul class="nav nav-list bs-docs-sidenav nav-collapse collapse">
                        <li >
                            <a href="index.php"><i class="icon-chevron-right"></i> Dashboard</a>
                        </li>
                        
                        <li>
                            <a href="sign_up.php"><i class="icon-chevron-right"></i> SignUp Users </a>
                        </li>
                        <li class="active">
                            <a href="tables.php"><i class="icon-chevron-right"></i> Messages  </a>
                        </li>
                        <li  >
                            <a href="complete_profile_list.php"><i class="icon-chevron-right"></i> Complete Profile Users </a>
                        </li>
                        <li>
                            <a href="#"><span class="badge badge-success pull-right">731</span> Orders</a>
                        </li>
                       
                        
                        <li>
                            <a href="#"><span class="badge badge-important pull-right">83</span> Errors</a>
                        </li>
                        <li>
                            <a href="#"><span class="badge badge-warning pull-right">4,231</span> Logs</a>
                        </li>
                    </ul>
                </div>
                <!--/span-->
                <div class="span9" id="content">

                    
                    <div class="row-fluid">
                    	
                    	<?php
                    	include 'includes/connection.php';
						$sql_query= $cid->query("SELECT * FROM `user_mail` ORDER BY `receiver_id` ASC");
						$count_value = $sql_query->num_rows;
                    	?>
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Messages List (<?php echo $count_value; ?>) </div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
  									<table class="table">
						              <thead>
						                <tr>
						                  <th>id</th>
						                  <th>Sender Id</th>
						                  <th>Reciver Id</th>
						                  <th>Message</th>
						                  <th>Date Time</th>
						                </tr>
						              </thead>
						              <tbody>
						                
						                <?php
						                while ($r=$sql_query->fetch_assoc()) {
						                   $id= $r['id'];
                                           $receiver_id=  $r['receiver_id'];
                                           $sender_id = $r['sender_id'];
										   $sql_query_reciver= $cid->query("SELECT * FROM `user_details` WHERE `user_id`='$receiver_id'");
                                           $row =  $sql_query_reciver->fetch_assoc();
										   $Reciver_name = $row['name'];
										   
										   $sql_query_sender= $cid->query("SELECT * FROM `user_details` WHERE `user_id`='$sender_id'");
                                           $row1 =  $sql_query_sender->fetch_assoc();
                                           $sender_name = $row1['name'];
										   ?>
											
									     <tr>
						                  <td><?php echo $id; ?></td>
						                  <td><?php echo $sender_id; ?>(<?php echo $sender_name;?>)</td>
						                  <td><?php echo $receiver_id;?>(<?php echo $Reciver_name;?>)</td>
						                  <td><?php echo $r['message']; ?></td>
						                  <td><?php echo $r['date_time']; ?></td>
						                </tr>
											
											<?php
										}
						                ?>
						                
						                
						              </tbody>
						            </table>
                                </div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>

                    </div>
            </div>
            <hr>
              <?php
           include 'includes/footer.php';
           ?>
        </div>
        <!--/.fluid-container-->

        <script src="vendors/jquery-1.9.1.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <script src="vendors/datatables/js/jquery.dataTables.min.js"></script>


        <script src="assets/scripts.js"></script>
        <script src="assets/DT_bootstrap.js"></script>
        <script>
        $(function() {
            
        });
        </script>
    </body>

</html>
<?php
}
?>