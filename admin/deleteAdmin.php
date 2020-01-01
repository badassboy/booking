<?php



require("../functions.php");
$ch = new Church();

$id = $_GET['del'];

if (isset($id)) {
	
	$remove = $ch->deleteAdminInfo($id);
	if ($remove) {
		echo "removed";
	}else{
		echo "error";
	}
}
	
?>



