<?php
include "asset/header.php";
if(!$session->is_signed_in()) { redirect("logout.php");} $id = $_SESSION['user_id'];
    $my_profile_details = user::find_admin_by_id($id);
?>
<style>
    .bottom-left {
        position: absolute;
        /*bottom: 373px;*/
        left: 18px;
    }

    .bottom-left-img {
        position: absolute;
        bottom: 108px;
        left: 18px;
    }
    .bottom-left-img-delete {
        position: absolute;
        bottom: 7px;
        left: 94px;
    }
</style>
<title>Vishwakarma Patrika | My Profile </title>
<?php include "asset/navbar.php"; ?>
<div class="grid_3">
    <div class="container">
        <div class="breadcrumb1">
            <ul>
                <a href="index.php"><i class="fa fa-home home_1"></i></a>
                <span class="divider">&nbsp;|&nbsp;</span>
                <li class="current-page">My Profile</li>
            </ul>
        </div>
        <hr/>
        <!--php code here -->
        <div style="text-align: center;" class="col-lg-3 col-md-5 intro-first">
            <div class="profile-brief-header card-title">
                <p>
                <h4 style="font-weight: bold"><?= ucwords($my_profile_details->name); ?></h4>
                    <span>Profile Id: <?= $my_profile_details->user_id; ?></span><br>
                    <span><?= (date('Y') - date('Y',strtotime($my_profile_details->dob))) ?>
                        years / <?= $my_profile_details->height_f; ?>  <?= $my_profile_details->height_i; ?>
                    </span>
                </p>
            </div>
            <div class="col_3">
                <div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="flexslider">
                                <ul class="slides">
                                    <li data-thumb="uploads/350/<?= strtolower($my_profile_details->fileToUpload); ?>">
                                        <span class="btn btn-xs btn-primary bottom-left" id="image"><i class="fa fa-rotate-right">
                                                <span style="display: none;"><?= strtolower($my_profile_details->fileToUpload); ?></span>Rotate Image</i>
                                        </span>
                                        <img id="img" width="255px" src="uploads/350/<?= strtolower($my_profile_details->fileToUpload); ?>" />
                                    </li>
                                </ul>
                            </div>
                            <br />
                            <!--<button data-toggle="modal" data-target="#ImageModal" data-id="<?/*= $my_profile_details->id*/?>" type="button" class="btn btn-secondary">Upload Photo</button>-->
                        </div>
                        <?php /*$uploaed_images = user::uploadedImages($my_profile_details->user_id);
                        $r = 0;
                        foreach ($uploaed_images as $uploaed_image): */?><!--
                        <div style="margin-top: 5px;" class="col-md-6">
                             <span class="btn btn-xs btn-primary bottom-left-img" id="image<?/*=$r++;*/?>"><i class="fa fa-rotate-right">
                                <span style="display: none;"><?/*= $uploaed_image->img_name*/?></span>Rotate Image</i>
                             </span>
                            <span onclick="return confirm('Are you sure you want to delete?');" data-key="<?/*= $uploaed_image->img_name*/?>" class="btn btn-xs btn-danger bottom-left-img-delete" id="delete">
                                <i class="fa fa-trash-o"></i>
                             </span>
                            <img id="img<?/*=$r++*/?>" class="img-thumbnail" style="width: 100px; height: 134px;" src="uploads/150/<?/*= $uploaed_image->img_name*/?>" alt="">
                        </div>
                        --><?php /*endforeach;*/?>

                    </div>
                </div>
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
                <tr>
                    <td style="padding-bottom: 7px" align="left">
                        <a data-toggle="modal" data-target="#PersonalModal" data-id="<?= $my_profile_details->id?>" id="profileIdPersonal" type="button" class="btn btn-sm btn-info custom-btn" style="color: #fff;" href="">
                            Update Personal Details
                        </a>
                    </td>
                    <td> &nbsp;</td>
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
                <tr>
                    <td style="padding-bottom: 7px" align="left">
                        <a data-toggle="modal" data-target="#EducationModal" data-id="<?= $my_profile_details->id?>" id="profileIdEducation" type="button" class="btn btn-sm btn-info custom-btn" style="color: #fff;" href="">
                            Update Education Details
                        </a>
                    </td>
                    <td> &nbsp;</td>
                </tr>
                </tbody>
            </table>
            <h3>Family Details</h3>
            <table class="table_working_hours">
                <tbody>
                <tr class="opened_1">
                    <td class="day_label">Father Name : </td>
                    <td class="day_value"><?=$my_profile_details->fatherName; ?></td>
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
                <tr>
                    <td style="padding-bottom: 7px" align="left">
                        <button data-toggle="modal" data-target="#FamilyModal" data-id="<?= $my_profile_details->id?>" id="familyIdEducation" type="button" class="btn btn-sm btn-info custom-btn">
                            <a style="color: #fff;">Update Family Details </a>
                        </button>
                    </td>
                    <td> &nbsp;</td>
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
                <tr>
                    <td style="padding-bottom: 7px" align="left">
                        <button data-toggle="modal" data-target="#AddressModal" data-id="<?= $my_profile_details->id?>" id="profileIdAddress" type="button" class="btn btn-sm btn-info custom-btn">
                            <a style="color: #fff;">Update Address Details </a>
                        </button>
                    </td>
                    <td> </td>
                </tr>
                </tbody>
            </table>
            <h3>About Me</h3>
            <p style="font-size: 0.85em;">
                <?= $my_profile_details->about_us; ?>
                <br>
                <button data-toggle="modal" data-target="#AboutModal" data-id="<?= $my_profile_details->id?>" id="profileIdAbout" type="button" class="btn btn-sm btn-info custom-btn">
                    <a style="color: #fff;">Update About Details </a>
                </button>
            </p>

            <h3>Partner Preference Details</h3>
            <table class="table_working_hours">
                <?php $partner_details = user::find_partner_prefrenace($my_profile_details->user_id); ?>
                <tbody>
                <tr class="opened">
                    <td class="day_label">Age :</td>
                    <td class="day_value"><?=$partner_details->age1;?> To <?=$partner_details->age2;?> </td>
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
                <tr>
                    <td style="padding-bottom: 7px" align="left">
                        <button data-toggle="modal" data-target="#PartnerModal" data-id="<?= $my_profile_details->id?>" id="profileIdPartner" type="button" class="btn btn-sm btn-info custom-btn">
                            <a style="color: #fff;">Update Partner Preference Details </a>
                        </button>
                    </td>
                    <td> &nbsp;</td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="col-lg-3 col-md-5 col_4 intro-first intro-sec intro-contact">
            <h4>Contact</h4>
                <table class="table_working_hours">
                    <tbody>
                    <tr class="opened">
                        <td class="day_label">Mobile 1 :</td>
                        <td class="day_value"><?=$my_profile_details->mobile; ?></td>
                    </tr>
                    <tr class="opened">
                        <td class="day_label">Mobile 2 :</td>
                        <td class="day_value closed"><span><?=$my_profile_details->mobile_2; ?></span></td>
                    </tr>
                    <tr class="opened">
                        <td class="day_label">Email Id:</td>
                        <td class="day_value"><?=$my_profile_details->email;?></td>
                    </tr>
                    <tr>
                        <td style="padding-bottom: 7px" align="left">
                            <button data-toggle="modal" data-target="#ContactModal" data-id="<?= $my_profile_details->id?>" id="profileIdContact" type="button" class="btn btn-sm btn-info custom-btn">
                                <a style="color: #fff;">Update Contact</a>
                            </button>
                        </td>
                        <td> &nbsp;</td>
                    </tr>
                    </tbody>
                </table>

            <h5>Profile Setting</h5>
            <table class="table_working_hours">
                <tr>
                    <td style="padding-bottom: 7px" align="left">
                        <button data-toggle="modal" data-target="#PasswordModal" data-id="<?= $my_profile_details->id?>" id="profileIdPassword" type="button" class="btn btn-sm btn-info custom-btn">
                            <a style="color: #fff;">Update Password</a>
                        </button>
                    </td>
                    <td style="padding-bottom: 7px" align="right">
                        <button data-toggle="modal" data-target="#DeleteModal" data-id="<?= $my_profile_details->id?>" id="profileIdPassword" type="button" class="btn btn-sm btn-danger custom-btn">
                            <a style="color: #fff;">Delete My Account</a>
                        </button>
                    </td>
                </tr>
            </table>
        </div>
    </div>
    <div class="clearfix"></div>
</div>
</div>
<!--image delete confirmation-->
<!--Uppdate password Details-->
<?php include "asset/model.php";?>

<div class="footer">
    <div class="container">
        <?php
        include 'asset/footer.php';
        // update update_personal
        if (isset($_POST['update_personal'])) {
                echo $name = $_POST['name'];
            }
        ?>
    </div>
    <div id="snackbar">Profile Updated successfully..</div>
    <script src="assets/js/common.js"></script>
    <script>
        $(document).ready(function() {
            $(document).on('click', '#DeleteModal', function(e){
                $('#user_id').val('<?=$my_profile_details->id; ?>');
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $(document).on('click', '#PasswordModal', function(e){
                $('#user').val('<?=$my_profile_details->id; ?>')
            });
        });

        $(document).ready(function() {
            $(document).on('click', '#ImageModal', function(e){
                $('#upload_user_file').val('<?=$my_profile_details->user_id; ?>')
            });
        });
    </script>
    <script>
        $('#btn-submit').prop("disabled", true);
            var a = 0;
            $("#upload_user_image").change(function () {
                if ($('#btn-submit').attr('disabled', false)) {
                    $('#btn-submit').attr('disabled', true);
                }
                var ext = $('#upload_user_image').val().split('.').pop().toLowerCase();
                if ($.inArray(ext, ['gif', 'png', 'jpg', 'jpeg']) === -1) {
                    $('#error1').slideDown("slow");
                    $('#error2').slideUp("slow");
                    a = 0;
                } else {
                    var picsize = (this.files[0].size);
                    if (picsize > 1500000) {
                        $('#error2').slideDown("slow");
                        a = 0;
                    } else {
                        a = 1;
                        $('#error2').slideUp("slow");
                    }
                    $('#error1').slideUp("slow");
                    if (a == 1) {
                        $('#btn-submit').attr('disabled', false);
                    }
                }
            });
    </script>
    <script>
        //delete model
        $(function(){
            $('#DeleteModal').on('submit', function(e){
                $('#user_id').val('<?=$my_profile_details->id; ?>')
                e.preventDefault();
                $.ajax({
                    url: 'includes/update_ajex_call.php', //this is the submit URL
                    type: 'POST', //or POST
                    data: $('#delete-details-form').serialize(),
                    success: function(data){
                        console.log(data);
                        if(data == "Updated") {
                            alert("Your Account Deleted Not Deleted !")
                        }
                        else {
                            alert("Your Account Deleted Successfully !")
                            setTimeout(function() {
                                window.location.href = "logout.php"
                            }, 1000);
                        }
                        $("#DeleteModal").modal('hide');
                        myFunction();
                        //location.reload('my_profile.php');
                    }
                });
            });
        });
        // update password
        $(function(){
            $('#PasswordModal').on('submit', function(e){
                e.preventDefault();
                $.ajax({
                    url: 'includes/update_ajex_call.php', //this is the submit URL
                    type: 'POST', //or POST
                    data: $('#password-details-form').serialize(),
                    success: function(data){
                        console.log(data);
                        if(data == "Not Updated") {
                            $('.alertMessage').text("Old Password Not Matched");
                            $('.alertMessage').addClass("custom-alert alert-danger");
                        }
                        else {
                            $('.alertMessage').addClass("custom-alert alert-success");
                            $('.alertMessage').text("Password Updated, Please login With New password");
                            $('#password-details-form').trigger("reset");
                            setTimeout(function() {
                                window.location.href = "logout.php"
                            }, 5000);
                        }
                        $("#PasswordModal").modal('show');
                    }
                });
            });
        });

        // upload images
        $(function(){
            $('#images_upload_form').on('submit', function(e){
                var postData = new FormData($("#images_upload_form")[0]);
                $('#upload_user_file').val('<?=$my_profile_details->user_id; ?>')
                e.preventDefault();
                $.ajax({
                    type:'POST',
                    url: 'includes/update_ajex_call.php', //this is the submit URL
                    processData: false,
                    contentType: false,
                    data: postData,
                    success: function(data){
                        console.log(data);
                        $("#ImageModal").modal('hide');
                        myFunction();
                        setTimeout(function() {
                            window.location.href = "my_profile.php"
                        }, 3000);
                    }
                });
            });
        });
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
            var badColor = "#d9534f";
            //Compare the values in the password field
            //and the confirmation field
            if (pass1.value == pass2.value) {
                pass2.style.backgroundColor = goodColor;
                message.style.color = goodColor;
                message.innerHTML = "Passwords Match!"
            } else {
                pass2.style.backgroundColor = badColor;
                message.style.color = badColor;
                message.innerHTML = "Passwords Do Not Match!"
            }
        }
    </script>

    <script>
        //Delete account
        $(function(){
            $('#account-delete-form').on('submit', function(e){
                $("#DeleteModal").modal('show');
                e.preventDefault();
                $.ajax({
                    url: 'includes/update_ajex_call.php', //this is the submit URL
                    type: 'POST', //or POST
                    data: $('#partner-details-form').serialize(),
                    success: function(data){
                        $("#PartnerModal").modal('hide');
                        myFunction();
                        setTimeout(function() {
                            window.location.href = "my_profile.php"
                        }, 3000);
                    }
                });
            });
        });
    </script>

    <script>
        $(document).ready(function(){
            var value = 0
                $(document).on('click', '#image', function() {
                    var value = 90;
                    $("#img").css('transform','rotate(90deg)');
                    var image_name = $("#image").text();
                    var profile_id = "<?= $my_profile_details->user_id; ?>";
                    $.ajax({
                        url: "includes/saveimage.php",
                        dataType: "html",
                        type: 'POST',
                        data: {profile_id: profile_id, image_name:image_name}, //variable with data
                        success: function(data){
                            myFunction();
                            setTimeout(function() {
                                window.location.href = "my_profile.php"
                            }, 3000);
                        }
                    });
                });
        });
    </script>

    <script>
        $(document).ready(function(){
            var value = 0
                $(document).on('click', '#image0', function() {
                    var value = 90;
                    $("#img0").rotate({animateTo:value})

                    var image_name = $("#image0").text();
                    var profile_id = "<?= $my_profile_details->user_id; ?>";
                    $.ajax({
                        url: "includes/saveimage.php",
                        dataType: "html",
                        type: 'POST',
                        data: {profile_id: profile_id, image_name:image_name}, //variable with data
                        success: function(data){
                            myFunction();
                            setTimeout(function() {
                                window.location.href = "my_profile.php"
                            }, 3000);
                        }
                    });
                });
        });
    </script>

    <script>
            $(document).on('click', '#delete', function() {
                var delete_images = $(this).data("key");
                var profile_id = "<?= $my_profile_details->user_id; ?>";
                $.ajax({
                    url: "includes/saveimage.php",
                    dataType: "html",
                    type: 'POST',
                    data: {profile_id: profile_id, delete_images:delete_images}, //variable with data
                    success: function(data){
                        myFunction();
                        setTimeout(function() {
                            window.location.href = "my_profile.php"
                        }, 3000);
                    }
                });
            });
    </script>

    <script>
        $(document).ready(function(){
            var value = 0
                $(document).on('click', '#image2', function() {
                    var value = 90;
                    $("#img2").rotate({animateTo:value})
                    var image_name = $("#image2").text();
                    var profile_id = "<?= $my_profile_details->user_id; ?>";
                    $.ajax({
                        url: "includes/saveimage.php",
                        dataType: "html",
                        type: 'POST',
                        data: {profile_id: profile_id, image_name:image_name}, //variable with data
                        success: function(data){
                            myFunction();
                            setTimeout(function() {
                                window.location.href = "my_profile.php"
                            }, 3000);
                        }
                    });
                });
        });
    </script>
    <script>
        $(document).ready(function(){
            var value = 0
                $(document).on('click', '#image4', function() {
                    var value = 90;
                    $("#img4").rotate({animateTo:value})
                    var image_name = $("#image4").text();
                    var profile_id = "<?= $my_profile_details->user_id; ?>";
                    $.ajax({
                        url: "includes/saveimage.php",
                        dataType: "html",
                        type: 'POST',
                        data: {profile_id: profile_id, image_name:image_name}, //variable with data
                        success: function(data){
                            myFunction();
                            setTimeout(function() {
                                window.location.href = "my_profile.php"
                            }, 3000);
                        }
                    });
                });
        });
    </script>
    <script>
        $(document).ready(function(){
            var value = 0
                $(document).on('click', '#image6', function() {
                    var value = 90;
                    $("#img6").rotate({animateTo:value})
                    var image_name = $("#image6").text();
                    var profile_id = "<?= $my_profile_details->user_id; ?>";
                    $.ajax({
                        url: "includes/saveimage.php",
                        dataType: "html",
                        type: 'POST',
                        data: {profile_id: profile_id, image_name:image_name}, //variable with data
                        success: function(data){
                            myFunction();
                            setTimeout(function() {
                                window.location.href = "my_profile.php"
                            }, 3000);
                        }
                    });
                });
        });
    </script>
    <script>
        $(document).ready(function(){
            var value = 0
                $(document).on('click', '#image8', function() {
                    var value = 90;
                    $("#img8").rotate({animateTo:value})
                    var image_name = $("#image8").text();
                    var profile_id = "<?= $my_profile_details->user_id; ?>";
                    $.ajax({
                        url: "includes/saveimage.php",
                        dataType: "html",
                        type: 'POST',
                        data: {profile_id: profile_id, image_name:image_name}, //variable with data
                        success: function(data){
                            myFunction();
                            setTimeout(function() {
                                window.location.href = "my_profile.php"
                            }, 3000);
                        }
                    });
                });
        });
    </script>
    <script>
        $(document).ready(function(){
            var value = 0
                $(document).on('click', '#image10', function() {
                    var value = 90;
                    $("#img10").rotate({animateTo:value})
                    var image_name = $("#image10").text();
                    var profile_id = "<?= $my_profile_details->user_id; ?>";
                    $.ajax({
                        url: "includes/saveimage.php",
                        dataType: "html",
                        type: 'POST',
                        data: {profile_id: profile_id, image_name:image_name}, //variable with data
                        success: function(data){
                            myFunction();
                            setTimeout(function() {
                                window.location.href = "my_profile.php"
                            }, 3000);
                        }
                    });
                });
        });
    </script>

</div>
</body>
</html> 