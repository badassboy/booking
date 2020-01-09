<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

$ch = new Church();

if ($ch->checks($_POST['person']) || $ch->checks($_POST['amount']) || $ch->checks($_POST['date_paid'])) {
	
	$person = trim($_POST['person']);
	$amount = trim($_POST['amount']);
	$date_paid = trim($_POST['date_paid']);
}

$paid = $ch->welfare($person,$amount,$date_paid);
if ($paid) {
	return true;
}else {
	return false;
}




?>