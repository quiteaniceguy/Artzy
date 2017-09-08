<?php
	include "../actions/DataRetriever.php";
	include_once "../EmailLibrary/EmailActions.php";
	include_once "SendMessageTypeAction.php";
	
	$servername="localhost";
	$username="root";
	$password="";
	$dbname="db_artzytest";
	
	$conn = new mysqli($servername, $username, $password, $dbname);
	
	if($conn->connect_error){
		die("connection error");
	}
	
	
	die( sendMessageType($_POST["user"], $_POST["userId"], $_POST["sendto"], $_POST["message"], "OUTReview", "INReview", $_POST["mediaId"], $conn) );
	

?>