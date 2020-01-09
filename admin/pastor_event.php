<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

require("../functions.php");
$ch = Church();

if ($ch->checks($_POST['host']) || $ch->checks($_POST['location']) || $ch->checks($_POST['preach_date'])
	|| $ch->checks($_POST['schedule'])) {
	
	$host = $_POST['host'];
	$location = $_POST['location'];
	$preaching_date = $_POST['preach_date'];
	$schedule = $_POST['schedule'];

}

$preaching = $ch->preaching($host,$location,$preaching_date,$schedule);
if ($preaching) {
	return true;
}else {
	return false;
}

?>




