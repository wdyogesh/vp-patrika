<?php
ob_start();
?>


<?php
date_default_timezone_set('Asia/Kolkata');
error_reporting(E_ALL ^ E_DEPRECATED);
?>

<!-- end of header -->

<!-- end of middle -->

<div id="tooplate_main" style="position:inherit">

	<div id="tooplate_content">
		<div class="col_w880 intro">

		</div>

		<hr />
		<?php
		if (true) {

		}
		?>
		</center>
		<?php session_start();
		unset($_SESSION['pid']);
		unset($_SESSION['pid']);
		session_destroy();

		header("Location: ../index.php");
		exit ;
		?>
	</div>
	<!-- end of content -->

</div>
<!-- end of main -->

<!-- end of tooplate_footer -->

</div>
<script type="text/javascript">
	function timer() {

	}

	function logout() {
		var ans = confirm("Are you sure, you want to LOGOUT");
		if (ans) {
			window.location = "logout.php";
		}

	}

</script>
</body>
</html>
