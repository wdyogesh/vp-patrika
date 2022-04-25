<!DOCTYPE html>
<html>
  <head>
    <title>Vishwakarma Patrika Admin Login</title>
  
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
    <link href="assets/styles.css" rel="stylesheet" media="screen">
    <script src="js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
  </head>
  <body id="login">
    <div class="container">
	  
	  <?php
						include 'includes/connection.php';
						if (isset($_POST['submit'])) {
							$user_name = $_POST['user_name'];
							$result = $cid -> query("SELECT * FROM admin_login WHERE user_id='$user_name'");
							
                            $count = $result -> num_rows;
							$password = $_POST['password'];
							

							//        verifying USER with PASSWORD
							include 'includes/connection.php';
							if ($count == 1) {
								while ($row = $result -> fetch_assoc()) {
									$user_name_db = $row['user_id'];
									$password_db = $row['password'];
									session_start();
									$_SESSION['admin_id'] = $row['user_id'];
								}
								if ($user_name_db == $user_name) {
									if ($password_db == $password) {
										 header("Location:index.php");
									} else {// if password is wrong
										echo "<span style='color:red;' > * Enter Your correct Password !! </span>";
									}
								} else {// if kiosk id is wrong
									 echo "<span style= 'color:red'>  * Please Enter Corret User Name !! </span>";
								}
							}
               else {
	           echo "<span style= 'color:red'>  * This User  name does not exists in Our Database  !! </span>";
              }
						}
						?>
	  
	  	
      <form class="form-signin" method="post" action="login.php" autocomplete="off">
        <h2 class="form-signin-heading">ParinayPath Admin: </h2>
        <input autocomplete="off" type="text" name="user_name" class="input-block-level" placeholder="User Name">
        <input autocomplete="off" type="password" name="password" class="input-block-level" placeholder="Password">
        <label class="checkbox">
          <input type="checkbox" value="remember-me"> Remember me
        </label>
        <button class="btn btn-large btn-primary" type="submit" name="submit">Sign in</button>
        <br />
        <br />
        <p>Powered BY: <a href="http://wdyogesh.com" target="_blank">  wdyogesh.com </a> </p>
      </form>
	 
    </div>
    <script src="vendors/jquery-1.9.1.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>