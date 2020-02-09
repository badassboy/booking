<?php
require("../database.php");

$db = DB();
$json = array();

$stmt = $db->prepare("SELECT * FROM calendar");
$stmt->execute();
while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
	$event_name = $result['event_name'];

	$json[] = array(

		"name_of_event" => $event_name
		);
}

echo json_encode($json);

?>