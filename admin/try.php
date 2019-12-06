<?php
session_start();
$_SESSION['response']="";
//print_r($_SESSION);

require("../functions.php");
$ch=  new Church();

// $info = "";


if (isset($_SESSION['id']) && !empty($_SESSION['id'])) {




	if (isset($_GET['pwd1'])) {


		
		$id = $_SESSION['id'];

		$password1 = $_GET['pwd1'];


		$password2 = $_GET['pwd2'];

		if (!empty($password1) || !empty($password2)) {
			$updated = $ch->changePassword($password1,$id);
			if ($updated) {
				//$_SESSION['response']= "update successful";
				echo "update successful";
			}else {
				//$_SESSION['response']= "error occured";
				echo 'update failed';
			}
		}
	}
	else
{
	echo "Values not received";
	//$_SESSION['response'] = "id is not set";
}
}
else
{
	echo "id does not exist";
	//$_SESSION['response'] = "id is not set";
}



?>