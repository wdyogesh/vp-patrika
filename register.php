    <?php include "asset/header.php"; if($session->is_signed_in()){redirect("index.php"); } ?>
    <title>Vishwakarma Patrika | Register </title>
    <?php include "asset/navbar.php";?>
     <!-- ============================  Navigation End ============================ -->
		<div class="grid_3">
			<div class="container">
				<div class="breadcrumb1">
					<ul>
						<a href=""><i class="fa fa-home home_1"></i></a>
						<span class="divider">&nbsp;|&nbsp;</span>
						<li class="current-page">
                            <span style="color: green;"> Register </span> , If You have Already Registered? <a href="login.php"> <span style="color:red "> Login Here </span> </a>
                        </li>
					</ul>
				</div>
				<div class="services">
					<div class="col-sm-6 login_left">
						<form action="controller.php" autocomplete="on" method="post" enctype="multipart/form-data">
                            <div class="pricing-table-grid">
								<a class="popup-with-zoom-anim order-btn" >Basic Details</a>

								<div class="form-group">
									<label for="edit-name">Name <span class="form-required" title="This field is required.">*</span></label>
									<input type="text" id="edit-name" name="name" required style='text-transform:uppercase' value="" size="60" maxlength="60" class="form-text required" >
								</div>
								<div class="form-group">
									<label for="edit-pass">Subcaste <span class="form-required" title="This field is required.">*</span></label>
									<div class="select-block1">
										<select name="gotra" id="gotra" required>
											<option value="">Select Subcaste</option>
											<option  alt="Black Smith">Black Smith</option>
											<option  alt="Carpenters">Carpenters</option>
											<option  alt="Goldsmiths">Goldsmiths</option>
											<option  alt="Sculptors">Sculptors</option>
											<option  alt="Others">Others</option>
											<option  alt="Don't wish to specify">Don't wish to specify</option>
											<option  alt="Don't know my sub-caste">Don't know my sub-caste</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label for="edit-pass">Gender <span class="form-required" title="This field is required.">*</span></label>

									<div class="select-block1">
										<select name="gender" id="gender" required>
											<option value="">Select Gender</option>
											<option value="M">Male</option>
											<option value="F">Female</option>
										</select>

									</div>
								</div>

								<div class="age_select">
									<label for="hight">Date Of Birth <span class="form-required" title="This field is required.">*</span></label>
									<div class="age_grid">
										<div class="col-sm-4 form_box">
											<div class="select-block1">
                                                <?php $dateArray = range(1, 31); ?>
												<select name="date" id="day" required>
                                                    <option value="">Select Date</option>
                                                    <?php
                                                    foreach ($dateArray as $date) {
                                                        $datePadding = str_pad($date, 2, "0", STR_PAD_LEFT);
                                                        echo '<option value="'.$datePadding.'">'.$datePadding.'</option>';
                                                    }
                                                    ?>
												</select>
											</div>
										</div>
										<div class="col-sm-4 form_box2">
											<div class="select-block1">
                                                <?php $monthArray = range(1, 12); ?>
												<select name="month" id="month" required>
                                                    <option value="">Select Month</option>
                                                    <?php
                                                    foreach ($monthArray as $month) {
                                                        $monthPadding = str_pad($month, 2, "0", STR_PAD_LEFT);
                                                        $fdate = date("F", strtotime("2015-$monthPadding-01"));
                                                        echo '<option value="'.$monthPadding.'">'.$fdate.'</option>';
                                                    }
                                                    ?>
												</select>
											</div>
										</div>
										<div class="col-sm-4 form_box2">
											<div class="select-block1">
                                                <?php $yearArray = range(1941, date('Y')-18); ?>
												<select name="year" id="year" required>
                                                    <option value="">Select Year</option>
                                                    <?php
                                                    foreach ($yearArray as $year) {
                                                        $selected = ($year == 2015) ? 'selected' : '';
                                                        echo '<option '.$selected.' value="'.$year.'">'.$year.'</option>';
                                                    }
                                                    ?>
												</select>
											</div>
										</div>
                                        <div class="clearfix"></div>
									</div>
								</div>

								<div class="form-group">
									<label for="birth-time">Birth Time <span class="form-required" title="This field is required.">*</span></label>
									<input type="time" id="birthTime" required name="birthTime" value="" size="60" maxlength="60" class="form-text required">
								</div>

								<div class="form-group">
									<label for="birth-place">Birth Place <span class="form-required" title="This field is required.">*</span></label>
									<input type="text" id="birthPlace"  required name="birthPlace" onkeyup=valid(this,'allowSpace') onblur=valid(this,'allowSpace') value="" size="60" maxlength="60" class="form-text required">
								</div>

								<div class="form-group">
									<label for="edit-pass">Manglik <span class="form-required" title="This field is required.">*</span></label>
                                    <div class="select-block1">
										<select name="manglik" id="manglik" required>
											<option value="">Select </option>
											<option value="YES">Yes</option>
											<option value="NO">No</option>
										</select>

									</div>
								</div>

								<div class="age_select">
									<label for="hight">Height <span class="form-required" title="This field is required.">*</span></label>
									<div class="age_grid">
										<div class="col-sm-4 form_box">
											<div class="select-block1">
												<select name="height_f" id="hight_f" required>
													<option value="">Select </option>
													<option value="3 Feet">3 Feet</option>
													<option value="4 Feet">4 Feet</option>
													<option value="5 Feet">5 Feet</option>
													<option value="6 Feet">6 Feet</option>
												</select>
											</div>
										</div>
										<div class="col-sm-4 form_box2">
											<div class="select-block1">
												<select name="height_i" id="hight_i" required>
													<option value="">Select </option>
													<option value="0 Inches">0 Inches</option>
													<option value="1 Inches">1 Inches</option>
													<option value="2 Inches">2 Inches</option>
													<option value="3 Inches">3 Inches</option>
													<option value="4 Inches">4 Inches</option>
													<option value="5 Inches">5 Inches</option>
													<option value="6 Inches">6 Inches</option>
													<option value="7 Inches">7 Inches</option>
													<option value="8 Inches">8 Inches</option>
													<option value="9 Inches">9 Inches</option>
													<option value="10 Inches">10 Inches</option>
													<option value="11 Inches">11 Inches</option>
												</select>
											</div>
										</div>

										<div class="clearfix"></div>
									</div>
								</div>

								<div class="form-group">
									<label for="edit-pass">Marital Status <span class="form-required" title="This field is required.">*</span></label>

									<div class="select-block1">
										<select name="maritalStatus" id="maritalStatus" required>
											<option value="">Select </option>
											<option value="Single">Single</option>
											<option value="Divorced">Divorced</option>
											<option value="Widow">Widow</option>
											<option value="Handicapped">Handicapped</option>
										</select>

									</div>
								</div>
								<div class="form-group">
									<label for="edit-pass"> Profile By : <span class="form-required" title="This field is required.">*</span></label>

									<div class="select-block1">
										<select name="profileBy" id="profileBy" required>
											<option value="">Select </option>
											<option value="Self">Self</option>
											<option value="Parent/Gaurdian">Parent/Gaurdian</option>
											<option value="Brother/Sister">Brother/Sister</option>
											<option value="Relative">Relative</option>
											<option value="Friend">Friend</option>
											<option value="Other">Other</option>
										</select>

									</div>
								</div>

								<div class="form-group">
									<label for="edit-name">Photo <span class="form-required" title="This field is required.">*</span></label>
									<input type="file" id="image"  name="image" required value="" size="60" maxlength="60" class="form-text required">
								</div>

								<div class="form-group">
									<label for="edit-pass"> Education : <span class="form-required" title="This field is required.">*</span></label>
									<div class="select-block1">
	                                <select id="education" name="education" required>
	                                <option value="">Select your degree</option>
									<option value="" disabled="disabled">-----PG-Professional Courses----</option>
									<option value="CA (Chartered Accountant)">CA (Chartered Accountant)</option>
									<option value="CFA (Chartered Financial Analyst)">CFA (Chartered Financial Analyst)</option>
									<option value="CS (Company Secretary)">CS(Company Secretary)</option>
									<option value="ICWA">ICWA</option>
									<option value="Integrated PG">Integrated PG</option>
									<option value="M.Arch. (Architecture)">M.Arch.(Architecture)</option>
									<option value="M.Ed. (Education)">M.Ed.(Education)</option>
									<option value="M.Lib.Sc. (Library Sciences)">M.Lib.Sc.(Library Sciences)</option>
									<option value="MPLA">M.Plan.(Planning)</option>
									<option value="MFAT">Master of Fashion Technology</option>
									<option value="MOHA">Master of Health Administration</option>
									<option value="MHPA">Master of Hospital Administration</option>
									<option value="MBA/PGDM">MBA/PGDM</option>
									<option value="MCA PGDCA part time">MCA PGDCA part time</option>
									<option value="MCA/PGDCA">MCA/PGDCA</option>
									<option value="ME/M.Tech/MS (Engg/Sciences)">ME/M.Tech/MS (Engg/Sciences)</option>
									<option value="MFA (Fine Arts)">MFA (Fine Arts)</option>
									<option value="ML/LLM (Law)">ML/LLM (Law)</option>
									<option value="MSW (Social Work)">MSW (Social Work)</option>
									<option value="PG Diploma">PG Diploma</option>
									<br />
									<option value="" disabled="disabled">------------PG-General Courses-----------</option>
									<option value="M.Com.(Commerce)">M.Com.(Commerce)</option>
									<option value="M.Sc.(Science)">M.Sc.(Science)</option>
									<option value="MA (Arts)">MA (Arts)</option>
									<br />
									<option value="" disabled="disabled">-------Graduation-Professional Courses------------</option>
									<option value="B.Arch(Architecture)">B.Arch(Architecture)</option>
									<option value="B.Ed(Education)">B.Ed(Education)</option>
									<option value="B.El.Ed (Elementary Education)">B.El.Ed (Elementary Education)</option>
									<option value="B.Lib.Sc (Library Sciences)">B.Lib.Sc (Library Sciences)</option>
									<option value="B.P.Ed. (Physical Education)">B.P.Ed. (Physical Education)</option>
									<option value="B.Plan (Planning)">B.Plan (Planning)</option>
									<option value="Bachelor of Fashion Technology">Bachelor of Fashion Technology</option>
									<option value="BBA/BBM/BBS">BBA/BBM/BBS</option>
									<option value="BCA(Computer Application)">BCA(Computer Application)</option>
									<option value="BE B.Tech(Engineering)">BE B.Tech(Engineering)</option>
									<option value="BFA(Fine Arts)">BFA(Fine Arts)</option>
									<option value="BHM(Hotel Management)">BHM(Hotel Management)</option>
									<option value="BL/LLB/BGL(Law)">BL/LLB/BGL(Law)</option>
									<option value="BSW (Social Work)">BSW (Social Work)</option>
									<br />
									<option value="" disabled="disabled">---------Graduation-General Courses-----------</option>
									<option value="B.A.(Arts)">B.A.(Arts)</option>
									<option value="B.Com(Commerce)">B.Com(Commerce)</option>
									<option value="B.Sc(Science)">B.Sc(Science)</option>
									<br />
									<option value="" disabled="disabled">----------Medicine (General,Dental,Surgeon)---------------</option>
									<option value="B.A.M.S">B.A.M.S</option>
									<option value="B.Pharm(Pharmacy)">B.Pharm (Pharmacy)</option>
									<option value="B.V.Sc.(Veterinary Science)">B.V.Sc. (Veterinary Science)</option>
									<option value="BDS(Dental Surgery)">BDS(Dental Surgery)</option>
									<option value="BHMS(Homeopathy)">BHMS(Homeopathy)</option>
									<option value="M.Pharm.(Pharmacy)">M.Pharm.(Pharmacy)</option>
									<option value="M.V.Sc.(Veterinary Science)">M.V.Sc.(Veterinary Science)</option>
									<option value="MBBS">MBBS</option>
									<option value="MD/MS(Medicine)">MD/MS(Medicine)</option>
									<option value="MDS(Master of Dental Surgery)">MDS(Master of Dental Surgery)</option>
									<option value="BPT(Physiotherapy)">BPT(Physiotherapy)</option>
									<option value="MPT(Physiotherapy)">MPT(Physiotherapy)</option>
									<br />
									<option value="" disabled="disabled">-----------Doctorate (Phd)------------</option>
									<option value="M.Phil.(Philosophy)">M.Phil.(Philosophy)</option>
									<option value="Ph.D.(Doctorate)">Ph.D.(Doctorate)</option>
									<option value="Other Doctorate">Other Doctorate</option>
									<br />
									<option value="" disabled="disabled">--------------Diploma Courses------------</option>
									<option value="Arts/Graphic Designing">Arts/Graphic Designing</option>
									<option value="Engineering">Engineering</option>
									<option value="Fashion/Design">Fashion/Design</option>
									<option value="Languages">Languages</option>
									<option value="Pilot Licenses">Pilot Licenses</option>
									<option value="Other Diploma">Other Diploma</option>
									<br />
									<option value="" disabled="disabled">-------12th but not pursuing graduation--------</option>
									<option value="SSSL">12th</option>
									<br />
									<option value="" disabled="disabled">--------10th but not pursuing 12th-----------</option>
									<option value="HGSC">10th</option>
									</select>
									</div>
								</div>

								<div class="form-group">
									<label for="occupation">Occupation <span class="form-required" title="This field is required.">*</span></label>
									<input type="text" id="occupation" name="occupation" required onkeyup=valid(this,'allowSpace') onblur=valid(this,'allowSpace')
                                           value=""
                                           size="60" maxlength="30" class="form-text required">
								</div>

								<div class="form-group">
									<label for="hobbies">Hobbies <span class="form-required" title="This field is required.">*</span></label>
									<input type="text" id="hobbies" name="hobbies" required onkeyup=valid(this,'allowSpace') onblur=valid(this,'allowSpace') value="" size="60" maxlength="60" class="form-text required">
								</div>
							</div>

							<div class="pricing-table-grid">
								<a class="popup-with-zoom-anim order-btn" >Family Details</a>

								<div class="form-group">
									<label for="father-name">Father Name <span class="form-required" title="This field is required.">*</span></label>
									<input type="text" id="fatherName" name="fatherName" required  value="" size="60" maxlength="60" class="form-text required">
								</div>

								<div class="form-group">
									<label for="mother-name">Mother Name <span class="form-required" title="This field is required.">*</span></label>
									<input type="text" id="motherName" name="motherName" required  value="" size="60" maxlength="60" class="form-text required">
								</div>

								<div class="age_select">
									<label for="brother">Brother <span class="form-required" title="This field is required.">*</span></label>
									<div class="age_grid">
										<div class="col-sm-4 form_box">
											<div class="select-block1">
												<select name="b_married" id="b_married" required>
													<option value="">Married</option>
													<option value="0">0 </option>
													<option value="1">1 </option>
													<option value="2">2 </option>
													<option value="3">3 </option>
													<option value="4">4 </option>
													<option value="5">5 </option>
													<option value="6">6 </option>
													<option value="7">7 </option>
													<option value="8">8 </option>
													<option value="9">9 </option>
													<option value="10">10 </option>

												</select>
											</div>
										</div>
										<div class="col-sm-4 form_box2">
											<div class="select-block1">
												<select name="b_unmarried" id="b_unmarried" required>
													<option value="">Unmarried</option>
													<option value="0">0 </option>
													<option value="1">1 </option>
													<option value="2">2 </option>
													<option value="3">3 </option>
													<option value="4">4 </option>
													<option value="5">5 </option>
													<option value="6">6 </option>
													<option value="7">7 </option>
													<option value="8">8 </option>
													<option value="9">9 </option>
													<option value="10">10 </option>
												</select>
											</div>
										</div>

										<div class="clearfix"></div>
									</div>
								</div>

								<div class="age_select">
									<label for="edit-pass">Sister <span class="form-required" title="This field is required.">*</span></label>
									<div class="age_grid">
										<div class="col-sm-4 form_box">
											<div class="select-block1">
												<select name="s_married" id="s_married" required>

													<option value="">Married</option>
													<option value="0">0 </option>
													<option value="1">1 </option>
													<option value="2">2 </option>
													<option value="3">3 </option>
													<option value="4">4 </option>
													<option value="5">5 </option>
													<option value="6">6 </option>
													<option value="7">7 </option>
													<option value="8">8 </option>
													<option value="9">9 </option>
													<option value="10">10 </option>

												</select>
											</div>
										</div>
										<div class="col-sm-4 form_box2">
											<div class="select-block1">
												<select name="s_unmarried" id="s_unmarried" required>
													<option value="">UnMarried</option>
													<option value="0">0 </option>
													<option value="1">1 </option>
													<option value="2">2 </option>
													<option value="3">3 </option>
													<option value="4">4 </option>
													<option value="5">5 </option>
													<option value="6">6 </option>
													<option value="7">7 </option>
													<option value="8">8 </option>
													<option value="9">9 </option>
													<option value="10">10 </option>
												</select>
											</div>
										</div>

										<div class="clearfix"></div>
									</div>
								</div>
							</div>

							<div class="pricing-table-grid">
								<a class="popup-with-zoom-anim order-btn" >Contact Details</a>

								<div class="form-group">
									<label for="Mobile">Mobile Number <span class="form-required" title="This field is required.">*</span></label>
									<input type="text" id="mobile" pattern="[0-9]{10}" name="mobile" required onkeyup=valid(this,'numbers') onblur=valid(this,'numbers') value="" size="60" maxlength="10" title="Enter your 10 Digit mobile number" class="form-text required">
								</div>

								<div class="form-group">
									<label for="address">Address <span class="form-required" title="This field is required.">*</span></label>
									<textarea class="form-control bio" name="address" required id="address" onkeyup=valid(this,'allowSpace') onblur=valid(this,'allowSpace') placeholder="" rows="3"></textarea>
								</div>
								<div class="form-group">
									<label for="edit-pass"> State: <span class="form-required" title="This field is required.">*</span></label>

									<div class="select-block1">
										<select name="state" id="state" required>
											<option value="">Please State</option>
											<option value="Andaman and Nicobar">Andaman and Nicobar</option>
											<option value="Andhra Pradesh">Andhra Pradesh</option>
											<option value="Arunachal Pradesh">Arunachal Pradesh</option>
											<option value="Assam">Assam</option>
											<option value="Bihar">Bihar</option>
											<option value="Chandigarh">Chandigarh</option>
											<option value="Chhattisgarh">Chhattisgarh</option>
											<option value="Dadra & Nagar Haveli">Dadra & Nagar Haveli</option>
											<option value="Daman and Diu">Daman and Diu</option>
											<option value="Delhi">Delhi</option>
											<option value="Goa">Goa</option>
											<option value="Gujarat">Gujarat</option>
											<option value="Haryana">Haryana</option>
											<option value="Himachal Pradesh">Himachal Pradesh</option>
											<option value="Jammu and Kashmir">Jammu and Kashmir</option>
											<option value="Jharkhand">Jharkhand</option>
											<option value="Karnataka">Karnataka</option>
											<option value="Kerala">Kerala</option>
											<option value="Lakshadweep">Lakshadweep</option>
											<option value="Madhya Pradesh">Madhya Pradesh</option>
											<option value="Maharashtra">Maharashtra</option>
											<option value="Manipur">Manipur</option>
											<option value="Meghalaya">Meghalaya</option>
											<option value="Mizoram">Mizoram</option>
											<option value="Nagaland">Nagaland</option>
											<option value="Orissa">Orissa</option>
											<option value="Pondicherry">Pondicherry</option>
											<option value="Punjab">Punjab</option>
											<option value="Rajasthan">Rajasthan</option>
											<option value="Sikkim">Sikkim</option>
											<option value="Tamil Nadu">Tamil Nadu</option>
											<option value="Tripura">Tripura</option>
											<option value="Uttar Pradesh">Uttar Pradesh</option>
											<option value="Uttaranchal">Uttaranchal</option>
											<option value="West Bengal">West Bengal</option>
										</select>

									</div>
								</div>
								<div class="form-group">
									<label for="city">Location <span class="form-required" title="This field is required.">*</span></label>
									<input type="text" id="location" name="location" required value="" size="60" onkeyup=valid(this,'allowSpace') onblur=valid(this,'allowSpace') maxlength="60" class="form-text required">
								</div>

								<div class="form-group">
									<label for="city">City/Town <span class="form-required" title="This field is required.">*</span></label>
									<input type="text" id="city" name="city" required value="" size="60" onkeyup=valid(this,'allowSpace') onblur=valid(this,'allowSpace') maxlength="60" class="form-text required">
								</div>
							</div>

							<div class="pricing-table-grid">
								<a class="popup-with-zoom-anim order-btn" >Login password</a>

								<div class="form-item form-type-password form-item-pass">
									<label for="edit-pass">Password <span class="form-required" title="This field is required.">*</span></label>
									<input type="password" id="pass1" name="pass1" required size="60" onchange=(this,'validatePassword') maxlength="128" class="form-text required">
								</div>

								<div class="form-item form-type-password form-item-pass">
									<label for="edit-pass">Confirm Password <span class="form-required" title="This field is required.">*</span></label>
									<input type="password" id="pass2" name="pass2" required size="60" onkeyup="checkPass(); return false;" maxlength="128" class="form-text required">
									<span id="confirmMessage" class="confirmMessage"></span>
								</div>
							</div>
							<div class="form-actions">
								<input type="submit" id="edit-submit" name="action" value="Submit Profile" class="btn_1 submit">
							</div>
						</form>
					</div>
					<div class="col-md-4 match_right">
                        <section class="slider">
							<h3>Advertisements</h3>
							<div class="flexslider">
								<ul class="slides">
									<li>
										<img src="adver_upload/one.gif" alt=""/>
										<h4>Advertisement 1</h4>

									</li>
									<li>
										<img src="adver_upload/one.gif" alt=""/>
										<h4>Advertisement 2</h4>

									</li>
									<li>
										<img src="adver_upload/one.gif" alt=""/>
										<h4>Advertisement 2</h4>

									</li>
									<li>
										<img src="adver_upload/one.gif" alt=""/>
										<h4>Advertisement 3</h4>

									</li>
								</ul>
							</div>
						</section>

					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>

        <div class="footer">
            <div class="container">

                <div class="clearfix"></div>
                <?php
                include 'asset/footer.php';
                ?>
            </div>
        </div>
		<!-- FlexSlider -->
		<link href="assets/css/flexslider.css" rel='stylesheet' type='text/css' />
		<script defer src="assets/js/jquery.flexslider.js"></script>
		<script type="text/javascript">
			$(function() {
				SyntaxHighlighter.all();
			});
			$(window).load(function() {
				$('.flexslider').flexslider({
					animation : "slide",
					start : function(slider) {
						$('body').removeClass('loading');
					}
				});
			});
		</script>
		<!-- FlexSlider -->
        <script>
            $(document).ready(function() {
                $(".dropdown").hover(function() {
                    $('.dropdown-menu', this).stop(true, true).slideDown("fast");
                    $(this).toggleClass('open');
                }, function() {
                    $('.dropdown-menu', this).stop(true, true).slideUp("fast");
                    $(this).toggleClass('open');
                });
            });
        </script>
        <script type="text/javascript">
            function valid(o, w) {
                o.value = o.value.replace(valid.r[w], '');
            }


            valid.r = {
                'special' : /[^\w]/g,
                'allowSpace' : /[^\w|\s]/g,
                'numbers' : /[^\d]/g,
                'allowemail' : /[^\w|\s|@|\.]/g
            }
        </script>
        <script type="text/javascript">
            function checkPass() {
                //Store the password field objects into variables ...
                var pass1 = document.getElementById('pass1');
                var pass2 = document.getElementById('pass2');
                //Store the Confimation Message Object ...
                var message = document.getElementById('confirmMessage');
                //Set the colors we will be using ...
                var goodColor = "#66cc66";
                var badColor = "#ff6666";
                //Compare the values in the password field
                //and the confirmation field
                if (pass1.value == pass2.value) {
                    //The passwords match.
                    //Set the color to the good color and inform
                    //the user that they have entered the correct password
                    pass2.style.backgroundColor = goodColor;
                    message.style.color = goodColor;
                    message.innerHTML = "Passwords Match!"
                } else {
                    //The passwords do not match.
                    //Set the color to the bad color and
                    //notify the user.
                    pass2.style.backgroundColor = badColor;
                    message.style.color = badColor;
                    message.innerHTML = "Passwords Do Not Match!"
                }
            }
        </script>

        <script>
            $("#image").change(function() {
                var val = $(this).val();
                switch(val.substring(val.lastIndexOf('.') + 1).toLowerCase()){
                    case 'gif': case 'jpg': case 'png':
                    break;
                    default:
                        $(this).val('');
                        alert("Please Upload an image format jpg, png, jpeg ony allowed !!");
                        break;
                }
            });
        </script>
	</body>
</html>
