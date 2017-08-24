<?php
	
	include_once 'DataRemover.php';
	require '../ConnectionLibrary/ConnectoToDB.php';
	
	$server = 'localhost';
	$username = 'root';
	$password = '';
	$database = 'db_artzytest';
	
	$conn = new mysqli($SERVER_NAME, $SERVER_USERNAME, $SERVER_PASSWORD, $database);
	
	echo deleteMedia($_GET["mediaId"], $conn);
	
	


?>