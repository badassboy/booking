<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

include("../functions.php");

$book = new Booking();

$event = "";
$promoter = "";

if (isset($_POST['event_name'])) {
	$event = $_POST['event_name'];
}


if (isset($_POST['promoter'])) {
	$promoter = $_POST['promoter'];
}

if (!empty($event) || !empty($promoter)) {
	$added = $book->addEventPromoter($event,$promoter);
	if ($added) {
		echo "added successfully";
	}else {
		echo  "an error occured";
	}
}






?>