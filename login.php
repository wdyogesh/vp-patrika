    <?php include "asset/header.php"; ?>
    <title>Vishwakarma Patrika | Login</title>
     <?php include "asset/navbar.php";?>
        <!-- ============================  Navigation End ============================ -->
        <div class="grid_3">
            <div class="container">
                <div class="breadcrumb1">
                    <ul>
                        <a href="index.php"><i class="fa fa-home home_1"></i></a>
                        <span class="divider">&nbsp;|&nbsp;</span>
                        <li class="current-page">
                        <span style="color: green;"> Login </span>, If You are not Member ?
                            <a href="register.php"> Register Here </a>
                        </li>
                    </ul>
                </div>
                <div class="services">
                    <div class="col-sm-6 login_left">
                        <?php
                        if($session->is_signed_in()){redirect("index.php"); }
                        if (isset($_POST['submit'])){
                            $user_id = trim($_POST['user_id']);
                            $password = trim($_POST['password']);
                            // verify user name and password
                            $user_found =  user::verify_user($user_id,$password);
                            if ($user_found == 'password_not_match') {
                                echo $the_message = "<span class='text-danger' > * Your User Id or password is not correct !! </span>";
                            }
                            elseif ($user_found == 'account_not_active') {
                                echo $the_message = "<span class='text-danger' > * Your Account is not activated , Contact to Admin , for Activation !! </span>";
                            }
                            else{
                                $session->login($user_found);
                                redirect("index.php");
                            }
                        }
                        else
                        {
                            $user_id = "";
                            $password  = "";
                        }
                        ?>
                        <form action="" method="post">
                            <div class="form-item form-type-textfield form-item-name">
                                <label for="edit-name">Username <span class="form-required" title="This field is required.">*</span></label>
                                <input type="text" id="edit-name" name="user_id" value="" size="60" maxlength="60" class="form-text required">
                            </div>
                            <div class="form-item form-type-password form-item-pass">
                                <label for="edit-pass">Password <span class="form-required" title="This field is required.">*</span></label>
                                <input type="password" id="edit-pass" name="password" size="60" maxlength="128" class="form-text required">
                            </div>
                            <p>
                                <a  href="forget.php"> forget password ? </a>
                            </p>
                            <div class="form-actions">
                                <input type="submit" id="edit-submit" name="submit" value="Log in" class="btn_1 submit">
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
</body>
</html>

