<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
	
	<link rel="stylesheet" href="/Artzy/css/MessagesPage.css">
</head>

<body>
	<script src = '/Artzy/src/JSActions/DeleteComment.js'></script>
	<?php
		/*
		require $_SERVER["DOCUMENT_ROOT"] . '/Artzy/src/actions/DisplayComment.php';
		require $_SERVER["DOCUMENT_ROOT"] . '/Artzy/src/actions/DisplayMediaOptions.php';
		require $_SERVER["DOCUMENT_ROOT"] . '/Artzy/src/actions/DataRetriever.php';
		require $_SERVER["DOCUMENT_ROOT"] . '/Artzy/src/actions/DisplayMedia.php';
		
		require $_SERVER["DOCUMENT_ROOT"] . '/Artzy/src/siteComponents/header.php';
		include $_SERVER["DOCUMENT_ROOT"] . '/Artzy/src/siteComponents/MessageModal.php';
		include $_SERVER["DOCUMENT_ROOT"] . '/Artzy/src/siteComponents/SessionChecker.php';
		*/
		$config = require($_SERVER["DOCUMENT_ROOT"] . '/Artzy/config/config.php');
		
		$conn = new mysqli($config["mysql"]["servername"], $config["mysql"]["username"], $config["mysql"]["password"], $config["mysql"]["dbName"]);
		if(!$conn){
			die("connection to server failed");
		}
		
		echo "<br/><br/><br/><br/><br/><br/><br/>";
		
		///otherwise known as mail
		
		
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
			/*
			if($messages[$i]['mailbox'] == 'INReview' && $_GET["mailboxType"] == 'INReview'){
				
				
				$fromUser = getUsername($messages[$i]["sendby"], $conn)["username"];
				$toUser = getUsername($messages[$i]["sendto"], $conn)["username"];
				displayMessage($messages[$i]['id'], $fromUser, $toUser, $messages[$i]['message']);
				
			
			}
			*/
			
		}
		
	?>
	<div id = "messageLinks">
		<a href = "/Artzy/view/MessagesPage/MessageViewer.php">all</a> |
		<a href = "/Artzy/view/MessagesPage/MessageViewer.php?mailboxType=IN">in</a> |
		<a href = "/Artzy/view/MessagesPage/MessageViewer.php?mailboxType=OUT">out</a> |
		<!--<a href = "UserMessages.php?mailboxType=INReview">critiques</a> -->
	</div>
</body>

</html>