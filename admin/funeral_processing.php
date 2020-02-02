<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

require("../functions.php");
$ch = new Church();

$person = false;
$amount =false;
$bereaved = false;
$leader = false;

if (isset($_POST['person'])) {
	$person = $_POST['person'];
}

if (isset($_POST['amount'])) {
	$amount = $_POST['amount'];
}

if (isset($_POST['bereaved'])) {
	$bereaved = $_POST['bereaved'];
}

if (isset($_POST['leader'])) {
	$leader = $_POST['leader'];
}


$paid = $ch->funeral($person,$amount,$bereaved,$leader);
if ($paid) {
	echo "paid successful";
}else {
	echo "error occured";
}

?>




