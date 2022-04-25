<?php include "asset/header.php"; if($session->is_signed_in()){redirect("index.php"); } ?>
<title>Vishwakarma Patrika | Register </title>
<?php include "asset/navbar.php";?>
		<!-- ============================  Navigation End ============================ -->
		<div class="grid_3">
			<div class="container">
				<div class="breadcrumb1">
					<ul>
						<li class="current-page">
							
							<?php
							if (isset($_POST['action'])) {
							    // baic details
                                $name = $_POST['name'];
								// here the genration value goes here
                                /// end of the id
                                $gotra = $_POST['gotra'];
								$gender = $_POST['gender'];

								$date = $_POST['date'];
								$month = $_POST['month'];
								$year = $_POST['year'];
								$dob  = $date."-".$month."-".$year;
                                $birthTime = $_POST['birthTime'];
								$birthPlace = $_POST['birthPlace'];
								$manglik = $_POST['manglik'];
								$height_f = $_POST['height_f'];
								$height_i = $_POST['height_i'];
								$maritalStatus = $_POST['maritalStatus'];
								$profileBy = $_POST['profileBy'];
								$education = $_POST['education'];
								$occupation = $_POST['occupation'];
								$hobbies = $_POST['hobbies'];
								//here family details
								$fatherName = $_POST['fatherName'];
								$motherName = $_POST['motherName'];
								$b_married = $_POST['b_married'];
								$b_unmarried = $_POST['b_unmarried'];
								$s_married= $_POST['s_married'];
								$s_unmarried = $_POST['s_unmarried'];
								//conntact Details 
								$mobile= $_POST['mobile'];
								$address = $_POST['address'];
								$state = $_POST['state'];
								$location = $_POST['location'];
								$date = date("Y-m-d H:i:s");
                                $city= $_POST['city'];

                                // genrate id here
                                $value= substr($mobile, 6, 4); //last 4 digit mobile number
                                $result = substr($name, 0, 3); // first 3 name
                                $str = strtoupper($result);
                                $genId= $str.$value;
								// login details goes here 
								$pass1 = $_POST['pass1'];
                             //img upload code goes here
							if(isset($_FILES['image']))
							{
                                // and create local PHP variables from the $_FILES array of information
                                $fileName = $_FILES["image"]["name"]; // The file name
                                $fileTmpLoc = $_FILES["image"]["tmp_name"]; // File in the PHP tmp folder

                                $fileType = $_FILES["image"]["type"]; // The type of file it is
                                $fileSize = $_FILES["image"]["size"]; // File size in bytes
                                $fileErrorMsg = $_FILES["image"]["error"]; // 0 for false... and 1 for true
                                $fileName = preg_replace('#[^a-z.0-9]#i', '', $img_name_datetime = date('his').strtolower($fileName)); // filter
                                // $fileName sould save in database
                                $kaboom = explode(".", $fileName); // Split file name into an array using
                                // the dot
                                $fileExt = end($kaboom); // Now target the last array element to get the file extension
                                // START PHP Image Upload Error Handling -------------------------------
                                if (!$fileTmpLoc) { // if file not chosen
                                    echo "ERROR: Please browse for a file before clicking the upload button.";
                                    exit();
                                } else if($fileSize > 5242880) { // if file size is larger than 5 Megabytes
                                    echo "ERROR: Your file was larger than 5 Megabytes in size.";
                                    unlink($fileTmpLoc); // Remove the uploaded file from the PHP temp folder
                                    exit();
                                } else if (!preg_match("/.(gif|jpg|png)$/i", $fileName) ) {
                                    // This condition is only if you wish to allow uploading of specific file types
                                    echo "ERROR: Your image was not .gif, .jpg, or .png.";
                                    unlink($fileTmpLoc); // Remove the uploaded file from the PHP temp folder
                                    exit();
                                } else if ($fileErrorMsg == 1) { // if file upload error key is equal to 1
                                    echo "ERROR: An error occured while processing the file. Try again.";
                                    exit();
                                }
                                // Place it into your "uploads" folder mow using the move_uploaded_file() function
                                $moveResult = move_uploaded_file($fileTmpLoc, "uploads/$fileName");
                                // Check to make sure the move result is true before continuing
                                if ($moveResult != true) {
                                    echo "ERROR: File not uploaded. Try again.";
                                    exit();
                                }
                                // set image name
                                include_once("ak_php_img_lib_1.0.php");
                                // ---------- Start Universal Image Resizing Function --------
                                $imaage_size = ['150','350','800'];

                                for ($i = 0; $i < count($imaage_size); $i++ ) {
                                    $wmax = $imaage_size[$i];
                                    $hmax = $imaage_size[$i];
                                    $target_file = "uploads/$fileName";
                                    $resized_file = "uploads/$wmax/$fileName";

                                    ak_img_resize($target_file, $resized_file, $wmax, $hmax, $fileExt);
                                    if (strtolower($fileExt) != "jpg") {
                                        $target_file = "uploads/$wmax/$fileName";
                                        $new_jpg = "uploads/$wmax/".$kaboom[0].".jpg";
                                        ak_img_convert_to_jpg($target_file, $new_jpg, $fileExt);
                                    }
                                    // ---------- Start Image Watermark Function -----------
                                    $target_file_last = "uploads/$wmax/".$kaboom[0].".jpg";
                                    $wtrmrk_file = "water.png";
                                    $new_file = "uploads/$wmax/".$kaboom[0].".jpg";
                                    ak_img_watermark($target_file_last, $wtrmrk_file, $new_file);
                                    // ----------- End Image Watermark Function ------------
                                }


                                include 'includes/connection.php';
                               //$sql = $cid->query("INSERT INTO `tc_details`(`s_first_name`, `f_first_name`, `img_url`)
							   //VALUES ('$s_first_name','$f_first_name','$final_image')");
							
							$sql = $cid->query("INSERT INTO `user_details`(`user_id`, `name`,  `gotra`, `gender`, `dob`, `birthTime`, `manglik`, `height_f`,
							    `height_i`, `marital_status`, `profileBy`, `fileToUpload`, `education`, `occupation`, `hobbies`, `fatherName`, `MotherName`, 
							    `b_married`, `b_unmarried`, `s_married`, `s_unmarried`, `mobile`, `address`,`state`,`location`, `city`, `pass1`, `id_conform`,`date_time`,`about_us`
							 ) 
				              VALUES ('$genId','$name','$gotra','$gender','$dob','$birthTime','$manglik','$height_f',
				             '$height_i','$maritalStatus','$profileBy','$fileName','$education','$occupation','$hobbies','$fatherName','$motherName',
				              '$b_married','$b_unmarried','$s_married','$s_unmarried','$mobile','$address','$state','$location','$city','$pass1','0','$date',''
				              )");
							
							if ($sql == TRUE) {
                                $sql_partner_and_prefrance = $cid->query("INSERT INTO `partner_preference`(`user_id`) 
						         VALUES ('$genId')");
							 ?>
							  <h3>Your profile has been registered , Your Profile id is: <span style="font-size: 30px; color: green;"><?php echo  $genId;?></span>  </h3>
							<h3>
								For verification your profile and Activation your Account send your Identification id on whatss App Number:
                                <span style="font-size: 30px; color: red;">8319793424</span>
							</h3>
							<h3> <a href="index.php"> Click Here  </a> Go to Home !!</h3>
							  <?php
							}
                            else
							{
							    echo "<h3 style = 'color: red;'>  Somthing went wrong please try again , Please Make Sure All fields are filled !! </h3>";
							}
							}
							
							} else {
								header("location: index.php");
							}
							
							?>
						</li>
					</ul>
				</div>
				<div class="services">
					<div class="col-sm-6 login_left">
						
					
					</div>
					<div class="col-sm-6">
						
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
a
        <div class="footer">
            <div class="container">

                <div class="clearfix"></div>
                <?php
                include 'asset/footer.php';
                ?>
            </div>
        </div>
     </body>
</html>
