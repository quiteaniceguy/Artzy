<?php
	session_start();

	require($_SERVER['DOCUMENT_ROOT'] . '/Artzy/src/controllerHelpers/ErrorReports.php');
	require_once($_SERVER["DOCUMENT_ROOT"] . "/Artzy/src/connections/connection.php");
	require($_SERVER['DOCUMENT_ROOT'] . '/Artzy/src/models/sqlmodels/SQLInterface.php');

	$config = require $_SERVER["DOCUMENT_ROOT"] . "/Artzy/config/config.php";
	$conn = Db::getInstance($config);

	$sqlInterface = new SQLInterface($conn);



	$user=$_GET["username"];
	$pass=$_GET["password"];

	$result = $sqlInterface->getLoginUser($user, $pass);

	if ($result != NULL){
		echo 'not null';

		if ($result["isActivated"] == 1){

			$_SESSION["currentUser"] = $user;
			$_SESSION["currentId"] = $result["id"];
			$_SESSION["currentPass"] = $pass;

			setcookie("ARTZY_USERNAME", $user, time() + (86400 * 30), "/");
			setcookie("ARTZY_PASSWORD", $pass, time() + (86400 * 30), "/");

			//header( 'Location: ../ProfilePage/profilePage.php' );
			header( 'Location: /Artzy/indexTest.php?controller=groupViewer&action=home' );
		}else{
			$_SESSION["m_Login"]="Unverified Account. Check your email to verify(make sure to check your SPAM folder).";
			header('Location: /Artzy/indexTest.php?controller=login&action=home');
		}

	}else{
		if($_GET["cookie"] == 1){
			$_SESSION["cookie"] = "1" ;
			header('Location: /Artzy/indexTest.php?controller=login&action=home');

		}else{
			$_SESSION["m_Login"] = "password or username incorrect" ;
			header('Location: /Artzy/indexTest.php?controller=login&action=home');
			echo "no user found";
		}


	}

?>
