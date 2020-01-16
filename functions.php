<?php
session_start();
ini_set('display_errors', 1);
error_reporting(E_ALL);

require("database.php");




class Church{


	//is this working?
	// yes but something else
	public function registerUser($username,$email,$tel,$pass){
			$dbh = DB();
		// check  if user already exist
		$stmt = $dbh->prepare("SELECT * FROM users WHERE email = ?");
		$stmt->execute([$email]);
		$user = $stmt->fetch(PDO::FETCH_ASSOC);
		if ($user >  0) {
			return false;
		}else {
			$hashed = md5($pass);
			$stmt = $dbh->prepare("INSERT INTO users(username,email,telephone,password) 
				VALUES(?,?,?,?)");
			$stmt->execute([$username,$email,$tel,$hashed]);
			$inserted = $stmt->rowCount();
			if ($inserted>0) {
				return true;
			}else {
				return false;
			}
		}

	}

	public function checks($fields){
		$keys = array($fields);
		if (isset($_POST)) {
			foreach ($keys as $keys) {
				if (array_key_exists($keys, $_POST)) {
					return true;
				}else{
					return false;
				}
			}
		}
		
	}

	public function login_user($username,$password){
		$dbh = DB();
		$stmt = $dbh->prepare("SELECT username,password FROM users WHERE username = ?");

		$stmt->execute([$username]);
		$data = $stmt->fetch(PDO::FETCH_ASSOC);
		$count = $stmt->rowCount();
		if ($count == 1) {
			$password = md5($password);

			if ($password === $data['password']) {
				return true;
			}else {
				return false;
			}
			
		}else{
			return false;
		}
		
	}


		public function contactUs($username,$email,$msg){

			 $dbh = DB();
		// check  if user already exist
		$stmt = $dbh->prepare("SELECT * FROM contact WHERE email = ?");
		$stmt->execute([$email]);
		$user = $stmt->fetch(PDO::FETCH_ASSOC);
		if (!empty($user)) {
			return false;
		}else {
			$stmt = $dbh->prepare("INSERT INTO contact(fullname,email,message) 
				VALUES(?,?,?)");
			$stmt->execute([$username,$email,$msg]);
			$inserted = $stmt->rowCount();
			if ($inserted>0) {
				return true;
			}else {
				return false;
			}
		}

	}

	// this is the code

	function registerChurchAdmin($fullName,$churchName,$shortName,$location,$email,$tel,$username,$password){
		
		$dbh = DB();
		$join_date = date("m.d.y");
		$stmt = $dbh->prepare("SELECT * FROM church_admin WHERE email = ?");
		$stmt->execute([$email]);
		$user = $stmt->fetch(PDO::FETCH_ASSOC);
		if ($user >  0) {
			return false;
		}else {


			$hashed = password_hash($password,PASSWORD_BCRYPT);
			$stmt = $dbh->prepare("INSERT INTO church_admin(fullname,church_name,short_name,location,email,mobile,
				username,password,JOINDATE) VALUES(?,?,?,?,?,?,?,?,?)");
			$stmt->execute([$fullName,$churchName,$shortName,$location,$email,$tel,$username,$hashed,$join_date]);
			$inserted = $stmt->rowCount();
			if ($inserted>0) {
				return true;
			}else {
				return $dbh->errorInfo();
			}
			
		}
	}

		public function loginAdmin($email,$password){

		$dbh = DB();
		$stmt = $dbh->prepare("SELECT id,username,password FROM church_admin WHERE email = ?");

		$stmt->execute([$email]);
		$data = $stmt->fetch(PDO::FETCH_ASSOC);
		$count = $stmt->rowCount();
		if ($count == 1) {
			
			if (password_verify($password, $data['password'])) {
				$_SESSION['id'] = $data['id'];
				$_SESSION['username'] = $data['username'];
				// Taking now logged in time
				$_SESSION['start'] = time();
				$_SESSION['expire'] = $_SESSION['start'] + (10 * 60);
				return true;
			}else{
				return false;
			}
			
		}else{
			return false;
		}
		
	}

	public function addAdmin($username,$password){
		$dbh = DBcreate();
		$join_date = date("m.d.y");
		$hashed = password_hash($password, PASSWORD_BCRYPT);
		$stmt = $dbh->prepare("INSERT INTO admins(username,password,date_added) VALUES(?,?,?)");
		$stmt->execute([$username,$hashed,$join_date]);
		$added = $stmt->rowCount();
		if ($added>0) {
			return true;
		}else{
			return false;
		}

	}

	public function updateAdminPassword($password,$id){
		$password = password_hash($password, PASSWORD_BCRYPT);
		$dbh = DB();
		$stmt = $dbh->prepare("UPDATE admins SET password = ? WHERE id = ?");
		$stmt->execute([$password,$id]);
		$count = $stmt->rowCount();
		if ($count > 0) {
			return true;
		}else {
			return false;
		}

	}



	public function createDatabase($name){
		try {
			
				$conn = DBcreate();
		// Create database and tables for the church automatically
				$mydbase=$name;
				$cretedb="CREATE DATABASE IF NOT EXISTS ".$mydbase;
				$stmt = $conn->prepare($cretedb);
				if ($stmt->execute()) {
					return True;
				}else {
					return $conn->errorInfo();
				}

		} catch (Exception $e) {
			return $e.getMessage();
		}
	}

// start from here
	public function creatTables($database){
		// check  if record exist
		try {

				$host = 'localhost';
				// database user
				$username ='root';
				// user password
				$password = "";
				// database name
				$db = $database;

			
		$mytables = new PDO("mysql:host=$host;dbname=$db", $username,$password);
		// Set the PDO error mode to exception
		$mytables->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

					$sql = " CREATE TABLE MyGuests (
					id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
					firstname VARCHAR(30) NOT NULL,
					lastname VARCHAR(30) NOT NULL,
					email VARCHAR(50),
					reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
					)";
					echo($mytables->exec($sql));

						// $sql=$mytables->prepare("CREATE TABLE IF NOT EXISTS tasks (
						// 	    task_id INT AUTO_INCREMENT PRIMARY KEY,
						// 	    title VARCHAR(255) NOT NULL,
						// 	    start_date DATE,
						// 	    due_date DATE,
						// 	    status TINYINT NOT NULL,
						// 	    priority TINYINT NOT NULL,
						// 	    description TEXT,
						// 	    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
						// 	)  ENGINE=INNODB");

							// echo(gettype($sql));


					    // echo($conn->exec($sql));
					    // echo($sql->execute());
	

		
					 //    $users = "CREATE TABLE IF NOT EXISTS users (
						//   id INT  AUTO_INCREMENT PRIMARY KEY,
						//   username VARCHAR(150),
						//   email VARCHAR(255),
						//   password VARCHAR(255))";
						// $mytables->exec($users);

						
					

					   //  $groups = "CREATE TABLE IF NOT EXISTS `groups` (
						  // `id` INT  AUTO_INCREMENT PRIMARY KEY,
						  // `name` VARCHAR(150),
						  // `date_created` DATE,
						  // `description` TEXT(60))";
						  // $mytables->exec($groups);

				   



					   //  $contact = "CREATE TABLE IF NOT EXISTS `contact` (
						  // `id` INT  AUTO_INCREMENT PRIMARY KEY,
						  // `username` VARCHAR(150),
						  // `email` VARCHAR(255),
						  // `message` TEXT(60))";
						  // $mytables->exec($contact);



				// 	$members = "CREATE TABLE IF NOT EXISTS `members` (
				// 		  `id` INT  AUTO_INCREMENT PRIMARY KEY ,
				// 		  `firstName` VARCHAR(150) ,
				// 		  `lastName` VARCHAR(255) ,
				// 		  `otherName` VARCHAR(255) ,
				// 		  `residence` VARCHAR(255) ,
				// 		  `emergency` VARCHAR(255) ,
				// 		  `phone` VARCHAR(20) ,
				// 		  `email` VARCHAR(255) ,
				// 		  `nationality` VARCHAR(255) ,
				// 		  `address` VARCHAR(255) ,
				// 		  `hometown` VARCHAR(255) ,
				// 		  `department` VARCHAR(255) ,
				// 		  `job` VARCHAR(255) ,
				// 		  `JOINDATE` DATE NOT NULL ,
				// 		  `date_joined` DATE NOT NULL ,
				// 		  `gender` VARCHAR(255) ,
				// 		  `child1` VARCHAR(255) ,
				// 		  `child2` VARCHAR(255) ,
				// 		  `child3` VARCHAR(255) ,
				// 		  `child4` VARCHAR(255) ,
				// 		  `status` VARCHAR(255))";
						 

				// 		  $mytables->exec($members);

				// 	    $admin_table = "CREATE  TABLE `church_admin` (
				// 	  `id` INT  AUTO_INCREMENT PRIMARY KEY ,
				// 	  `username` VARCHAR(150) ,
				// 	  `password` VARCHAR(255) ,
				// 	  `email` VARCHAR(255) ,
				// 	  `mobile` VARCHAR(20) ,
				// 	  `fullname` VARCHAR(255) ,
				// 	  `shortName` VARCHAR(255) ,
				// 	  `church_name` VARCHAR(75))";

				// 	  $mytables->exec($admin_table);

    // $admins = "CREATE TABLE IF NOT EXISTS `admins` (
				// 		  `id` INT  AUTO_INCREMENT PRIMARY KEY,
				// 		  `username` VARCHAR(255),
				// 		  `date_added` DATE NOT NULL,
				// 		  `password` VARCHAR(255))";
				// 		$mytables->exec($admins);

				// 		$test = "CREATE TABLE `people` (
				// 			    `id` INT AUTO_INCREMENT PRIMARY KEY,
				// 			    `first_name` VARCHAR(50) NOT NULL,
				// 			    `last_name` VARCHAR(50) NOT NULL,
				// 			    `birth_date` DATE NOT NULL
				// 			)";
				// 			$mytables->exec($test);

				// 		$test = "CREATE TABLE IF NOT EXISTS tasks (
				// 			    task_id INT AUTO_INCREMENT PRIMARY KEY,
				// 			    title VARCHAR(255) NOT NULL,
				// 			    start_date DATE,
				// 			    due_date DATE,
				// 			    status TINYINT NOT NULL,
				// 			    priority TINYINT NOT NULL,
				// 			    description TEXT,
				// 			    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
				// 			)  ENGINE=INNODB";
				// 			$mytables->exec($test);

				// 		$church_group = "CREATE TABLE IF NOT EXISTS `church_group`(
				// 							id  INT AUTO_INCREMENT PRIMARY KEY,
				// 							group_name VARCHAR(255),
				// 							description VARCHAR(255))";
				// 		$mytables->exec($church_group);

						

						



				// 	    $visitor = "CREATE TABLE IF NOT EXISTS `visitors` (
				// 		  `id` INT  AUTO_INCREMENT PRIMARY KEY ,
				// 		  `person` VARCHAR(150) ,
				// 		  `mobile` VARCHAR(255) ,
				// 		  `address` VARCHAR(255) ,
				// 		  `location` VARCHAR(255) ,
				// 		  `member` VARCHAR(255))";
				// 		$mytables->exec($visitor);

				// 	    $funeral = "CREATE TABLE IF NOT EXISTS `funeral` (
				// 		  `id` INT  AUTO_INCREMENT PRIMARY KEY ,
				// 		  `person` VARCHAR(150) ,
				// 		  `amount` VARCHAR(255) ,
				// 		  `paid_date` DATE ,
				// 		  `bereaved` VARCHAR(255) ,
				// 		  `leader` VARCHAR(255))";
				// 		$mytables->exec($funeral);

				// 		   $counselling = "CREATE TABLE IF NOT EXISTS `counselling` (
				//   	  `id` INT  AUTO_INCREMENT PRIMARY KEY ,
				//   	  `cnsel_date` DATE ,
				//   	  `cnsel_time` TIMESTAMP)";
				//   	  $mytables->exec($counselling);

			 //  	      $welfare = "CREATE TABLE IF NOT EXISTS `welfare` (
			 //  	  	  `id` INT  AUTO_INCREMENT PRIMARY KEY ,
			 //  	  	  `person` VARCHAR(255) ,
			 //  	  	  `amount` VARCHAR(255) ,
			 //  	  	  `date_paid` DATE)";
			 //  	  	  $mytables->exec($welfare);


				// 		 $calendar = "CREATE TABLE IF NOT EXISTS `calendar` (
				// 		  	  `id` INT  AUTO_INCREMENT PRIMARY KEY ,
				// 		  	  `event_name` VARCHAR(150) ,
				// 		  	  `theme` VARCHAR(255),
				// 		  	  `leader` VARCHAR(255),
				// 		  	  `schedule` VARCHAR(255),
				// 		  	  `description` TEXT(255),
				// 		  	  `event_date` DATE)";
				// 		  	  $mytables->exec($calendar);

				//   	  $new_convert = "CREATE TABLE IF NOT EXISTS `new_convert` (
				//   	   	  `id` INT  AUTO_INCREMENT PRIMARY KEY ,
				//   	   	  `name` VARCHAR(150) ,
				//   	   	  `invited_by` VARCHAR(255),
				//   	   	  	`convert_date` DATE,
				//   	   	  `mobile` VARCHAR(255),
				//   	   	  `email` VARCHAR(255),
				//   	   	  `address` VARCHAR(255),
				//   	   	  `baptism_date` DATE)";
				//   	   	  $mytables->exec($new_convert);

				//   	 $youth = "CREATE TABLE IF NOT EXISTS `youth_registration` (
				//   	  	  `id` INT  AUTO_INCREMENT PRIMARY KEY ,
				//   	  	  `name` VARCHAR(150) ,
				//   	  	  `gender` VARCHAR(255),
				//   	  	  `age` VARCHAR(255),
				//   	  	  `working_status` VARCHAR(255),
				//   	  	  `education` VARCHAR(255),
				//   	  	  `email` VARCHAR(255),
				//   	  	  `address` VARCHAR(255))";
				//   	  	  $mytables->exec($youth);


				//   	  	  $preaching = "CREATE TABLE IF NOT EXISTS `youth_registration` (
				//   	  	   	  `id` INT  AUTO_INCREMENT PRIMARY KEY ,
				//   	  	   	  `host_church` VARCHAR(150) ,
				//   	  	   	  `location` VARCHAR(255),
				//   	  	   	  `preach_date` DATE,
				//   	  	   	  `schedule` VARCHAR(255))";
				//   	  	   	  $mytables->exec($preaching);

				// 	  	$pastor =  "CREATE TABLE IF NOT EXISTS pastor (
					  	     

				// 	  	      CREATE TABLE IF NOT EXISTS activity (
				// 	  	          activity_id INT AUTO_INCREMENT PRIMARY KEY,
				// 	  	          activity_name VARCHAR(255),
				// 	  	          activity_date DATE,
				// 	  	          description TEXT,
				// 	  	      ),

				// 	  	      CREATE TABLE IF NOT EXISTS pastor_event (
				// 	  	          event_id INT AUTO_INCREMENT PRIMARY KEY,
				// 	  	          event_name VARCHAR(255),
				// 	  	          event_date DATE,
				// 	  	          description TEXT,
				// 	  	      ),

				// 	  	      CREATE TABLE IF NOT EXISTS counselling (
				// 	  	          id INT AUTO_INCREMENT PRIMARY KEY,
				// 	  	          counsel_date DATE,
				// 	  	          counsel_time TIMESTAMP,
				// 	  	      ),

				// 	  	  )ENGINE=INNODB";
				// 	  	  $mytables->execute($pastor);

					  	
				// 	      $sermon = "CREATE TABLE IF NOT EXISTS `sermon` (
				// 	  	  `id` INT  AUTO_INCREMENT PRIMARY KEY ,
				// 	  	  `preacher` VARCHAR(150) ,
				// 	  	  `title` VARCHAR(255) ,
				// 	  	  `event_type` VARCHAR(255) ,
				// 		  preparing_date DATE,
				// 		  	`key_scriptures` TEXT,
				// 	  	  `notes` TEXT(60))";
				// 	  	  $mytables->exec($sermon); 

					    return True;
				
					
					}catch(PDOException $ex){
		die("Error:could not connect. " .$ex->getMessage());
	}
					

	}

		

	
		

	
	public function deleteAdminInfo($id){
		$dbh = DB();
		$stmt =$dbh->prepare("DELETE FROM church_admin WHERE id = ?");
		$stmt->execute([$id]);
		$deleted = $stmt->rowCount();
		if ($deleted > 0) {
			return true;
		}else{
			return false;
		}
	}


	public function addMember($first,$second,$last,$phone,$email,$nation,$address,$hometown,$job,$date,$gender,
								$status)
	{
		$dbh = DB();
		// check  if user already exist
		$stmt = $dbh->prepare("SELECT * FROM members WHERE email = ?");
		$stmt->execute([$email]);
		$user = $stmt->fetch(PDO::FETCH_ASSOC);
		if ($user >  0) {
			return false;
		}else {
			// $hashed = md5($password);
			$stmt = $dbh->prepare("INSERT INTO members(firstName,lastName,otherName,phone,email,
				nationality,address,hometown,job,JOINDATE,gender,status) VALUES(?,?,?,?,?,?,?,?,?,?,?,?)");
			$stmt->execute([$first,$second,$last,$phone,$email,$nation,$address,$hometown,$job,$date,$gender,
							$status]);
			$inserted = $stmt->rowCount();
			if ($inserted>0) {
				return true;
			}else {
				return false;
			}
		}

	}


	public function createGroup($name,$description){
			// $dbh = DBcreate();
		$dbh = DBcreate();
		var_dump($dbh);
			$group_date = date("m.d.y");

		// check  if user already exist
		$stmt = $dbh->prepare("SELECT * FROM groups WHERE name = ?");
		$stmt->execute([$name]);
		$user = $stmt->fetch(PDO::FETCH_ASSOC);
		if ($user >  0) {
			return false;
		}

		else {
			$stmt = $dbh->prepare("INSERT INTO groups(name,description,date_created) 
				VALUES(?,?,?)");
			$stmt->execute([$name,$description,$group_date]);
			$inserted = $stmt->rowCount();
			if ($inserted>0) {
				return true;
			}else {
				return false;
			}
		}

	}

	public function createEvent($event_name,$theme,$leader,$schedule,$duration,$describe,$event_date)
	{	

		$dbs = DBcreate();
		$event_date = date("m.d.y");
		$stmt = $dbs->prepare("INSERT INTO calendar(event_name,theme,leader,schedule,description,event_date) 
			VALUES(?,?,?,?,?,?,?)");
		$stmt->execute([$event_name,$theme,$leader,$schedule,$duration,$describe,$event_date]);
		$inserted = $stmt->rowCount();
		if ($inserted>0) {
			return true;
		}else {
			return false;
		}
	}


	public function registerYouth($name,$gender,$age,$work_status,$education,$email,$address)
	{	

		$dbs = DBcreate();
		$stmt = $dbs->prepare("INSERT INTO youth_registration(name,gender,age,working_status,education,email,address) 
			VALUES(?,?,?,?,?,?,?)");
		$stmt->execute([$name,$gender,$age,$work_status,$education,$email,$address]);
		$inserted = $stmt->rowCount();
		if ($inserted>0) {
			return true;
		}else {
			return false;
		}
	}


	public function sermon($preacher,$title,$event_type,$scripture,$note)
	{	

		$dbs = DBcreate();
		$stmt = $dbs->prepare("INSERT INTO sermon(preacher,title,event_type,key_scriptures,notes) 
			VALUES(?,?,?,?,?)");
		$stmt->execute([$preacher,$title,$event_type,$scripture,$note]);
		$inserted = $stmt->rowCount();
		if ($inserted>0) {
			return true;
		}else {
			return false;
		}
	}


	public function new_convert($person_name,$invited_by,$phone,$email,$address,$baptism,$convert_date)
	{	

		$dbs = DBcreate();
		$stmt = $dbs->prepare("INSERT INTO new_convert(name,invited_by,mobile,email,address,baptism_date,
			                 convert_date) VALUES(?,?,?,?,?,?,?)");
		$stmt->execute([$person_name,$invited_by,$phone,$email,$address,$baptism,$convert_date]);
		$inserted = $stmt->rowCount();
		if ($inserted>0) {
			return true;
		}else {
			return false;
		}
	}


	public function visitor($person_name,$phone,$address,$location,$member)
	{	

		$dbs = DBcreate();
		$stmt = $dbs->prepare("INSERT INTO visitor(person,mobile,address,location,
			                 member) VALUES(?,?,?,?,?)");
		$stmt->execute([$person_name,$phone,$address,$location,$member]);
		$inserted = $stmt->rowCount();
		if ($inserted>0) {
			return true;
		}else {
			return false;
		}
	}


	public function funeral($person,$amount,$paid_date,$bereaved,$leader)
	{	

		$dbs = DBcreate();
		$stmt = $dbs->prepare("INSERT INTO funeral(person,amount,paid_date,bereaved,
			                 leader) VALUES(?,?,?,?,?)");
		$stmt->execute([$person,$amount,$paid_date,$bereaved,$leader]);
		$inserted = $stmt->rowCount();
		if ($inserted>0) {
			return true;
		}else {
			return false;
		}
	}

	public function preaching($host_church,$location,$preach_date,$schedule)
	{	

		$dbs = DBcreate();
		$stmt = $dbs->prepare("INSERT INTO preaching(host_church,location,preach_date,schedule) VALUES(?,?,?,?)");
		$stmt->execute([$host_church,$location,$preach_date,$schedule]);
		$inserted = $stmt->rowCount();
		if ($inserted>0) {
			return true;
		}else {
			return false;
		}
	}

	public function counselling($date,$time)
	{	

		$dbs = DBcreate();
		$stmt = $dbs->prepare("INSERT INTO counselling(cnsel_date,cnsel_time) VALUES(?,?)");
		$stmt->execute([$date,$time]);
		$inserted = $stmt->rowCount();
		if ($inserted>0) {
			return true;
		}else {
			return false;
		}
	}


	public function welfare($person,$amount,$date_paid)
	{	

		$dbs = DBcreate();

		$stmt = $dbs->prepare("INSERT INTO welfare(person,amount,date_paid) VALUES(?,?,?)");
		$stmt->execute([$person,$amount,$date_paid]);
		$inserted = $stmt->rowCount();
		if ($inserted>0) {
			return true;
		}else {
			return false;
		}
	}

	public function church_group($group_name,$description)
	{	

		$dbs = DBcreate();

		$stmt = $dbs->prepare("INSERT INTO church_group(group_name,description) VALUES(?,?)");
		$stmt->execute([$group_name,$description]);
		$inserted = $stmt->rowCount();
		if ($inserted>0) {
			return true;
		}else {
			return false;
		}
	}

	public function sendEmail($email,$password){
		// recepient
		$to = $email;

		// subject
		$subject = "Link to login page";

		// Message
		$message = '
		<html>
		<head>
		  <title>Birthday Reminders for August</title>
		</head>
		<body>
			<a href="http://localhost/church/login.php"><button type="button" class="btn btn-primary">Primary</button></a>
			<p>$password</p>		 
		</body>
		</html>
		';

		$headers[] = 'MIME-Version: 1.0';
		$headers[] = 'Content-type: text/html; charset=iso-8859-1';

		$email_sent = mail($to, $subject, $subject, implode("\r\n", $headers));
		if ($email_sent) {
			return true;
		}else{
			return false;
		}

	}



	




}



?>