<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
// require("../functions.php");
// $ch = new Church();

require("../database.php");

$dbh = DB();

$id = $_GET['del'];

if (isset($id)) {


	$stmt = $dbh->prepare("DELETE FROM groups WHERE id = ?");
	$stmt->execute([$id]);
	$deleted = $stmt->rowCount();
	if ($deleted > 0) {
		echo "deleted";
	}else {
		echo "failed";
	}



}else {
	echo "false";
}


?>