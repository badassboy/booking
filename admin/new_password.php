<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once("../functions.php");
$ch = new Booking();

$msg = "";
if (isset($_POST['change_password'])) {
	
	$password = $_POST['pwd'];
	$password1 =$_POST['pwd1'];

	if (empty($password) || empty($password1)) {
		echo "fields are required";
	}elseif ($password!=$password1) {
		echo "Password do not match";
	}else {
		$change_successful = $ch->newPassword($password);
		if ($change_successful) {
			$msg  = "Password change successful";
		}else {
			$msg  = "failed in changing password";
		}
	}
}



?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	

	<title></title>

	<link rel="stylesheet" type="text/css" href="../bootstrap/dist/css/bootstrap.min.css">

	<!-- custom google font -->
	<link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">

	<style type="text/css">
		
		*{
			padding: 0;
			margin: 0;
			box-sizing: border-box;
		  font-family: 'Raleway', sans-serif;

		}

		.forget {
			background-color: #f5f5f5;
			height: 700px;
		}

		.forget h3 {
			padding-left:35%;
			padding-top: 3%;
			font-weight: bolder;
			font-size: 2rem;
		}

		

		.email_form {
			background:#ffffff;
			height: 500px;
			width: 50%;
			margin: 10% auto;
		}



		form {
			margin-top: -15%;
			margin-left: 10%;
			padding-top: 15%;
		}

		form label {
			font-weight: bolder;
			padding-left: 15%;
		}
		header {
			padding-left: 15%;
			padding-top: 5%;
		}

		input[type=password]{
			width: 60%;
			margin-top: 2%;
			margin-left: 15%;
			font-size: 16px;
		}


		.default {
			background-color: #e6e600;
			color:#ffffff;
			width: 60%;
			height: 40px;
			border: 1px solid  #e6e600;
			font-weight: bolder;
			font-size: 20px;
			margin-left: 15%;
		}

		.next {
			margin-top: 3%;
			padding-left: 15%;
			font-size: 17px;
		}


	</style>
</head>
<body>

	<div class="container-fluid forget">

		<?php

		if (isset($msg)) {
			echo $msg;
			
		}

		?>
			<h3>Enter Password</h3>

		<div class="container-fluid email_form">
			<form method="post"  action="">
			  <div class="form-group">
			    <label>Password</label>
			    <input type="password" name="pwd" class="form-control" placeholder="New Password" required="required">

			    <label>Confirm Password</label>
			    <input type="password" name="pwd1" class="form-control" placeholder="Confirm Password">
			   
			  </div>
			  <button type="submit" name="change_password" class="default">Change Password</button>

			</form>
			
		</div>
		
	</div>


	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script type="text/javascript" src="../bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>