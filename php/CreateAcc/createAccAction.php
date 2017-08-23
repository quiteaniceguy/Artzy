<?php session_start() ?>
<!DOCTYPE html>
<html>
<head>
  <title>account created</title>
</head>
<body>
  <?php
	error_reporting(E_ALL);
	require "PHPMailer/PHPMailerAutoload.php";

    try{
     
	  
      
	  
	  
	  
	  
	  ///uploads user info to database
      include '../ConnectionLibrary/ConnectoToDB.php';
	  $conn = new PDO("mysql:host={$SERVER_NAME};dbname={$SERVER_DB_NAME}", $SERVER_USERNAME, $SERVER_PASSWORD);
      
      if($conn->connect_error){
			die("failed");
		}
      
	  ///create verification code for user to verify account
	  $verificationCode=rand(1,2000000);
	  

      //insert data into database
	  $sql="INSERT INTO db_users(username, password, email, about, school, phoneNumber, age, fName, lName, verificationCode, isActivated)
      VALUES( :username, :password, :email, :about, :school, :phoneNumber, :age, :fName, :lName, :verificationCode, '0')  "; 
	  echo "here 1";
	  try{
		  $stmt = $conn->prepare($sql);
		  $stmt->bindParam(':username' , $_POST["username"]);
		  $stmt->bindParam(':password' , $_POST["password"]);
		  $stmt->bindParam(':email' , $_POST["email"]);
		  $stmt->bindParam(':about' , $_POST["about"]);
		  $stmt->bindParam(':school' , $_POST["school"]);
		  $stmt->bindParam(':phoneNumber' , $_POST["phoneNumber"]);
		  $stmt->bindParam(':age' , $_POST["age"]);
		  $stmt->bindParam(':fName' , $_POST["fName"]);
		  $stmt->bindParam(':lName' , $_POST["lName"]);
		  $stmt->bindParam(':verificationCode' , $verificationCode );
		  
		  if($stmt->execute())
			  echo 'executed';
		  
	  }catch(Exception $ex){
		  die("Exception: " . $ex);
	  }
	  echo "here 2";
	  /*
      if($conn->query($sql)==TRUE){
			echo " account created!";
			include "../test/links.php";
		}else{
			die(mysqli_error($conn));
	  }
	  */
	  //$userId = mysqli_insert_id($conn);
	  $userId = $conn->lastInsertId();
	  
	  ///uploads profile picture
	  $imagetemp=$_FILES["uploadFile"]["tmp_name"];
	  $uploadDir = "/var/www/html/artzy/profilePictures/" . $_POST["username"] . "_" . $userId . ".jpg";
	  
	  //check if server has permissions to write
	  if( !( is_writable("/var/www/html/artzy/profilePictures")) ){
		  die("not writable");
	  }
	  
	  if(move_uploaded_file($imagetemp, $uploadDir)){
	    echo " file moved!";
	  }else{
		die("it didn't work" . $_FILES["uploadFile"]["error"]);				
	  }
		
	  ////end of uploaded profile picture
	  
	  
	  
	  $last_id = $conn->lastInsertId();
	  sendEmail($verificationCode, $last_id, $_POST["email"]);
      
      header( 'Location: ../Login/Login.php' );
    }
    catch(Exception $e){
      die($e);
    }
	
	include "../test/links.php";
	
	///sends link to user email with verification code 
  function sendEmail($veri, $id, $email){
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

	$mail->SetFrom('chefelthomas@gmail.com', 'Test');

	$mail->Subject    = "I hope this works!";

	$mail->MsgHTML("<a href='73.164.242.212/artzy/php/Verify/Verify.php?code={$veri}&userid={$id}' >" . "Click here to verify your account!" . "</a>");
	
	$address = $email;
	$mail->AddAddress($address, "Test");

	if(!$mail->Send()) {
	  echo "Mailer Error: " . $mail->ErrorInfo;
	  die("<br/> failed email request");
	} else {
	  echo "Message sent!";
	}
	
  }
  ?>
</body>
</html>
