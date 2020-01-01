<?php

require("../functions.php");
$ch=  new Church();

$event_name = "";
$theme = "";
$leader = "";
$schedule = "";
$duration = "";
$describe = "";

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

if (isset($_POST['duration'])) {
	$duration = $_POST['duration'];
}

if (isset($_POST['describe'])) {
	$describe = $_POST['describe'];
}

if (!empty($event_name) || !empty($theme) || !empty($leader) || !empty($schedule) || !empty($duration) ||
    !empty($describe)) {
	
	$created_event = $ch->createEvent($event_name,$theme,$leader,$schedule,$duration,$describe);
	if ($created_event) {
		return true;
	}else {
		return false;
	}
}





?>