<?php

require("../functions.php");
$ch = new Church();

if ($ch->checks($_POST['name']) || $ch->checks($_POST['age']) || $ch->checks($_POST['gender']) || $ch->checks($_POST['birth']) || $ch->checks($_POST['guardian']) || $ch->checks($_POST['mobile'])
	|| $ch->checks($_POST['address'])) {

	$child_name = $_POST['name'];
	$child_age = $_POST['age'];
	$gender = $_POST["gender"];
	$date_of_birth = $_POST['birth'];
	$guardian_name = $_POST['guardian'];
	$guardian_mobile = $_POST['mobile'];
	$guardian_address = $_POST['address'];

	$children_added = $ch->addChild($child_name,$child_age,$gender,$date_of_birth,$guardian_name,$guardian_mobile,$guardian_address);
	if ($children_added) {
		return true;
	}else {
		return false;
	}



	


	
}



?>