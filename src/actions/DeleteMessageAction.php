<?php
	$config = require('../../config/config.php');
		
	$conn = new mysqli($config["mysql"]["servername"], $config["mysql"]["username"], $config["mysql"]["password"], $config["mysql"]["dbName"]);
	if(!$conn){
		die("connection to server failed");
	}
	
	$sql = "DELETE FROM table_mailboxes WHERE id = {$_GET["mailid"]}";
	$result = $conn->query($sql);
	if(!$result)
		die("failed to delete message");
	
	//should then check if it should delete message and messageData
	
	
	//success
	echo "0";
	
?>