  <?php
  session_start();
  ob_start();
  if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
  } else {
    $user_name = $_SESSION['admin_id'];
  ?>

    <!DOCTYPE html>
    <html class="no-js">

    <head>
      <title>Vishwakarma Patrika Admin Home Page</title>
      <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
      <link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
      <link href="vendors/easypiechart/jquery.easy-pie-chart.css" rel="stylesheet" media="screen">
      <link href="assets/styles.css" rel="stylesheet" media="screen">
      <script src="vendors/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    </head>

    <body>
      <?php include 'includes/header.php'; ?>
      <div class="container-fluid">
        <div class="row-fluid">
          <?php include 'assets/side_menu.php'; ?>
          <!--/span-->
          <div class="span9" id="content">
            <div class="row-fluid">
              <div class="navbar">
                <div class="navbar-inner">
                  <ul class="breadcrumb">
                    <i class="icon-chevron-left hide-sidebar"><a href='#' title="Hide Sidebar" rel='tooltip'>&nbsp;</a></i>
                    <i class="icon-chevron-right show-sidebar" style="display:none;"><a href='#' title="Show Sidebar" rel='tooltip'>&nbsp;</a></i>
                    <li>
                      <a href="index.php">Dashboard</a> <span class="divider"></span>
                    </li>
                  </ul>
                </div>
                <div class="container">
                  <div class="row">
                    <div class="col-md-12">
                      <h3 style="text-align: center;">Welcome Admin </h3>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <hr>
        <?php include 'includes/footer.php'; ?>
      </div>
      <!--/.fluid-container-->
      <script src="vendors/jquery-1.9.1.min.js"></script>
      <script src="bootstrap/js/bootstrap.min.js"></script>
      <script src="vendors/easypiechart/jquery.easy-pie-chart.js"></script>
      <script src="assets/scripts.js"></script>
    </body>

    </html>
  <?php
  }
  ?>