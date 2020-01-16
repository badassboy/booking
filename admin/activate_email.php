<?php

require("../functions.php");
$ch = new Church();
$dbh = DB();

if (!empty($_GET['user_id'])) {
	
	$stmt=$dbh->prepare("UPDATE registered_users set status = 'active' WHERE id='" . $_GET["user_id"]. "'");
	$stmt->execute([$_GET["user_id"]]);
	$activated = $stmt->rowCount();
	if ($activated) {
		$info = "email activated";
		// redirecting to login page
		header("Location:http://localhost/church/login.php");
		
	}else{
		$info = "email activation failed";
	}

		
}


?>