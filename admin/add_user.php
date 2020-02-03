<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

require("../functions.php");
$ch = new Church();

$username = false;
$full_name =false;
$email =false;
$admin_type =false;
$added_date =false;

if (isset($_POST['username'])) {
	$username = trim($_POST['username']);
}


if (isset($_POST['fullname'])) {
	$full_name = trim($_POST['fullname']);
}


if (isset($_POST['email'])) {
	$email = trim($_POST['email']);
}

if (isset($_POST['admin_type'])) {
	$admin_type = $_POST['admin_type'];
}

if (isset($_POST['date_added'])) {
	$added_date = $_POST['date_added'];
}





$user_added = $ch->addAdmin($username,$full_name,$email,$admin_type,$added_date);
if ($user_added) {
	echo "Admin added";
}else {
	echo "failed in addding admin";
}








?>