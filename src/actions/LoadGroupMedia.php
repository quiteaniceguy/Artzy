<?php
	
	require 'DataRetriever.php';
	require 'DisplayMedia.php';
	
	session_start();
	
	$config = require('../../config/config.php');
		
	$conn = new mysqli($config["mysql"]["servername"], $config["mysql"]["username"], $config["mysql"]["password"], $config["mysql"]["dbName"]);
	if(!$conn){
		die("connection to server failed");
	}
	
	$returnMessage = "";
	
	////different
	$groupId = getGroupId($_GET["group"], $conn);
	$groupLinks = getGroupLinks($groupId, $conn);
	
	$groupIds = array();
	for ($groupLink = 0; $groupLink < sizeof($groupLinks); $groupLink++) {
		array_push($groupIds, $groupLinks[$groupLink]["mediaId"]);
	}
	
	
	$mediaArray = getArrayOfMedia($groupIds, $conn);
	$nMedia = $_GET["nMedia"];
	
	//for testing
	/*
	for($i = 0; $i < sizeof($mediaArray); $i++)
		echo $mediaArray[$i]["id"] . "  ";
	echo "<br/>";
	*/
	$nMoreMediaToLoad = 0;
	for ($i = 0; $i + $_GET["nMedia"] < sizeof($mediaArray) && $i < $_GET["nMediaToLoad"] + $nMoreMediaToLoad; $i++) {
			
		$temp_media = $mediaArray[$i + $_GET["nMedia"]];
		//$returnMessage = $returnMessage . $temp_media["id"] . "  ";
		//echo $temp_media["id"] . "   ";
		$mediaToAdd = displayMediaInNormalFormat($temp_media, $conn);
		
		///if media doesn't have anything, load another media
		if ($mediaToAdd == "")
			$nMoreMediaToLoad++;
		
		$returnMessage = $returnMessage . $mediaToAdd;
		//$returnMessage = $returnMessage . testFunc();
		
		$nMedia++;
	}
	
	
	
	$returnMessage = str_replace("||||", "", $returnMessage);
	$returnMessage = $returnMessage . "||||" . $nMedia;
	
	
	
	//echo $_GET["group"] . "    " . $_GET["nMedia"] . "    " . $_GET["nMediaToLoad"];
	echo $returnMessage;
	
	
?>