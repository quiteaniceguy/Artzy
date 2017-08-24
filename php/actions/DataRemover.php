<?php
	include_once "DataRetriever.php";
	function deleteMedia($mediaId, $conn){
		
		///get mediaType
		$media = getMedia($mediaId, $conn);
		
		//return $mediaId;
		
		if ( deleteComments($mediaId, $conn) && deleteLikes($mediaId, $conn) ){
			return "3";
		}
		
		//image
		if ($media["mediaType"] == 1){
			deleteImage($mediaId, $conn);
			//delete from table_image and image file
		}
		
		//text
		if ($media["mediaType"] == 3){
			deleteText($mediaId, $conn);
		}
		
		//audi
		if ($media["mediaType"] == 4) {
			 deleteAudio($mediaId, $conn);
		}		
		//delete group group links and from table_media
		deleteGroupLinks($mediaId, $conn);
		
		
		$sql = "DELETE FROM table_media WHERE id = {$mediaId}";
		if ( !$conn->query($sql) ){
			return "failed to delete";
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
	
	function deleteAudio($mediaId, $conn){
		$sql = "DELETE FROM table_audio WHERE mediaId = {$mediaId}";
		
		unlink("../../userData/audioPost/audio/{$mediaId}.mp3");
		
		if ($conn->query($sql)) {
			return 0;
		}
		
		return 1;
	}
	
	function deleteImage($mediaId, $conn){
		$sql = "DELETE FROM table_images WHERE mediaId = {$mediaId}";
		unlink("../../images/{$mediaId}.jpg");
		if ($conn->query($sql)) {
			return 0;
		}
		
		return "failed";
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
		
		return 0;
	}
	
	function deleteLikes($mediaId, $conn){
		$sql = "DELETE FROM table_likes WHERE mediaId = {$mediaId}";
		
		
		$conn->query($sql);
		
		return 0;
	}

?>