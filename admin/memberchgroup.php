<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

require("../functions.php");
$ch = new Church();

	$member = "";
	$groups = "";
	

if (isset($_POST['member_name'])) {
	$member = trim($_POST['member_name']);
}

if (isset($_POST['groups'])) {
	$groups = trim($_POST['groups']);
}

$child = $ch->addMembertoChGroup($member,$groups);
	if ($child == 1) {
		echo "member added";
	}else {
		echo "failed";
	}



?>