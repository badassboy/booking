<?php
session_start();

ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once("../functions.php");
$ch = new Booking();


if (isset($_POST['change_password'])) {
	
	$password = $_POST['pwd'];
	$password1 =$_POST['pwd1'];

	if (empty($password) || !empty($password1)) {
		echo "fields are required";
	}elseif ($password!=$password1) {
		echo "Password do not match";
	}else {
		$change_successful = $ch->newPassword($password);
		if ($change_successful) {
			$_SESSION['msg']  = "Password change successful";
		}else {
			$_SESSION['msg']  = "failed in changing password";
		}
	}
}

?>