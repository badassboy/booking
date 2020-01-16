<?php

define('HOST', 'localhost');
// database user
define('USER', 'root');
// user password
define('PASSWORD', '');
// database name
define('DATABASE', 'church');

function DB()
{
	try{
		$db = new PDO('mysql:host='.HOST.';dbname='.DATABASE.'',USER,PASSWORD);
		return $db;
	}catch(PDOException $e){
		return "Error: " .$e->getMessage();
		die();
	}
}

// this is the code for the new database creation
function DBcreate()
{
	try{
		$dbs = new PDO('mysql:host='.HOST,USER,PASSWORD);
		return $dbs;
	}catch(PDOException $e){
		return "Error: " .$e->getMessage();
		die();
	}
}





?>