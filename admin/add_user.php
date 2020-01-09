<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

require("../functions.php");
$ch = new Church();

if (isset($_POST['username'])) {
	$username = trim($_POST['username']);
}

if (isset($_POST['password'])) {
	$password = trim($_POST['username']); 
}

$user_added = $ch->addAdmin($username,$password);
if ($user_added) {
	return true;
}else {
	return false;
}








?>