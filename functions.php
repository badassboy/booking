<?php
session_start();
ini_set('display_errors', 1);
error_reporting(E_ALL);

require("database.php");




class Booking{

	


	//is this working?
	// yes but something else
	public function registerUser($username,$email,$password){

		$dbh = DB();

		// removing unwanted characters including blank space
		$sanitized_email = filter_var($email,FILTER_SANITIZE_EMAIL);
		// validating to check for right email address
		$valid_email =  filter_var($sanitized_email,FILTER_VALIDATE_EMAIL);

		if (!$valid_email) {
			return false;
			// checking for correct username input
		}elseif (!ctype_alpha($username)) {
			return false;
			// checking for correct mobile number and it's length
		}

		elseif (strlen($password)<5) {
			return false;
		}else {

			// if all validations are met,proceed
			$stmt = $dbh->prepare("SELECT * FROM users WHERE email = ?");
			$stmt->execute([$valid_email]);
			$user = $stmt->fetch(PDO::FETCH_ASSOC);
			if ($user >  0) {
				return false;
			}else {
				


				$hashed = password_hash($password,PASSWORD_DEFAULT);
				$stmt = $dbh->prepare("INSERT INTO users(username,email,password) VALUES(?,?,?)");
				$stmt->execute([$username,$valid_email,$hashed]);
				$inserted = $stmt->rowCount();
				if ($inserted>0) {
					return true;
				}else {
					return $dbh->errorInfo();
				}
				
			}


		}
}
// end here

		

		



// here is the code
// logs users into the application
		public function login_user($email,$password){

			
				$db = DB();

				// removing unwanted characters including blank space
				$sanitized_email = filter_var($email,FILTER_SANITIZE_EMAIL);
				// validating to check for right email address
				$valid_email =  filter_var($sanitized_email,FILTER_VALIDATE_EMAIL);

				if (!$valid_email) {
					return false;
				}else {

					$stmt = $db->prepare("SELECT email,password FROM users WHERE email = ?");
					$stmt->execute([$valid_email]);
					$data = $stmt->fetch(PDO::FETCH_ASSOC);
					
					
					if($stmt->rowCount()>0){
						if (password_verify($password, $data['password'])) {
							return true;
						}else {
							return false;
						}
						//return password_verify($password, $data['password']);
					}else {
						return false;
					}
				}
		}

					

					

				
					
		
				




				
// this is the signup code to register administrators

	function registerAdmin($email,$password)
	{
		
		$dbh = DB();

	$hashed = password_hash($password,PASSWORD_BCRYPT);
	$stmt = $dbh->prepare("INSERT INTO admin(email,password) VALUES(?,?)");
	$stmt->execute([$email,$hashed]);
	$inserted = $stmt->rowCount();
	if ($inserted>0) {
		return true;
	}else {
		return false;
	}
				
	}

		// login for admin function here
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

	

	public function registerApplicant(array $studentArray)
	{	

		// Validate input array keys to avoid potential issues
    $requiredKeys = ['intention', 'package', 'fullname', 'contact', 'location', 'experience'];
    foreach ($requiredKeys as $key) {
        if (!array_key_exists($key, $studentArray)) {
            // Handle missing key error here
            return false;
        }
    }


		$intention = $studentArray['intention'];
		$course_package = $studentArray['package'];
		$fullName = $studentArray['fullname'];
		$contact = $studentArray['contact'];
		$location = $studentArray['location'];
		$experience = $studentArray['experience'];
		// $intention = $studentArray['intention'];

		$dbs = DB();
		// prepare database operation
		$stmt = $dbs->prepare("INSERT INTO applicant(intention,package,fullname,contact,
			location,experience) VALUES(?,?,?,?,?,?)");
		
		$stmt->execute([$intention,$course_package,$fullName,$contact,$location,$experience]);

		// check for successful operation
		$inserted = $stmt->rowCount();
		if ($inserted>0) {
			return true;
		}else {
			// return $dbs->errorInfo();
			return false;
		}
	}


	public function adminRegisterStudent($fullname,$contact,$location,$package)
	{	
		try{

			$dbs = DB();
		
		$stmt = $dbs->prepare("INSERT INTO applicant(fullname,contact,location,package) 
			VALUES(?,?,?,?)");
		$stmt->execute([$fullname,$contact,$location,$package]);
		$inserted = $stmt->rowCount();
		if ($inserted>0) {
			return true;
		}else{
			return false;
		}

		}catch(PDOException $ex){
			return $ex->getMessage();
		}
		
	}
		
	

	public function displayStudentData(){
		try{

			$dbh = DB();
		$stmt = $dbh->prepare("SELECT * FROM applicant");

		$stmt->execute();
		$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $data;


		}catch(PDOException $ex){
			return $ex->getMessage();
		}
		


	}

	// Generate a csv report
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