<?php
session_start();
include("functions.php");
$ch = new Church();

$msg = "";
if (isset($_POST['loginBtn'])) {
	
	$username = $_POST['username'];
	
	$password = $_POST['pwd'];

	if (empty($username) || empty($password)) {
		$msg = "fields required";
	}else{
		$user = $ch->login_user($username,$password);
		if ($user) {

			$_SESSION['username'] = $user;
			
			header("Location: members_page.php");

			session_write_close();
		}
	}


}





?>


<html>
	<head>
		<title></title>

		<style type="text/css">

			

			.login_page {

				background-color:#f2f2f2;
				height: 600px;
				display: flex;
			   flex-direction: row;
			   flex-wrap: wrap;
			   justify-content: center;
			   align-items: center;

				/*background-color: yellow;*/
			}

			.myForm {
				background-color: hsl(0, 0%, 100%);
				height: 500px;
				width: 50%;
			}



			.myForm h3 {
				text-align: center;
				padding-top: 10%;
				font-weight: bolder;
			}

			 input[type=text],input[type=password] {
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

			.next_action {

				padding-left: 30%;
				padding-top: 2%;
				font-size: 20px;
			}
			
			



		</style>

	</head>

	<body>

		<?php include("navbar.php"); ?>

			<div class="container-fluid login_page">
				
				<div class="myForm">
					<?php

						if (isset($msg)) {
							echo $msg;
						}

					?>
					<h3>LOGIN</h3>
					<form method="post" action="">

					  <div class="form-group">
					    <label for="usernameInput">Username</label>
					    <input type="text" name="username" class="form-control" id="usernameInput"  placeholder="Enter username" required="required">
					  </div>
					    

					  <div class="form-group">
					    <label for="exampleInputPassword1">Password</label>
					    <input type="password" name="pwd" class="form-control" id="exampleInputPassword1" placeholder="Password" required="required">
					  </div>

					 
					  <button type="submit" name="loginBtn" class="btn btn-secondary" style="background-color:#47d147;">Login</button>

					  <p class="next_action">Dont have an account ?<a href="signup.php">Register</a></p>

					</form>
				</div>

			</div>


		<?php include("footer.php"); ?>

	</body>
</html>