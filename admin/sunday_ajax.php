<?php

include("../database.php");
$db = DB();

$json = array();

$stmt = $db->prepare("SELECT * FROM sunday_school");
$stmt->execute();
while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
	$class_name = $result['class'];
	// $teacher = $result['teacher'];

	$json[] = array(

		"class" => $class_name
		// "teacher" => $teacher
		);
}

echo json_encode($json);


?>