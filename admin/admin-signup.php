<?php
// this is the signup page
//require("../database.php");
include("../functions.php");
$ch = new Church();

$msg = "";

if (isset($_POST['signup'])) {


	$fullName = trim($_POST['full_name']);
	$church = trim($_POST['ch_name']);
	$short_name = trim($_POST['short_name']);
	$location = trim($_POST['ch_location']);
	$email = trim($_POST['email']);
	$mobile = trim($_POST['tel']);
	$name = trim($_POST['username']);
	$password = trim($_POST['password']);
	$password2 = trim($_POST['password2']);


	if (!empty($fullName) || !empty($church) || !empty($short_name) || !empty($location) || !empty($email) || !empty($mobile)
		|| !empty($name) || !empty($password) || !empty($password2)) {

		if (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
			$msg = "invalid email";
		}else if ($password != $password2) {

			$msg = "Password does not match";
		}else {

			$admin_id = $ch->registerChurchAdmin($fullName,$church,$short_name,$location,$email,$mobile,$name,$password);

			

			if ($admin_id==1) {

				$createDatabase = $ch->createDatabase($short_name);
				if ($createDatabase==1) {
					$creatTables = $ch->creatTables($short_name);
					if ($creatTables==1) {
						$msg="Account Created Successfully";
					}
					else
					{ 
						$msg="Error creating tables for database";
						// print_r($creatTables);
					}

				}
					
				else
				{
					$msg="Error creating database";
					// print_r($createDatabase);
				}

				// user activation email sending script
				/*
				$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"."activate_email.php?user_id=" . $admin_id;
				$toEmail = $email;
				$subject = "User Registration Activation Email";
				$content = "Click this link to activate your account. <a href='" . $actual_link . "'>" . $actual_link . "</a>";
				$mailHeaders = "From: Admin\r\n";
				if (mail($toEmail, $subject, $content,$mailHeaders)) {
					$msg = "You have registered and the activation mail is sent to your email. Click the activation link to activate you account.";
				}else{
					$msg = "email sending failed";
				}
				*/




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
<html>
<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	
	<title></title>
	<link rel="stylesheet" type="text/css" href="../bootstrap/dist/css/bootstrap.min.css">

	<style type="text/css">

		.signup_page {
			background-color:#f5f5f5;
			height: 1200px; 
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
			height: 950px;
			background-color:rgb(255, 255, 255);
			margin: 1% auto;
		}


		input[type=text],input[type=password],input[type=tel],input[type=email]{
			width: 60%;
			margin-top: -1%;
		}

		form {
			margin-top: 3%;
			margin-left: 20%;
			padding-top: 4%;
		}

		.default {
			background-color: green;
			color: white;
			width: 60%;
			height: 40px;
			border: 1px solid green;
		}

		form label {
			padding-top: 2%;
			font-weight: bold;
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
				  <label>FullName</label>
				  <input type="text" name="full_name" class="form-control"  placeholder="FullName" required="required">
				</div>

				<div class="form-group">
				  <label>Church Name</label>
				  <input type="text" name="ch_name" class="form-control"  placeholder="Church Name" required="required">
				</div>

				<div class="form-group">
				  <label>Church ShortName</label>
				  <input type="text" name="short_name" class="form-control"  placeholder="Church ShortName" required="required">
				</div>

				<div class="form-group">
				  <label>Location of Church</label>
				  <input type="text" name="ch_location" class="form-control"  placeholder="Church Location" required="required">
				</div>


				<div class="form-group">
				    <label>Email address</label>
				    <input type="email" name="email" class="form-control"  placeholder="Email" required="required">
				  </div>


				  <div class="form-group">
				    <label for="example-tel-input" class="col-2 col-form-label">Telephone</label>
				      <input class="form-control" type="tel" name="tel"  id="example-tel-input">
				  </div>


				  <div class="form-group">
				    <label for="usernameInput">Username</label>
				    <input type="text" name="username" class="form-control" id="usernameInput" placeholder="FullName" required="required">
				  </div>


				<div class="form-group">
				  <label>Password</label>
				  <input type="password" name="password" class="form-control" placeholder="Password" required="required">
				</div>


				<div class="form-group">
				  <label>Confirm Password</label>
				  <input type="password" name="password2" class="form-control" placeholder="Reapeat Password" required="required">
				</div>

				<button type="submit" name="signup" class="default">Register Church</button>
				<p>Already Registered.<a href="index.php" style="color: #009933"> Login</a></p>
			</form>
		</div>
		
	</div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript" src="../bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>