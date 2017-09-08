<?php session_start(); ?>
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
	<script src = '../JSActions/LoadUserMedia.js'></script>
	
	
	<?php
	
		$servername="localhost";
		$username="root";
		$password="";
		$dbName="db_artzytest";
		
		$conn = new mysqli($servername, $username, $password, $dbName);
		if(!$conn){
			die("connection to server failed");
		}
		
		/////////////include
		include '../actions/DisplayComment.php';
		include '../actions/DisplayMediaOptions.php';
		include '../actions/DataRetriever.php';
		include '../actions/DisplayMedia.php';
		
		session_start();
		error_reporting(E_ALL);
		ini_set('display_errors', 'on');
		
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

			
		
		
		echo 'hi';
		include "../siteComponents/header.php";
	?>
</body>

</html>