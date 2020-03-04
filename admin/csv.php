<?php
// session_start();
require("../functions.php");
$book = new Booking();

if (isset($_POST['report'])) {

	$generated = $book->generateCSV();
	if ($generated) {
		$_SESSION["message"] = "report generated successful";
	}else {
		$_SESSION['message']= "failed in generating report";
	}
  

  

}else {
  // echo "an error occured";
	$_SESSION['message'] = "an erro occured";
}



?>


