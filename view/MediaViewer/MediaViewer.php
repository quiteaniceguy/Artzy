<?php session_start(); ?>
<html>

<head>
	<title> title </title>
	<link rel="stylesheet" href="/Artzy/css/profilePage.css">
	<link rel="stylesheet" href="/Artzy/css/imageOptions.css">
</head>

<body id = "whiteBody" >
	<script src = '/Artzy/src/JSActions/addComment.js'></script>
	<script src = '/Artzy/src/JSActions/addLike.js'></script>
	<script src = '/Artzy/src/JSActions/LoadMedia.js'></script>
	<?php
		
		$config = require($_SERVER["DOCUMENT_ROOT"] . '/Artzy/config/config.php');
		
		$conn = new mysqli($config["mysql"]["servername"], $config["mysql"]["username"], $config["mysql"]["password"], $config["mysql"]["dbName"]);
		if(!$conn){
			die("connection to server failed");
		}
		
		/////////////include
		include $_SERVER['DOCUMENT_ROOT'] . '/Artzy/src/actions/DisplayComment.php';
		include $_SERVER['DOCUMENT_ROOT'] . '/Artzy/src/actions/DisplayMediaOptions.php';
		include $_SERVER['DOCUMENT_ROOT'] . '/Artzy/src/actions/DataRetriever.php';
		include $_SERVER['DOCUMENT_ROOT'] . '/Artzy/src/actions/DisplayMedia.php';
		
		include $_SERVER['DOCUMENT_ROOT'] . "/Artzy/src/siteComponents/header.php";
		include $_SERVER['DOCUMENT_ROOT'] . "/Artzy/src/siteComponents/MessageModal.php";
		
		$media = getMedia($_GET["mediaId"], $conn);
		echo "<br/><br/><br/><br/><br/>";
		echo displayMediaInLargeFormat($media, $conn);
		
		//echo $_GET["mediaId"];
		
		
		
		
		
	?>
</body>

</html>