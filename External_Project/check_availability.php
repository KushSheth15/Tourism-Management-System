<?php
require_once("includes/connection.php");
// code admin email availablity
if (!empty($_POST["emailid"])) {
	$email = $_POST["emailid"];
	if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {

		echo "error : You did not enter a valid email.";
	} else {
		$sql = "SELECT Email FROM registrationTB WHERE Email='$email'";
		$query = mysqli_query($con, $sql);
		$cnt = 1;
		if ($query  > 0) {
			echo "<span style='color:red'> Email already exists .</span>";
			echo "<script>$('#submit').prop('disabled',true);</script>";
		} else {

			echo "<span style='color:green'> Email available for Registration .</span>";
			echo "<script>$('#submit').prop('disabled',false);</script>";
		}
	}
}
