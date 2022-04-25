<?php
function PageName() {
    return substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);
}
 $current_page = PageName();
?>

<?php

if($session->is_signed_in()){ $id = $_SESSION['user_id']; $user_details = user::find_admin_by_id($id); ?>
    <div class="navbar navbar-inverse-blue navbar">
        <!--<div class="navbar navbar-inverse-blue navbar-fixed-top">-->
        <div class="navbar-inner">
            <div class="container">
                <a class="brand" href="index.php"><img src="assets/images/logo.png" alt="logo"></a>
                <div class="pull-right">
                    <nav class="navbar nav_bottom" role="navigation">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header nav_2">
                            <button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">Menu
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand" href="#"></a>
                        </div>
                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
                            <ul class="nav navbar-nav nav_1">
                                <li class="<?php echo $current_page == 'index.php' ? 'current':NULL ?>"><a href="index.php">Home</a></li>
                                <li class="<?php echo $current_page == 'search.php?find=bride' ? 'current':NULL ?>" ><a href="search.php?find=bride">Find Bride</a></li>
                                <li class="<?php echo $current_page == 'search.php?find=groom' ? 'current':NULL ?>" ><a href="search.php?find=groom">Find Groom</a></li>
                                <li class="<?php echo $current_page == 'my_profile.php' ? 'current':NULL ?>" ><a href="my_profile.php">My Profile</a></li>
                                <li class="<?php echo $current_page == 'shortlisted.php' ? 'current':NULL ?>" ><a href="shortlisted.php">My Shortlisted</a></li>
                                <li class="<?php echo $current_page == 'logout.php' ? 'current':NULL ?>" ><a href="logout.php">Logout</a></li>
                                <!--<li class="<?php /*echo $current_page == 'message.php' ? 'current':NULL */?>"><a href="message.php"> <i class="fa fa-envelope"></i></a></li>-->
                                <li class="nav-item avatar dropdown">
                                    <a class="inset nav-link dropdown-toggle waves-effect waves-light" id="navbarDropdownMenuLink-5"
                                       data-toggle="dropdown">
                                        <img src="uploads/150/<?= strtolower($user_details->fileToUpload) ?>">
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink-5">
                                        <ul class="nav navbar-nav">
                                            <li><a style="color: #0b0b0b" class="dropdown-item" href="my_profile.php">My Profile</a></li>
                                            <li><a style="color: #0b0b0b" class="dropdown-item" href="logout.php">Logout</a></li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div><!-- /.navbar-collapse -->
                    </nav>
                </div> <!-- end pull-right -->
                <div class="clearfix"> </div>
            </div> <!-- end container -->
        </div> <!-- end navbar-inner -->
        <div style="border-bottom: 2px solid #fff; margin-bottom: 2px; color: #fff;">
            <span></span>
        </div>
    </div>
<?php } else { ?>
    <div class="navbar navbar-inverse-blue navbar">
    <!--<div class="navbar navbar-inverse-blue navbar-fixed-top">-->
    <div class="navbar-inner">
        <div class="container">
            <a class="brand" href="index.php"><img src="assets/images/logo.png" alt="logo"></a>
            <div class="pull-right">
                <nav class="navbar nav_bottom" role="navigation">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header nav_2">
                        <button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">Menu
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#"></a>
                    </div>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
                        <ul class="nav navbar-nav nav_1">
                            <li class="<?php echo $current_page == 'index.php' ? 'active':NULL ?>"><a href="index.php">Home</a></li>
                            <li class="<?php echo $current_page == 'search.php?find=bride' ? 'active':NULL ?>" ><a href="search.php?find=bride">Find Bride</a></li>
                            <li class="<?php echo $current_page == 'search.php?find=groom' ? 'active':NULL ?>" ><a href="search.php?find=groom">Find Groom</a></li>
                            <li class="<?php echo $current_page == 'login.php' ? 'active':NULL ?>" ><a href="login.php">Login</a></li>
                            <li class="<?php echo $current_page == 'register.php' ? 'active':NULL ?>" ><a href="register.php">Register</a></li>
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </nav>
            </div> <!-- end pull-right -->
            <div class="clearfix"> </div>
        </div> <!-- end container -->
    </div> <!-- end navbar-inner -->
    <div style="border-bottom: 2px solid #fff; margin-bottom: 2px; color: #fff;">
        <span></span>
    </div>
</div>
<?php } ?>