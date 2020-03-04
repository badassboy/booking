<?php
session_start();
ini_set('display_errors', 1);
error_reporting(E_ALL);

require("database.php");




class Booking{


	//is this working?
	// yes but something else
	public function registerUser($username,$email,$tel,$pass){

		$dbh = DB();

		// removing unwanted characters including blank space
		$sanitized_email = filter_var($email,FILTER_SANITIZE_EMAIL);
		// validating to check for right email address
		$valid_email =  filter_var($sanitized_email,FILTER_VALIDATE_EMAIL);

		if (!$valid_email) {
			return false;
		}elseif (!ctype_alpha($username)) {
			return false;
		}elseif (strlen($tel) < 10 && (!ctype_digit($tel))) {
			return false;
		}else {

			// if all validations are met,proceed
			$stmt = $dbh->prepare("SELECT * FROM users WHERE email = ?");
			$stmt->execute([$valid_email]);
			$user = $stmt->fetch(PDO::FETCH_ASSOC);
			if ($user >  0) {
				return false;
			}else {


				$hashed = password_hash($password,PASSWORD_BCRYPT);
				$stmt = $dbh->prepare("INSERT INTO users(username,email,mobile,password) VALUES(?,?,?,?)");
				$stmt->execute([$username,$valid_email,$tel,$hashed]);
				$inserted = $stmt->rowCount();
				if ($inserted>0) {
					return true;
				}else {
					return $dbh->errorInfo();
				}
				
			}


		}

		

		
}

	public function login_user($email,$password){

		$dbh = DB();
		$stmt = $dbh->prepare("SELECT id,email,password FROM users WHERE email = ?");

		$stmt->execute([$email]);
		$data = $stmt->fetch(PDO::FETCH_ASSOC);
		$count = $stmt->rowCount();
		if ($count == 1) {
			
			if (password_verify($password, $data['password'])) {
				$_SESSION['id'] = $data['id'];
				return true;
			}else{
				return false;
			}
			
		}else{
			return false;
		}
		
	}
			








			
// this is the signup code to register user

	function registerAdmin($username,$email,$tel,$password){
		
		$dbh = DB();

		// removing unwanted characters including blank space
		$sanitized_email = filter_var($email,FILTER_SANITIZE_EMAIL);
		// validating to check for right email address
		$valid_email =  filter_var($sanitized_email,FILTER_VALIDATE_EMAIL);

		if (!$valid_email) {
			return false;
		}elseif (!ctype_alpha($username)) {
			return false;
		}elseif (strlen($tel) < 10 && (!ctype_digit($tel))) {
			return false;
		}else {

			// if all validations are met,proceed
			$stmt = $dbh->prepare("SELECT * FROM admin WHERE email = ?");
			$stmt->execute([$valid_email]);
			$user = $stmt->fetch(PDO::FETCH_ASSOC);
			if ($user >  0) {
				return false;
			}else {


				$hashed = password_hash($password,PASSWORD_BCRYPT);
				$stmt = $dbh->prepare("INSERT INTO admin(username,email,telephone,password) VALUES(?,?,?,?)");
				$stmt->execute([$username,$valid_email,$tel,$hashed]);
				$inserted = $stmt->rowCount();
				if ($inserted>0) {
					return true;
				}else {
					return $dbh->errorInfo();
				}
				
			}


		}


		
	}

		// login function here
		public function loginAdmin($email,$password){

		$dbh = DB();
		$stmt = $dbh->prepare("SELECT id,email,password FROM admin WHERE email = ?");

		$stmt->execute([$email]);
		$data = $stmt->fetch(PDO::FETCH_ASSOC);
		$count = $stmt->rowCount();
		if ($count == 1) {
			
			if (password_verify($password, $data['password'])) {
				$_SESSION['id'] = $data['id'];
				return true;
			}else{
				return false;
			}
			
		}else{
			return false;
		}
		
	}

	


	public function createEvent($event_name,$event_date,$guest)
	{	

		$dbs = DB();
		
		$stmt = $dbs->prepare("INSERT INTO booked(event_name,event_date,guest) 
			VALUES(?,?,?)");
		$stmt->execute([$event_name,$event_date,$guest]);
		$inserted = $stmt->rowCount();
		if ($inserted>0) {
			return true;
		}else {
			return $dbs->errorInfo();
		}
	}


	public function addEventPromoter($event_name,$promoter)
	{	

		$dbs = DB();
		
		$stmt = $dbs->prepare("INSERT INTO eventpromote(event,promoter) 
			VALUES(?,?)");
		$stmt->execute([$event_name,$promoter]);
		$inserted = $stmt->rowCount();
		if ($inserted>0) {
			return true;
		}else {
			return $dbs->errorInfo();
		}
	}

	public function generateCSV(){
		$dbh = DB();
		header('Content-Type: text/csv');
		header('Content-Disposition: attachment; filename="booking.csv"');

		$csv_file = fopen("php://output", 'wb');
		fputcsv($csv_file, array("event","date","promoter","guest"));
		$stmt = $dbh->prepare("SELECT event_name,event_date,promoter,guest FROM booked");
		$stmt->execute();
		while ($rows = $stmt->fetch(PDO::FETCH_ASSOC)) {

			  $rows['guest']=str_replace(",", "\r\n", $rows['guest']);

				fputcsv($csv_file, $rows, ',');
			}
			
		fclose($csv_file);
	}
			


		public function sendEmail($event,$event_date,$guest){
		$to = "papaswagger12@gmail.com";


		$subject = "New Booking";


		$message = "
			<html>
			<head>
			  <title>New Booking for You</title>
			</head>
			<body>
			  <p>Here are the birthdays upcoming in August!</p>
			  <table>

			    <tr>
			      <th>event</th><th>date</th><th>guest</th>
			    </tr>

			    <tr>
			      <td>".$event."</td><td>".$event_date."</td><td>".$guest."</td>
			    </tr>

			  </table>
			</body>
			</html>
		";





		$headers[] = 'MIME-Version: 1.0';
		$headers[] = 'Content-type: text/html; charset=iso-8859-1';
		$headers[] = 'From:webmaster@example.com';

		$email_sent = mail($to, $subject, $message, implode("\r\n", $headers));
		if ($email_sent) {
			return true;
		}else{
			return false;
		}

	}

	// this dunction sends password reset link to the user email
	public function sendLink($email){
			$dbh = DB();

			// validate email
			if (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
				return false;
			}else {

				try{

					// checking if user email already exist in the  system
					$stmt = $dbh->prepare("SELECT email,password FROM admin  WHERE email = ?");
					$stmt->execute([$email]);
					while ($data = $stmt->fetch(PDO::FETCH_ASSOC)) {
						$email = $data['email'];
						$password = password_hash($data['password'], PASSWORD_DEFAULT);

							// generate a unique random token of length 100
						$token = bin2hex(random_bytes(50));
						// generating a salt from the token
						$salt = substr(strtr(base64_encode($token), '+', '.'), 0, 36);


						$stmt = $dbh->prepare("INSERT INTO password_reset(email,token) VALUES(?,?)");
						$stmt->execute([$email,$salt]);
						$count = $stmt->rowCount();
						if ($count>0) {
							
							// // Send email to user with the token in a link they can click on
							$to = $email;
							
							$subject = "Reset your password on examplesite.com";
							
						// $msg = "Hi there, click on below link to reset your password<br> <a href=\"new_password.php?token=" . $token . "\">link</a>";

							$msg = "Click <a href='www.xsoftgh.com/booking/admin/new_password.php?token=$token' >here</a> to reset your password";
									
							   

							  
							   	$headers[] = 'MIME-Version: 1.0';
							   	$headers[] = 'Content-type: text/html; charset=iso-8859-1';

							   
							   $email_sent = mail($to, $subject, $msg, implode("\r\n", $headers));
							   if ($email_sent) {
							   		return true;
							   		header('Location: new_password.php?email=' . $email);
							   }else {
							   	return false;
							   }
						}


					}
				}catch(ErrorException $ex){
					echo "Message: ".$ex->getMessage();
				}

			}
			// end of else
		}

		
			//Reset Admin password 
	public function newPassword($password){
		$dbh = DB();
		$token = "";
		if (isset($_GET['token'])) {
			$token = $_GET['token'];

			$stmt = $dbh->prepare("SELECT email FROM password_reset WHERE token = ?");
			$stmt->execute([$token]);
			while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
				$email = $row['email'];

				if ($email) {
					$new_password = password_hash($password, PASSWORD_DEFAULT);
					$stmt = $dbh->prepare("UPDATE admin SET password = ? WHERE email = ?");
					$stmt->execute([$new_password,$email]);
					$row = $stmt->rowCount();
					if ($row>0) {
						return true;
					}else {
						return false;
					}

				}
			}

		}
	}

	// this dunction sends password reset link to the user email
	public function sendUserLink($email){
			$dbh = DB();

			// validate email
			if (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
				return false;
			}else {

				try{
					// checking if user email already exist in the  system
					$stmt = $dbh->prepare("SELECT email,password FROM users  WHERE email = ?");
					$stmt->execute([$email]);
					while ($data = $stmt->fetch(PDO::FETCH_ASSOC)) {
						$email = $data['email'];
						$password = password_hash($data['password'], PASSWORD_DEFAULT);

							// generate a unique random token of length 100
						$token = bin2hex(random_bytes(50));

						$stmt = $dbh->prepare("INSERT INTO password_reset(email,token) VALUES(?,?)");
						$stmt->execute([$email,$token]);
						$count = $stmt->rowCount();
						if ($count>0) {
							
							// // Send email to user with the token in a link they can click on
							$to = $email;
							
							$subject = "Reset your password on xsoftgh.com";
							
						// $msg = "Hi there, click on below link to reset your password<br> <a href=\"new_password.php?token=" . $token . "\">link</a>";

							$msg = "Click <a href='www.xsoftgh.com/booking/user_new_password.php?token=$token' >here</a> to reset your password";
									
							   

							  
							   	$headers[] = 'MIME-Version: 1.0';
							   	$headers[] = 'Content-type: text/html; charset=iso-8859-1';
							   //	$headers[] = "From: info@examplesite.com";

							   
							   $email_sent = mail($to, $subject, $msg, implode("\r\n", $headers));
							   if ($email_sent) {
							   		return true;
							   		header('Location: user_new_password.php?email=' . $email);
							   }else {
							   	return false;
							   }
						}


					}

				}catch(ErrorException $ex){
					echo "Message: ". $ex->getMessage();
				}
			}
			// end of else
		}	



				//Reset Admin password 
		public function newUserPassword($password){
			$dbh = DB();
			$token = "";
			if (isset($_GET['token'])) {
				$token = $_GET['token'];

				$stmt = $dbh->prepare("SELECT email FROM password_reset WHERE token = ?");
				$stmt->execute([$token]);
				while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
					$email = $row['email'];

					if ($email) {
						$new_password = password_hash($password, PASSWORD_DEFAULT);
						$stmt = $dbh->prepare("UPDATE users SET password = ? WHERE email = ?");
						$stmt->execute([$new_password,$email]);
						$row = $stmt->rowCount();
						if ($row>0) {
							return true;
						}else {
							return false;
						}

					}
				}

			}
		}


				
			
			






			


		




	



	




}



?>