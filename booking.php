

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	  <meta name="description" content="">
	
	<title></title>
	<link rel="stylesheet" type="text/css" href="bootstrap/dist/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.css">
	<link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">

	
</head>
<body>

	<div class="container-fluid wrapper">

		<div class="jumbotron jumbotron-fluid">
		  <div class="container">
		    <!-- <h1 class="display-4">STAY IN THE CITY</h1> -->
		  </div>
		</div>

		<div class="container-fluid booking_div">

			<?php include("bookingform.php"); ?>

			</div>
			
	</div>
		   
					   


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript" src="bootstrap/dist/js/bootstrap.js"></script>

<script type="text/javascript">
	
	// ajax for displaying event names
	$(document).ready(function(){

	      $.ajax({
	        url:"eventajax.php",
	        type:"get",
	        dataType:"JSON",
	        success:function(response){
	          // console.log(response);
	          // here rather
	            var len = response.length;
	            for (var i = 0; i < len; i++) {


	                var events = response[i]["all_event"];

	                var option_string = "<option>" + events + "</option>";

	                 $("#events").append(option_string);

	               
	            }
	        },
	        error:function(response){
	            console.log("Error: "+ response);
	        }
	      });

	});


	
</script>


</body>
</html>