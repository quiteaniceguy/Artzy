<?php
include_once "PHPMailer/PHPMailerAutoload.php";
 function sendEmail($message, $subject, $email){
	 
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

	$mail->SetFrom('chefelthomas@gmail.com', 'Artzy');

	$mail->Subject    = $subject;

	$mail->MsgHTML($message);

	$address = $email;
	$mail->AddAddress($address, "Artzy");

	if(!$mail->Send()) {
	  echo "Mailer Error: " . $mail->ErrorInfo;
	  die("<br/> failed email request");
	} else {
	  //echo "Message sent to " . $email;
	}
	
  }
  function testFunc(){
	  return "what";
  }
?>