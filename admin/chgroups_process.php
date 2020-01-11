<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

$ch = new Church();

if (isset($_POST['group_name'])) {
	$group_name = trim($_POST['group_name']);
}

if (isset($_POST['description'])) {
	$description = $_POST['description'];
}

$groups = $ch->church_groups($group_name,$description);
if ($groups) {
	return true;
}else {
	return false;
}


?>