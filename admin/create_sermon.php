<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

require("../functions.php");
$ch = new Church();

$preacher = "";
$title = "";
$schedule = "";
$scripture = "";
$note = "";

if (isset($_POST['preacher'])) {
	$preacher = trim($_POST['preacher']);
	// echo $preacher;
}

if (isset($_POST['title'])) {
	$title = trim($_POST['title']);
		// echo $title;
}

if (isset($_POST['schedule'])) {
	$schedule = trim($_POST['schedule']);
}

if (isset($_POST['scripture'])) {
	$scripture = trim($_POST['scripture']);
}

if (isset($_POST['note'])) {

	$note = trim($_POST['note']);
}


$my_sermon = $ch->sermon($preacher,$title,$schedule,$scripture,$note);
if ($my_sermon) {
	echo "sermon created";
}else {
	// return false;
	echo "error occured";
}

?>




