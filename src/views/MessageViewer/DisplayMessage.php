<?php

	function displayMessage($mailId, $fromUser, $toUser, $message){
		
		if ($fromUser == $_SESSION["currentUser"]) {
			$fromUser = "you";
		}
		
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