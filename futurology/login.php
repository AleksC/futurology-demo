<?php
	require_once 'core/init.php';
	$db = Connect::getInstance();

if(isset($_POST['username']) && ($_POST['password'])) {
	$username = trim($_POST['username']);
	$password = trim($_POST['password']);
	if(!empty($username) && !empty($password)) {
		$stmtUserCheck = $db->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
		$stmtUserCheck->bindValue(1, $username);
		$stmtUserCheck->bindValue(2, $password);
		$stmtUserCheck->execute();
		if($stmtUserCheck->rowCount() > 1) {
			die("System error.");
			header("Location: " . $_SERVER['HTTP_REFERER']);
		} else if($stmtUserCheck->rowCount() == 0) {
			echo ("User not found");
		} 
		$user = $stmtUserCheck->fetch(PDO::FETCH_ASSOC);
		session_start();
		$_SESSION['username'] = $user['username'];
		$_SESSION['status'] = $user['status'];
		header("Location: " . $_SERVER['HTTP_REFERER']);
		} 
	}
else {
	echo "Please enter proper login data";
}