<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

require("../functions.php");
$ch = Church();

if ($ch->checks($_POST['counsel_date']) || $ch->checks($_POST['counsel_time'])) {
	
	$cnsel_date = $_POST['counsel_date'];
	$cnsel_time = $_POST['counsel_time'];

}

$counselling = $ch->counselling($cnsel_date,$cnsel_time);
if ($counselling) {
	return true;
}else {
	return false;
}

?>




