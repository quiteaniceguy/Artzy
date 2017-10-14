<!DOCTYPE html>
<html>

<head>
	<title> title </title>
	<link rel="stylesheet" href="../../css/profilePage.css">
	<link rel="stylesheet" href="../../css/imageOptions.css">
</head>
<body id="bod">
	<script src = '../JSActions/addComment.js'></script>
	<script src = '../JSActions/addLike.js'></script>
	<script src = '../JSActions/LoadMedia.js'></script>
	
	
	<?php
		session_start();
		$config = require('../../config/config.php');
		
		$conn = new mysqli($config["mysql"]["servername"], $config["mysql"]["username"], $config["mysql"]["password"], $config["mysql"]["dbName"]);
		if(!$conn){
			die("connection to server failed");
		}
		
		/////////////include
		include '../actions/DisplayComment.php';
		include '../actions/DisplayMediaOptions.php';
		include '../actions/DataRetriever.php';
		include '../actions/DisplayMedia.php';
		
		include "../siteComponents/SessionChecker.php";
		include "../siteComponents/header.php";
		include "../siteComponents/MessageModal.php";
		
		
		session_start();
		error_reporting(E_ALL);
		ini_set('display_errors', 'on');
		
		
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