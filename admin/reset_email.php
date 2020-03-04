

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

		input[type=email]{
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

		@media screen and (max-width: 576px){

			.forget {
				height: 350px;
			}

			.email_form {
				width: 80%;
				height: 250px;
			}

			.forget h3 {

				padding-bottom: 3%;
				font-size: 18px;
			
			}

			input[type=email]{
				width: 90%;
				margin-left: 2%;
			}

			.default {
				width: 90%;
				margin-left: 2%;
			}
		}


	</style>
</head>
<body>

	<div class="container-fluid forget">
			<h3>Enter Email</h3>

		<div class="container-fluid email_form">
			<form method="post"  action="send_link.php">
			  <div class="form-group">
			    <label>Email address</label>
			    <input type="email" name="email" class="form-control" placeholder="Email" required="required">
			   
			  </div>
			  <button type="submit" name="send_email" class="default">Submit</button>

			</form>
			
		</div>
		
	</div>


	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script type="text/javascript" src="../bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>