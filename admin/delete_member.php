<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);
require("../database.php");
$dbh = DB();

$id = $_GET['trash'];
// var_dump($id);

if (isset($id)) {
	$stmt = $dbh->prepare("DELETE  FROM members WHERE id = ?");
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