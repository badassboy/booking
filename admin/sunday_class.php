<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

require("../functions.php");
$ch = new Church();

	$member = "";
	$class_name = "";
	

if (isset($_POST['member'])) {
	$member = trim($_POST['member']);
}

if (isset($_POST['selected_class'])) {
	$class_name = trim($_POST['selected_class']);
}

$child = $ch->sunday_class($member,$class_name);
	if ($child == 1) {
		echo "member added";
	}else {
		echo "failed";
	}

?>



