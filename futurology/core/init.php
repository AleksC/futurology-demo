<?php
session_start();

$GLOBALS['config'] = array(
	'DB' => array(
		'host' => '127.0.0.1',
		'user' => 'root',
		'password' => '',
		'db_name' => 'futurology'
	),
	'status' => true,
	'app_dir' => 'C:/wamp/www/sites/futurology',
	'session' => array()
);

spl_autoload_register(function($className) {
	require_once "classes/{$className}.class.php";
});