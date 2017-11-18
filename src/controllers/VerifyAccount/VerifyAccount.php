<?php
	session_start();
  require_once($_SERVER['DOCUMENT_ROOT'] . '/Artzy/src/models/sqlmodels/SQLInterface.php');
  require_once($_SERVER["DOCUMENT_ROOT"] . "/Artzy/src/connections/connection.php");
  require_once($_SERVER["DOCUMENT_ROOT"] . "/Artzy/src/controllers/EmailLibrary/EmailInterface.php");
  require_once($_SERVER['DOCUMENT_ROOT'] . "/Artzy/src/views/DisplayHelpers/DisplayMedia.php");

  $config = require $_SERVER["DOCUMENT_ROOT"] . "/Artzy/config/config.php";
  $conn = Db::getInstance($config);

  $sql = new SQLInterface($conn);

	$verificationCode=$_GET["code"];
	$id=$_GET["userid"];




	$user = $sql->getUsername($id);




	if( $user["verificationCode"] == $verificationCode ){

		$sql->updateUserActivation($user["id"], 1);
		echo "account verified";
	}else{
		echo "codes don't match";
	}





?>
