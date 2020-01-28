<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

require("../functions.php");
$ch = new Church();

	$person = "";
	$birth = "";
	$baptism = "";
	$invite = "";
	$phone = "";
	$email = "";
	$address = "";


if (isset($_POST['person'])){

	$person = $_POST['person'];
} 

if (isset($_POST['invited'])) {
	$invite = $_POST['invited'];
}

if (isset($_POST['birth'])) {
	$birth = $_POST['birth'];
}

if (isset($_POST['mobile'])) {
	
	$phone = $_POST['mobile'];
}

if (isset($_POST['email'])) {
	
	$email= $_POST['email'];
}

if (isset($_POST['address'])) {
	
	$address = $_POST['address'];
}

if (isset($_POST['baptism'])) {
	$baptism = $_POST['baptism'];
}
	


$converted = $ch->new_convert($person,$invite,$birth,$phone,$email,$address,$baptism);
if ($converted) {
	// return true;
	echo "successful";
}else {
	// return false;
	echo "failed";
}

?>




