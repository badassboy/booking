<?php
require("../database.php");

$db = DB();
$json = array();

$stmt = $db->prepare("SELECT * FROM church_group");
$stmt->execute();
while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
	$groups = $result['group_name'];

	$json[] = array(

		"created_group" => $groups
		);
}

echo json_encode($json);

?>