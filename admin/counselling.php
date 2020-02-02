<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

require("../functions.php");
$ch = new Church();

$cnsel_date = "";
$cnsel_time = "";

if (isset($_POST['counsel_date'])) {
	$cnsel_date = trim($_POST['counsel_date']);
}

if (isset($_POST['counsel_time'])) {
	$cnsel_time = trim($_POST['counsel_time']);
}



$counselling = $ch->counselling($cnsel_date,$cnsel_time);
if ($counselling) {
	echo "success";
}else {
	echo "failed";
}

?>




