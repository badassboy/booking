<?php


ini_set('display_errors', 1);
error_reporting(E_ALL);


require("../functions.php");
$ch = new Church();



if (isset($_POST['pwd1'])) {
	$password1 = $_POST['pwd1'];
}

if (isset($_POST['pwd2'])) {
	$password2 = $_POST['pwd2'];
}

if (isset($_POST['pwd3'])) {
	$password3 = $_POST['pwd3'];
}

$user_email=$_SESSION['email'];
$admin_change_password = $ch->updateAdminPassword($password3,$password1,$user_email);

switch ($admin_change_password) {
	case '1':
		//echo "successful";
		$_SESSION['msg']="Password Updated Successfully";
		header("Location: settings.php");
		break;

	case '0':
		$_SESSION['msg']="Error Occured";
		header("Location: settings.php");
		break;
	
	default:
		$_SESSION['msg']=$admin_change_password;
		header("Location: settings.php");
		break;
}




?> 