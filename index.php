<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');

?>
<?php include 'asset/header.php'; ?>
<title>Vishwakarma Patrika | Home </title>
<?php
include 'asset/navbar.php';?>
<!-- ============================  Navigation End ============================ -->
<div class="banner">
  <div class="container">
    <div class="banner_info">
      <h3> Welcome to Vishwakarma Patrika</h3>
      <h2>Vishwakarma Matrimony Platform </h2>
      <?php if(!$session->is_signed_in()) { ?>
      <a href="register.php" class="hvr-shutter-out-horizontal">Create your Profile</a> 
      <a href="login.php" class="hvr-shutter-out-horizontal">Login </a>
      <?php } else { ?>
          <a href="search.php?find=bride" class="hvr-shutter-out-horizontal">Find Bride</a>
          <a href="search.php?find=groom" class="hvr-shutter-out-horizontal">Find Groom</a>
      <?php } ?>
    </div>
  </div>
  <div class="profile_search">
  	<div class="container wrap_1">
	  <form action="search.php" method="get">
	  	<div class="search_top">
		 <div class="inline-block">
		  <label class="gender_1">Looking:</label>
			<div class="age_box1" style="max-width: 100%; display: inline-block;">
				<select name="find" required>
					<option value="">*Select</option>
					<option value="bride">Bride</option>
					<option value="groom">Groom</option>
				</select>
		   </div>
	    </div>
       <div class="inline-block">
          <label class="gender_1">Status:</label>
            <div class="age_box1" style="max-width: 100%; display: inline-block;">
                <select name="status" required>
                    <option value="">*Select</option>
                    <option value="Single">Single</option>
                    <option value="Divorced">Divorced</option>
                    <option value="Widow">Widow</option>
                    <option value="Handicapped">Handicapped</option>
                </select>
          </div>
        </div>
        <div class="submit inline-block">
           <input id="submit-btn" class="hvr-wobble-vertical" type="submit" value="Search">
        </div>
        </div>
      </form>
    </div>
  </div>
</div> 

 <div class="grid_1">
    <div class="container">
        <h1>Featured Profiles</h1>
        <div class="heart-divider">
            <span class="grey-line"></span>
            <i class="fa fa-heart pink-heart"></i>
            <i class="fa fa-heart grey-heart"></i>
            <span class="grey-line"></span>
        </div>
        <ul id="flexiselDemo3">
            <?php $featured_profiles = search::featureProfile(); foreach ($featured_profiles as $featured_profile): ?>
            <li>
                <?php
                if($session->is_signed_in()) {
                    echo $featured_profile->id;
                    $profile_decode = base64_encode($featured_profile->id);
                    $message  = "href='view_profile.php?profile_id=$profile_decode'";
                }
                else {
                    $message = "href='login.php'";
                }
                ?>
                <div class="col_1">
                    <a <?=$message?>>
                        <img src="uploads/150/<?= strtolower($featured_profile->fileToUpload); ?>" alt="<?=$featured_profile->user_id?>" class="img-responsive featured-img"/>
                        <h3><span class="m_3">Profile ID : <?= $featured_profile->user_id?></span>
                            <br><?= $featured_profile->dob?> , <?= $featured_profile->height_f?> <?= $featured_profile->height_i ?>
                            <?= $featured_profile->name?> <br> <?= $featured_profile->state?><br>
                            <strong>( <?= $featured_profile->education?> )</strong>
                        </h3>
                    </a>
                </div>
            </li>
            <?php endforeach; ?>
        </ul>
        <script type="text/javascript">
            $(window).load(function() {
                $("#flexiselDemo3").flexisel({
                    visibleItems: 6,
                    animationSpeed: 1000,
                    autoPlay:false,
                    autoPlaySpeed: 3000,
                    pauseOnHover: true,
                    enableResponsiveBreakpoints: true,
                    responsiveBreakpoints: {
                        portrait: {
                            changePoint:480,
                            visibleItems: 1
                        },
                        landscape: {
                            changePoint:640,
                            visibleItems: 2
                        },
                        tablet: {
                            changePoint:768,
                            visibleItems: 3
                        }
                    }
                });

            });
        </script>
        <script type="text/javascript" src="assets/js/jquery.flexisel.js"></script>
    </div>
</div>
        <div class="footer">
			<div class="container">
				 <?php
				 include 'asset/footer.php';
				 ?>
			</div>
		</div>
</body>
</html>	