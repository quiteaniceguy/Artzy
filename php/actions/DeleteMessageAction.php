<?php
	$server = 'localhost';
	$username = 'root';
	$password = '';
	$database = 'db_artzytest';
	
	$conn = new mysqli($server, $username, $password, $database);
	if($conn->connect_error){
		echo $conn->connect_error;
		die("connection to server not found");
	}
	
	$sql = "DELETE FROM table_mailboxes WHERE id = {$_GET["mailid"]}";
	$result = $conn->query($sql);
	if(!$result)
		die("failed to delete message");
	
	//should then check if it should delete message and messageData
	
	
	//success
	echo "0";
	
?>