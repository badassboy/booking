<?php
// this is the signup page
//require("../database.php");
include("../functions.php");
$ch = new Booking();

$msg = "";

if (isset($_POST['signup'])) {


	$name = trim($_POST['username']);
	$email = trim($_POST['email']);
	$mobile = trim($_POST['tel']);
	$password = trim($_POST['password']);
	$password2 = trim($_POST['password2']);


	if (!empty($name) || !empty($email) || !empty($mobile)|| !empty($password) || !empty($password2)) {

		if (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
			$msg = "invalid email";
		}else if ($password != $password2) {

			$msg = "Password does not match";
		}else {

			$admin_id = $ch->registerAdmin($name,$email,$mobile,$password);

			

			if ($admin_id==1) {

				$msg = "Registration Successful";

			



			}else{
				$msg = "Error creating new account";
				// print_r($adminSignUp);
			}

		}

		

	}else {
		$msg = "field are required";
	}
}



?>


<!DOCTYPE html>
<html lang="en">
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

		.signup_page {
			background-color:#f5f5f5;
			height: 770px; 
		}

		.signup_page h3 {
			text-align: center;
			padding-top: 1%;
		}

		header {
			background-color:#ffffff;
			width: 100%;
			height: 60px;
		}

		header h2 {
			padding-top: 1%;
			padding-left: 4%;
		}

		.signup_form {
			width: 40%;
			height: 600px;
			background-color:rgb(255, 255, 255);
			margin: 1% auto;
		}


		input[type=text],input[type=password],input[type=tel],input[type=email]{
			width: 60%;
			margin-top: -1%;
			font-size: 16px;
		}

		form {
			margin-top: 3%;
			margin-left: 20%;
			padding-top: 4%;
		}

		.default {
			background-color: #e6e600;
			color:#ffffff;
			width: 60%;
			height: 40px;
			border: 1px solid  #e6e600;
			font-weight: bolder;
			font-size: 20px;
		}

		form label {
			padding-top: 2%;
			font-weight: bold;
		}

		.next_action {
			padding-top: 2%;
			font-size: 17px;
		}

		@media screen and (max-width: 576px){

			.signup_form {
				width: 80%;
			}

			.signup_page h3 {
				text-align: center;
				padding-top: 1%;
				font-size: 18px;
			}

			header h2 {
				padding-top: 1%;
				padding-left: 4%;
				font-size: 18px;
			}

			input[type=text],input[type=password],input[type=tel],input[type=email]{
				width: 80%;
				font-size: 16px;
			}



			.default {
				
				width: 80%;
				
			}
		}


	</style>

</head>
<body>

	<div class="signup_page">

		<header>
			<h2>ADMIN SIGNUP</h2>
		</header>

		<h3>SIGNUP HERE</h3>
		<div class="signup_form">
			<?php

			if (isset($msg)) {
				echo $msg;
			}

			?>
			<form method="post">

			  <div class="form-group">
			    <label for="usernameInput">Username</label>
			    <input type="text" name="username" class="form-control" id="usernameInput" placeholder="FullName" required="required" data-toggle="tooltip" data-placement="top" title="Username">
			  </div>

				<div class="form-group">
				    <label>Email address</label>
				    <input type="email" name="email" class="form-control"  placeholder="Email" required="required" data-toggle="tooltip" data-placement="top" title="Email">
				  </div>

				  <div class="form-group">
				    <label for="example-tel-input" class="col-2 col-form-label">Telephone</label>
				      <input class="form-control" type="tel" name="tel" placeholder="Phone Number"
				      data-toggle="tooltip" data-placement="top" title="Telephone">
				  </div>




				<div class="form-group">
				  <label>Password</label>
				  <input type="password" name="password" class="form-control" placeholder="Password" required="required" data-toggle="tooltip" data-placement="top" title="Password">
				</div>


				<div class="form-group">
				  <label>Confirm Password</label>
				  <input type="password" name="password2" class="form-control" placeholder="Reapeat Password" required="required" data-toggle="tooltip" data-placement="top" title="Confirm Password">
				</div>

				<button type="submit" name="signup" class="default">Register</button>
				<p class="next_action">Already Registered.<a href="index.php"> Login</a></p>
			</form>
		</div>
		
	</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript" src="../bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>
				

				




