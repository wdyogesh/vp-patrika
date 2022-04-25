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
        <title>Vishwakarma Patrika Admin</title>
        <!-- Bootstrap -->
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
        <link href="assets/styles.css" rel="stylesheet" media="screen">
        <!--[if lte IE 8]><script language="javascript" type="text/javascript" src="vendors/flot/excanvas.min.js"></script><![endif]-->
        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <script src="vendors/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    </head>
    
    <body>
        <div class="navbar navbar-fixed-top">
            <?php
            include 'includes/header.php';
            ?>
        </div>
        <div class="container-fluid">
            <div class="row-fluid">
               <?php
               include 'assets/side_menu.php';
              
               ?>
                <!--/span-->
                <div class="span9" id="content">
                      <!-- morris stacked chart -->
                    <div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">  Welcome Mr. <strong><?php echo $admin_full_name; ?> </strong>   </div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                	 <?php
                                        include 'includes/connection.php';
                                        if (isset($_POST['submit'])) {
                                            $old_pass = $_POST['old_pass'];	
                                            $new_pass = $_POST['new_pass'];
											$re_new_pass = $_POST['re_new_pass'];
											
											$sql_select_pass = $cid->query("SELECT `password` FROM `admin_login` WHERE `user_id` ='$user_name'");
											
											while ($row = $sql_select_pass->fetch_assoc()) {
												$pass = $row['password'];
											}
											
											if ($pass == $old_pass) {
												if ($new_pass == $re_new_pass) {
													
													$sql_update = $cid->query("UPDATE `admin_login` SET `password`='$new_pass' WHERE `user_id` ='$user_name'");
													
													if ($sql_update == TRUE) {
													     	echo "<p style ='color:green'>Your Password has been updated Sucessfully !! </p>";
													} else {
													    	echo "<p style ='color:red'>Please try again later  !! </p>";
													}
													
													
													
												} else {
													echo "<p style ='color:red'>Your old password did not Match !! </p>";
												}
												
											} else {
												echo "<p style ='color:red'>Your old password did not Match !! </p>";
											}
											
											
											
											
											
                                        } else {
                                            
                                        }
                                        
                                      ?>
                                	
                                     <form class="form-horizontal" action="profile.php" method="post">
                                      <fieldset>
                                        <legend>Change Your Password </legend>
                                        <div class="control-group warning">
                                          <label class="control-label" for="inputError">Last Password </label>
                                          <div class="controls">
                                            <input type="password" name="old_pass" id="inputError" placeholder="Old Password" required="required">
                                          </div>
                                        </div>
                                         
                                        
                                        <div class="control-group success">
                                          <label class="control-label" for="inputError">New Password </label>
                                          <div class="controls">
                                            <input type="password" name="new_pass"  id="inputError" placeholder="Last Password" required="required">
                                          </div>
                                        </div>
                                          
                                        <div class="control-group success">
                                          <label class="control-label" for="inputError">Re New Password </label>
                                          <div class="controls">
                                            <input type="text" name="re_new_pass" placeholder="Re Enter New password " id="inputError" required="required">
                                            
                                          </div>
                                        </div>
                                       
                                        <div class="form-actions">
                                          <button type="submit" name="submit" class="btn btn-primary">Save changes</button>
                                          <button type="reset" class="btn">Cancel</button>
                                        </div>
                                      </fieldset>
                                    </form>

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
        <link href="vendors/datepicker.css" rel="stylesheet" media="screen">
        <link href="vendors/uniform.default.css" rel="stylesheet" media="screen">
        <link href="vendors/chosen.min.css" rel="stylesheet" media="screen">

        <link href="vendors/wysiwyg/bootstrap-wysihtml5.css" rel="stylesheet" media="screen">

        <script src="vendors/jquery-1.9.1.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <script src="vendors/jquery.uniform.min.js"></script>
        <script src="vendors/chosen.jquery.min.js"></script>
        <script src="vendors/bootstrap-datepicker.js"></script>

        <script src="vendors/wysiwyg/wysihtml5-0.3.0.js"></script>
        <script src="vendors/wysiwyg/bootstrap-wysihtml5.js"></script>

        <script src="vendors/wizard/jquery.bootstrap.wizard.min.js"></script>

	<script type="text/javascript" src="vendors/jquery-validation/dist/jquery.validate.min.js"></script>
	<script src="assets/form-validation.js"></script>
        
	<script src="assets/scripts.js"></script>
        <script>

	jQuery(document).ready(function() {   
	   FormValidation.init();
	});
	

        $(function() {
            $(".datepicker").datepicker();
            $(".uniform_on").uniform();
            $(".chzn-select").chosen();
            $('.textarea').wysihtml5();

            $('#rootwizard').bootstrapWizard({onTabShow: function(tab, navigation, index) {
                var $total = navigation.find('li').length;
                var $current = index+1;
                var $percent = ($current/$total) * 100;
                $('#rootwizard').find('.bar').css({width:$percent+'%'});
                // If it's the last tab then hide the last button and show the finish instead
                if($current >= $total) {
                    $('#rootwizard').find('.pager .next').hide();
                    $('#rootwizard').find('.pager .finish').show();
                    $('#rootwizard').find('.pager .finish').removeClass('disabled');
                } else {
                    $('#rootwizard').find('.pager .next').show();
                    $('#rootwizard').find('.pager .finish').hide();
                }
            }});
            $('#rootwizard .finish').click(function() {
                alert('Finished!, Starting over!');
                $('#rootwizard').find("a[href*='tab1']").trigger('click');
            });
        });
        </script>
    </body>

</html>
<?php
}
?>