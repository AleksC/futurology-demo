<?php

	require_once 'core/init.php';
	$db = Connect::getInstance();

	$stmt = new Comment;
	$stmt->content = $_POST['comment'];
	$stmt->username = $_SESSION['username'];
	$stmt->news_id =  $_SESSION['article_id'];
	$stmt->insert();
	header("Location: " . $_SERVER['HTTP_REFERER']);
?>