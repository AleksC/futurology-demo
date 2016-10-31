<?php

	require_once 'core/init.php';
	
	if(isset($_SESSION['status'])) {
		if($_SESSION['status'] == 'admin' || $_SESSION['username'] == $_GET['username']) {
			Comment::remove($_GET['id']);
			header("Location: " . $_SERVER['HTTP_REFERER']);
		}  
	}