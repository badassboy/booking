<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

require("functions.php");
$booking = new Booking();

$msg = "";
if (isset($_POST['loginBtn'])) {
	
	$email = $_POST['email'];
	
	$password = $_POST['pwd'];

	if (empty($email) || empty($password)) {
		$msg = '<div class="alert alert-danger" role="alert">Fields required</div>';
	}else{
		$user = $booking->login_user($email,$password);
		if ($user) {

			$_SESSION['username'] = $user;
			$_SESSION['email'] = $email;
			$_SESSION['pwd'] = $password;
			
			header("Location: homepage.php");

			// session_write_close();
		}else {
			$msg = '<div class="alert alert-danger" role="alert">Login failed</div>';
		}
	}


}





?>


<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title></title>

		<link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="bootstrap/dist/css/bootstrap.css">

		<style type="text/css">

			*{
				margin: 0;
				padding: 0;
				box-sizing: border-box;
				font-family: 'Raleway', sans-serif;
			}

			

			.login_page {

				background-color:#f2f2f2;
				height: 600px;
				display: flex;
			   flex-direction: row;
			   flex-wrap: wrap;
			   justify-content: center;
			   align-items: center;

			}

			.myForm {
				background-color: hsl(0, 0%, 100%);
				height: 500px;
				width: 50%;
			}



			.myForm h3 {
				padding-top: 7%;
				padding-left: 30%;
				padding-bottom: 1%;
				font-weight: bolder;
			}
	 input[type=email],input[type=password] {
				width: 55%;
				margin-left: 20%;
				font-size: 20px;
			}

			form label {
				padding-left: 20%;
				font-weight: bolder;
			}


			.btn-secondary {
				width: 55%;
				height: 40px;
				margin-left: 20%;
				border: 2px solid ##e6e600;
				font-weight: bolder;
			}
		

			.next_action {

				padding-left: 20%;
				padding-top: 2%;
				font-size: 20px;
			}

			@media screen  and (max-width: 576px){

				.login_page {
					height: 450px;
				}

				.myForm {
					width: 90%;
					height: 350px;
					margin-top: -10%;
				}

				.myForm h3 {
					padding-left: 15%;
					font-size: 17px;
					font-weight: bold;
				}

				 input[type=email],input[type=password] {
							width: 70%;
							margin-left: 15%;
							font-size: 16px;
				}

				.btn-secondary {
					width: 70%;
					height: 40px;
					margin-left: 15%;
					border: 2px solid ##e6e600;
					font-weight: bolder;
				}

				.next_action{
					padding-left: 12%;
				}

				form label {
					padding-left: 15%;
				}
			}
			
			



		</style>

	</head>

	<body>
		
			<div class="container-fluid login_page">
				
				<div class="myForm">
					<?php

						if (isset($msg)) {
							echo $msg;
						}

					?>
					<h3>LOGIN</h3>
					<form method="post" action="login.php">

					<div class="form-group">
					   <label>Email address</label>
					   <input type="email" name="email" class="form-control" aria-describedby="emailHelp" placeholder="Email" data-toggle="tooltip" data-placement="top" title="Email">
					 </div>
					  
					    

					  <div class="form-group">
					    <label for="exampleInputPassword1">Password</label>
					    <input type="password" name="pwd" class="form-control" id="exampleInputPassword1" placeholder="Password" required="required" data-toggle="tooltip" data-placement="top" title="Password">
					  </div>

					 
					  <button type="submit" name="loginBtn" class="btn btn-secondary" style="background-color:#e6e600; color:#ffffff; font-weight: bolder; font-size: 20px;">Login</button>

					  <p class="next_action">Forget Password?<a href="reset_user_email.php">Click Here</a></p>

					</form>
				</div>

			</div>


		<?php include("footer.php"); ?>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script type="text/javascript" src="bootstrap/dist/js/bootstrap.js"></script>

	</body>
</html>