<?php include "asset/header.php"; ?>
<title>Vishwakarma Patrika | Search </title>
<?php include "asset/navbar.php"; ?>
<div class="grid_3">
    <div class="container">
        <div class="breadcrumb1">
            <ul>
                <a href="index.php"><i class="fa fa-home home_1"></i></a>
                <span class="divider">&nbsp;|&nbsp;</span>
                <li class="current-page">Search Result</li>
            </ul>
        </div>
        <div class="profile_search_search">
            <div class="container wrap_2">
                <form action="search.php" method="get">
                    <div class="search_top">
                        <div class="inline-block">
                            <label class="gender_1">Looking:</label>
                            <div class="age_box1">
                                <select name="find" required="">
                                    <option value="">* Select Gender</option>
                                    <option value="bride">Bride</option>
                                    <option value="groom">Groom</option>
                                </select>
                            </div>
                        </div>
                        <div class="inline-block">
                            <label class="gender_1">Status :</label>
                            <div class="age_box1">
                                <select name="status" required="">
                                    <option value="">Select *</option>
                                    <option value="Single">Single</option>
                                    <option value="Divorced">Divorced</option>
                                    <option value="Widow">Widow</option>
                                    <option value="Handicapped">Handicapped</option>
                                </select>
                            </div>
                        </div>
                        <div class="submit inline-block">
                            <input id="submit-btn" class="hvr-wobble-vertical" value="Search" type="submit">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <br/>
        <hr/>

        <?php
        // pagenation code
        if (isset($_GET['find'])) {
            $find = $_GET['find'];
            $status = "";
            $targetpage = "search.php?find=$find&page";
            $totalPrfile = search::contProfile($find, $status);
        }
        if (isset($_GET['status'])) {
            $find = "";
            $status = $_GET['status'];
            $targetpage = "search.php?status=$status&page";
            $totalPrfile = search::contProfile($find,$status);
        }
        if (isset($_GET['find']) AND isset($_GET['status'])) {
            $status = $_GET['status'];
            $find = $_GET['find'];
            $targetpage = "search.php?find=$find&status=$status&page";
            $totalPrfile = search::contProfile($find,$status);
        }

        $total_pages = count($totalPrfile);
        $stages = 3;
        $limit =10;
        $page = '';
        $database = new Database();
        if (isset($_GET['page'])) {
            $page = $database->escape_string($_GET['page']);
        }
        if($page){
            $start_from = ($page - 1) * 10;
        }else{
            $start_from = 0;
        }

        if(isset($_GET['find'])) {
            $find = $_GET['find'];
            $status = "";
            $id = isset($id) ? $id : '';
            $profiles = search::searchProfile($find,$status,$start_from,$limit,$id);
        }

        if (isset($_GET['status'])) {
            $find = "";
            $status = $_GET['status'];
            $id = isset($id) ? $id : '';
            $profiles = search::searchProfile($find,$status,$start_from,$limit,$id);
        }

        if (isset($_GET['status']) AND $_GET['find']) {
            $find = $_GET['find'];
            $status = $_GET['status'];
            $id = isset($id) ? $id : '';
            $profiles = search::searchProfile($find,$status,$start_from,$limit,$id);
        }
        ?>

        <!--php code goes here -->

        <?php
        // pagination code
        if ($page == 0){$page = 1;}
        $prev = $page - 1;
        $next = $page + 1;
        $lastpage = ceil($total_pages/$limit);
        $LastPagem1 = $lastpage - 1;
        $paginate = '';
        if($lastpage > 1)
        {
            $paginate .= "<div class='paginate'>";
            // Previous

            if ($page > 1){
                $paginate.= "<a href='$targetpage=$prev'>Previous</a>";
            }else{
                $paginate.= "<span class='disabled'>Previous</span>";   }
            // Pages
            if ($lastpage < 7 + ($stages * 2))  // Not enough pages to breaking it up
            {
                for ($counter = 1; $counter <= $lastpage; $counter++)
                {
                    if ($counter == $page){
                        $paginate.= "<span class='current'>$counter</span>";
                    }else{
                        $paginate.= "<a href='$targetpage=$counter'>$counter</a>";}
                }
            }
            elseif($lastpage > 5 + ($stages * 2))   // Enough pages to hide a few?
            {
                // Beginning only hide later pages
                if($page < 1 + ($stages * 2))
                {
                    for ($counter = 1; $counter < 4 + ($stages * 2); $counter++)
                    {
                        if ($counter == $page){
                            $paginate.= "<span class='current'>$counter</span>";
                        }else{
                            $paginate.= "<a href='$targetpage=$counter'>$counter</a>";}
                    }
                    $paginate.= "...";
                    $paginate.= "<a href='$targetpage=$LastPagem1'>$LastPagem1</a>";
                    $paginate.= "<a href='$targetpage=$lastpage'>$lastpage</a>";
                }
                // Middle hide some front and some back
                elseif($lastpage - ($stages * 2) > $page && $page > ($stages * 2))
                {
                    $paginate.= "<a href='$targetpage=1'>1</a>";
                    $paginate.= "<a href='$targetpage=2'>2</a>";
                    $paginate.= "...";
                    for ($counter = $page - $stages; $counter <= $page + $stages; $counter++)
                    {
                        if ($counter == $page){
                            $paginate.= "<span class='current'>$counter</span>";
                        }else{
                            $paginate.= "<a href='$targetpage=$counter'>$counter</a>";}
                    }
                    $paginate.= "...";
                    $paginate.= "<a href='$targetpage=$LastPagem1'>$LastPagem1</a>";
                    $paginate.= "<a href='$targetpage=$lastpage'>$lastpage</a>";
                }
                // End only hide early pages
                else
                {
                    $paginate.= "<a href='$targetpage=1'>1</a>";
                    $paginate.= "<a href='$targetpage=2'>2</a>";
                    $paginate.= "...";
                    for ($counter = $lastpage - (2 + ($stages * 2)); $counter <= $lastpage; $counter++)
                    {
                        if ($counter == $page){
                            $paginate.= "<span class='current'>$counter</span>";
                        }else{
                            $paginate.= "<a href='$targetpage=$counter'>$counter</a>";}
                    }
                }
            }
            // Next
            if ($page < $counter - 1){
                $paginate.= "<a href='$targetpage=$next'>Next</a>";
            }else{
                $paginate.= "<span class='disabled'>Next</span>";
            }
            $paginate.= "</div>";
        }
        // pagination code end here.
        ?>
        <!--php code here -->
        <?php
        foreach ($profiles as $profile): ?>
        <div class="col-md-6 profile_left2">
            <div class="profile_top">
                <?php
                if ($session->is_signed_in()) {
                    $profile_decode = base64_encode($profile->id);
                    $view_profile = "href = 'view_profile.php?profile_id=$profile_decode'";
                }
                else  {
                    $view_profile = "";
                }

                ?>
                <h2>Profile id : <span style="color: green;"><?= $profile->user_id; ?></span></h2>
                <div class="col-sm-3 profile_left-top">
                    <a <?=$view_profile?>>
                        <img src="uploads/150/<?= strtolower($profile->fileToUpload); ?>" class="img-responsive" alt=""/>
                    </a>
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
                    <?php if($session->is_signed_in())
                    {
                        $id = $_SESSION['user_id'];
                        $user_details = user::find_admin_by_id($id);
                        $link = '';
                        $profile_decode = base64_encode($profile->id);
                        $view_profile = "href = 'view_profile.php?profile_id=$profile_decode'";
                        $message = 'shortList('.$profile->id.','.$id.')';
                        $mesage_login = '';
                    }
                    else {
                        $mesage_login = "return confirm('For view profile you have to login !');";
                        $link = "href = 'login.php'";
                        $view_profile = "href = 'login.php'";
                        $message = "return confirm('For Short profile you have to login !');";
                    }
                    ?>
                    <div class="buttons">
                        <a <?=$view_profile?> data-toggle="tooltip" title="View Profile" >
                            <div class="vertical" onclick="<?= $mesage_login?>">
                                View  <i class="fa fa-eye grey-heart-shortlist"></i>
                            </div>
                        </a>
                        <a <?=$link?> data-toggle="tooltip" title="Add to Shortlist">
                            <div class="vertical" onclick="<?php echo $message?>">
                                <i class="fa fa-heart grey-heart-shortlist"></i>
                            </div>
                        </a>
                        <?php if (empty($link)):?>
                        <a <?php $link?> data-toggle="tooltip" title="Spam Report">
                            <div class="vertical">
                                <i class="fa fa-info grey-heart-shortlist"></i>
                            </div>
                        </a>
                        <?php endif;?>

                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <?php endforeach;?>
        <!--php code end here -->
    </div>
    <?php echo "<center>".$paginate."</center>";?>
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
<div id="snackbar">Profile added to My Shortlisted List..</div>
<script>
    function shortList(profile,userId){
          $.ajax({
            type: "POST",
            url: "includes/ajex_call.php",
            data: {profile:profile,userId:userId},
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
            location.reload('search.php');
        }, 2000);
    }
</script>
</body>
</html> 