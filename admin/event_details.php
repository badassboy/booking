<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

require("../database.php");
$dbh = DB();


if (isset($id)) {

	$stmt = $dbh->prepare("SELECT * FROM calendar WHERE id = ?");
	$stmt->execute([$id]);
	$row = $stmt->fetch(PDO::FETCH_ASSOC);
	if (count($row) > 0) {
		
		$event_name = $row['event_name'];
		$theme = $row['theme'];
		$info = $row['description'];
		$date = $row['event_date'];
	}
}




?>


<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	    <meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title></title>
	<link rel="stylesheet" type="text/css" href="../bootstrap/dist/css/bootstrap.css">

	<style type="text/css">

		.parent {

			background-color: #f5f5f5;
			height: 600px;
			padding-top: 3%;
		}

		.wrapper {
			background-color: #ffffff;
			height: 400px;
			padding-left: 3%;
			padding-top: 2%;
		}

	</style>
</head>
<body>

	<div class="container-fluid parent">

		<div class="content wrapper">
			<p class="date"></p>
			<article>
			  <h1>Google Chrome</h1>
			  <h4>hello</h4>
			  <p class="description">Google Chrome is a free, open-source web browser developed by Google, released in 2008.</p>
			</article>
		</div>
		
	</div>






	<script type="text/javascript" src="../bootstrap/dist/js/bootstrap.js"></script>
</body>
</html>