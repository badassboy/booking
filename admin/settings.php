<?php

session_start();


ini_set('display_errors', 1);
error_reporting(E_ALL);

require("../functions.php");
$ch = new Church();

$msg = "";
$info = "";

if (isset($_POST['add'])) {
	
	$username =trim($_POST['username']);
	$password =trim($_POST['password']);

	if (!empty($username) || !empty($password)) {

		$user = $ch->addChurchAdmin($username,$password);
		if ($user) {
			$msg = "added successfully";
		}else{
			$msg = "error occured";
		}
		
	}
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title></title>
	<link rel="stylesheet" type="text/css" href="../bootstrap/dist/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/settings.css">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="../font-awesome/css/font-awesome.css">
</head>
<body>

	<div class="container-fluid top">

		<div class="container-fluid first">
			<h1>Settings</h1>
		</div>

		<div class="container-fluid main">

			<div class="container inside">
				<div class="row">

	   <div class="col-4 left">
	   	<ul class="list-group">
	   	  <li class="list-group-item">
	   	  	<button type="button" id="addButton">Add Admin</button>
	   	  </li>

	   	  <li class="list-group-item">
	   	  	<button type="button" id="changeButton">Change Password</button>
	   	  </li>

	   	  <li class="list-group-item">
	   	  	<button type="button" id="allBtn">All Admin</button>
	   	  </li>

	   	  	
	   	</ul>

	   </div>
				   	  


			   <div class="col-8 right">


			   	<form method="post" id="addUser" style="display:none;">

			   		<?php

			   		if (isset($msg)) {
			   			echo $msg;
			   		}


			   		?>

			   	  <div class="form-group">
			   	    <label for="usernameInput">Username</label>
			   	    <input type="text" name="username" class="form-control" id="usernameInput" required="required"
			   	    placeholder="username">
			   	  </div>
			   	    
			   	  <div class="form-group">
			   	    <label for="exampleInputPassword1">Password</label>
			   	    <input type="password" name="password" class="form-control" id="exampleInputPassword1" required="required" placeholder="password">
			   	  </div>

			   	  <div class="form-group row">

			   	  <button type="submit" name="add" class="btn btn-primary">Add User</button>

			   	  <button type="submit" class="default" id="delete">Discard</button>
			   	  	
			   	  </div>
			   	</form>

			   	<!-- end of add user form -->

			   	<!-- change password form -->
			   	<form method="post" id="changePassword"  style="display: none;">
			   	<P id="response">
			   			<?php

			   		

					   		if (isset($_SESSION['response'])) {
					   			echo $_SESSION['response'];
					   			unset( $_SESSION['response']);
		
					   		}




			   		?>
			   	</P>

			   	  <div class="form-group">
			   	    <label>New Password</label>
			   	    <input type="password" name="pwd1" class="form-control" required="required" id="mypass"
			   	    placeholder="New Password">
			   	  </div>

			   	  <div class="form-group">
			   	    <label>Confirm Password</label>
			   	    <input type="password" name="pwd2" class="form-control" required="required" id="yourpass" 
			   	    placeholder="Confirm Password">
			   	  </div>
			   	    

			   	  <div class="form-group row">

			   	  <input type="submit" name="change" id="change" value="Change Password">

			   	  <button type="submit" class="default" id="discard">Discard</button>

			   	  </div>
			   	</form>
			   	<!-- change password form -->

			   	<!-- all users table -->

			   	<table class="table" id="table" style="display: none;">

			   	  <thead>
			   	    <tr>
			   	      <th scope="col">Action</th>
			   	      <th scope="col">Username</th>
			   	      <th scope="col">FullName</th>
			   	      <th scope="col">Email Address</th>
			   	      <th scope="col">Date</th>
			   	    </tr>
			   	  </thead>

			   	  <tbody>
			   	    <tr>
			   	      <th scope="row"><i class="fa fa-trash" aria-hidden="true"></i></th>
			   	      <td>Mark</td>
			   	      <td>Otto</td>
			   	      <td>@mdo</td>
			   	      <td>@mdo</td>
			   	    </tr>

			   	    <tr>
			   	      <th scope="row"><i class="fa fa-trash" aria-hidden="true"></i></th>
			   	      <td>Jacob</td>
			   	      <td>Thornton</td>
			   	      <td>@fat</td>
			   	      <td>@fat</td>
			   	    </tr>

			   	    <tr>
			   	      <th scope="row"><i class="fa fa-trash" aria-hidden="true"></i></th>
			   	      <td>Larry</td>
			   	      <td>the Bird</td>
			   	      <td>@twitter</td>
			   	      <td>@twitter</td>
			   	    </tr>

			   	    <tr>
			   	    	<td></td>
			   	    	<td></td>
			   	    	<td></td>
			   	    	<td></td>
			   	    	<td><button type="button" id="clear">Clear</button></td>
			   	    </tr>
			   	  

			   	  </tbody>




			   	</table>

			   	<!-- end of table -->
			   	  	

			   </div>

				 </div>
			</div>

		</div>

	</div>
			
			


	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script type="text/javascript">

		$(document).ready(function(){
			$("#addButton").click(function(){
				$("#changePassword").fadeOut();
				$("#addUser").fadeToggle("slow");
			})

		});


		$(document).ready(function(){
			$("#delete").click(function(){
				$("#addUser").remove();
			})

		});


		$(document).ready(function(){
			$("#changeButton").click(function(){
				$("#addUser").fadeOut();
				$("#changePassword").fadeToggle("slow");
			})

		});


		$(document).ready(function(){
			$("#discard").click(function(){
				$("#changePassword").remove();
			})

		});

		$(document).ready(function(){
			$("#allBtn").click(function(){
				$("#table").show();
			})
		});

		$(document).ready(function(){
			$("#clear").click(function(){
				$("#table").remove();
			})
		})


		$(document).ready(function(){

	         $('#change').on('click',function(e){
	 
	            e.preventDefault();
	 
	            var pass1 =  $("#mypass").val();
	            var pass2 = $("#yourpass").val();
	 
	            var dataString = "password_one =" + pass1 + "password_two = " + pass2;
	 
	            if (window.XMLHttpRequest) 
				{
				// code for IE7+, Firefox, Chrome, Opera, Safari
				xmlhttp=new XMLHttpRequest();
				} 
				else 
				{  // code for IE6, IE5
				xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
				}
				xmlhttp.onreadystatechange=function() 
				{
				if (this.readyState==4 && this.status==200) 
				{
				//msgbox
				var response=this.responseText;
				$("#response").html(response);
				 
				}
				}
				 
				xmlhttp.open("POST","try.php?pwd1="+pass1+"&pwd2="+pass2, true);
				xmlhttp.send(); 
	 
	        });

	     });


	</script>

<script type="text/javascript" src="../bootstrap/dist/js/bootstrap.min.js"></script>

</body>
</html>

