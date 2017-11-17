<?php
  require_once ($_SERVER["DOCUMENT_ROOT"] . "/Artzy/src/connections/connection.php");
  require_once ($_SERVER["DOCUMENT_ROOT"] . "/Artzy/src/models/s3models/S3Interface.php");
  require_once ($_SERVER["DOCUMENT_ROOT"] . "/Artzy/src/models/sqlmodels/SQLInterface.php");


  $config = require $_SERVER["DOCUMENT_ROOT"] . "/Artzy/config/config.php";
  $s3 = require $_SERVER["DOCUMENT_ROOT"] . "/Artzy/config/S3Connect.php";

  $conn = Db::getInstance($config);

  $sql = new SQLInterface($conn);
  $fileUploader = new S3Interface($config['s3']['bucket'], $s3);


  //uploads audio data. Must change 173 to session user when setup
  $mediaId = $sql->uploadMedia(173, 4);
  $audioId = $sql->uploadAudio($_POST["audioName"], $mediaId);

  //upload files to aws s3
  $uploadStatus = $fileUploader->uploadS3File($_FILES, "/var/www/html/Artzy/src/RemoteFileLibrary/TempFiles/", "UserData/AudioPost/Audio/", "uploadedAudio", $mediaId . ".mp3");

  if ( $uploadStatus == 0){
	   echo "audiofile moved";
  }else{
	echo $_FILES["uploadedAudio"]["error"];
	 die("audio file move failed: " . $uploadStatus);
  }

  $groups = explode(" ", " " . $_POST["groups"]);
  $sql->uploadGroupLinks($groups, $mediaId);

  echo "upload Audio";
 ?>
