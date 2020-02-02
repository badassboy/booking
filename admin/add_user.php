<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

require("../functions.php");
$ch = new Church();

$username = false;
$password =false;

if (isset($_POST['username'])) {
	$username = trim($_POST['username']);
}

if (isset($_POST['password'])) {
	$password = trim($_POST['username']); 
}

$user_added = $ch->addAdmin($username,$password);
if ($user_added) {
	echo "Admin added";
}else {
	echo "failed in addding admin";
}








?>