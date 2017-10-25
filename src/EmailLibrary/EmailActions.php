<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once"vendor/autoload.php";




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
  error_reporting(-1);
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
