<?php

require_once($_SERVER['DOCUMENT_ROOT']. "/Artzy/libs/phpmailer/PHPMailerAutoload.php");


 function sendEmail($message, $subject, $email){

    try{ 
	$mail             = new PHPMailer();

	$mail->IsSMTP(); // telling the class to use SMTP
	
	$mail->SMTPDebug  = 0;                     // enables SMTP debug information (for testing)
											   // 1 = errors and messages
											   // 2 = messages only
	$mail->SMTPAuth   = true;                  // enable SMTP authentication
	$mail->SMTPSecure = "tls";                 
	$mail->Host       = "smtp.gmail.com";      // SMTP server
	$mail->Port       = 587;                   // SMTP port
	$mail->Username   = "chefelthomas@gmail.com";  // username
	$mail->Password   = "Kangeroo2";            // password

	$mail->SetFrom('chefelthomas@gmail.com', 'The Mural');

	$mail->Subject    = $subject;

	$mail->MsgHTML($message);

	$address = $email;
	$mail->AddAddress($address, "The Mural");

	if(!$mail->Send()) {
	  echo "Mailer Error: " . $mail->ErrorInfo;
	  die("<br/> failed email request");
	} else {
	  //echo "Message sent to " . $email;
	}
    }catch(Exception $e){
	die($e->getMessage());
    }


  }
  function testFunc(){
	  return "what";
  }
/*
  ini_set('display_errors', 1);
		ini_set('display_startup_errors', 1);
		error_reporting(E_ALL);
  try{
  echo "hello worlddd";
  $mail = new PHPMailer(true);
  sendEmail("hisomething", "holla", "tommyeblen@gmail.com");
  echo "mailer made";
 
  echo "hi";
  }catch(Exception $e){
	echo $e->getMessage();
  }
*/
?>
