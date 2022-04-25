<?php
session_start();
ob_start();
if (!isset($_SESSION['admin_id'])) {
  header("Location:login.php");
} else {
  $user_name = $_SESSION['admin_id'];
?>
  <!DOCTYPE html>
  <html>

  <head>
    <title> Vishwakarma Patrika Admin  | Registered Users</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
    <link href="assets/styles.css" rel="stylesheet" media="screen">
    <link href="assets/DT_bootstrap.css" rel="stylesheet" media="screen">
    <script src="vendors/modernizr-2.6.2-respond-1.1.0.min.js"></script>
  </head>
  <body>
    <?php 
      include 'includes/header.php';
      include 'includes/connection.php';
      $query_count = $cid->query("SELECT * FROM user_details WHERE payment = '1'");
      $count_sign_up = $query_count->num_rows;
    ?>
    <div class="container-fluid">
      <div class="row-fluid">
        <?php include 'assets/side_menu.php'; ?>
        <!--/span-->
        <div class="span9" id="content">
          <div class="row-fluid">
            <!-- block -->
            <div class="block">
              <div class="navbar navbar-inner block-header">
                <div class="muted pull-left">
                  <span class="label label-info">Paid Members (<?= $count_sign_up ?>)</span>
                </div>

              </div>
              <div class="block-content collapse in">
                <div class="span12">
                  <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>User Id </th>
                        <th>Name</th>
                        <th>Register Date & Time</th>
                        <th>Mobile</th>
                        <th>Password</th>
                        <th>Payment</th>
                        <th>Delete</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php while ($row = $query_count->fetch_assoc()): ?>
                      <tr class="odd gradeX">
                          <td><?php echo $profile_id = $row['id']; ?></td>
                          <?php $user_id =  $row['user_id']; ?>
                          <td> <a href="user_view.php?user_id=<?php echo $user_id; ?>"> <?php echo $user_id; ?> </a> </td>
                          <td><?php echo $row['name']; ?></td>
                          <td><?php echo $row['date_time']; ?></td>
                          <td><?= $row['mobile'] ?></td>
                          <td><?= $row['pass1'] ?></td>
                          <?php
                          $status = $row['payment'];
                          if ($status == 0) {
                            echo "<td ><span class='label label-important'>Not Paid</span></td>";
                          } else {
                            echo "<td ><span class='label label-success'>Paid</span></td>";
                          }
                          ?>
                          <td><a href="delete_data.php?user_id=<?php echo $user_id;  ?>">Delete</a> </td>
                        </tr>
                      <?php endwhile ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <!-- /block -->
          </div>

        </div>
      </div>
      <hr>
      <?php include 'includes/footer.php'; ?>
    </div>
    <!--/.fluid-container-->
    <script src="vendors/jquery-1.9.1.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="vendors/datatables/js/jquery.dataTables.min.js"></script>
    <script src="assets/scripts.js"></script>
    <script src="assets/DT_bootstrap.js"></script>
  </body>
  </html>
<?php
}
?>