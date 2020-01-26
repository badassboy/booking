<?php

session_start();

ini_set('display_errors', 1);
error_reporting(E_ALL);

require("../functions.php");
$ch = new Church();

$person = "";
$amount = "";
$cnt_date = "";
$bereaved= "";
$leader = "";

// if(isset($_POST['cnt_name'])){

// 	$person = $_POST['cnt_name'];
	
// }

//   if(isset($_POST['amount'])){

// 	$amount = trim($_POST['amount']);
// 	echo $amount;
// }

//   if(isset($_POST['cnt_date'])){

// 	$cnt_date = trim($_POST['cnt_date']);
//   } 

//  if(isset($_POST['bereaved'])){

// 	$bereaved = trim($_POST['bereaved']);
//  }

//  if(isset($_POST['leader'])){
//  	$leader = trim($_POST['leader']);
//  }


$paid = $ch->funeral($person,$amount,$bereaved,$leader);
if ($paid) {
	$_SESSION['info'] = "paid successful";
}else {
	$_SESSION['info'] = "error occured";
}

?>




