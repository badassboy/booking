<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);
require("../database.php");
$dbh = DB();

// nine character hash string
$id = base64_decode($_GET["trash"]);
$salt = sha1($id);
$decrypted_id = preg_replace(sprintf('/%s/', $salt), '', $id);


if (isset($decrypted_id) && !empty($decrypted_id)) {


	$stmt = $dbh->prepare("DELETE  FROM booked WHERE id = ?");
	$stmt->execute([$decrypted_id]);
	$trashed = $stmt->rowCount();
	if ($trashed>0) {
		echo "deleted";
	}else{
		echo "delete failed";
	}
}else {
	echo "id does not exist";
}



?>