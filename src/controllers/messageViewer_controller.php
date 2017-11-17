<?php

	class MessageViewerController{

		function __construct($sqlInterface){
			$this->sqlInterface = $sqlInterface;
		}

		function home(){

			///145 temperary replace with current user
			$messages = $this->sqlInterface->getMessagesTo($_SESSION["currentId"]);

			for($i = 0; $i < sizeof($messages); $i++){

				$messages[$i]["sendbyName"] = $this->sqlInterface->getUsername($messages[$i]["sendby"])["username"];
				$messages[$i]["sendtoName"] = $this->sqlInterface->getUsername($messages[$i]["sendto"])["username"];
				//var_dump($messages[$i]["sendbyName"]);
				//var_dump($messages[$i]["sendtoName"]);
			}
			//var_dump($messages);
			require_once($_SERVER["DOCUMENT_ROOT"] . "/Artzy/src/views/MessageViewer/MessageViewer.php");
		}

		function error(){

		}
	}

?>
