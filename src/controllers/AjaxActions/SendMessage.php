<?php
  require_once($_SERVER['DOCUMENT_ROOT'] . '/Artzy/src/models/sqlmodels/SQLInterface.php');
  require_once($_SERVER["DOCUMENT_ROOT"] . "/Artzy/src/connections/connection.php");
  require_once($_SERVER["DOCUMENT_ROOT"] . "/Artzy/src/controllers/EmailLibrary/EmailInterface.php");

  $config = require $_SERVER["DOCUMENT_ROOT"] . "/Artzy/config/config.php";
  $conn = Db::getInstance($config);

  $sql = new SQLInterface($conn);
  $email = new EmailInterface();

  $InMailBoxType = "IN";
	$outMailBoxType = "OUT";
	if($_POST["messageType"] == "CRITIQUE_MESSAGE"){
		$InMailBoxType = "INReview";
		$outMailBoxType = "OUTReview";
	}
	die( sendMessageType($_POST["user"], $_POST["userId"], $_POST["sendto"], $_POST["message"], $outMailBoxType, $InMailBoxType, $_POST["mediaId"], $sql, $email) );

  function sendMessageType($currUsername, $currId, $recUsername, $message, $outType, $inType, $mediaId, $sql, $email){

		$messageId = $sql->insertMessage($message);

		$reciever = $sql->getUser($recUsername);

		$recId = $reciever["id"];


		$messageDataId = $sql->insertMessageData($messageId, $currId, $recId, $mediaId);

		$sql->insertMessagebox($currId, $outType, $messageDataId);

		$sql->insertMessagebox($recId, $inType, $messageDataId);


		///good enough for now
		$email->sendEmail($currUsername . ": <br/><br/>" . $message . "<br/><br/><br/><br/><br/><a href = 'www.themural.co'>Go to The Mural</a>" , $currUsername . " has sent you a message: " . $message, $reciever["email"]);

		//die($_POST["message"] . $_POST["userId"] . $_POST["sendto"]);
		return "sent!";

	}


  echo "testReturn";
?>
