<?php
require("../functions.php");
$ch = new Church();

	if (isset($_POST['class_name'])) {

    	$class = $_POST['class_name'];
	}

	if (isset($_POST['teacher'])) {

    	$teacher = $_POST['teacher'];
	}

        
$school = $ch->sunday_school($class,$teacher);
if ($school) {
    echo  "successful";
}else {
    echo "failed";
}

?>