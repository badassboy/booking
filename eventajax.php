<?php
require("database.php");

$db = DB();
$json = array();

$stmt = $db->prepare("SELECT * FROM eventpromote");
$stmt->execute();
while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
	$events = $result['event'];

	$json[] = array(

		"all_event" => $events
		);
}

echo json_encode($json);

?>