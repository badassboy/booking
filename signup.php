<?php

require("functions.php");
$ch = new Church();

$msg = "";

if (isset($_POST['submit'])) {

	$username = $_POST['username'];
	$email = $_POST['email'];
	$tel = $_POST['tel'];
	$password = $_POST['password'];

	if (empty($username) || empty($email) || empty($tel) || empty($password)) {
		
		$msg = "fields required";
	}else {

		$registered_user = $ch->registerUser($username,$email,$tel,$password);
		if ($registered_user) {
			$msg = "registration successful";
		}else {
			$msg = "registration failed";
		}
	}

	
}




?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">

		.register {


				background-color:#f2f2f2;
				height: 600px;
					display: flex;
				   flex-direction: row;
				   flex-wrap: wrap;
				   justify-content: center;
				   align-items: center;
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
		}

		form label {
			padding-left: 30%;
		}

		.btn-secondary {
			width: 40%;
			height: 40px;
			margin-left: 30%;
			border: 2px solid #47d147;
			font-weight: bolder;
			font-size: 20px;
		}



				





	</style>
</head>
<body>

	<?php include("navbar.php"); ?>

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
			    <input type="text" name="username" class="form-control" id="usernameInput" placeholder="Enter username" required="required">
			  </div>

			  <div class="form-group">
			      <label for="exampleFormControlInput1">Email address</label>
			      <input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="Enter email" required="required">
			    </div>

			   

			    <div class="form-group">
			      <label for="usernameInput">Telephone</label>
			      <input class="form-control" name="tel" type="tel" id="example-tel-input" placeholder="telephone" required="required">
			    </div>
			    

			  <div class="form-group">
			    <label for="exampleInputPassword1">Password</label>
			    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required="required">
			  </div>



			 

			
			  <input type="submit" name="submit" class="btn btn-secondary" value="Register" style="background-color:#47d147;">
			</form>
		</div>
		
	</div>
	<?php include("footer.php"); ?>





</body>
</html>