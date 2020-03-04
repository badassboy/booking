<?php

require("../database.php");
$db = DB();

	if (isset($_POST['update'])) {
		
		$event = $_POST['event'];
		$promoter = $_POST['promoter'];
		$id = $_POST['id'];

		$stmt = $db->prepare("UPDATE eventpromote SET event = ?, promoter = ? WHERE id = ?");
		$stmt->execute([$event,$promoter,$id]);
		$row = $stmt->rowCount();
		if ($row>0) {
			echo "edit successful";
		}else {
			echo "failed in updating records";
		}

	}

	




?>