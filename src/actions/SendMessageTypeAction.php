<?php
	include_once "../actions/DataRetriever.php";
	include_once "../EmailLibrary/EmailActions.php";
	
	
	function sendMessageType($currUsername, $currId, $recUsername, $message, $outType, $inType, $mediaId, $conn){
		
		$messageId = insertMessage($message, $conn);
		
		$reciever = getUser($recUsername, $conn);
		$recId = $reciever["id"];
		
		
		$messageDataId = insertMessageData($messageId, $currId, $recId, $mediaId, $conn);
		
		insertMessagebox($currId, $outType, $messageDataId, $conn);
		
		insertMessagebox($recId, $inType, $messageDataId, $conn);
		
		
		///good enough for now
		sendEmail($currUsername . ": <br/>" . $message, $currUsername . " has sent you a message: " . $message, $reciever["email"]);
		
		//die($_POST["message"] . $_POST["userId"] . $_POST["sendto"]);
		return "sent!";
		
	}
	
	function test(){
		"test";
	}
	
?>