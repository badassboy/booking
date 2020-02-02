<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

require("../functions.php");

$ch = new Church();

$group_name = "";
$description = "";

if (isset($_POST['group_name'])) {
	$group_name = trim($_POST['group_name']);
	// echo $group_name;
}

if (isset($_POST['description'])) {
	$description = $_POST['description'];
	// echo $description;
}

$groups = $ch->church_group($group_name,$description);
if ($groups) {
echo "group created";
}else {
	echo "error occured";
}






?>