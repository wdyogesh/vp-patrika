<?php
include 'init.php';
/**
 * Created by PhpStorm.
 * User: wdyog
 * Date: 23-12-2018
 * Time: 12:20 PM
 */

if (isset($_REQUEST['profile'])) {
        $user_id = $_REQUEST['userId'];
        $profile_id = $_REQUEST['profile'];
        $data = ['user_id'=>$user_id,'profile_id'=>$profile_id];
        $responce = user::addShortListed($data);
        if ($responce) {
            echo 'instered';
        }
}

if (isset($_REQUEST['shordId'])) {
    $shordId = $_REQUEST['shordId'];
    $responce = user::removeShortListed($shordId);
    if ($responce) {
        echo 'deleted';
    }
}
//  profile update here
if (isset($_REQUEST['profileIdData'])) {
    $profile_id = $_REQUEST['profileIdData'];
    $profile_results = user::find_admin_by_id($profile_id);
        echo  '<img width = "557px" src="uploads/800/'.strtolower($profile_results->fileToUpload).'" alt="">';
    }

    // Personal profile update
    if (isset($_REQUEST['PersonalProfile'])) {
    $profile_id = $_REQUEST['PersonalProfile'];
    $profile_results = user::find_admin_by_id($profile_id);
    ?>
    <form class="custom-form" id="personal-details-form" name="personal-details-form" role="form">
        <div class="form-group">
            <img src="" width="" alt="">
            <input type="hidden" name="id" value="<?=$profile_results->id?>">
            <input type="hidden" name="personal" value="personal">
            <label for="edit-name">Name<span class="form-required" title="This field is required.">*</span></label>
            <input type="text" id="edit-name" name="name" required style='text-transform:uppercase' value="<?=$profile_results->name?>" size="60" maxlength="60" class="form-text required" >
        </div>
        <div class="form-group">
            <label for="edit-pass">Subcaste <span class="form-required" title="This field is required.">*</span></label>
            <div class="select-block1">
                <?php $gotraArray = ['Black Smith','Carpenters','Goldsmiths','Sculptors','Others','Don\'t wish to specify','Don\'t know my sub-caste'] ?>
                <select name="gotra" id="gotra" required>
                    <option value="">Select Subcaste</option>
                    <?php foreach ($gotraArray as $gotra): $selected = ($gotra == $profile_results->gotra) ? 'selected' : ''; ?>
                    <option <?=$selected?> value="<?= $gotra?>"><?= $gotra?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="age_select">
            <?php
            $birth_date = date('d', strtotime($profile_results->dob));
            $birth_month = date('m', strtotime($profile_results->dob));
            $birth_year = date('Y', strtotime($profile_results->dob));
            ?>
            <label for="hight">Date Of Birth <span class="form-required" title="This field is required.">*</span></label>
            <div class="age_grid">
                <div class="col-sm-4 form_box">
                    <div class="select-block1">
                        <?php $dateArray = range(1, 31); ?>
                        <select name="date" id="day" required>
                            <option value="">Select Date</option>
                            <?php
                            foreach ($dateArray as $date) {
                                $selected = ($date == $birth_date) ? 'selected' : '';
                                $datePadding = str_pad($date, 2, "0", STR_PAD_LEFT);
                                echo '<option '.$selected.' value="'.$datePadding.'">'.$datePadding.'</option>';
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
                                $selected = ($monthPadding == $birth_month) ? 'selected' : '';
                                $fdate = date("F", strtotime("2015-$monthPadding-01"));
                                echo '<option '.$selected.' value="'.$monthPadding.'">'.$fdate.'</option>';
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
                                $selected = ($year == $birth_year) ? 'selected' : '';
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
            <input type="time" id="birthTime" value="<?php echo $profile_results->birthTime?>" required name="birthTime" value="" size="60" maxlength="60" class="form-text required">
        </div>
        <div class="form-group">
            <label for="edit-pass">Manglik <span class="form-required" title="This field is required.">*</span></label>
            <div class="select-block1">
                <select name="manglik" id="manglik" required>
                    <option value="">Select </option>
                    <option <?php echo $selected = ('YES' == $profile_results->manglik) ? 'selected' : '';?> value="YES">Yes</option>
                    <option <?php echo $selected = ('NO' == $profile_results->manglik) ? 'selected' : '';?> value="NO">No</option>
                </select>

            </div>
        </div>
        <div class="age_select">
            <label for="hight">Height <span class="form-required" title="This field is required.">*</span></label>
            <div class="age_grid">
                <div class="col-sm-4 form_box">
                    <div class="select-block1">
                        <?php $feetArray = ['3','4','5','6'] ?>
                        <select name="height_f" id="hight_f" required>
                            <option value="">Select </option>
                            <?php foreach ($feetArray as $heightFeet): $selected = ($heightFeet.' Feet' == $profile_results->height_f) ? 'selected' : '';?>
                            <option <?=$selected?> value="<?=$heightFeet?> Feet"><?=$heightFeet?> Feet</option>
                            <?php endforeach;?>
                        </select>
                    </div>
                </div>
                <div class="col-sm-4 form_box2">
                    <div class="select-block1">
                        <?php $heightInchs = range('0','11')?>
                        <select name="height_i" id="hight_i" required>
                            <option value="">Select </option>
                            <?php foreach ($heightInchs as $heightInch): $selected = ($heightInch == $profile_results->height_i) ? 'selected' : '';?>
                            <option <?=$selected?> value="<?=$heightInch?> Inches"><?=$heightInch?> Inches</option>
                            <?php endforeach;?>
                        </select>
                    </div>
                </div>

                <div class="clearfix"></div>
            </div>
        </div>
        <div class="form-group">
            <label for="edit-pass">Marital Status <span class="form-required" title="This field is required.">*</span></label>
            <div class="select-block1">
                <?php $statusArray = ['Single','Divorced','Widow','Handicapped']?>
                <select name="maritalStatus" id="maritalStatus" required>
                    <option value="">Select </option>
                    <?php foreach ($statusArray as $status): $selected = ($status == $profile_results->marital_status) ? 'selected' : ''; ?>
                    <option <?=$selected?> value="<?=$status?>"><?=$status?></option>
                    <?php endforeach;?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="edit-pass"> Profile By : <span class="form-required" title="This field is required.">*</span></label>
            <div class="select-block1">
                <?php $profiebyArray = ['Self','Parent/Gaurdian','Brother/Sister','Relative','Friend','Other']?>
                <select name="profileBy" id="profileBy" required>
                    <option value="">Select </option>
                    <?php foreach ($profiebyArray as $profileby): $selected = ($profileby == $profile_results->profileBy) ? 'selected' : ''; ?>
                        <option <?=$selected?> value="<?=$profileby?>"><?=$profileby?></option>
                    <?php endforeach;?>
                    <option value="">Self</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="hobbies">Hobbies <span class="form-required" title="This field is required.">*</span></label>
            <input type="text" id="hobbies"  name="hobbies" required onkeyup=valid(this,'allowSpace') onblur=valid(this,'allowSpace') value="<?=$profile_results->hobbies?>" size="60" maxlength="60" class="form-text required">
        </div>
        <button type="submit" class="btn btn-primary custom-btn">Submit</button>
        <button type="button" data-dismiss="modal" class="btn btn-default custom-btn">Cancel</button>
    </form>
    <?php
    }
?>

<?php
    // Education profile update
    if (isset($_REQUEST['EducationProfile'])) {
        $profile_id = $_REQUEST['EducationProfile'];
        $profile_results = user::find_admin_by_id($profile_id);
        ?>
        <form class="custom-form" id="education-details-form" role="form">
            <div class="form-group">
                <input type="hidden" name="id" value="<?=$profile_results->id?>">
                <input type="hidden" name="educationForm" value="educationForm">
                <label for="edit-pass"> Education : <span class="form-required" title="This field is required.">*</span></label>
                <div class="select-block1">
                    <select id="education" name="education" required="">
                        <option value="">Select your degree</option>
                        <option value="" disabled="disabled">-----PG-Professional Courses----</option>
                        <option <?= $selected = ($profile_results->education == 'CA (Chartered Accountant)' ) ? 'selected' : '' ?> value="CA (Chartered Accountant)">CA (Chartered Accountant)</option>
                        <option <?= $selected = ($profile_results->education == 'CFA (Chartered Financial Analyst)' ) ? 'selected' : '' ?> value="CFA (Chartered Financial Analyst)">CFA (Chartered Financial Analyst)</option>
                        <option <?= $selected = ($profile_results->education == 'CS (Company Secretary)' ) ? 'selected' : '' ?> value="CS (Company Secretary)">CS(Company Secretary)</option>
                        <option <?= $selected = ($profile_results->education == 'ICWA' ) ? 'selected' : '' ?> value="ICWA">ICWA</option>
                        <option <?= $selected = ($profile_results->education == 'Integrated PG' ) ? 'selected' : '' ?> value="Integrated PG">Integrated PG</option>
                        <option <?= $selected = ($profile_results->education == 'M.Arch. (Architecture)' ) ? 'selected' : '' ?> value="M.Arch. (Architecture)">M.Arch.(Architecture)</option>
                        <option <?= $selected = ($profile_results->education == 'M.Ed. (Education)' ) ? 'selected' : '' ?> value="M.Ed. (Education)">M.Ed.(Education)</option>
                        <option <?= $selected = ($profile_results->education == 'M.Lib.Sc. (Library Sciences)' ) ? 'selected' : '' ?> value="M.Lib.Sc. (Library Sciences)">M.Lib.Sc.(Library Sciences)</option>
                        <option <?= $selected = ($profile_results->education == 'MPLA' ) ? 'selected' : '' ?> value="MPLA">M.Plan.(Planning)</option>
                        <option <?= $selected = ($profile_results->education == 'MFAT' ) ? 'selected' : '' ?> value="MFAT">Master of Fashion Technology</option>
                        <option <?= $selected = ($profile_results->education == 'MOHA' ) ? 'selected' : '' ?> value="MOHA">Master of Health Administration</option>
                        <option <?= $selected = ($profile_results->education == 'MHPA' ) ? 'selected' : '' ?> value="MHPA">Master of Hospital Administration</option>
                        <option <?= $selected = ($profile_results->education == 'MBA/PGDM' ) ? 'selected' : '' ?> value="MBA/PGDM">MBA/PGDM</option>
                        <option <?= $selected = ($profile_results->education == 'MCA PGDCA part time' ) ? 'selected' : '' ?> value="MCA PGDCA part time">MCA PGDCA part time</option>
                        <option <?= $selected = ($profile_results->education == 'MCA/PGDCA' ) ? 'selected' : '' ?> value="MCA/PGDCA">MCA/PGDCA</option>
                        <option <?= $selected = ($profile_results->education == 'ME/M.Tech/MS (Engg/Sciences)' ) ? 'selected' : '' ?> value="ME/M.Tech/MS (Engg/Sciences)">ME/M.Tech/MS (Engg/Sciences)</option>
                        <option <?= $selected = ($profile_results->education == 'MFA (Fine Arts)' ) ? 'selected' : '' ?> value="MFA (Fine Arts)">MFA (Fine Arts)</option>
                        <option <?= $selected = ($profile_results->education == 'ML/LLM (Law)' ) ? 'selected' : '' ?> value="ML/LLM (Law)">ML/LLM (Law)</option>
                        <option <?= $selected = ($profile_results->education == 'MSW (Social Work)' ) ? 'selected' : '' ?> value="MSW (Social Work)">MSW (Social Work)</option>
                        <option <?= $selected = ($profile_results->education == 'PG Diploma' ) ? 'selected' : '' ?> value="PG Diploma">PG Diploma</option>

                        <option value="" disabled="disabled">------------PG-General Courses-----------</option>
                        <option <?= $selected = ($profile_results->education == 'M.Com.(Commerce)' ) ? 'selected' : '' ?> value="M.Com.(Commerce)">M.Com.(Commerce)</option>
                        <option <?= $selected = ($profile_results->education == 'M.Sc.(Science)' ) ? 'selected' : '' ?> value="M.Sc.(Science)">M.Sc.(Science)</option>
                        <option <?= $selected = ($profile_results->education == 'MA (Arts)' ) ? 'selected' : '' ?> value="MA (Arts)">MA (Arts)</option>

                        <option value="" disabled="disabled">-------Graduation-Professional Courses------------</option>
                        <option <?= $selected = ($profile_results->education == 'B.Arch(Architecture)' ) ? 'selected' : '' ?> value="B.Arch(Architecture)">B.Arch(Architecture)</option>
                        <option <?= $selected = ($profile_results->education == 'B.Ed(Education)' ) ? 'selected' : '' ?> value="B.Ed(Education)">B.Ed(Education)</option>
                        <option <?= $selected = ($profile_results->education == 'B.El.Ed (Elementary Education)' ) ? 'selected' : '' ?> value="B.El.Ed (Elementary Education)">B.El.Ed (Elementary Education)</option>
                        <option <?= $selected = ($profile_results->education == 'B.Lib.Sc (Library Sciences)' ) ? 'selected' : '' ?> value="B.Lib.Sc (Library Sciences)">B.Lib.Sc (Library Sciences)</option>
                        <option <?= $selected = ($profile_results->education == 'B.P.Ed. (Physical Education)' ) ? 'selected' : '' ?> value="B.P.Ed. (Physical Education)">B.P.Ed. (Physical Education)</option>
                        <option <?= $selected = ($profile_results->education == 'B.Plan (Planning)' ) ? 'selected' : '' ?> value="B.Plan (Planning)">B.Plan (Planning)</option>
                        <option <?= $selected = ($profile_results->education == 'Bachelor of Fashion Technology' ) ? 'selected' : '' ?> value="Bachelor of Fashion Technology">Bachelor of Fashion Technology</option>
                        <option <?= $selected = ($profile_results->education == 'BBA/BBM/BBS' ) ? 'selected' : '' ?> value="BBA/BBM/BBS">BBA/BBM/BBS</option>
                        <option <?= $selected = ($profile_results->education == 'BCA(Computer Application)' ) ? 'selected' : '' ?> value="BCA(Computer Application)">BCA(Computer Application)</option>
                        <option <?= $selected = ($profile_results->education == 'BE B.Tech(Engineering)' ) ? 'selected' : '' ?> value="BE B.Tech(Engineering)">BE B.Tech(Engineering)</option>
                        <option <?= $selected = ($profile_results->education == 'BFA(Fine Arts)' ) ? 'selected' : '' ?> value="BFA(Fine Arts)">BFA(Fine Arts)</option>
                        <option <?= $selected = ($profile_results->education == 'BHM(Hotel Management)' ) ? 'selected' : '' ?> value="BHM(Hotel Management)">BHM(Hotel Management)</option>
                        <option <?= $selected = ($profile_results->education == 'BL/LLB/BGL(Law)' ) ? 'selected' : '' ?> value="BL/LLB/BGL(Law)">BL/LLB/BGL(Law)</option>
                        <option <?= $selected = ($profile_results->education == 'BSW (Social Work)' ) ? 'selected' : '' ?> value="BSW (Social Work)">BSW (Social Work)</option>

                        <option value="" disabled="disabled">---------Graduation-General Courses-----------</option>
                        <option <?= $selected = ($profile_results->education == 'B.A.(Arts)' ) ? 'selected' : '' ?> value="B.A.(Arts)">B.A.(Arts)</option>
                        <option <?= $selected = ($profile_results->education == 'B.Com(Commerce)' ) ? 'selected' : '' ?> value="B.Com(Commerce)">B.Com(Commerce)</option>
                        <option <?= $selected = ($profile_results->education == 'B.Sc(Science)' ) ? 'selected' : '' ?> value="B.Sc(Science)">B.Sc(Science)</option>

                        <option value="" disabled="disabled">----------Medicine (General,Dental,Surgeon)---------------</option>
                        <option <?= $selected = ($profile_results->education == 'B.A.M.S' ) ? 'selected' : '' ?> value="B.A.M.S">B.A.M.S</option>
                        <option <?= $selected = ($profile_results->education == 'B.Pharm(Pharmacy)' ) ? 'selected' : '' ?> value="B.Pharm(Pharmacy)">B.Pharm (Pharmacy)</option>
                        <option <?= $selected = ($profile_results->education == 'B.V.Sc.(Veterinary Science)' ) ? 'selected' : '' ?> value="B.V.Sc.(Veterinary Science)">B.V.Sc. (Veterinary Science)</option>
                        <option <?= $selected = ($profile_results->education == 'BDS(Dental Surgery)' ) ? 'selected' : '' ?> value="BDS(Dental Surgery)">BDS(Dental Surgery)</option>
                        <option <?= $selected = ($profile_results->education == 'BHMS(Homeopathy)' ) ? 'selected' : '' ?> value="BHMS(Homeopathy)">BHMS(Homeopathy)</option>
                        <option <?= $selected = ($profile_results->education == 'M.Pharm.(Pharmacy)' ) ? 'selected' : '' ?> value="M.Pharm.(Pharmacy)">M.Pharm.(Pharmacy)</option>
                        <option <?= $selected = ($profile_results->education == 'M.V.Sc.(Veterinary Science)' ) ? 'selected' : '' ?> value="M.V.Sc.(Veterinary Science)">M.V.Sc.(Veterinary Science)</option>
                        <option <?= $selected = ($profile_results->education == 'MBBS' ) ? 'selected' : '' ?> value="MBBS">MBBS</option>
                        <option <?= $selected = ($profile_results->education == 'MD/MS(Medicine)' ) ? 'selected' : '' ?> value="MD/MS(Medicine)">MD/MS(Medicine)</option>
                        <option <?= $selected = ($profile_results->education == 'MDS(Master of Dental Surgery)' ) ? 'selected' : '' ?> value="MDS(Master of Dental Surgery)">MDS(Master of Dental Surgery)</option>
                        <option <?= $selected = ($profile_results->education == 'BPT(Physiotherapy)' ) ? 'selected' : '' ?> value="BPT(Physiotherapy)">BPT(Physiotherapy)</option>
                        <option <?= $selected = ($profile_results->education == 'MPT(Physiotherapy)' ) ? 'selected' : '' ?> value="MPT(Physiotherapy)">MPT(Physiotherapy)</option>

                        <option value="" disabled="disabled">-----------Doctorate (Phd)------------</option>
                        <option <?= $selected = ($profile_results->education == 'M.Phil.(Philosophy)' ) ? 'selected' : '' ?> value="M.Phil.(Philosophy)">M.Phil.(Philosophy)</option>
                        <option <?= $selected = ($profile_results->education == 'Ph.D.(Doctorate)' ) ? 'selected' : '' ?> value="Ph.D.(Doctorate)">Ph.D.(Doctorate)</option>
                        <option <?= $selected = ($profile_results->education == 'Other Doctorate' ) ? 'selected' : '' ?> value="Other Doctorate">Other Doctorate</option>

                        <option value="" disabled="disabled">--------------Diploma Courses------------</option>
                        <option <?= $selected = ($profile_results->education == 'Arts/Graphic Designing' ) ? 'selected' : '' ?> value="Arts/Graphic Designing">Arts/Graphic Designing</option>
                        <option <?= $selected = ($profile_results->education == 'Engineering' ) ? 'selected' : '' ?> value="Engineering">Engineering</option>
                        <option <?= $selected = ($profile_results->education == 'Fashion/Design' ) ? 'selected' : '' ?> value="Fashion/Design">Fashion/Design</option>
                        <option <?= $selected = ($profile_results->education == 'Languages' ) ? 'selected' : '' ?> value="Languages">Languages</option>
                        <option <?= $selected = ($profile_results->education == 'Pilot Licenses' ) ? 'selected' : '' ?> value="Pilot Licenses">Pilot Licenses</option>
                        <option <?= $selected = ($profile_results->education == 'Other Diploma' ) ? 'selected' : '' ?> value="Other Diploma">Other Diploma</option>

                        <option value="" disabled="disabled">-------12th but not pursuing graduation--------</option>
                        <option <?= $selected = ($profile_results->education == 'SSSL' ) ? 'selected' : ''?> value="SSSL">12th</option>

                        <option value="" disabled="disabled">--------10th but not pursuing 12th-----------</option>
                        <option <?= $selected = ($profile_results->education == 'HGSC' ) ? 'selected' : ''?> value="HGSC">10th</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="hobbies">Education Details <span class="form-required" title="This field is required.">*</span></label>
                <input type="text" id="education_details" placeholder="Education Details" name="education_details" required value="<?=$profile_results->education_details?>" size="60" maxlength="60" class="form-text required">
            </div>
            <div class="form-group">
                <label for="occupation">Occupation <span class="form-required" title="This field is required.">*</span></label>
                <input type="text" placeholder="Occupation" id="occupation" name="occupation" required="" value="<?=$profile_results->occupation?>" size="60" maxlength="60" class="form-text required">
            </div>
            <div class="form-group">
                <label for="occupation">Occupation Details <span class="form-required" title="This field is required.">*</span></label>
                <input type="text" placeholder="Enter Occupation Details" id="occupation_details" name="occupation_details" required="" value="<?=$profile_results->occupation_details?>" size="60" maxlength="60" class="form-text required">
            </div>
            <button type="submit" class="btn btn-primary custom-btn">Submit</button>
            <button type="button" data-dismiss="modal" class="btn btn-default custom-btn">Cancel</button>
        </form>
<?php }
?>

<?php
    //Family Profile Update
    if (isset($_REQUEST['FamilyProfile'])) {
        $profile_id = $_REQUEST['FamilyProfile'];
        $profile_results = user::find_admin_by_id($profile_id);
        ?>
        <form class="custom-form" id="family-details-form" role="form">
            <div class="form-group">
                <input type="hidden" name="id" value="<?=$profile_results->id?>">
                <label for="father-name">Father Name <span class="form-required" title="This field is required.">*</span></label>
                <input type="text" id="fatherName" name="fatherName" required="" value="<?=$profile_results->fatherName?>" size="60" maxlength="60" class="form-text required">
            </div>
            <div class="form-group">
                <label for="father-name">Father Occupation  <span class="form-required" title="This field is required.">*</span></label>
                <input type="text" placeholder="Father Occupation" id="father_Occupation" name="father_Occupation" required="" value="<?=$profile_results->father_Occupation?>" size="60" maxlength="60" class="form-text required">
            </div>
            <div class="form-group">
                <label for="mother-name">Mother Name <span class="form-required" title="This field is required.">*</span></label>
                <input type="text" id="motherName" name="motherName" required="" value="<?=$profile_results->MotherName?>" size="60" maxlength="60" class="form-text required">
            </div>
            <div class="form-group">
                <label for="mother-name">Mother Occupation <span class="form-required" title="This field is required.">*</span></label>
                <input type="text" id="mother_Occupation" placeholder="Mother Occupation" name="mother_Occupation" required="" value="<?=$profile_results->mother_Occupation?>" size="60" maxlength="60" class="form-text required">
            </div>
            <div class="age_select">
                <label for="brother">Brother <span class="form-required" title="This field is required.">*</span></label>
                <div class="age_grid">
                    <div class="col-sm-4 form_box">
                        <div class="select-block1">
                            <select name="b_married" id="b_married" required="">
                                <option value="">Married</option>
                                <option <?php echo $selected = ('0' == $profile_results->b_married) ? 'selected' : '';?> value="0">0 </option>
                                <option <?php echo $selected = ('1' == $profile_results->b_married) ? 'selected' : '';?> value="1">1 </option>
                                <option <?php echo $selected = ('2' == $profile_results->b_married) ? 'selected' : '';?> value="2">2 </option>
                                <option <?php echo $selected = ('3' == $profile_results->b_married) ? 'selected' : '';?> value="3">3 </option>
                                <option <?php echo $selected = ('4' == $profile_results->b_married) ? 'selected' : '';?> value="4">4 </option>
                                <option <?php echo $selected = ('5' == $profile_results->b_married) ? 'selected' : '';?> value="5">5 </option>
                                <option <?php echo $selected = ('6' == $profile_results->b_married) ? 'selected' : '';?> value="5">5 </option>
                                <option <?php echo $selected = ('7' == $profile_results->b_married) ? 'selected' : '';?> value="5">5 </option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-4 form_box2">
                        <div class="select-block1">
                            <select name="b_unmarried" id="b_unmarried" required="">
                                <option value="">Unmarried</option>
                                <option <?php echo $selected = ('0' == $profile_results->b_unmarried) ? 'selected' : '';?> value="0">0 </option>
                                <option <?php echo $selected = ('1' == $profile_results->b_unmarried) ? 'selected' : '';?> value="1">1 </option>
                                <option <?php echo $selected = ('2' == $profile_results->b_unmarried) ? 'selected' : '';?> value="2">2 </option>
                                <option <?php echo $selected = ('3' == $profile_results->b_unmarried) ? 'selected' : '';?> value="3">3 </option>
                                <option <?php echo $selected = ('4' == $profile_results->b_unmarried) ? 'selected' : '';?> value="4">4 </option>
                                <option <?php echo $selected = ('5' == $profile_results->b_unmarried) ? 'selected' : '';?> value="5">5 </option>
                                <option <?php echo $selected = ('6' == $profile_results->b_unmarried) ? 'selected' : '';?> value="6">6 </option>
                                <option <?php echo $selected = ('7' == $profile_results->b_unmarried) ? 'selected' : '';?> value="7">7 </option>
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
                            <select name="s_married" id="s_married" required="">
                                <option value="">Married</option>
                                <option <?php echo $selected = ('0' == $profile_results->s_married) ? 'selected' : '';?> value="0">0 </option>
                                <option <?php echo $selected = ('1' == $profile_results->s_married) ? 'selected' : '';?> value="1">1 </option>
                                <option <?php echo $selected = ('2' == $profile_results->s_married) ? 'selected' : '';?> value="2">2 </option>
                                <option <?php echo $selected = ('3' == $profile_results->s_married) ? 'selected' : '';?> value="3">3 </option>
                                <option <?php echo $selected = ('4' == $profile_results->s_married) ? 'selected' : '';?> value="4">4 </option>
                                <option <?php echo $selected = ('5' == $profile_results->s_married) ? 'selected' : '';?> value="5">5 </option>
                                <option <?php echo $selected = ('6' == $profile_results->s_married) ? 'selected' : '';?> value="6">6 </option>
                                <option <?php echo $selected = ('7' == $profile_results->s_married) ? 'selected' : '';?> value="7">7 </option>
                                <option <?php echo $selected = ('8' == $profile_results->s_married) ? 'selected' : '';?> value="8">8 </option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-4 form_box2">
                        <div class="select-block1">
                            <select name="s_unmarried" id="s_unmarried" required="">
                                <option value="">UnMarried</option>
                                <option <?php echo $selected = ('0' == $profile_results->s_unmarried) ? 'selected' : '';?> value="0">0 </option>
                                <option <?php echo $selected = ('1' == $profile_results->s_unmarried) ? 'selected' : '';?> value="1">1 </option>
                                <option <?php echo $selected = ('2' == $profile_results->s_unmarried) ? 'selected' : '';?> value="2">2 </option>
                                <option <?php echo $selected = ('3' == $profile_results->s_unmarried) ? 'selected' : '';?> value="3">3 </option>
                                <option <?php echo $selected = ('4' == $profile_results->s_unmarried) ? 'selected' : '';?> value="4">4 </option>
                                <option <?php echo $selected = ('5' == $profile_results->s_unmarried) ? 'selected' : '';?> value="5">5 </option>
                                <option <?php echo $selected = ('6' == $profile_results->s_unmarried) ? 'selected' : '';?> value="6">6 </option>
                                <option <?php echo $selected = ('7' == $profile_results->s_unmarried) ? 'selected' : '';?> value="7">7 </option>
                                <option <?php echo $selected = ('8' == $profile_results->s_unmarried) ? 'selected' : '';?> value="8">8 </option>
                                <option <?php echo $selected = ('9' == $profile_results->s_unmarried) ? 'selected' : '';?> value="9">9 </option>
                            </select>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary custom-btn">Submit</button>
            <button type="button" data-dismiss="modal" class="btn btn-default custom-btn">Cancel</button>
        </form>

<?php } ?>


<?php
    //Profile address update
    if (isset($_REQUEST['profileAddress'])) {
        $profile_id = $_REQUEST['profileAddress'];
        $profile_results = user::find_admin_by_id($profile_id);
        ?>
        <form class="custom-form" id="address-details-form" role="form">
            <div class="form-group">
                <input type="hidden" name="id" value="<?=$profile_results->id?>">
                <label for="address">Address <span class="form-required" title="This field is required.">*</span></label>
                <textarea class="form-control bio" name="address" required="" id="address" onkeyup="valid(this,'allowSpace')" onblur="valid(this,'allowSpace')" placeholder="" rows="3"><?=$profile_results->address?></textarea>
            </div>
            <div class="form-group">
                <label for="edit-pass"> State: <span class="form-required" title="This field is required.">*</span></label>
                <div class="select-block1">
                    <select name="state" id="state" required="">
                        <option value="">Please State</option>
                        <option <?php echo $selected = ('Andaman and Nicobar' == $profile_results->state) ? 'selected' : '';?> value="Andaman and Nicobar">Andaman and Nicobar</option>
                        <option <?php echo $selected = ('Andhra Pradesh' == $profile_results->state) ? 'selected' : '';?> value="Andhra Pradesh">Andhra Pradesh</option>
                        <option <?php echo $selected = ('Arunachal Pradesh' == $profile_results->state) ? 'selected' : '';?> value="Arunachal Pradesh">Arunachal Pradesh</option>
                        <option <?php echo $selected = ('Assam' == $profile_results->state) ? 'selected' : '';?> value="Assam">Assam</option>
                        <option <?php echo $selected = ('Bihar' == $profile_results->state) ? 'selected' : '';?> value="Bihar">Bihar</option>
                        <option <?php echo $selected = ('Chandigarh' == $profile_results->state) ? 'selected' : '';?> value="Chandigarh">Chandigarh</option>
                        <option <?php echo $selected = ('Chhattisgarh' == $profile_results->state) ? 'selected' : '';?> value="Chhattisgarh">Chhattisgarh</option>
                        <option <?php echo $selected = ('Dadra &amp; Nagar Haveli' == $profile_results->state) ? 'selected' : '';?> value="Dadra &amp; Nagar Haveli">Dadra &amp; Nagar Haveli</option>
                        <option <?php echo $selected = ('Daman and Diu' == $profile_results->state) ? 'selected' : '';?> value="Daman and Diu">Daman and Diu</option>
                        <option <?php echo $selected = ('Delhi' == $profile_results->state) ? 'selected' : '';?> value="Delhi">Delhi</option>
                        <option <?php echo $selected = ('Goa' == $profile_results->state) ? 'selected' : '';?> value="Goa">Goa</option>
                        <option <?php echo $selected = ('Gujarat' == $profile_results->state) ? 'selected' : '';?> value="Gujarat">Gujarat</option>
                        <option <?php echo $selected = ('Haryana' == $profile_results->state) ? 'selected' : '';?> value="Haryana">Haryana</option>
                        <option <?php echo $selected = ('Himachal Pradesh' == $profile_results->state) ? 'selected' : '';?> value="Himachal Pradesh">Himachal Pradesh</option>
                        <option <?php echo $selected = ('Jammu and Kashmir' == $profile_results->state) ? 'selected' : '';?> value="Jammu and Kashmir">Jammu and Kashmir</option>
                        <option <?php echo $selected = ('Jharkhand' == $profile_results->state) ? 'selected' : '';?> value="Jharkhand">Jharkhand</option>
                        <option <?php echo $selected = ('Karnataka' == $profile_results->state) ? 'selected' : '';?> value="Karnataka">Karnataka</option>
                        <option <?php echo $selected = ('Kerala' == $profile_results->state) ? 'selected' : '';?> value="Kerala">Kerala</option>
                        <option <?php echo $selected = ('Lakshadweep' == $profile_results->state) ? 'selected' : '';?> value="Lakshadweep">Lakshadweep</option>
                        <option <?php echo $selected = ('Madhya Pradesh' == $profile_results->state) ? 'selected' : '';?> value="Madhya Pradesh">Madhya Pradesh</option>
                        <option <?php echo $selected = ('Maharashtra' == $profile_results->state) ? 'selected' : '';?> value="Maharashtra">Maharashtra</option>
                        <option <?php echo $selected = ('Manipur' == $profile_results->state) ? 'selected' : '';?> value="Manipur">Manipur</option>
                        <option <?php echo $selected = ('Meghalaya' == $profile_results->state) ? 'selected' : '';?> value="Meghalaya">Meghalaya</option>
                        <option <?php echo $selected = ('Mizoram' == $profile_results->state) ? 'selected' : '';?> value="Mizoram">Mizoram</option>
                        <option <?php echo $selected = ('Nagaland' == $profile_results->state) ? 'selected' : '';?> value="Nagaland">Nagaland</option>
                        <option <?php echo $selected = ('Orissa' == $profile_results->state) ? 'selected' : '';?> value="Orissa">Orissa</option>
                        <option <?php echo $selected = ('Pondicherry' == $profile_results->state) ? 'selected' : '';?> value="Pondicherry">Pondicherry</option>
                        <option <?php echo $selected = ('Punjab' == $profile_results->state) ? 'selected' : '';?> value="Punjab">Punjab</option>
                        <option <?php echo $selected = ('Rajasthan' == $profile_results->state) ? 'selected' : '';?> value="Rajasthan">Rajasthan</option>
                        <option <?php echo $selected = ('Sikkim' == $profile_results->state) ? 'selected' : '';?> value="Sikkim">Sikkim</option>
                        <option <?php echo $selected = ('Tamil Nadu' == $profile_results->state) ? 'selected' : '';?> value="Tamil Nadu">Tamil Nadu</option>
                        <option <?php echo $selected = ('Tripura' == $profile_results->state) ? 'selected' : '';?> value="Tripura">Tripura</option>
                        <option <?php echo $selected = ('Uttar Pradesh' == $profile_results->state) ? 'selected' : '';?> value="Uttar Pradesh">Uttar Pradesh</option>
                        <option <?php echo $selected = ('Uttaranchal' == $profile_results->state) ? 'selected' : '';?> value="Uttaranchal">Uttaranchal</option>
                        <option <?php echo $selected = ('West Bengal' == $profile_results->state) ? 'selected' : '';?> value="West Bengal">West Bengal</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="city">Location <span class="form-required" title="This field is required.">*</span></label>
                <input type="text" id="location" name="location" required="" value="<?=$profile_results->location?>" size="60" onkeyup="valid(this,'allowSpace')" onblur="valid(this,'allowSpace')" maxlength="60" class="form-text required">
            </div>
            <div class="form-group">
                <label for="city">City/Town <span class="form-required" title="This field is required.">*</span></label>
                <input type="text" id="city" name="city" required="" value="<?=$profile_results->city?>" size="60" onkeyup="valid(this,'allowSpace')" onblur="valid(this,'allowSpace')" maxlength="60" class="form-text required">
            </div>
            <button type="submit" class="btn btn-primary custom-btn">Submit</button>
            <button type="button" data-dismiss="modal" class="btn btn-default custom-btn">Cancel</button>
        </form>

<?php } ?>

<?php
//Profile address update
    if (isset($_REQUEST['PersonalAbout'])) {
        $profile_id = $_REQUEST['PersonalAbout'];
        $profile_results = user::find_admin_by_id($profile_id);
        ?>
        <form class="custom-form" id="about-details-form" role="form">
            <div class="form-group">
                <input type="hidden" name="id" value="<?=$profile_results->id?>">
                <label for="address">About Me <span class="form-required" title="This field is required.">*</span></label>
                <textarea required = "required" maxlength="200" minlength="50" class="form-control bio" name="about" required="" id="about" onkeyup="valid(this,'allowSpace')" onblur="valid(this,'allowSpace')" placeholder="" rows="5"><?=$profile_results->about_us?></textarea>
            </div>
            <button type="submit" class="btn btn-primary custom-btn">Submit</button>
            <button type="button" data-dismiss="modal" class="btn btn-default custom-btn">Cancel</button>
        </form>

<?php } ?>

<?php
    //partner preferance update
    if (isset($_REQUEST['PartnerProfile'])) {
        $profile_id = $_REQUEST['PartnerProfile'];
        $profile_results = user::find_admin_by_id($profile_id);
        $partner_details = user::find_partner_prefrenace($profile_results->user_id);
        ?>
        <form class="custom-form" id="partner-details-form" role="form">
            <div class="age_select">
                <input type="hidden" name="methodTypePartner" value="partner_preferance">
                <input type="hidden" name="user_id" value="<?=$profile_results->user_id?>">
                <label for="hight">Age <span class="form-required" title="This field is required.">*</span></label>
                <div class="age_grid">
                    <div class="col-sm-4 form_box">
                        <div class="select-block1">
                            <?php $ageArray = range(19, 41); ?>
                            <select name="age1" id="age1" required="">
                                <option value="">From </option>
                                <?php
                                foreach ($ageArray as $age) {
                                    $selected = ($age == $partner_details->age1) ? 'selected' : '';
                                    echo '<option '.$selected.' value="'.$age.'">'.$age.'</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-4 form_box2">
                        <div class="select-block1">
                            <?php $ageArray = range(19, 41); ?>
                            <select name="age2" id="age2" required="">
                                <option value="">TO</option>
                                <?php
                                foreach ($ageArray as $age) {
                                    $selected = ($age == $partner_details->age2) ? 'selected' : '';
                                    echo '<option '.$selected.' value="'.$age.'">'.$age.'</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="clearfix"> </div>
                </div>
            </div>
            <div class="form-group">
                <label for="edit-pass">Manglik <span class="form-required" title="This field is required.">*</span></label>
                <div class="select-block1">
                    <select name="manglik" id="manglik" required>
                        <option value="">Select </option>
                        <option <?php echo $selected = ('YES' == $partner_details->manglik) ? 'selected' : '';?> value="YES">Yes</option>
                        <option <?php echo $selected = ('NO' == $partner_details->manglik) ? 'selected' : '';?> value="NO">No</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="edit-pass">Marital Status <span class="form-required" title="This field is required.">*</span></label>
                <div class="select-block1">
                    <?php $statusArray = ['Single','Divorced','Widow','Handicapped']?>
                    <select name="maritalStatus" id="maritalStatus" required>
                        <option value="">Select </option>
                        <?php foreach ($statusArray as $status): $selected = ($status == $partner_details->marital_status) ? 'selected' : ''; ?>
                            <option <?=$selected?> value="<?=$status?>"><?=$status?></option>
                        <?php endforeach;?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="education">Education<span class="form-required" title="This field is required.">*</span></label>
                <input type="text" id="education" value="<?=$partner_details->education?>" name="education" required="required" size="60" maxlength="60" class="form-text required">
                
            </div>
            <div class="form-group">
                <label for="occupation">Occupation <span class="form-required" title="This field is required.">*</span></label>
                <input type="text" id="occupation" value="<?=$partner_details->occupations?>" name="occupation" required="required" size="60" maxlength="60" class="form-text required">
            </div>
            <div class="form-group">
                <label for="occupation"> Other Details <span class="form-required" title="This field is required.">*</span></label>
                <input type="text" id="other_details" value="<?=$partner_details->other_details?>" name="other_details" required="required" size="60" maxlength="60" class="form-text required">
            </div>
            <button type="submit" class="btn btn-primary custom-btn">Submit</button>
            <button type="button" data-dismiss="modal" class="btn btn-default custom-btn">Cancel</button>
        </form>

<?php }
?>

<?php
//Profile contact details update
if (isset($_REQUEST['ContactProfile'])) {
    $profile_id = $_REQUEST['ContactProfile'];
    $profile_results = user::find_admin_by_id($profile_id);
    ?>
    <div class="mobile-error"></div>
    <form class="custom-form" id="contact-details-form" role="form">
        <div class="form-group">
            <input type="hidden" name="id" value="<?=$profile_results->id?>">
            <label for="Mobile">Primary Number <span class="form-required" title="This field is required.">*</span></label>
            <input type="text" id="mobile" autocomplete="none" autofocus="none" placeholder="Primary Number" pattern="[0-9]{10}" name="mobile" required="" onkeyup="valid(this,'numbers')"  value="<?=$profile_results->mobile?>" size="60" maxlength="10" title="Enter your 10 Digit mobile number" class="form-text required">
        </div>
        <div class="form-group">
            <label for="Mobile">Secondary Number <span class="form-required" title="This field is required.">*</span></label>
            <input autocomplete="none"   autofocus="none"  type="text" id="mobile_2" placeholder="Secondary Number" pattern="[0-9]{10}" name="mobile_2" required="" onkeyup="valid(this,'numbers')"  value="<?=$profile_results->mobile_2?>" size="60" maxlength="10" title="Enter your 10 Digit mobile number" class="form-text required">
        </div>
        <div class="form-group">
            <label for="Mobile">Email <span class="form-required" title="This field is required.">*</span></label>
            <input type="email" autocomplete="none" autofocus="none" placeholder="Enter Email Id" id="email"  name="email" required="" value="<?=$profile_results->email?>" size="60" class="form-text required">
        </div>
        <button type="submit" class="btn btn-primary custom-btn">Submit</button>
        <button type="button" data-dismiss="modal" class="btn btn-default custom-btn">Cancel</button>
    </form>

<?php } ?>
