<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

require("../functions.php");
$ch = Church();

if ($ch->checks($_POST['person']) || $ch->checks($_POST['mobile']) || $ch->checks($_POST['address'])
	|| $ch->checks($_POST['location']) || $ch->checks($_POST['member'])) {
	
	$visitor = $_POST['person'];
	$phone = $_POST['mobile'];
	$address = $_POST['address'];
	$location = $_POST['location'];
	$member = $_POST['member'];

}

$visitor = $ch->visitor($visitor,$phone,$address,$location,$member);
if ($visitor) {
	return true;
}else {
	return false;
}

?>




