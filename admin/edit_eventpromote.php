<?php

require("../database.php");
$db = DB();
$id = "";
	
	$id = $_GET['hello'];

	if (isset($id)) {


		$stmt = $db->prepare("SELECT * FROM eventpromote WHERE id = ?");
		$stmt->execute([$id]);
		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$event  = $row['event'];
			$promoter = $row['promoter'];
		}
	}else {
		echo  "no";
	}


?>




<!DOCTYPE html>
<html>
<head>
	<title></title>
   <link rel="stylesheet" type="text/css" href="../bootstrap/dist/css/bootstrap.css">

   <style type="text/css">
   	
   	*{
   		margin: 0;
   		padding: 0;
   		box-sizing: border-box;
   		font-family: 'Raleway', sans-serif;
   	}

   	

   	.edit-page{

   		background-color:#f2f2f2;
   		height: 600px;
   		display: flex;
   	   flex-direction: row;
   	   flex-wrap: wrap;
   	   justify-content: center;
   	   align-items: center;

   	}


   	.edit-form {
   		background-color: hsl(0, 0%, 100%);
   		height: 500px;
   		width: 50%;
   		padding-top: 3%;

   	}

   	.edit-form h3 {
   		padding-top: 7%;
   		padding-left: 30%;
   		padding-bottom: 1%;
   		font-weight: bolder;
   	}

   	 input[type=text] {
   		width: 40%;
   		margin-left: 30%;
   		font-size: 20px;
   	}

   	form label {
   		padding-left: 30%;
   		font-weight: bolder;
   	}


   	.btn-primary {
   		width: 40%;
   		height: 40px;
   		margin-left: 30%;
   		border: 2px solid ##e6e600;
   		font-weight: bolder;
   	}

   </style>

</head>
<body>

	<div class="container-fluid edit-page">

		<div class="container edit-form">
			<?php

			if (isset($msg)) {
				echo $msg;
			}

			?>
			<h3>Edit Details</h3>
			<form method="post" action="update_eventpromote.php">

			  <div class="form-group">
			    <label for="exampleInputEmail1">Event</label>
			    <input type="text" name="event" class="form-control" value="<?php echo $event; ?>">
			  </div>

			  <div class="form-group">
			    <label>Promoter</label>
			    <input type="text" name="promoter" class="form-control" value="<?php echo $promoter; ?>">
			  </div>


			  <div class="form-group">
			  	<input type="hidden" name="id" value="<?php echo $id; ?>">
			  </div>


			  <button type="submit" name="update" class="btn btn-primary">Update</button>
			</form>
		</div>
		
	</div>

	




	 <!-- jQuery CDN  -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	
	 <!-- Bootstrap JS -->
	<script type="text/javascript" src="../bootstrap/dist/js/bootstrap.js"></script>
</body>
</html>