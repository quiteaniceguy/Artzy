<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
  <link rel="icon" href="/Artzy/icons/favicon.PNG" type="image/png">
	<title>PROFILE</title>
	
	<link rel="stylesheet" href="/Artzy/css/profilePage.css">
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  
</head>
<body id="bod">
	
	<script src = '/Artzy/src/JSActions/addComment.js'></script>
	<script src = '/Artzy/src/JSActions/addLike.js'></script>
	<script src = '/Artzy/src/JSActions/LoadMedia.js'></script>
	
	<?php
	
		include $_SERVER["DOCUMENT_ROOT"] . '/Artzy/src/actions/DisplayComment.php';
		include $_SERVER["DOCUMENT_ROOT"] . '/Artzy/src/actions/DisplayMediaOptions.php';
		include $_SERVER["DOCUMENT_ROOT"] . '/Artzy/src/actions/DataRetriever.php';
		include $_SERVER["DOCUMENT_ROOT"] . '/Artzy/src/actions/DisplayMedia.php';
		
		include $_SERVER["DOCUMENT_ROOT"] . '/Artzy/src/siteComponents/SessionChecker.php';
		include $_SERVER["DOCUMENT_ROOT"] . '/Artzy/src/siteComponents/header.php';
		include $_SERVER["DOCUMENT_ROOT"] . '/Artzy/src/siteComponents/MessageModal.php';
		
		$config = require($_SERVER["DOCUMENT_ROOT"] . '/Artzy/config/config.php');
		
		echo "<br/><br/><br/><br/>";
		
		//echo "<button id='myBtn' onClick = \"openModal('{$_GET["username"]}')\">MESSAGE THIS USER</button>";
		
		$user=NULL;
		$pass=NULL;
		$id=NULL;
		
	
		$conn = new mysqli($config["mysql"]["servername"], $config["mysql"]["username"], $config["mysql"]["password"], $config["mysql"]["dbName"]);
		if(!$conn){
			die("connection to server failed");
		}
		$temp_user = getUser($_GET["username"], $conn);
		
		
			
		if($temp_user != null){
			
			echo "<br/><br/><br/><br/><br/>";
			
			 echo "<div id='userInfo'>";
			 ///echos profile picture if it exists
			if (file_exists("../../UserData/profilePictures/{$temp_user["id"]}.jpg")){
				list($width, $height) = getimagesize("../../profilePictures/{$temp_user["id"]}.jpg");
				
				$size = $height/15;
				$imageWidth = $width / $size;
				$imageHeight = $height / $size;
				echo "<div class = 'profilePicture' style = ' background-size: {$imageWidth}vw {$imageHeight}vw; background-image: url(../../UserData/profilePictures/{$temp_user["id"]}.jpg); '></div></br>";
			}else{
				echo "<br/>";
			}
			 echo "<b style='font-size: 12vh' >" . $temp_user["username"] . "'s account: </b><br/>";
			
			//echo "<img  style='position: absolute; height:5vh; width: 5vw; left: 47.5vw;' src='../../icons/mailIconTwo.png'  onClick = \"openModal('{$username}', '{$mediaId}')\" /><br/><br/><br/> ";
			
			echo "<br/><br/><b style='font-size: 4vh'>ABOUT</b><br/><br/>" .
			 "<p style='width: 20vw;'>{$temp_user["about"]}</p>";
			
			echo "<br/><br/><br/><br/><br/>" ;
			
			echo "<br/>";
			echo "<b style='font-size: 12vh'>Posts: </b></br>";
			echo "</div>";
			//echo "<b style='font-size: 12vh>Posts:</b><br/>";
			$user = $temp_user["username"];
			$id = $temp_user["id"];
		
			
		}
		
		
		
		///gets all media from current user
		
		$mediaArray = getMediaIdsFromUser($id, $conn);
		$mediaIds = array();
		
		if (sizeof($mediaArray) > 0){
			for ($i = 0; $i < sizeof($mediaArray); $i++){
				array_push($mediaIds, $mediaArray[$i]["id"]);
			}
			
			displayNormalFormatWithLoadButton($mediaIds, 50, $conn);
		}else{
			echo "<br/><br/><br/><br/><br/>";
			echo "<b style='font-size: 7vh; ' >" . $_GET["username"] . " has no images :(</b>";
		}
		
	
	?>
  <div id="main"></div>
	<div id="below-main"></div>
</body>
</html>