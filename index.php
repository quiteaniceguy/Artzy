<?php
	/*
		includes connection library and config file, and sets controller and action
	variables, then includes basic layout which uses action and controller to
	determine file to include using routes file.
	*/
	require_once($_SERVER["DOCUMENT_ROOT"] . "/Artzy/src/connections/connection.php");

	$config = require $_SERVER["DOCUMENT_ROOT"] . "/Artzy/config/config.php";
	$conn = Db::getInstance($config);

	if ( isset($_GET['controller']) && isset($_GET['action']) ){
		$controller = $_GET['controller'];
		$action = $_GET['action'];
	}else{
		header('Location: /Artzy/index.php?controller=login&action=home');
		$controller = 'test';
		$action = 'error';
	}

	require_once($_SERVER['DOCUMENT_ROOT'] . "/Artzy/src/views/layout.php");
?>
