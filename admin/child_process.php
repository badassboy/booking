<?php
session_start();

ini_set('display_errors', 1);
error_reporting(E_ALL);

require("../functions.php");
$ch = new Church();

	$child_name = "";
	// $child_age = "";
	// $gender = "";
	// $date_of_birth= "";
	// $guardian_name = "";
	// $guardian_mobile = "";
	// $guardian_address= "";

if (isset($_POST['name'])) {
	$child_name = trim($_POST['name']);
	echo $child_name;
}

// if (isset($_POST['age'])) {
	$child_age = trim($_POST['age']);
	echo $child_age;
// }

// if (isset($_POST['gender'])) {
	$gender = trim($_POST['gender']);
	echo $gender;
// }

// if (isset($_POST['birth'])) {
	$date_of_birth= trim($_POST['birth']);

// }

// if (isset($_POST['guardian'])) {
	$guardian_name = trim($_POST['guardian']);
// }

// if (isset($_POST['mobile'])) {
	$guardian_mobile = trim($_POST['mobile']);
// }

// if (isset($_POST['address'])) {
	$guardian_address= trim($_POST['address']);
// }



$child = $ch->addChild($child_name,$child_age,$gender,$date_of_birth,$guardian_name,$guardian_mobile,$guardian_address);
	if ($child == 1) {
		$_SESSION['msg'] = "child added";
	}else {
		$_SESSION['msg'] = "failed in adding child";
	}



	


	




?>