<?php session_start(); ?>
<html>

<head>
	<title> title </title>
	<link rel="stylesheet" href="../../css/profilePage.css">
	<link rel="stylesheet" href="../../css/imageOptions.css">
</head>

<body id = "whiteBody" >
	<script src = '../JSActions/addComment.js'></script>
	<script src = '../JSActions/addLike.js'></script>
	<script src = '../JSActions/LoadMedia.js'></script>
	<?php
		
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
		
		$media = getMedia($_GET["mediaId"], $conn);
		echo "<br/><br/><br/><br/><br/>";
		echo displayMediaInLargeFormat($media, $conn);
		
		//echo $_GET["mediaId"];
		
		
		
		include "../siteComponents/header.php";
		include "../siteComponents/MessageModal.php";
		
	?>
</body>

</html>