<?php
	//this file should use a class if you wanna fix it
	include_once "DataRetriever.php";
	
	require "../../config/S3Connect.php";
	require "../RemoteFileLibrary/S3Interface.php";

	$s3 = require "../../config/S3Connect.php";
	$config = require('../../config/config.php');
	
	$fileRemover = new S3Interface($config['s3']['bucket'], $s3);
	
	function deleteMedia($mediaId, $conn){
		global $fileRemover;
		global $config;
		
		
		$fileRemover->deleteS3File("windows.jpg");
		///get mediaType
		$media = getMedia($mediaId, $conn);
		
		//return $mediaId;
		
		if ( !deleteComments($mediaId, $conn) && !deleteLikes($mediaId, $conn) ){
			return "3";
		}
		
		//image
		if ($media["mediaType"] == 1){
			deleteImage($mediaId, $conn, $config['storage']['shortPImages'], $fileRemover);
			//delete from table_image and image file
		}
		
		//text
		if ($media["mediaType"] == 3){
			deleteText($mediaId, $conn);
		}
		
		//audi
		if ($media["mediaType"] == 4) {
			 deleteAudio($mediaId, $conn, $config['storage']['shortPAudio'], $fileRemover);
		}		
		//delete group group links and from table_media
		deleteGroupLinks($mediaId, $conn);
		
		
		$sql = "DELETE FROM table_media WHERE id = {$mediaId}";
		if ( !$conn->query($sql) ){
			return "couldn't delete media " . $mediaId;
		} 
		
		return 0;
		
	}
	
	function deleteText($mediaId, $conn){
		$textMedia = getWriting($mediaId, $conn);
		
		$sql = "DELETE FROM table_textData WHERE mediaId = {$mediaId}";
		
		if ($conn->query($sql)) {
			$sql = "DELETE FROM table_text WHERE id = {$textMedia["textId"]}";
			if ($conn->query($sql)) {
				return 0;
			}
			return 5;
		}
		
		return $textMedia["textId"];
	}
	
	function deleteAudio($mediaId, $conn, $fileLocation, $fileRemover){
		$fileRemover->deleteS3File($fileLocation . $mediaId . ".mp3");
	
		$sql = "DELETE FROM table_audio WHERE mediaId = {$mediaId}";
		if ($conn->query($sql)) {
			return 0;
		}
		
		return 1;
	}
	
	function deleteImage($mediaId, $conn, $fileLocation, $fileRemover){
		
		$fileRemover->deleteS3File($fileLocation . $mediaId . ".jpg");
	
		$sql = "DELETE FROM table_images WHERE mediaId = {$mediaId}";
		if ($conn->query($sql)) {
			return 0;
		}
		
		return 1;
	}
	
	function deleteGroupLinks($mediaId, $conn){
		$sql = "DELETE FROM table_groupLinks WHERE mediaId = {$mediaId}";
		
		
		if ($conn->query($sql)) {
			return 0;
		}
		
		return 1;
	}
	
	function deleteComments($mediaId, $conn){
		$sql = "DELETE FROM table_comments WHERE mediaId = {$mediaId}";
		
		
		$conn->query($sql);
		
		return true;
	}
	
	function deleteLikes($mediaId, $conn){
		$sql = "DELETE FROM table_likes WHERE mediaId = {$mediaId}";
		
		
		$conn->query($sql);
		
		return true;
	}

?>