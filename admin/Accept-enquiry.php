<?php
session_start();
error_reporting(0);
include 'includes/dbconnection.php';
if (strlen($_SESSION['bpmsaid'] == 0)) {
	header('location:logout.php');
} else {

	$vid = $_GET['viewid'];
	$isread = 1;
	$query = mysqli_query($con, "update   tbluser set IsRead ='$isread' where ID='$vid'");

?>
	<script src="js/classie.js"></script>
	<script>
		alert("Never Gonna Give You Up");
		var menuLeft = document.getElementById('cbp-spmenu-s1'),
			showLeftPush = document.getElementById('showLeftPush'),
			body = document.body;

		showLeftPush.onclick = function() {
			classie.toggle(this, 'active');
			classie.toggle(body, 'cbp-spmenu-push-toright');
			classie.toggle(menuLeft, 'cbp-spmenu-open');
			disableOther('showLeftPush');
		};

		function disableOther(button) {
			if (button !== 'showLeftPush') {
				classie.toggle(showLeftPush, 'disabled');
			}
		}
	</script>
	<script src="js/scripts.js"></script>
	<!-- Bootstrap Core JavaScript -->
	<script src="js/bootstrap.js"> </script>
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	</body>

	</html>
<?php } ?>
<?php

sleep(0.7);
$uurll = "unreadenq.php";
header("Location: $uurll", true, 303);
?>