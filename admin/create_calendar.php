<?php

require("../functions.php");
$ch=  new Church();

$event_name = "";
$theme = "";
$leader = "";
$schedule = "";
$describe = "";
$my_date = "";

if (isset($_POST['event_name'])) {
	$event_name = $_POST['event_name'];
}

if (isset($_POST['theme'])) {
	$theme = $_POST['theme'];
}

if (isset($_POST['leader'])) {
	$leader = $_POST['leader'];
}

if (isset($_POST['schedule'])) {
	$schedule = $_POST['schedule'];
}

if (isset($_POST['describe'])) {
	$describe = $_POST['describe'];
}

if (isset($_POST['cal_date'])) {
	$my_date = $_POST['cal_date'];
}



$created_event = $ch->createEvent($event_name,$theme,$leader,$schedule,$describe,$my_date);
if ($created_event) {
	echo "successful";
}else {
	echo "false";
}








?>