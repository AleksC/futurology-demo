<?php 
	if(isset($_SESSION['status'])){
		$status = $_SESSION['status'];
	if($status == 'user') {
		include_once "userPanel.php";
	} else if ($status = "admin") {
		include_once "adminPanel.php";
	}
	} else {
		include_once "loginW.php";
	}	
?>