<?php

require("../functions.php");
$ch = new Church();



?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<title></title>
	<!-- Custom fonts for this template-->
	<link rel="stylesheet" type="text/css" href="../bootstrap/dist/css/bootstrap.css">
	<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300&display=swap" rel="stylesheet">

	<style type="text/css">
		body {

			background-color:#e8e8e8;
		}
		.wrapper{
			background-color:#e8e8e8;
			height: 500px;
			padding-top: 1%;
		}

		.top{
			background-color:#ffffff;
			height: 70px;
			margin-bottom: 2%;
		}

		.members{
			background-color:#ffffff;
			height: 400px;
		}

		header {
			padding-top: 1%;
			padding-left: 1%;
		}
		
	</style>
</head>
<body>

	<div class="container-fluid wrapper">

		<div class="container-fluid top">

			<nav class="navbar navbar-expand-lg navbar-light">
			  <!-- <a class="navbar-brand" href="#">Navbar</a> -->
			  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			    <span class="navbar-toggler-icon"></span>
			  </button>

			  <div class="collapse navbar-collapse" id="navbarSupportedContent">
			    <ul class="navbar-nav mr-auto">

			    <!--   <li class="nav-item active">
			        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
			      </li> -->

			      <li class="nav-item">
			        <a class="nav-link" href="#">
			        	<span>5</span>
			        Members
			    </a>
			      </li>
			    </ul>

			    <form class="form-inline my-2 my-lg-0">
			    	
			    </form>

			  </div>
			</nav>	
			<!-- end of navbar -->

		
		</div>
		<!-- end of top -->

		<div class="members container-fluid">
			<header>Group Members</header>
			<!-- displaying group members here -->
			<?php

				// code yet to be tested.
			// $id = $_GET['test'];
			// echo $ch->displayGroupMembers($id);

			?>




		</div>


			
	</div>



  <script src="vendor/jquery/jquery.min.js"></script>
<script type="text/javascript" src="../bootstrap/dist/js/bootstrap.js"></script>

	

</body>
</html>