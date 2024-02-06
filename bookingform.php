<?php

require("functions.php");
$booking = new Booking();

$msg = "";

$values = "";

if (isset($_POST['booking'])) {

	$intention = $_POST['intention'] ?? "";
	$package = $_POST['package'] ?? "";
	$fullname = strip_tags($_POST['fullname']) ?? "";
	$contact = trim($_POST['contact']) ?? "";
	$location = strip_tags($_POST['location']) ?? "";
	$experience = $_POST['experience'] ?? "";
	

	$studentArray = [

		'intention' => $intention,
		'package' => $package,
		'fullname' => $fullname,
		'contact' => $contact,
		'location' => $location,
		'experience' => $experience

		];

			// send email
			$booked_user = $booking->registerApplicant($studentArray);
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



?>


<div class="container booking_form">
					<?php

					if (isset($msg)) {
						echo $msg;
					}

					?>
					<h3>Register Now</h3>
					<form method="post">

						<div class="form-row">
							<div class="col">
								<div class="form-group">
					   <label>Do you intend to register the cause<span style="color: red; font-size: 20px;margin-left: 5%;">*</span></label>
					   <select class="form-control" name="intention">
					      <option>Select</option>
					      <option value="yes">Yes</option>
					      <option value="no">No</option>
					     
					    </select>

					
					 </div>
							</div>

							<div class="col">
								 <div class="form-group">
					    <label>Course Package<span style="color: red; font-size: 20px;margin-left: 5%;">*</span></label>
					    <select class="form-control" name="package" id="events" data-toggle="tooltip" data-placement="top" title="select event">
					         <option>Select</option>
					         <option>platinum</option>
					         <option>Gold</option>
					         <option>Diamond</option>
					     </select>
					  </div>
							</div>
							
						</div>

						<div class="form-row">
							<div class="col">
								 <div class="form-group">
					   <label>FullName<span style="color: red; font-size: 20px;margin-left: 5%;">*</span></label>
					  <input class="form-control" name="fullname" type="text" placeholder="FullName"  required="required"
					  data-toggle="tooltip" data-placement="top" title="date">
					 </div>
							</div>

							<div class="col">
								 <div class="form-group">
				   <label>Contact<span style="color: red; font-size: 20px;margin-left: 5%;">*</span></label>
				    <input class="form-control" name="contact" type="text" placeholder="Contact"  required="required"
					 
				   data-toggle="tooltip" data-placement="top" title="guest list"></textarea> 
				 </div>
							</div>
							
						</div>

						 
						<div class="form-row">
							<div class="col">
								 <div class="form-group">
				   <label>Location<span style="color: red; font-size: 20px;margin-left: 5%;">*</span></label>
				    <input class="form-control" name="location" type="text" placeholder="Location"  required="required"
					  data-toggle="tooltip" data-placement="top" title="date">
				 
				 </div>
							</div>

							<div class="col">
								 <div class="form-group">
					    <label>Do you have experience in Forex<span style="color: red; font-size: 20px;margin-left: 5%;">*</span></label>
					    <select class="form-control" name="experience" id="events" data-toggle="tooltip" data-placement="top" title="select event">
					         <option>Select</option>
					         <option value="yes">Yes</option>
					         <option value="no">No</option>
					         <!-- <option>Diamond</option> -->
					     </select>
					  </div>
							</div>
							
						</div>
					 
					        
					

					<button type="submit" name="booking" class="btn btn-default">Register Now</button>
					</form>
					
				</div>

