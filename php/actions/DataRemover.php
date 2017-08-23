<?php
	function deleteMedia($mediaId, $conn){
		/*
		///get mediaType
		$media = getMedia($mediaId, $conn);
		
		//image
		if ($media["mediaType"] == 1){
			//delete from table_image and image file
		}
		
		//text
		if ($media["mediaType"] == 3){
			//delwete from table_text and table_textData
		}
		
		//audi
		if ($media["mediaType"] == 4) {
			//delete from table_audio
		}		
		//delete group group links and from table_media
		$sql = "DELETE FROM table_media WHERE id = {$mediaId}";
		*/
		return 0;
	}
	
	function deleteText($mediaId, $conn){
		$textMedia = getWriting($mediaId, $conn);
		
		$sql = "DELETE FROM table_text WHERE id = {$textMedia["textId"]};
		DELETE FROM table_textData WHERE mediaId = {$mediaId}";
	}
	
	function deleteAudio($mediaId, $conn){
		$sql = "DELETE FROM table_audio WHERE mediaId = {$audioId}";
		delete("../../userData/audioPost/audio/{$mediaId}.mp3");
	}
	function deleteImage($mediaId, $conn){
		$sql = "DELETE FROM table_image WHERE id = {$imageId}";
		delete("../../images/{$mediaId}.jpg");
	}
	function deleteGroupLinks($mediaId, $conn){
		$sql = "DELETE FROM table_groupLinks WHERE id = {$mediaId}";
	}

?>