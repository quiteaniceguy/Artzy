<?php
	include_once "SendMessageTypeAction.php";
	include_once "DataRetriever.php";
	
	$config = require('../../config/config.php');
		
	$conn = new mysqli($config["mysql"]["servername"], $config["mysql"]["username"], $config["mysql"]["password"], $config["mysql"]["dbName"]);
	if(!$conn){
		die("connection to server failed");
	}
	



	
	//$sql = "INSERT INTO table_comments(comment, userId, mediaId) VALUES('{$_GET["comment"]}', '{$_GET["userId"]}' , '{$_GET["mediaId"]}' )" ;
	$sql = "INSERT INTO table_comments(comment, userId, mediaId) VALUES(?, ?, ?)" ;
	try{
		$stmt = $conn->prepare($sql);
		$stmt->bind_param('sii', $_POST["comment"], $_POST["userId"], $_POST["mediaId"]);
		$stmt->execute();
	}catch(Exception $e){
		die("prepare failed: " . $e);
	}
	
	$currUsername = getUsername($_POST["userId"], $conn);
	$recUsername = getUsername( getMedia($_POST["mediaId"], $conn)["userId"], $conn)["username"];
	
	sendMessageType($currUsername["username"], $_POST["userId"], $recUsername, $_POST["comment"], "OUTComment", "INComment", 0, $conn);
	
	
	
	//echo $_GET["comment"] . $_GET["userId"] . $_GET["imageId"];
	echo $_POST["comment"];
?>
