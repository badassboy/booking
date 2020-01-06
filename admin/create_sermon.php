<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

require("../functions.php");
$ch = Church();

if ($ch->checks($_POST['preacher']) || $ch->checks($_POST['title']) || $ch->checks($_POST['schedule'])
	|| $ch->checks($_POST['birth']) || $ch->checks($_POST['scripture']) || $ch->checks($_POST['note']) {
	
	$preacher = $_POST['preacher'];
	$title = $_POST['title'];
	$schedule = $_POST['schedule'];
	$birth = $_POST['birth'];
	$scripture = $_POST['scripture'];
	$note = $_POST['note'];

}

$my_sermon = $ch->sermon($preacher,$title,$schedule,$birth,$scripture,$note);
if ($my_sermon) {
	return true;
}else {
	return false;
}

?>




