<!DOCTYPE html>
<html>

<head>
	<title> The Mural</title>
	<link rel="stylesheet" href="/Artzy/css/profilePage.css">
	<link rel="stylesheet" href="/Artzy/css/imageOptions.css">
	<link rel = "stylesheet" href = "/Artzy/css/Contact.css">
</head>
<body id="bod">
	<script src = '/Artzy/src/JSActions/addComment.js'></script>
	<script src = '/Artzy/src/JSActions/addLike.js'></script>
	<script src = '/Artzy/src/JSActions/LoadMedia.js'></script>
	
	
	<?php
		session_start();
		$config = require($_SERVER["DOCUMENT_ROOT"] . '/Artzy/config/config.php');
		
		$conn = new mysqli($config["mysql"]["servername"], $config["mysql"]["username"], $config["mysql"]["password"], $config["mysql"]["dbName"]);
		if(!$conn){
			die("connection to server failed");
		}
		
		/////////////include
		include  $_SERVER["DOCUMENT_ROOT"] . '/Artzy/src/actions/DisplayComment.php';
		include  $_SERVER["DOCUMENT_ROOT"] . '/Artzy/src/actions/DisplayMediaOptions.php';
		include  $_SERVER["DOCUMENT_ROOT"] . '/Artzy/src/actions/DataRetriever.php';
		include  $_SERVER["DOCUMENT_ROOT"] . '/Artzy/src/actions/DisplayMedia.php';
		
		include  $_SERVER["DOCUMENT_ROOT"] . '/Artzy/src/siteComponents/SessionChecker.php';
		include  $_SERVER["DOCUMENT_ROOT"] . '/Artzy/src/siteComponents/header.php';
		include  $_SERVER["DOCUMENT_ROOT"] . '/Artzy/src/siteComponents/MessageModal.php';
		include  $_SERVER["DOCUMENT_ROOT"] . '/Artzy/src/siteComponents/Contact.php';
		
		
		
		///uses group name to get group id
		
		$groupId = getGroupId($_GET["group"], $conn);
		$groupLinks = getGroupLinks($groupId, $conn);
		
		echo  "<p style='font-size: 10vh;' >{$_GET["group"]}:</p>" ."<br/>" ;
		
		
		
		$groupIds = array();
		//uses group id to get group links
		for ($groupLink = 0; $groupLink < sizeof($groupLinks); $groupLink++) {
			array_push($groupIds, $groupLinks[$groupLink]["mediaId"]);
		}
		displayNormalFormatWithLoadButton($groupIds, 5, $conn);
		
		
		///load more media button
		//echo "<span  id = \"loadMediaButton{$_GET["group"]}\" onClick = \"loadMedia('{$_GET["group"]}', 1, 1)\"><b>Load more Media</b></span>";

			
		
		
	?>
</body>

</html>