<?php

require("functions.php");
$booking = new Booking();

$msg = "";

if (isset($_POST['submit'])) {

	$username = $_POST['username'];
	$email = $_POST['email'];
	$tel = $_POST['tel'];
	$password = $_POST['password'];

	if (empty($username) || empty($email) || empty($tel) || empty($password)) {
		
		$msg = "fields required";
	}else {

		$registered_user = $booking->registerUser($username,$email,$tel,$password);
		if ($registered_user) {
			header("Location: homepage.php");
		}else {
			$msg = '<div class="alert alert-danger" role="alert">signup failed</div>';
			
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

	<link rel="stylesheet" type="text/css" href="bootstrap/dist/css/bootstrap.css">
	<link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">

	<style type="text/css">

		*{
			margin: 0;
			padding: 0;
			box-sizing: border-box;
			font-family: 'Raleway', sans-serif;
		}

		.register {


				background-color:#f2f2f2;
				height: 700px;
				display: flex;
			   flex-direction: row;
			   flex-wrap: wrap;
			   justify-content: center;
			   align-items: center;
			   font-family: 'Raleway', sans-serif;
		}

		.registration {
				height: 600px;
			   background-color:hsl(0, 0%, 100%);
			   width: 50%;
		}

		.registration h3 {
			text-align: center;
			padding-top: 10%;
			font-weight: bolder;
		}

		 input[type=text],input[type=password],input[type=email],input[type=tel] {
			width: 40%;
			margin-left: 30%;
			font-size: 17px;
		}

		form label {
			padding-left: 30%;
			font-weight: bolder;
		}

		.btn-default {
			width: 40%;
			height: 40px;
			margin-left: 30%;
			background-color: #e6e600;
			color: #ffffff;
			font-weight: bolder;
			font-size: 20px;
		}

		.next_action{
			padding-left: 31%;
			padding-top: 2%;
			font-size: 17px;
		}

		@media screen and (max-width: 576px){

			.registration {
				width: 80%;
				height: 530px;
			}

			.registration h3 {
				margin-left: -49%;
			}

			 input[type=text],input[type=password],input[type=email],input[type=tel] {
				width: 70%;
				margin-left: 15%;
				font-size: 17px;
			}


			form label {
				padding-left: 15%;
				font-weight: bolder;
			}

			.btn-default {
				width: 70%;
				margin-left: 15%;
				
			}

			


		}



				





	</style>
</head>
<body>

	<div class="container-fluid register">

		<div class="registration">
			<?php

			if (isset($msg)) {
				echo $msg;
			}


			?>
			<h3>SIGNUP</h3>
			<form method="post" action="">

			  <div class="form-group">
			    <label for="usernameInput">Username</label>
			    <input type="text" name="username" class="form-control" id="usernameInput" placeholder="Enter username" required="required"  data-toggle="tooltip" data-placement="top" title="Username">
			  </div>

			  <div class="form-group">
			      <label for="exampleFormControlInput1">Email address</label>
			      <input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="Enter email" required="required"  data-toggle="tooltip" data-placement="top" title="Email">
			    </div>

			   

			    <div class="form-group">
			      <label for="usernameInput">Telephone</label>
			      <input class="form-control" name="tel" type="tel" id="example-tel-input" placeholder="telephone" required="required"  data-toggle="tooltip" data-placement="top" title="telephone">
			    </div>
			    

			  <div class="form-group">
			    <label for="exampleInputPassword1">Password</label>
			    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required="required"  data-toggle="tooltip" data-placement="top" title="Paasword">
			  </div>

			  <input type="submit" name="submit" class="btn-default" value="Register">

				<p class="next_action">Already registerd?<a href="login.php">Login</a></p>



			 

			
			</form>
		</div>
		
	</div>
	<?php include("footer.php"); ?>




	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script type="text/javascript" src="bootstrap/dist/js/bootstrap.js"></script>
</body>
</html>