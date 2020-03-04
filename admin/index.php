<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once("../functions.php");
$ch = new Booking();

$info = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {


	$email = trim($_POST['email']);
	$pwd = trim($_POST['pwd']);
	
	if (!empty($email) || !empty($pwd)) {

		$user = $ch->loginAdmin($email,$pwd);
		if ($user) {
			$_SESSION['email']=$email;
			$_SESSION['adimn_pass']=$pwd;
			header("Location: homepage.php");
		}else{
			$info = '<div class="alert alert-danger" role="alert">Login failed</div>';
		}

	}else {

		$info = '<div class="alert alert-danger" role="alert">Fields Required</div>';	
		
		

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

	<!-- custom google font -->
	<link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">
</head>
<body>

<!-- login page here -->
	<div class="container-fluid auth_page">

		<h3>Admin Login</h3>
		
			    <div class="second">
			    	<?php

			    	if (isset($info)) {
			    		echo $info;
			    	}

			    	?>
			    	<form method="post" action="index.php">
			    		
			    	  <div class="form-group">
			    	      <label>Email address</label>
			    	      <input type="email" name="email" class="form-control" placeholder="Email" 
			    	      data-toggle="tooltip" data-placement="top" title="Email">
			    	      
			    	    </div>

			    	  <div class="form-group">
			    	    <label>Password</label>
			    	    <input type="password" name="pwd" class="form-control"  placeholder="Password" required="required" data-toggle="tooltip" data-placement="top" title="Password">
			    	  </div>

			    	  

			    	 <input type="submit" name="login" class="default" value="Login">

			    	  <br>
			    	  <p class="next">Forget Password?<a href="reset_email.php" style="font-weight: bolder; color: #000000; ">Click Here</a></p>
			    	</form>
			    </div>

			


		


	</div>





<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript" src="../bootstrap/dist/js/bootstrap.min.js"></script>

</body>
</html>