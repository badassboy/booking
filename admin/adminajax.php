<?php

include("../database.php");
$db = DB();

$json = array();

$stmt = $db->prepare("SELECT * FROM admins");
$stmt->execute();
while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
	$username = $result['username'];
	$fullname = $result['fullname'];
	$email = $result['email'];
	$my_date = $result['date_added'];

	$json[] = array(

		"username" => $username,
		"fullname" => $fullname,
		"email" => $email,
		"admin_date" => $my_date
		);
}

// Echoinh array in json format
echo json_encode($json);


?>