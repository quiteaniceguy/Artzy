<?php
	include "../actions/DataRetriever.php";
	include_once "../EmailLibrary/EmailActions.php";
	include_once "SendMessageTypeAction.php";
	
	$config = require('../../config/config.php');
		
	$conn = new mysqli($config["mysql"]["servername"], $config["mysql"]["username"], $config["mysql"]["password"], $config["mysql"]["dbName"]);
	if(!$conn){
		die("connection to server failed");
	}
	
	if($conn->connect_error){
		die("connection error");
	}
	
	$InMailBoxType = "IN";
	$outMailBoxType = "OUT";
	if($_POST["messageType"] == "CRITIQUE_MESSAGE"){
		$InMailBoxType = "INReview";
		$outMailBoxType = "OUTReview";
	}
	die( sendMessageType($_POST["user"], $_POST["userId"], $_POST["sendto"], $_POST["message"], $outMailBoxType, $InMailBoxType, $_POST["mediaId"], $conn) );


?>