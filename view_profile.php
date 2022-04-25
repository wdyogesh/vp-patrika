<?php
include "asset/header.php";
if(!$session->is_signed_in()) { redirect("logout.php");} $id = $_SESSION['user_id'];
    $myprofile = user::find_admin_by_id($id);
    if (isset($_GET['profile_id']))
    {
       $profile_id = $_GET['profile_id'];
       $my_profile_details = user::find_profile_by_id($profile_id);
    }
?>
<title>Vishwakarma Patrika | My Profile </title>
<?php include "asset/navbar.php"; ?>
<div class="grid_3">
    <div class="container">
        <p>
            <?="<a href=\"javascript:history.go(-1)\"><span class=\"fa fa-arrow-left\" aria-hidden=\"true\"></span> Go Back</a>"; ?>
        </p>
        <div>

        </div>
        <hr/>
        <!--php code here -->
        <div style="text-align: center;" class="col-lg-3 col-md-5 intro-first">
            <div class="profile-brief-header card-title">
                <p>
                <h4 style="font-weight: bold"><?= ucwords($my_profile_details->name); ?></h4>
                    <span>Profile Id: <?= $my_profile_details->user_id; ?></span><br>
                    <span><?= (date('Y') - date('Y',strtotime($my_profile_details->dob))) ?>
                        years / <?= $my_profile_details->height_f; ?>  <?= $my_profile_details->height_i; ?></span>
                </p>
            </div>
            <div class="col_3">
                <div class="col-sm-4 row_2">
                    <div class="flexslider">
                        <ul class="slides">
                            <li data-thumb="uploads/350/<?= strtolower($my_profile_details->fileToUpload); ?>">
                                <a id="profileId" data-id="<?= $my_profile_details->id?>" href="" data-toggle="modal" data-target="#myModal">
                                    <img style="width: 250px;" src="uploads/350/<?= strtolower($my_profile_details->fileToUpload); ?>" />
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-8 row_1"></div>
                <div class="clearfix"> </div>
            </div>
        </div>

        <div class="col-lg-5 col-md-7 intro-first intro-sec">
            <h3>Personal Details </h3>
            <table class="table_working_hours">
                <tbody>
                <tr class="opened_1">
                    <td class="day_label">Gotra : </td>
                    <td class="day_value"><?= $my_profile_details->gotra; ?></td>
                </tr>
                <tr class="opened_1">
                    <td class="day_label">Date Of Birth : </td>
                    <td class="day_value"><?= $my_profile_details->dob; ?></td>
                </tr>
                <tr class="opened_1">
                    <td class="day_label">Time Of Birth : </td>
                    <td class="day_value"><?= $my_profile_details->birthTime; ?></td>
                </tr>
                <tr class="opened">
                    <td class="day_label">Religion :</td>
                    <td class="day_value"> Hindu </td>
                </tr>
                <tr class="opened">
                    <td class="day_label">Manglik :</td>
                    <td class="day_value"> <?= $my_profile_details->manglik?> </td>
                </tr>
                <tr class="opened">
                    <td class="day_label">Marital Status: </td>
                    <td class="day_value"> <?=$my_profile_details->marital_status; ?></td>
                </tr>
                <tr class="closed">
                    <td class="day_label">Profile Created by :</td>
                    <td class="day_value closed"><span> <?=$my_profile_details->profileBy; ?> </span></td>
                </tr>
                <tr class="closed">
                    <td class="day_label">Hobbies : </td>
                    <td class="day_value closed"><span> <?=$my_profile_details->hobbies; ?> </span></td>
                </tr>
                </tbody>
            </table>
            <h3>Education & Career</h3>
            <table class="table_working_hours">
                <tbody>
                <tr class="opened_1">
                    <td class="day_label">Education: </td>
                    <td class="day_value"><?=$my_profile_details->education; ?></td>
                </tr>
                <tr class="opened_1">
                    <td class="day_label">Education Details: </td>
                    <td class="day_value"><?=$my_profile_details->education_details; ?></td>
                </tr>
                <tr class="opened">
                    <td class="day_label">Occupation :</td>
                    <td class="day_value"><span><?=$my_profile_details->occupation; ?></span></td>
                </tr>
                <tr class="opened">
                    <td class="day_label">Occupation Details:</td>
                    <td class="day_value"><span><?=$my_profile_details->occupation_details; ?></span></td>
                </tr>
                </tbody>
            </table>
            <h3>Family Details</h3>
            <table class="table_working_hours">
                <tbody>
                <tr class="opened_1">
                    <td class="day_label">Father Name : </td>
                    <td class="day_value"><?=ucfirst($my_profile_details->fatherName); ?></td>
                </tr>
                <tr class="opened_1">
                    <td class="day_label">Father Occupation : </td>
                    <td class="day_value"><?= $my_profile_details->father_Occupation; ?></td>
                </tr>
                <tr class="opened_1">
                    <td class="day_label">Mother Name : </td>
                    <td class="day_value"><?= $my_profile_details->MotherName; ?></td>
                </tr>
                <tr class="opened_1">
                    <td class="day_label">Mother Occupation : </td>
                    <td class="day_value"><?= $my_profile_details->mother_Occupation; ?></td>
                </tr>
                <tr class="opened_1">
                    <td class="day_label">No. of Brother Married : </td>
                    <td class="day_value"><?=$my_profile_details->b_married; ?></td>
                </tr>
                <tr class="opened">
                    <td class="day_label">No. of Brother Unmarried :</td>
                    <td class="day_value"> <?=$my_profile_details->b_unmarried; ?> </td>
                </tr>
                <tr class="opened">
                    <td class="day_label">No. of Sister Married: </td>
                    <td class="day_value"><?=$my_profile_details->s_married; ?></td>
                </tr>
                <tr class="opened">
                    <td class="day_label">No. of Sister Unmarried :</td>
                    <td class="day_value"><?=$my_profile_details->s_unmarried; ?></td>
                </tr>
                </tbody>
            </table>
            <h3>Address Details</h3>
             <table class="table_working_hours">
                <tbody>
                <tr class="opened">
                    <td class="day_label"> Address :</td>
                    <td class="day_value"><?=$my_profile_details->address; ?> </td>
                </tr>
                <tr class="opened">
                    <td class="day_label">State :</td>
                    <td class="day_value"> <?=$my_profile_details->state; ?> </td>
                </tr>
                <tr class="opened">
                    <td class="day_label">City  :</td>
                    <td class="day_value closed"><span><?=$my_profile_details->city; ?></span></td>
                </tr>

                <tr class="opened">
                    <td class="day_label">Location :</td>
                    <td class="day_value"> <?=$my_profile_details->location; ?> </td>
                </tr>
                </tbody>
            </table>
            <h3>About Me</h3>
            <p style="font-size: 0.85em;">
                <?= $my_profile_details->about_us; ?>
                <br>
            </p>
            <h3>Partner Preference Details</h3>
            <table class="table_working_hours">
                <?php $partner_details = user::find_partner_prefrenace($my_profile_details->user_id); ?>
                <tbody>
                <tr class="opened">
                    <td class="day_label">Age :</td>
                    <td class="day_value"><?=$partner_details->age_f;?> To <?=$partner_details->age_t;?> </td>
                </tr>
                <tr class="opened">
                    <td class="day_label">Marital Status :</td>
                    <td class="day_value"><?=$partner_details->marital_status;?></td>
                </tr>
                <tr class="opened">
                    <td class="day_label">Kujadosham / Manglik :</td>
                    <td class="day_value closed"><span><?=$partner_details->manglik; ?></span></td>
                </tr>
                <tr class="opened">
                    <td class="day_label">Education :</td>
                    <td class="day_value closed"><span><?=$partner_details->education; ?></span></td>
                </tr>
                <tr class="opened">
                    <td class="day_label">Occupation :</td>
                    <td class="day_value closed"><span><?=$partner_details->occupations;?></span></td>
                </tr>
                <tr class="opened">
                    <td class="day_label">Some Other Words :</td>
                    <td class="day_value closed"><span> <?=$partner_details->other_details ;?>  </span></td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="col-lg-3 col-md-5 col_4 intro-first intro-sec intro-contact">
            <h4>Contact</h4>
                <table class="table_working_hours">
                    <tbody>
                    <?php if (!empty($myprofile->payment)){?>
                    <tr class="opened">
                        <td class="day_label">Primary Mobile :</td>
                        <td class="day_value"><?=$my_profile_details->mobile; ?></td>
                    </tr>
                    <tr class="opened">
                        <td class="day_label">Secondary Mobile :</td>
                        <td class="day_value closed"><span><?=$my_profile_details->mobile_2; ?></span></td>
                    </tr>
                    <tr class="opened">
                        <td class="day_label">Email Id:</td>
                        <td class="day_value"><?=$my_profile_details->email;?></td>
                    </tr>
                    <?php } else { ?>
                        <p style="font-size: 14px">Pay only <b style="color: #c32143;">750/-</b> See Contact Number</p>
                        <tr class="opened">
                            <td class="day_label">PayTm:</td>
                            <td class="day_value">+91-9685944503</td>
                        </tr>
                        <tr class="opened">
                            <td class="day_label">Google Pay:</td>
                            <td class="day_value closed"><span>+91-9685944503</span></td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
                <?php $message = 'shortList('.$my_profile_details->id.','.$id.')'; ?>
                <button style="margin-bottom: 7px;" type="button" class="btn btn-sm btn-default">
                    <a onclick="<?php echo $message?>" style="color: #0f0e14; font-size: 12px;" >
                        <i class="fa fa-heart grey-heart-shortlist-show-data"></i> Shortlist
                    </a>
                </button>
        </div>
    </div>
    <div class="clearfix"></div>
</div>
</div>
<div class="footer">
    <div class="container">
        <?php
        include 'asset/footer.php';
        ?>
    </div>
</div>

<!--view photo model -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">View Photo</h4>
            </div>
            <div class="modal-body">
                <div id="modal-loader" style="display: none; text-align: center;">
                    <img src="assets/images/ajax-loader.gif">
                </div>
                <div id="dynamic-content-photo"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!--end of the view photo model-->
<div id="snackbar">Profile added to My Shortlisted List..</div>

<script src="assets/js/common.js"></script>
</body>
</html> 