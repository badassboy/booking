<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

require("../functions.php");
$ch = new Church();

$event_name = false;
$event_date = false;
$location =false;
$schedule =false;

if (isset($_POST['evnt_name'])) {
	$event_name = $_POST['evnt_name'];
}

if (isset($_POST['evnt_date'])) {
	$event_date = $_POST['evnt_date'];
}

if (isset($_POST['location'])) {
	$location = $_POST['location'];
}

if (isset($_POST['schedule'])) {
	$schedule = $_POST['schedule'];
}



$preaching = $ch->pastor_event($event_name,$event_date,$location,$schedule);
if ($preaching) {
	echo "event created";
}else {
	echo "failed";
}

?>




