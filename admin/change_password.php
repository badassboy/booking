<?php
// session_start();
// var_dump($_SESSION);


ini_set('display_errors', 1);
error_reporting(E_ALL);


require("../functions.php");
$ch = new Church();

// $id = $_GET['update'];
// var_dump($id);

if (isset($_POST['pwd1'])) {
	$password1 = $_POST['pwd1'];
}

if (isset($_POST['pwd2'])) {
	$password2 = $_POST['pwd2'];
}







?> 