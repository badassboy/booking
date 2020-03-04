<?php
require("../database.php");

$db = DB();
$json = array();

$stmt = $db->prepare("SELECT * FROM booked");
$stmt->execute();
while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
	$id = $result['id'];
	$name = $result['event_name'];
	$promoter = $result['promoter'];

	$json[] = array(

		"id" => $id,
		"name" => $name,
		"promoter" => $promoter
		);
}

echo json_encode($json);

?>



