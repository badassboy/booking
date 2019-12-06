<?php
//session_start();
ini_set('display_errors', 1);
error_reporting(E_ALL);

require("database.php");

class Church{


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

	function addChurchAdmin($fullName,$churchName,$location,$email,$tel,$username,$password){
			$dbh = DB();
			$join_date = date("m.d.y");
		// check  if user already exist
		$stmt = $dbh->prepare("SELECT * FROM church_admin WHERE email = ?");
		$stmt->execute([$email]);
		$user = $stmt->fetch(PDO::FETCH_ASSOC);
		if ($user >  0) {
			return false;
		}else {
			// $hashed = md5($password);
			$hashed = password_hash($password,PASSWORD_BCRYPT);
			$stmt = $dbh->prepare("INSERT INTO church_admin(fullname,church_name,location,email,mobile,
				username,password,JOINDATE) VALUES(?,?,?,?,?,?,?,?)");
			$stmt->execute([$fullName,$churchName,$location,$email,$tel,$username,$hashed,$join_date]);
			$inserted = $stmt->rowCount();
			if ($inserted>0) {
				return true;
			}else {
				return false;
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
				return true;
			}else{
				return false;
			}
			
		}else{
			return false;
		}
		
	}

	public function changePassword($password,$id){
		$password = password_hash($password, PASSWORD_BCRYPT);
		$dbh = DB();
		$stmt = $dbh->prepare("UPDATE church_admin SET password = ? WHERE id = ?");
		$stmt->execute([$password,$id]);
		$count = $stmt->rowCount();
		if ($count > 0) {
			return true;
		}else {
			return false;
		}

	}



}



?>