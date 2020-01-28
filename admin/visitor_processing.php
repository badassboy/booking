<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

require("../functions.php");
$ch = new Church();

if (isset($_POST['person'])) {
	$person = trim($_POST['person']);
}

if (isset($_POST['mobile'])) {
	$phone = $_POST['mobile'];

}

if (isset($_POST['address'])) {
	$address = trim($_POST['address']);
}

if (isset($_POST['location'])) {
	$location = trim($_POST['location']);
}

if (isset($_POST['member'])) {
	$member = $_POST['member'];
}
	
$visitor = $ch->visitor($person,$phone,$address,$location,$member);
if ($visitor) {
	echo "success";
}else {
	echo "failed";
}

?>




