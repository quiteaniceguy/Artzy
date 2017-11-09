<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
	<title> title </title>
	<link rel="stylesheet" href="/Artzy/css/profilePage.css">
	<link rel="stylesheet" href="/Artzy/css/imageOptions.css">
</head>
<body id="bod">
	<script src = '/Artzy/src/JSActions/addComment.js'></script>
	<script src = '/Artzy/src/JSActions/addLike.js'></script>
	<script src = '/Artzy/src/JSActions/LoadMedia.js'></script>
	<script src = '/Artzy/src/JSActions/LoadUserMedia.js'></script>
	
	
	<?php
		
		$config = require($_SERVER["DOCUMENT_ROOT"] . '/Artzy/config/config.php');
		
		$conn = new mysqli($config["mysql"]["servername"], $config["mysql"]["username"], $config["mysql"]["password"], $config["mysql"]["dbName"]);
		if(!$conn){
			die("connection to server failed");
		}
		
		/////////////include
		include $_SERVER["DOCUMENT_ROOT"] . '/Artzy/src/actions/DisplayComment.php';
		include $_SERVER["DOCUMENT_ROOT"] . '/Artzy/src/actions/DisplayMediaOptions.php';
		include $_SERVER["DOCUMENT_ROOT"] . '/Artzy/src/actions/DataRetriever.php';
		include $_SERVER["DOCUMENT_ROOT"] . '/Artzy/src/actions/DisplayMedia.php';
		
		include $_SERVER["DOCUMENT_ROOT"] . '/Artzy/src/siteComponents/header.php';
		include $_SERVER["DOCUMENT_ROOT"] . '/Artzy/src/siteComponents/SessionChecker.php';
		
		
		
		$media = getMediaIdsFromUser($_SESSION["currentId"], $conn);
		echo "<br/><br/><br/><br/><br/><br/><br/><br/> <b style = 'font-size: 10vh;' >Hi " . $_SESSION["currentUser"] . "</b>";
		
		
		
		
		
		
		
		
		$mediaIds = array();
		
		//uses group id to get group links
		for ($i = 0; $i < sizeof($media); $i++) {
			array_push($mediaIds, $media[$i]["id"]);
		}
		
		displayUserNormalFormat($mediaIds, 50, $conn);
		
		
		///load more media button
		//echo "<span  id = \"loadMediaButton{$_GET["group"]}\" onClick = \"loadMedia('{$_GET["group"]}', 1, 1)\"><b>Load more Media</b></span>";

			
		
		
		
	?>
</body>

</html>