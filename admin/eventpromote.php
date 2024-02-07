<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

include("../functions.php");

$book = new Booking();

$fullname = "";
$contact = "";
$location = "";
$package = "";

if (isset($_POST['fullname'])) {
	$fullname = $_POST['fullname'];
}


if (isset($_POST['contact'])) {
	$contact = $_POST['contact'];
}

if (isset($_POST['location'])) {
	$location = $_POST['location'];
}

if (isset($_POST['package'])) {
	$package = $_POST['package'];
}

if (!empty($fullname) || !empty($contact)) {
	$added = $book->adminRegisterStudent($fullname,$contact,$location,$package);
	if ($added) {
		echo "Student added successfully";
	}else {
		echo  "Error occured";
	}
}






?>