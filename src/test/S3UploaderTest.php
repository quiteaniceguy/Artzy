<?php
/*
    require "../FileUploader/FileUploader.php";
	require "../../config/S3Connect.php";
	
	$config = require('../../config/config.php');
	
	$fileUploader = new FileUplaoder($config['s3']['bucket'], $s3);
	
	
	echo $fileUploader->uploadS3File($_FILES, "/var/www/html/artzy/src/FileUploader/TempFiles/", "uploads/");
  */
  require "../RemoteFileLibrary/URLChecker.php";
  
  echo URLChecker::checkURL("https://s3-us-west-2.amazonaws.com/themuralreviewbucket/uploads/DSC_0957.jpg");
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Upload</title>
    </head>
    <body>
        <form action = "S3UploaderTest.php" method = "post" enctype = "multipart/form-data">
            <input type = "file" name = "file">
            <input type = "submit" value = "Upload">
        </form>
		
		<img style = "width: 100vh; height: 100vh" src = "https://s3-us-west-2.amazonaws.com/themuralreviewbucket/uploads/DSC_0957.jpg"/>
    </body>
</html>
