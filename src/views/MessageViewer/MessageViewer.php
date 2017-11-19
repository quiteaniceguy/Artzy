
<link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300|Megrim" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Lora" rel="stylesheet">

<link rel="stylesheet" href="/Artzy/css/MessagesPage.css">

<script src = '/Artzy/src/javascript/ajax/DeleteMessage.js'></script>
<br/><br/><br/><br/>
<div id = "messageLinks">
	<a href = "/Artzy/indexTest.php?controller=messageViewer&action=home">all</a> |
	<a href = "/Artzy/indexTest.php?controller=messageViewer&action=home&mailboxType=IN">in</a> |
	<a href = "/Artzy/indexTest.php?controller=messageViewer&action=home&mailboxType=OUT">out</a> |
	<!--<a href = "UserMessages.php?mailboxType=INReview">critiques</a> -->
</div>
<?php
	///$messages must be set
	require_once $_SERVER['DOCUMENT_ROOT'] . '/Artzy/src/views/Header/Header.php';
	require_once $_SERVER['DOCUMENT_ROOT'] . '/Artzy/src/views/MessageModal/MessageModal.php';
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
					<a href = '#' onclick = \"deleteMessage({$mailId})\" >delete</a> |

			</div>";

			echo "</div>";

			echo "_________________________________<br/><br/>";
	}

?>
