<?php

session_start();
session_unset();

$_SESSION['id'] = "";

ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once("../functions.php");
$ch = new Church();

$info = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {


	$email = trim($_POST['email']);
	$pwd = trim($_POST['pwd']);
	
	if (!empty($email) || !empty($pwd)) {

		$user = $ch->loginAdmin($email,$pwd);
		if ($user) {
			
			header("Location: homepage.php");
			// return;
		}else{
			$info = "login failed";
		}

	}else {

		$info = "fields are required";	
		
		

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
	<link rel="stylesheet" type="text/css" href="css/admin-index.css">
</head>
<body>


	<div class="container-fluid auth_page">

		<header>
			<h1>ADMIN LOGIN</h1>
		</header>


				
			 

			    	<h3>LOGIN HERE</h3>
			    <div class="second">
			    	
			    	<form method="post" action="index.php">
			    		<?php

			    		if (isset($info)) {
			    			echo $info;
			    		}

			    		?>
			    	  <div class="form-group">
			    	      <label for="exampleInputEmail1">Email address</label>
			    	      <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email">
			    	      
			    	    </div>

			    	  <div class="form-group">
			    	    <label for="exampleInputPassword1">Password</label>
			    	    <input type="password" name="pwd" class="form-control" id="exampleInputPassword1" placeholder="Password" required="required">
			    	  </div>

			    	  

			    	 <input type="submit" name="login" class="default" value="Login">

			    	  <br>
			    	  <p class="next">Not Registered?<a href="admin-signup.php" style="color: #009933;"> Register Now</a></p>
			    	</form>
			    </div>

			


		


	</div>





<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript" src="../bootstrap/dist/js/bootstrap.min.js"></script>

</body>
</html>