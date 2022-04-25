<?php
session_start();
ob_start();
if (!isset($_SESSION['admin_id'])) {
	header("Location:login.php");
}
else{
   $user_name =	$_SESSION['admin_id'];
    if (isset($_GET['user_id'])) {
        $user_id = $_GET['user_id'];
    }

?>
<!DOCTYPE html>
<html>
    
    <head>
        <title>Vishwakarma Patrika Admin </title>
        <!-- Bootstrap -->
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
        <link href="assets/styles.css" rel="stylesheet" media="screen">
        <link href="vendors/jGrowl/jquery.jgrowl.css" rel="stylesheet" media="screen">
        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <script src="js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
        <style>
        	
.img_class {
  border:0;
  height:auto;
  max-width:40%;
  vertical-align:middle;
}
        </style>
    </head>
    
    <body>
        
        <div class="container-fluid">
            <div class="row-fluid">
              
                <!--/span-->
                <div class="span9" id="content">
                    

                    <div class="row-fluid">
                        <div class="span6">
                            <!-- block -->
                            <div class="block">
                                <div class="navbar navbar-inner block-header">
                                    <div class="muted pull-left">VishwakarmaPatrika.com</div>
                                </div>
                                <div class="block-content collapse in">
                                	
                                    <table class="table table-bordered table-striped">
											<?php
include 'includes/connection.php';


$result = $cid -> query("SELECT * FROM user_details WHERE user_id='$user_id'");
if ($result -> num_rows > 0) {
	// output data of each row
	while ($row = $result -> fetch_assoc()) {
		$user_id = $row['user_id'];
		$gotra = $row['gotra'];
		$name = $row['name'];
		$gender = $row['gender'];
		$dob_db = $row['dob'];
	    
	    $dob = date("d-m-Y", strtotime($dob_db));
		$birthTime = $row['birthTime'];
		$manglik = $row['manglik'];
		$height_f = $row['height_f'];
		$height_i = $row['height_i'];
		$marital_status =$row['marital_status'];
		$profileBy = $row['profileBy'];
		$image_file = $row['fileToUpload'];
		$education = $row['education'];
		$occupation = $row['occupation'];
		$hobbies = $row['hobbies'];
		$fatherName = $row['fatherName'];
		$MotherName = $row['MotherName'];
		$b_married = $row['b_married'];
		$b_unmarried  = $row['b_unmarried'];
		$s_married = $row['s_married'];
		$s_unmarried = $row['s_unmarried'];
		$mobile = $row['mobile'];
		$address = $row['address'];
		$state = $row['state'];
		$location = $row['location'];
		$city = $row['city'];
		$pass1 = $row['pass1'];
		$id_conform = $row['id_conform'];
		$date_time	= $row['date_time'];
			
	}
}

?>
				                   <tbody>
											  <tr>
											  <td>
												 Photo:
												</td>
												<td>
													<img width="50%" class="img_class1" src="../users/uploads/<?php echo $image_file; ?>" />
												</td>
											  </tr>
												
											  <tr>
												<td>
												  Id:
												</td>
												<td>
												  <?php
												  echo $user_id;
												  ?>
												</td>
											  </tr>
											  <tr>
												<td>
												 name:
												</td>
												<td>
												 <?php
												 echo $name;
												 ?>
												</td>
											  </tr>
											  <tr>
												<td>
												  Subcaste
												</td>
												<td>
												  <?php
												  echo $gotra;
												  ?> 
												</td>
											  </tr>
											  <tr>
												<td>
												 DOB:
												</td>
												<td>
												 <?php
												 echo $dob.", " .$height_f. "," .$height_i;
												 ?>
												</td>
											  </tr>
											  <tr>
												<td>
												  Location:
												</td>
												<td>
												 <?php
												 echo $location;
												  ?>
												</td>
											  </tr>
											  <tr>
												<td>
												  State :
												</td>
												<td>
												  <?php
												  echo $state;
												  ?>
												</td>
											  </tr>
											  <tr>
                                                <td>
                                                  City :
                                                </td>
                                                <td>
                                                  <?php
                                                  echo $city;
                                                  ?>
                                                </td>
                                              </tr>
											  
											  <tr>
												<td>
												  Status :
												</td>
												<td>
												  <?php
												  echo $marital_status;
												  ?>
												</td>
											  </tr>
											  <tr>
												<td>
												    Education :
												</td>
												<td>
												  <?php
												   echo $education;
												  ?>
												</td>
											  </tr>
											  <tr>
												<td>
												  	Occupation Details
												</td>
												<td>
												 <?php
												 	echo $occupation;
												 ?>
												</td>
											  </tr>
											  <tr>
												<td>
												    hobbies :
												</td>
												<td>
												  <?php
												   echo $hobbies;
												  ?>
												</td>
											  </tr>
											  
											</tbody>
										  </table>
                                </div>
                            </div>
                            <!-- /block -->
                        </div>
                        
                    </div>

                    
                     </div>

                </div>
            </div>
            
        </div>
        <!--/.fluid-container-->
        <script src="vendors/jquery-1.9.1.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <script src="vendors/jGrowl/jquery.jgrowl.js"></script>
        <script src="assets/scripts.js"></script>
       
    </body>

</html>
<?php
}
?>
