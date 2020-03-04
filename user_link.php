<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once("functions.php");
$booking = new Booking();


if (isset($_POST['send_email'])) {
	
	$email = $_POST['email'];
	if (!empty($email)) {

		$link_sent = $booking->sendUserLink($email);
		if ($link_sent) {
			echo "a link has been sent to your email";
		}else {
			echo "an error occured";
		}
	}else {
		echo "field is required";
	}

	

}



?>