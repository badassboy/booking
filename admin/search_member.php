<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);
$data=[];

require("../database.php");
$dbh = DB();


$search = trim($_POST['search_value']); 
$stmt = $dbh->prepare("SELECT * FROM members WHERE firstName LIKE '%".$search."%'");
$stmt->execute();
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

	$user_id = $row['id'];

	$edit = '<a href="delete_member.php?trash='.$user_id.'">
			  	<i class="fa fa-pencil" aria-hidden="true"></i>
			 </a>';

	$trash = '<a href="delete_member.php?trash='.$user_id.'">
				<i class="fa fa-trash" aria-hidden="true"></i>
			  </a>';

	

	$action = $trash . "   " . $edit;
	$data_item=array($action,$row['firstName'],$row['lastName'],$row['phone']);
	$data[]=$data_item;
	
}
// converting data array into JSON string
echo json_encode($data);

?>

<body>
	<!-- Modal -->
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        ...
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	        <button type="button" class="btn btn-primary">Save changes</button>
	      </div>
	    </div>
	  </div>
	</div>
</body>







