<?php
include "asset/header.php";
if(!$session->is_signed_in()) { redirect("logout.php");} $id = $_SESSION['user_id'];
?>
<title>Vishwakarma Patrika | My Shortlisted List </title>
<?php include "asset/navbar.php"; ?>
<div class="grid_3">
    <div class="container">
        <div class="breadcrumb1">
            <ul>
                <a href="index.php"><i class="fa fa-home home_1"></i></a>
                <span class="divider">&nbsp;|&nbsp;</span>
                <li class="current-page">My Shortlisted</li>
            </ul>
        </div>
        <hr/>
        <?php
            $profiles = user::myShortListed($id);
        ?>
        <!--php code here -->
        <?php
        foreach ($profiles as $profile): ?>
        <div class="col-md-6 profile_left2">
            <div class="profile_top">
                <h2>Profile id : <span style="color: green;"><?= $profile->user_id; ?></span></h2>
                <div class="col-sm-3 profile_left-top">
                    <img src="uploads/150/<?= strtolower($profile->fileToUpload); ?>" class="img-responsive" alt=""/>
                </div>
                <div class="col-sm-9">
                    <table class="table_working_hours">
                        <tbody>
                        <tr class="opened_1">
                            <td class="day_label1">Name :</td>
                            <td class="day_value"> <?= $profile->name ?></td>
                        </tr>
                        <tr class="opened_1">
                            <td class="day_label1">DOB :</td>
                            <td class="day_value"> <?= $profile->dob; ?></td>
                        </tr>
                        <tr class="opened_1">
                            <td class="day_label1">Height :</td>
                            <td class="day_value"><?= $profile->height_f ?> <?= $profile->height_i ?> </td>
                        </tr>
                        <tr class="opened">
                            <td class="day_label1">Status :</td>
                            <td class="day_value"> <?= $profile->marital_status; ?></td>
                        </tr>
                        <tr class="opened">
                            <td class="day_label1">State :</td>
                            <td class="day_value"><?= $profile->state;?></td>
                        </tr>
                        <tr class="opened">
                            <td class="day_label1">Location :</td>
                            <td class="day_value"><?= $profile->city;?></td>
                        </tr>
                        <tr class="closed">
                            <td class="day_label1">Education :</td>
                            <td class="day_value closed"><span><?= $profile->education; ?></span></td>
                        </tr>
                        <tr class="closed">
                            <td class="day_label1">Occupation:</td>
                            <td class="day_value closed"><span><?= $profile->occupation; ?></span></td>
                        </tr>
                        </tbody>
                    </table>
                    <!--php login fro shortlist* and make report* and view profile* section -->
                    <?php $message = 'removeShortList('.$profile->short_id.')'; ?>
                    <div class="buttons">
                        <?php
                        $profile_decode = base64_encode($profile->id);
                        $view_profile = "href = 'view_profile.php?profile_id=$profile_decode'";
                        ?>
                        <a <?=$view_profile;?> data-toggle="tooltip" title="View Profile" >
                            <div class="vertical">
                                View  <i class="fa fa-eye grey-heart-shortlist"></i>
                            </div>
                        </a>
                        <a data-toggle="tooltip" title="Remove Shortlist">
                            <div class="vertical" onclick="<?php echo $message?>">
                                <i class="fa fa-heart pink-heart-shortlist"></i>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <?php endforeach;?>
        <!--php code end here -->
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
<div id="snackbar">Profile Removed from My Shortlisted List..</div>
<script>
    function removeShortList(shordId){
          $.ajax({
            type: "POST",
            url: "includes/ajex_call.php",
            data: {shordId:shordId},
            cache: false,
            success:  function(data){
                if (data) {
                    myFunction();
                }
            }
        });
    }
</script>
<script>
    function myFunction() {
        var x = document.getElementById("snackbar");
        x.className = "show";
        setTimeout(function()
        {
            x.className = x.className.replace("show", "");
            location.reload('shortlisted.php');
        }, 2000);
    }
</script>
</body>
</html> 