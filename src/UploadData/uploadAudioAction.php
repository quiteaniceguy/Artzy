<?php
  session_start();
  
  require "../../config/S3Connect.php";
  
  ini_set('display_errors',1);
  error_reporting(E_ALL);
  
  require "../RemoteFileLibrary/S3Interface.php";
  
  $s3 = require "../../config/S3Connect.php";

  $config = require('../../config/config.php');
  $fileUploader = new S3Interface($config['s3']['bucket'], $s3);
  
  $fileName = $_FILES["uploadedImage"]["name"];
  
  $extension = explode('.', $fileName);
  $extension = strtolower(end($extension));
  
  if($_SESSION["currentUser"]!=NULL && $_SESSION["currentId"]!=NULL && $extension == 'mp3'){
	  
	  //connects to server
	  $config = require('../../config/config.php');
		
	  $conn = new mysqli($config["mysql"]["servername"], $config["mysql"]["username"], $config["mysql"]["password"], $config["mysql"]["dbName"]);
	  if(!$conn){
		die("connection to server failed");
	  }
	  
	  //gets image data
	  /*
	  $imagetemp=$_FILES["uploadedImage"]["tmp_name"];
	  list($imageWidth, $imageHeight) = getimagesize($imagetemp);
	  */
	  
	  $audiotemp = $_FILES["uploadedAudio"]["tmp_name"];
	  
	  
	  //puts basic data into media table
	  $sql_one = "INSERT INTO table_media(userId, mediaType) VALUES( '{$_SESSION["currentId"]}', '4') ";
	  if ( $conn->query($sql_one)== TRUE ){
		echo "image uploaded";
	  }else {
		die("media not uploaded");
	  }
	  $mediaId = mysqli_insert_id($conn);
	  
	  ///puts audio data into audio table
	  //$sql_two = "INSERT INTO table_audio(audioName, mediaId) VALUES( '{$_POST["audioName"]}', '{$mediaId}' ) ";
	  $sql_two = "INSERT INTO table_audio(audioName, mediaId) VALUES(?, ?) ";
	  
	  try{
		$stmt = $conn->prepare($sql_two);
		$stmt->bind_param('si', $_POST["audioName"], $mediaId);
		$stmt->execute();
	  }catch(Exception $e){
		  die("prepare failed: " . $e);
	  }
	

	  ///gets id of last uploaded thing
	  $id = mysqli_insert_id($conn);
	  
	  ///uploads each link from group to user
	  $groups=explode(" ", " " . $_POST["groups"]);
	  
	  echo "<br/><br/><br/><br/><br/><br/>";
	  for ( $i=1; $i<sizeof($groups); $i=$i+1) {
		  echo $groups[$i] . "<br/>";
		  
		  $sql= " SELECT * FROM table_groups WHERE name='{$groups[$i]}' ";
		  $result=$conn->query($sql);
		  if (!result){
			  die("sql broken");
		  }
		  
		  while ($row = mysqli_fetch_assoc($result)){
			  echo $row["id"] . "<br/>";
			  $sql = "INSERT INTO table_groupLinks(groupId, mediaId) VALUES( '{$row["id"]}', '{$mediaId}' ) ";
			  if( !$conn->query($sql) ){
				  die("dead");
			  }
		  }
	  }
	  

	 
	  //uploads image
	  /*
	  if ( move_uploaded_file($imagetemp, "../../userData/audioPost/images/" . $mediaId . ".jpg")){
		echo "image moved";
	  }else{
		echo $_FILES["uploadedImage"]["error"];
		die("image file move failed");
	  }
	  */
	  //uploades audio
	  //$fileUploader->uploadS3File($_FILES, "/var/www/html/artzy/src/FileUploader/TempFiles/", "UserData/AudioPost/Audio/", "uploadedAudio", $mediaId . ".mp3") == 0
	  if ( $fileUploader->uploadS3File($_FILES, "/var/www/html/artzy/src/RemoteFileLibrary/TempFiles/", "UserData/AudioPost/Audio/", "uploadedAudio", $mediaId . ".mp3") == 0){
		echo "audiofile moved";
	  }else{
		echo $_FILES["uploadedAudio"]["error"];
		die("audio file move failed");
	  }
	  header('Location: uploadMedia.php?uploaded=1');
  }else{
	  header('Location: uploadMedia.php?uploaded=2');
	  echo "must be logged in to upload file";
  }
  
  
  //include "../siteComponents/header.php"; 
 
  


?>