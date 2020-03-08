<?php
require("../database.php");

$db = DB();
$json = array();

$stmt = $db->prepare("SELECT * FROM eventpromote");
$stmt->execute();
while($result = $stmt->fetch(PDO::FETCH_ASSOC)){

	$id = $result['id'];

	

	$trash = '<a href="delete_eventpromote.php?trash='.$id.'">
				<i class="fa fa-trash" aria-hidden="true"></i>
			  </a>';


	$my_edit = '<a href="edit_eventpromote.php?hello='.$id.'">
	<i class="fa fa-pencil-square" aria-hidden="true"></i>
			 </a>';

	$event_name = $result['event'];
	$promoter = $result['promoter'];
	$delete = $trash;
	$edit = $my_edit;

	$json[] = array(

		"one" => $event_name,
		"two" => $promoter,
		"three" => $delete,
		"four" => $edit
		);
}

echo json_encode($json);

?>



