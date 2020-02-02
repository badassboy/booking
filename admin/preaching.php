<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

require("../functions.php");
$ch = new Church();

$host = false;
$location = false;
$preach_date = false;
$schedule = false;

if (isset($_POST['host'])) {
	$host = $_POST['host'];
}

if (isset($_POST['location'])) {
	$location = $_POST['location'];
}

if (isset($_POST['preach_date'])) {
	$preach_date = $_POST['preach_date'];
}

if (isset($_POST['schedule'])) {
	$schedule = $_POST['schedule'];
}



$preaching = $ch->preaching($host,$location,$preach_date,$schedule);
if ($preaching) {
	echo "successful";
}else {
	echo "failed";
}

?>




