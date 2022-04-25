<?php
session_start();
ob_start();
if (!isset($_SESSION['admin_id'])) {
	header("Location:login.php");
} else {
	$user_name =	$_SESSION['admin_id'];
	if (isset($_GET['user_id'])) {
		$user_id = $_GET['user_id'];
	}
?>
	<?php
	include 'includes/connection.php';
	$result = $cid->query("SELECT * FROM user_details WHERE user_id='$user_id'");
	if ($result->num_rows > 0) {
		// output data of each row
		while ($row = $result->fetch_assoc()) {
			$user_id = $row['user_id'];
			$gotra = $row['gotra'];
			$name = $row['name'];
			$gender = $row['gender'];
			$dob = $row['dob'];
			$birthTime = $row['birthTime'];
			$manglik = $row['manglik'];
			$height_f = $row['height_f'];
			$height_i = $row['height_i'];
			$marital_status = $row['marital_status'];
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
			$payment = $row['payment'];
		}
	}

	?>

	<!DOCTYPE html>
	<html>

	<head>
		<title>Vishwakarma Patrika Admin | Admin</title>
		<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
		<link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
		<link href="assets/styles.css" rel="stylesheet" media="screen">
		<link href="vendors/jGrowl/jquery.jgrowl.css" rel="stylesheet" media="screen">
		<script src="js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
	</head>

	<body>
		<div class="navbar navbar-fixed-top">
			<div class="navbar-inner">
				<div class="container-fluid">
					<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</a>
					<a class="brand" href="#">Admin Panel</a>
					<?php include 'includes/header.php'; ?>
				</div>
			</div>
		</div>
		<div class="container-fluid">
			<div class="row-fluid">
				<?php include 'assets/side_menu.php'; ?>
				<div class="span9" id="content">
					<div class="row-fluid">
						<div class="block">
							<div class="navbar navbar-inner block-header">
								<div class="muted pull-left">
									<span class="label label-important">
										<a href="javascript:history.go(-1)" style="text-decoration: none; color: #fff;">
											<< GO Back </a> </span> Details Of Prfile Id: <span class="label label-success"> <?php echo $user_id;  ?> </span>
									<?php if ($id_conform == '0') : ?>
										<span class="label label-success">
											<a href="activation.php?code=approved&user_id=<?php echo $user_id; ?>" style="text-decoration: none; color: #fff;">Approved </a>
										</span>
									<?php endif; ?>
									<?php if ($id_conform == '1') : ?>
										<span class="label label-important">
											<a href="activation.php?code=disapproved&user_id=<?php echo $user_id; ?>" style="text-decoration: none; color: #fff;">Disapproved</a>
										</span>
									<?php endif; ?>
									<!-- paymenet Approval -->
									<?php if ($payment == null) : ?>
										<span class="label label-success">
											<a href="activation.php?code=payment&user_id=<?php echo $user_id; ?>" style="text-decoration: none; color: #fff;">Active Paid Member</a>
										</span>
									<?php endif; ?>
									<?php if ($payment == '1') : ?>
										<span class="label label-important">
											<a href="activation.php?code=disapprovedPayment&user_id=<?php echo $user_id; ?>" style="text-decoration: none; color: #fff;">Deactive Paid Member</a>
										</span>
									<?php endif; ?>
								</div>
							</div>

						</div>
						<!-- /block -->
					</div>

					<div class="row-fluid">
						<div class="span6">
							<!-- block -->
							<div class="block">
								<div class="navbar navbar-inner block-header">
									<div class="muted pull-left">Basic And Life Style</div>
								</div>
								<div class="block-content collapse in">

									<table class="table table-bordered table-striped">

										<tbody>
											<tr>
												<td>
													Photo:
												</td>
												<td>
													<img class="img_class" src="/uploads/800/<?= strtolower($image_file); ?>" />
												</td>
											</tr>

											<tr>
												<td>
													Profile Id:
												</td>
												<td>
													<?php
													echo $user_id;
													?>
												</td>
											</tr>
											<tr>
												<td>
													Full name:
												</td>
												<td>
													<?php
													echo $name;
													?>
												</td>
											</tr>

											<tr>
												<td>
													Address:
												</td>
												<td>
													<?php
													echo $address;
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
													Mobile:
												</td>
												<td>
													<?php
													echo $mobile;
													?>
												</td>
											</tr>
											<tr>
												<td>
													Marital Status :
												</td>
												<td>
													<?php
													echo $marital_status;
													?>
												</td>
											</tr>
											<tr>
												<td>
													Profile Created By:
												</td>
												<td>
													<?php
													echo $profileBy;
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
						<div class="span6">
							<!-- block -->
							<div class="block">
								<div class="navbar navbar-inner block-header">
									<div class="muted pull-left">Education Career & Family Details </div>

								</div>
								<div class="block-content collapse in">
									<div class="span12">

										<h4>Education and Career </h4>
										<table class="table table-bordered table-striped">
											<tbody>
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
											</tbody>
										</table>
										<h4>Family Details </h4>
										<table class="table table-bordered table-striped">
											<tbody>
												<tr>
													<td>
														Father Name:
													</td>
													<td>
														<?php echo $fatherName; ?>
													</td>
												</tr>
												<tr>
													<td>
														Mother Name
													</td>
													<td>
														<?php echo $MotherName; ?>
													</td>
												</tr>
												<tr>
													<td>
														Father Occupation
													</td>
													<td>
														<?php $father_occupation; ?>
													</td>
												</tr>
												<tr>
													<td>
														Mother Occupation
													</td>
													<td>
														<?php $mother_occupation; ?>
													</td>
												</tr>
												<tr>
													<td>
														No. Of Brother Married
													</td>
													<td>
														<?php
														echo $b_married;
														?>
													</td>
												</tr>
												<tr>
													<td>
														No. Of Brother UnMarried
													</td>
													<td>
														<?php
														echo $b_unmarried;
														?>
													</td>
												</tr>


											</tbody>
										</table>

										<!-- here the value goes for religious social backgroud details-->

										<h4>Religious Social Background </h4>
										<table class="table table-bordered table-striped">
											<tbody>
												<tr>
													<td>
														Date Of Birth
													</td>
													<td>
														<?php echo $dob; ?>
													</td>
												</tr>
												<tr>
													<td>
														Time Of Birth
													</td>
													<td>
														<?php echo $birthTime; ?>
													</td>
												</tr>
												<tr>
													<td>
														Gotra
													</td>
													<td>
														<?php
														echo $gotra;
														?>
													</td>
												</tr>
											</tbody>
										</table>



									</div>
								</div>
							</div>
							<!-- /block -->
						</div>
					</div>

					<div class="row-fluid">
						<div class="span6">
							<!-- block -->
							<div class="block">
								<div class="navbar navbar-inner block-header">
									<div class="muted pull-left">Partner Refrance Details</div>
								</div>
								<div class="block-content collapse in">
									<div class="span12">
										<table class="table table-bordered table-striped">
											<?php
											include 'includes/connection.php';
											$result = $cid->query("SELECT * FROM `partner_preference` WHERE `user_id`='$user_id'");
											while ($row = $result->fetch_assoc()) {
												$age = $row['age'];
												$marital_status = $row['marital_status'];
												$body_type = $row['body_type'];
												$complexion = $row['complexion'];
												$height = $row['height'];
												$diet = $row['diet'];
												$manglik = $row['manglik'];
												$region = $row['region'];
												$caste = $row['caste'];
												$mother_tongue = $row['mother_tongue'];
												$education = $row['education'];
												$occupations = $row['occupations'];
												$country_of_residence = $row['country_of_residence'];
												$state = $row['state'];
												$residency_states = $row['residency_states'];
											}

											?>
											<tbody>
												<tr class="opened">
													<td class="day_label">Age:</td>
													<td class="day_value"> <?php echo $age; ?> </td>
												</tr>
												<tr class="opened">
													<td class="day_label">Marital Status :</td>
													<td class="day_value"> <?php echo $marital_status; ?> </td>
												</tr>
												<tr class="opened">
													<td class="day_label">Body Type :</td>
													<td class="day_value closed"><span><?php echo $body_type; ?></span></td>
												</tr>
												<tr class="opened">
													<td class="day_label">Complexion :</td>
													<td class="day_value closed"><span> <?php echo $complexion; ?> </span></td>
												</tr>
												<tr class="opened">
													<td class="day_label">Height:</td>
													<td class="day_value closed"><span><?php echo $height  ?></span></td>
												</tr>
												<tr class="opened">
													<td class="day_label">Diet :</td>
													<td class="day_value closed"><span><?php echo $diet; ?></span></td>
												</tr>
												<tr class="opened">
													<td class="day_label">Kujadosham / Manglik :</td>
													<td class="day_value closed"><span><?php echo $manglik; ?></span></td>
												</tr>
												<tr class="opened">
													<td class="day_label">Religion :</td>
													<td class="day_value closed"><span><?php echo $region; ?></span></td>
												</tr>
												<tr class="opened">
													<td class="day_label">Caste :</td>
													<td class="day_value closed"><span><?php echo $caste; ?></span></td>
												</tr>
												<tr class="opened">
													<td class="day_label">Mother Tongue :</td>
													<td class="day_value closed"><span><?php echo $mother_tongue; ?></span></td>
												</tr>
												<tr class="opened">
													<td class="day_label">Education :</td>
													<td class="day_value closed"><span><?php echo $education; ?></span></td>
												</tr>
												<tr class="opened">
													<td class="day_label">Occupation :</td>
													<td class="day_value closed"><span><?php echo $occupations; ?></span></td>
												</tr>
												<tr class="opened">
													<td class="day_label">Country of Residence :</td>
													<td class="day_value closed"><span><?php echo $country_of_residence; ?></span></td>
												</tr>
												<tr class="opened">
													<td class="day_label">State :</td>
													<td class="day_value closed"><span> <?php echo $state; ?> </span></td>
												</tr>
												<tr class="opened">
													<td class="day_label">Residency Status :</td>
													<td class="day_value closed"><span><?php echo $residency_states; ?></span></td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
						<!-- /block -->
					</div>
				</div>
			</div>
		</div>
		<hr>
		<?php include 'includes/footer.php'; ?>
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