<?php
require("../database.php");



$db = DB();
$json = array();

$stmt = $db->prepare("SELECT * FROM applicant");
$stmt->execute();
while($result = $stmt->fetch(PDO::FETCH_ASSOC)){

	$user_id = base64_encode($result['id']);

	$trash = '<a href="delete_booking.php?trash='.$user_id.'">
				<i class="fa fa-trash" aria-hidden="true"></i>
			  </a>';

	$event = $result['fullname'];
	$guest = $result['contact'];
	$date = $result['package'];
	$delete = $trash;
	

	$json[] = array(

		"one" => $event,
		"three" => $guest,
		"four" => $date,
		"five" => $delete
		);
}

echo json_encode($json);

?>