<?php
	include_once "SendMessageTypeAction.php";
	include_once "DataRetriever.php";
	
	$servername="localhost";
	$username="root";
	$password="";
	$dbname="db_artzytest";
	
	$conn = new mysqli($servername, $username, $password, $dbname);
	
	if($conn->connect_error){
		die("connection error");
	}
	
	//$sql = "INSERT INTO table_comments(comment, userId, mediaId) VALUES('{$_GET["comment"]}', '{$_GET["userId"]}' , '{$_GET["mediaId"]}' )" ;
	$sql = "INSERT INTO table_comments(comment, userId, mediaId) VALUES(?, ?, ?)" ;
	try{
		$stmt = $conn->prepare($sql);
		$stmt->bind_param('sii', $_GET["comment"], $_GET["userId"], $_GET["mediaId"]);
		$stmt->execute();
	}catch(Exception $e){
		die("prepare failed: " . $e);
	}
	
	$currUsername = getUsername($_GET["userId"], $conn);
	$recUsername = getUsername( getMedia($_GET["mediaId"], $conn)["userId"], $conn)["username"];
	
	sendMessageType($currUsername, $_GET["userId"], $recUsername, $_GET["comment"], "OUTComment", "INComment", 0, $conn);
	
	
	
	//echo $_GET["comment"] . $_GET["userId"] . $_GET["imageId"];
	echo $_GET["comment"];
?>