
<link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300|Megrim" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Lora" rel="stylesheet"> 

<link rel="stylesheet" href="/Artzy/css/MessagesPage.css">
<?php
	///$messages must be set
	
	$mailboxType = $_GET["mailboxType"];
	if (!isset($_GET["mailboxType"]) )
		$mailboxType = null;
	
	
	
	
	for($i = 0; $i < sizeof($messages); $i++){
				if ($mailboxType == NULL && ($messages[$i]['mailbox'] == 'OUT' || $messages[$i]['mailbox'] == 'IN')){
					
					$fromUser = $messages[$i]["sendbyName"];
					$toUser = $messages[$i]["sendtoName"];
					displayMessage($messages[$i]['id'], $fromUser, $toUser, $messages[$i]['message']);
					
				}
				if ($messages[$i]['mailbox'] ==  $mailboxType){
					
					
					$fromUser = $messages[$i]["sendbyName"];
					$toUser = $messages[$i]["sendtoName"];
					displayMessage($messages[$i]['id'], $fromUser, $toUser, $messages[$i]['message']);
					
				
				}	
	}


	
	function displayMessage($mailId, $fromUser, $toUser, $message){
			
			/*
			if ($fromUser == $_SESSION["currentUser"]) {
				$fromUser = "you";
			}
			*/
			
			echo "<div id = 'wholeMessage{$mailId}' class = 'wholeMessage' >";
			
			echo "<div id = 'messageHeader' >from {$fromUser} to {$toUser} -</div>";
			echo "<div id = 'messageBody' >{$message}</div>";
			echo "<div id = 'messageOptions' >
					<a href = '#' onclick = \"openModal('{$fromUser}')\">reply</a> |
					<a href = '#' onclick = \"deleteComment({$mailId})\" >delete</a> |
			
			</div>";
			
			echo "</div>";
			
			echo "_________________________________<br/><br/>";
	}

?>