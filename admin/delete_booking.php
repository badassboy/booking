<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);
require("../database.php");
$dbh = DB();

$id = $_GET['trash'];


if (isset($id)) {
	$stmt = $dbh->prepare("DELETE  FROM booked WHERE id = ?");
	$stmt->execute([$id]);
	$trashed = $stmt->rowCount();
	if ($trashed) {
		echo "deleted";
	}else{
		echo "delete failed";
	}
}else {
	echo "id does not exist";
}



?>