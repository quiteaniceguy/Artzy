<?php
	
	include_once 'DataRemover.php';

	
	$config = require('../../config/config.php');
		
	$conn = new mysqli($config["mysql"]["servername"], $config["mysql"]["username"], $config["mysql"]["password"], $config["mysql"]["dbName"]);
	if(!$conn){
		die("connection to server failed");
	}
	
	echo deleteMedia($_GET["mediaId"], $conn);
	
	


?>
