<?php
session_start();
ob_start();
if (!isset($_SESSION['admin_id'])) {
	header("Location:login.php");
}
else{
   $user_name =	$_SESSION['admin_id'];
?>
<!DOCTYPE html>
<html>
    
    <head>
        <title>Vishwakarma Patrika Admin Home Page</title>
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
                        
                        <li class="active">
                            <a href="sign_up.php"><i class="icon-chevron-right"></i> SignUp Users </a>
                        </li>
                        <li >
                            <a href="tables.php"><i class="icon-chevron-right"></i> Messages  </a>
                        </li>
                        <li>
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
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left"> Sign Up Users List</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                    
  									<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
										<thead>
											<tr>
												<th>#</th>
												<th>User Id </th>
												<th>Name</th>
												<th>Register Date & Time</th>
												<th>Mobile</th>
												<th>Password</th>
												<th>Status</th>
												<th>Delete</th>
												
											</tr>
										</thead>
										<tbody>
											<?php
									include 'includes/connection.php';
									$query_count = $cid -> query("SELECT * FROM `user_details` ORDER BY `user_details`.`id_conform` ASC");
									
									$count_sign_up = $query_count -> num_rows;
                                    ?>
											<?php 
                                        	while ($row = $query_count->fetch_assoc()) {
												
												?>
												
											<tr class="odd gradeX">
												
												<td><?php echo $profile_id= $row['id']; ?></td>
												<?php $user_id =  $row['user_id']; ?>
                                                <td> <a href="edit_sing.php?user_id=<?php echo $user_id; ?>"> <?php echo $user_id; ?> </a> </td>
                                                <td><?php echo $row['name']; ?></td>
                                                <td><?php echo $row['date_time']; ?></td>
                                                <td><?= $row['mobile'] ?></td>
                                                 <td><?= $row['pass1'] ?></td>
                                                <?php
                                                $status = $row['id_conform'];
                                                if ($status == 0) {
													echo "<td ><span class='label label-important'>Not Approved</span></td>";

												} else {
													echo "<td ><span class='label label-success'>Approved</span></td>";
												}
                                                 ?>
                                                 <td><a href="delete_data.php?user_id=<?php echo $user_id;  ?>">Delete</a> </td>
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
