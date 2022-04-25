<?php
ob_start();
?>
<?php session_start();?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>Vishwakarma Patrika | Forget</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="keywords" content="Marital Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template,
        Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
        <script type="application/x-javascript">
            addEventListener("load", function() {
                setTimeout(hideURLbar, 0);
            }, false);
            function hideURLbar() {
                window.scrollTo(0, 1);
            }
        </script>
        <link href="assets/css/bootstrap-3.1.1.min.css" rel='stylesheet' type='text/css' />
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <!-- Custom Theme files -->
        <link href="assets/css/style.css" rel='stylesheet' type='text/css' />
        <link href='//fonts.googleapis.com/css?family=Oswald:300,400,700' rel='stylesheet' type='text/css'>
        <link href='//fonts.googleapis.com/css?family=Ubuntu:300,400,500,700' rel='stylesheet' type='text/css'>
        <!----font-Awesome----->
        <link href="assets/css/font-awesome.css" rel="stylesheet">
        <!----font-Awesome----->
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
    </head>
    <body>
        <!-- ============================  Navigation Start =========================== -->
        <?php
        include 'asset/header.php';
        ?>
        <!-- ============================  Navigation End ============================ -->
        <div class="grid_3">
            <div class="container">
                <div class="breadcrumb1">
                    <ul>
                        <a href="index.php"><i class="fa fa-home home_1"></i></a>
                        <span class="divider">&nbsp;|&nbsp;</span>
                        <li class="current-page">
                        <span style="color: green;"><a  href="register.php"> Login </a> </span>, If You are not Member ?   <a  href="register.php"> Register Here </a>
                        </li>
                    </ul>
                </div>
                <div class="services">
                    <div class="col-sm-6 login_left">
                       <h4>If you have forget your Password , send your Following details on whats app number : 9685944503 </h4>
                       <ol>
                           <li>Your Vishwakarma Patrika ID </li>
                       <li>
                           your Date of Birth 
                       </li>
                       <li>
                           And your location, city 
                       </li>
                       </ol>
                       
                      
                    </div>
                        <div class="col-md-3 match_right">

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

        <?php
        include 'asset/footer2.php';
        ?>
        <!-- FlexSlider -->
<link href="assets/css/flexslider.css" rel='stylesheet' type='text/css' />
  <script defer src="assets/js/jquery.flexslider.js"></script>
  <script type="text/javascript">
    $(function(){
      SyntaxHighlighter.all();
    });
    $(window).load(function(){
      $('.flexslider').flexslider({
        animation: "slide",
        start: function(slider){
          $('body').removeClass('loading');
        }
      });
    });
  </script>
<!-- FlexSlider -->
    </body>
</html>
