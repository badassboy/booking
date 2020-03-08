<?php

require("functions.php");
$booking = new Booking();

$msg = "";

$values = "";

if (isset($_POST['booking'])) {

	$event_name = $_POST['event_name'];
	$event_date = $_POST['cal_date'];
	$guest = $_POST['guest'];
	

	if (empty($event_name) || empty($event_date) || empty($guest)) {
		
		$msg = "fields required";
	}else {

			// send email
			$booked_user = $booking->createEvent($event_name,$event_date,$guest);
			if ($booked_user) {

					$msg = '<div class="alert alert-success" role="alert">Booking successful</div>';


				// $email_sent = $booking->sendEmail($event_name,$event_date,$guest);
				// if ($email_sent) {
				// 	$msg = '<div class="alert alert-success" role="alert">Booking successful</div>';
					
				// }else {
				// 	$msg = '<div class="alert alert-danger" role="alert">Booking failed</div>';
				// }
			}else {

					$msg = '<div class="alert alert-warning" role="alert">Booking successful</div>';
			}

		
	}

	
}



?>

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

			<div class="container booking_form">
					<?php

					if (isset($msg)) {
						echo $msg;
					}

					?>
					<h3>Book Now</h3>
					<form method="post">

					  <div class="form-group">
					    <label>Event<span style="color: red; font-size: 20px;margin-left: 5%;">*</span></label>
					    <select class="form-control" name="event_name" id="events" data-toggle="tooltip" data-placement="top" title="select event">
					         <option>Select</option>
					     </select>
					  </div>
					        
					 <div class="form-group">
					   <label>Date<span style="color: red; font-size: 20px;margin-left: 5%;">*</span></label>
					  <input class="form-control" name="cal_date" type="date"  required="required"
					  data-toggle="tooltip" data-placement="top" title="date">
					 </div>

					
				 <div class="form-group">
				   <label>Guests<span style="color: red; font-size: 20px;margin-left: 5%;">*</span></label>
				   <textarea class="form-control" name="guest" placeholder="Guest"
				   data-toggle="tooltip" data-placement="top" title="guest list"></textarea>
				 </div>
				 

					  <button type="submit" name="booking" class="btn btn-default">Book Now</button>
					</form>
					
				</div>
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