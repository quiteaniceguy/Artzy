<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
	<link rel="stylesheet" href="../../css/profilePage.css">
	<link rel="stylesheet" href="../../css/MessagesPage.css">
</head>

<body>
	<script src = '../JSActions/DeleteComment.js'></script>
	<?php
		require '../actions/DisplayComment.php';
		require '../actions/DisplayMediaOptions.php';
		require '../actions/DataRetriever.php';
		require '../actions/DisplayMedia.php';
		
		require "../siteComponents/header.php";
		include "../siteComponents/MessageModal.php";
		
		$servername="localhost";
		$username="root";
		$password="";
		$dbName="db_artzytest";
		
		$conn=new mysqli($servername, $username, $password, $dbName);
		if($conn->connect_error){
			die("connection to server not found");
		}
		
		echo "<br/><br/><br/><br/><br/><br/><br/>";
		
		///otherwise known as mail
		$messages = getMessagesTo($_SESSION["currentId"], $conn);
		
		for($i = 0; $i < sizeof($messages); $i++){
			if($_GET["mailboxType"] == NULL && ($messages[$i]['mailbox'] == 'OUT' || $messages[$i]['mailbox'] == 'IN')){
				
				
				$fromUser = getUsername($messages[$i]["sendby"], $conn)["username"];
				$toUser = getUsername($messages[$i]["sendto"], $conn)["username"];
				displayMessage($messages[$i]['id'], $fromUser, $toUser, $messages[$i]['message']);
				
			
			}
			if($messages[$i]['mailbox'] == 'OUT' && $_GET["mailboxType"] == 'OUT'){
				
				
				$fromUser = getUsername($messages[$i]["sendby"], $conn)["username"];
				$toUser = getUsername($messages[$i]["sendto"], $conn)["username"];
				displayMessage($messages[$i]['id'], $fromUser, $toUser, $messages[$i]['message']);
				
			
			}
			if($messages[$i]['mailbox'] == 'IN' && $_GET["mailboxType"] == 'IN'){
				
				
				$fromUser = getUsername($messages[$i]["sendby"], $conn)["username"];
				$toUser = getUsername($messages[$i]["sendto"], $conn)["username"];
				displayMessage($messages[$i]['id'], $fromUser, $toUser, $messages[$i]['message']);
				
			
			}
			
			
		}
		
	?>
	<div id = "messageLinks">
		<a href = "UserMessages.php">all</a> |
		<a href = "UserMessages.php?mailboxType=IN">in</a> |
		<a href = "UserMessages.php?mailboxType=OUT">out</a> |
	
	</div>
</body>

</html>