 <?php

	
	require_once($_SERVER['DOCUMENT_ROOT']. "/Artzy/libs/phpmailer/PHPMailerAutoload.php");
	require_once($_SERVER['DOCUMENT_ROOT'] . '/Artzy/src/controllerHelpers/ErrorReports.php');
	require_once($_SERVER["DOCUMENT_ROOT"] . "/Artzy/src/connections/connection.php");
	require_once($_SERVER['DOCUMENT_ROOT'] . '/Artzy/src/models/sqlmodels/SQLInterface.php');
	require_once($_SERVER["DOCUMENT_ROOT"] . "/Artzy/src/EmailLibrary/EmailActions.php");
	require_once($_SERVER["DOCUMENT_ROOT"] . "/Artzy/src/controllers/EmailLibrary/EmailInterface.php");
	
	$config = require $_SERVER["DOCUMENT_ROOT"] . "/Artzy/config/config.php";
	$conn = Db::getInstance($config);
	
	$sqlInterface = new SQLInterface($conn);
	
    try{
		
		///check if other account already exists with the same username
		$otherAccount = false;
		
		$result = $sqlInterface->getUser($_POST["username"]);
		
		if($result != false ){
			header( 'Location:/Artzy/indexTest.php?controller=createAcc&action=home&error=USERNAME ALREADY EXISTS' );
			die('other account already exists');
			$otherAccount = true;
		}
		
			
		//check if all of form is filled out
		$formFilledOut = 
			is_string($_POST["username"]) &&
			is_string($_POST["password"]) &&
			is_string($_POST["email"]) &&
			is_string($_POST["about"]) &&
			is_string($_POST["school"]) &&
			is_string($_POST["fName"]) &&
			is_string($_POST["lName"]) &&
			is_numeric($_POST["age"]) &&
			is_numeric($_POST["phoneNumber"]) ;
		if (!$formFilledOut) {
			header( 'Location: /Artzy/indexTest.php?controller=createAcc&action=home&error=MUST FILL OUT EVERYTHING' );
		}
		
		//check if passwords match
		$passwordsMatch = $_POST["password"] == $_POST["passwordCheck"];
		if (!$passwordsMatch) {
			header( 'Location: /Artzy/indexTest.php?controller=createAcc&action=home&error=PASSWORD DO NOT MATCH' );
		}
		
		///create verification code for user to verify account, and upload user info
		$verificationCode=rand(1,2000000);
		
		$userId = $sqlInterface->insertUserData($_POST["username"], $_POST["password"], $_POST["email"], $_POST["about"],
									$_POST["school"], $_POST["phoneNumber"], $_POST["age"], $_POST["fName"],
									$_POST["lName"], $verificationCode ); 	  

		
		//send verification email+link with verification code
		$emailMessage = "<a href='54.191.45.173/Artzy/src/Verify/Verify.php?code={$verificationCode}&userid={$userId}' >" . "Click here to verify your account!" . "</a>";
		
		$emailInterface = new EmailInterface();
		$emailInterface->sendEmail($emailMessage, "test subject", $_POST["email"]);

		$_SESSION["m_Login"] = "Check your emaily to verify your account(make sure to check your SPAM folder)";
		
		header('Location: /Artzy/src/views/Login/Login.php');
    }
    catch(Exception $e){
      die($e);
    }
	
	
  ?>