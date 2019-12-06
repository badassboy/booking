<?php

require("functions.php");
$ch =  new Church;
$msg = "";

if (isset($_POST['submit'])) {
	
	$name = trim($_POST['usernameInput']);
	$email = trim($_POST['email']);
	$message = trim($_POST['textarea']);



	if (empty($name) || empty($email) || empty($message)) {
		$msg = "fields required";
	}else {
		$send = $ch->contactUs($name,$email,$message);
		if ($send) {
			$msg = "message sent";
		}else{
			$msg = "failed";
		}
	}
}

?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/about.css">
</head>
<body>

	<?php include("navbar.php"); ?>

	<div class="container-fluid about">
		
		<article>
		<h1>ABOUT US</h1>
		<p class="explain">Church Affairs Management Software (CAMS) is a cloud based church management system that gives power to General Overseers, Church Administrators, Leaders and top management members to manage every area of the church efficiently in a stressfree and friendly manner. It comes with features that are user friendly and reduces the time spent in executing or performing routines that pertain to the basic and sometimes complex day to day running of the church. With CAMS, you have total control over the management of members/ guests, managing the general financial operations, proper management of events and timely presentation of reports for timely management decisions to be made.</p>
		</article>


		<article>
			<h2>Story Behind</h2>
			<p class="explain">The modern-day church is a church which is currently burdened with so much challenges. Issues of managing, retaining and growing its’ numbers (various denominations) to the issues of keeping proper financial records, managing assets and managing the events calendar, loss of huge volumes of information due to systems crashing, fire outbreaks, theft etc.


The church is often faced with the challenge of how to overcome these challenges and more. Having carefully studied these challenges and the way they affect (the church) in diverse ways. One of such challenges is the cost involved in the putting in place the requisite infrastructure to have a church with several branches in different geographical locations (either a LAN or WAN). CAMS was developed as a one stop solution to help manage the activities of church operations irrespective of location. The major requirement to get CAMS operational for a church is internet connectivity.</p>
		</article>

		<div class="container-fluid contact_div">
			
			<?php

				if (isset($msg)) {
					echo $msg;
				}

			?>

			<h3>Contact Us</h3>
			

			<form method="post">

				<div class="form-group row">
				  <label for="usernameInput" class="label_one">FullName</label>
				  <div class="col-sm-10">
				    <input type="text" name="usernameInput" class="form-control" id="usernameInput"  placeholder="FullName" required="required">
				  </div>
				</div>


			  <div class="form-group row">
			    <label for="exampleInputEmail1">Email address</label>
			    <div class="col-sm-10">
			      <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" required="required">
			    </div>
			  </div>


			  <div class="form-group row">
			    <label>Message</label>
			    <div class="col-sm-10">
			      <textarea class="form-control" name="textarea" id="exampleFormControlTextarea1" rows="3" placeholder="Your Message" required="required"></textarea>
			    </div>
			  </div>

			  <!-- <button type="submit" name="submit" class="default">Submit</button> -->
			  <input type="submit" name="submit" class="default" value="Submit">


			 

			</form>
			
		</div>
			
		
	</div>

	<?php include("footer.php"); ?>




</body>
</html>