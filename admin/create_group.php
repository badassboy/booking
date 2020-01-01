<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

require("../functions.php");
$ch = new Church();


  
  $group_name = "";
  $desription ="";

  if (isset($_POST['group_name'])) {
  	$group_name = $_POST['group_name'];
  }

  if (isset($_POST['describe'])) {
  	$description = $_POST['describe'];
  }

  if (!empty($group_name) || !empty($description)) {
    $group = $ch->createGroup($group_name,$description);
    if ($group) {
    	echo "success";
    }else{
    	echo "failed";
    }
  }else{
    echo "fields are required";
  }


?>