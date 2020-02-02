<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

require("../functions.php");
$ch = new Church();
$person =false;
$gender =false;
$status =false;
$education =false;
$email =false;
$address =false;



if (isset($_POST['person'])) {
	
	$person = $_POST['person'];
}

if (isset($_POST['gender'])) {
	
	$gender = $_POST['gender'];
}

if (isset($_POST['age'])) {
	
	$age = $_POST['age'];
}

if (isset($_POST['working_status'])) {
	
	$status = $_POST['working_status'];
}


if (isset($_POST['education'])) {
	
	$education = $_POST['education'];
}


if (isset($_POST['email'])) {
	
	$email = $_POST['email'];
}

if (isset($_POST['address'])) {
	
	$address = $_POST['address'];
}

$registered = $ch->registerYouth($person,$gender,$age,$status,$education,$email,$address);
if ($registered) {
	echo "success";
}else {
	echo "false";
}






?>