<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

require("../functions.php");
$ch = Church();

if ($ch->checks($_POST['cnt_name']) || $ch->checks($_POST['amount']) || $ch->checks($_POST['cnt_date'])
	|| $ch->checks($_POST['bereaved']) || $ch->checks($_POST['leader']) || $ch->checks($_POST['note']) {
	
	$person = $_POST['cnt_name'];
	$amount = $_POST['amount'];
	$cnt_date = $_POST['cnt_date'];
	$bereaved = $_POST['bereaved'];
	$leader = $_POST['leader'];

}

$paid = $ch->funeral($person,$amount,$cnt_date,$bereaved,$leader);
if ($paid) {
	return true;
}else {
	return false;
}

?>




