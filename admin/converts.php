<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

require("../functions.php");
$ch = Church();

if ($ch->checks($_POST['person']) || $ch->checks($_POST['birth']) || $ch->checks($_POST['baptism'])
	|| $ch->checks($_POST['invited']) || $ch->checks($_POST['mobile']) || $ch->checks($_POST['email'])
	|| $ch->checks($_POST['address'])) {
	
	$person = $_POST['person'];
	$birth = $_POST['birth'];
	$baptism = $_POST['baptism'];
	$invite = $_POST['invited'];
	$phone = $_POST['mobile'];
	$email = $_POST['email'];
	$address = $_POST['address'];

}

$converted = $ch->new_convert($person,$birth,$baptism,$invite,$phone,$email,$address);
if ($converted) {
	return true;
}else {
	return false;
}

?>




