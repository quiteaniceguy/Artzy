<?php
include_once "DisplayMediaOptions.php";
include_once "DisplayComment.php";
include_once "DataRetriever.php";

function displayNormalFormatWithLoadButton($mediaIds, $nMediaToLoad, $conn){
	///allPosts contains all posts
	echo "<div id = 'allPosts'>";
	
	$mediaArray = getArrayOfMedia($mediaIds, $conn);
	$nMedia = 0;
	
	$loadNMoreMedia = 0;
	for ($i = 0; $i < sizeof($mediaArray) && $i < ($nMediaToLoad + $loadNMoreMedia); $i++) {
			
		$temp_media = $mediaArray[$i];
		
		$mediaToPrint = displayMediaInNormalFormat($temp_media, $conn);
		/////testing
		$mediaType = array(1);
		getMediaAndType($mediaIds[$i], $mediaType, $conn);
		
		echo $mediaType[0];
		
		
		
		///
		echo $mediaToPrint;
		
		if ($mediaToPrint == "")
			$loadNMoreMedia++;
		
			
		
		/*
		echo $i;
		echo $mediaArray[$i]["name"];
		*/
		
		$nMedia++;
	}
	
	
	echo "</div>";//allPosts
	
	///create load more media button
	echo "<span  id = \"loadMediaButton\" onClick = \"loadMedia('{$_GET["group"]}', {$nMedia}, 7)\"><b>Load more Media</b></span>";
	
}
function displayNormalFormatWithUserLoadButton($mediaIds, $nMediaToLoad, $conn){
	///allPosts contains all posts
	echo "<div id = 'allPosts'>";
	
	$mediaArray = getArrayOfMedia($mediaIds, $conn);
	$nMedia = 0;
	for ($i = 0; $i < sizeof($mediaArray); $i++) {
			
		$temp_media = $mediaArray[$i];
		echo displayMediaInNormalFormatWithCritiques($temp_media, $conn);
		
		/*
		echo $i;
		echo $mediaArray[$i]["name"];
		*/
		$nMedia++;
	}
	
	
	echo "</div>";//allPosts
	
	///create load more media button
	//echo "<span  id = \"loadMediaButton\" onClick = \"loadUserMedia('3', {$nMedia}, 7)\"><b>Load more Media</b></span>";
	
}

function displayMediaInNormalFormat($temp_media, $conn){
	$username = getUsername($temp_media["userId"], $conn);
	
	
	$returnText = "";
	if ( $temp_media["name"] =="image"){
		
		$temp_image = getImage($temp_media["id"], $conn);
				
		if ( $temp_image["width"] > 10 && file_exists('../../images/' . $temp_image["id"] . '.jpg') ) {
			$imageId=$temp_image["id"];
				
			///finds scaled imaeg size
			$adj_img_size=400/$temp_image["width"];
			$adj_img_width=$temp_image["width"]*$adj_img_size;
			$adj_img_height=$temp_image["height"]*$adj_img_size;
			
			$returnText = $returnText . "<div id='post' style='width: 400px' > ";
			///outputs image
			
			$returnText = $returnText . "<div id='imageContent' > " .
				"<img id='userImage' style='height: {$adj_img_height}px; width: {$adj_img_width}px; ' src='../../images/{$imageId}.jpg' />";
				//sets account link to user of the image 
		$returnText = $returnText . displayImageOptions($username["username"], $temp_media["id"], $_SESSION["currentId"], $conn);
			$returnText = $returnText . "</div>";
			
			$returnText = $returnText . "<div id='imageInfo' >" . 
				"upload " . $imageId . "<br/>" .
				"{$temp_image["imageName"]}</br>" .
				"<br/></div>Comments:";
			
			///echo comments into <p>

			$returnText = $returnText . displayComment($temp_media["id"], $_SESSION["currentId"], 0, $conn);
			$returnText = $returnText . "</div><br/>";	
		}
		
	}
	elseif ( $temp_media["name"] =="text"){
		$temp_text = getWriting($temp_media["id"], $conn);
		 
		 if (strlen($temp_text["mediaText"]) > 4) {
			$returnText = $returnText . "<div id='post' style='width: 400px' > ";
			$returnText = $returnText . "<b>{$temp_text["title"]}</b><br/><br/>";
			$returnText = $returnText . "<div id = 'textPostContent' >";
			$returnText = $returnText . "<div id = 'textContent' >";
			
			$returnText = $returnText . "<div>" . $temp_text["mediaText"] . "</div>";
			$returnText = $returnText . "</div>";
			$returnText = $returnText . displayImageOptions($username["username"], $temp_media["id"], $_SESSION["currentId"], $conn);
			
			
			
			
			$returnText = $returnText . "</div>";	 
			
			$returnText = $returnText . displayComment($temp_media["id"], $_SESSION["currentId"], 0, $conn);
			$returnText = $returnText . "</div>";
		 }
		
		
	}
	elseif ( $temp_media["name"] == "audio"){
		$temp_audio = getAudio($temp_media["id"], $conn);
		
		if (file_exists('../../userData/audioPost/audio/' . $temp_audio["id"] . '.mp3')){
			$returnText = $returnText . "<div id='post' style='width: 400px' > ";
			$returnText = $returnText . $temp_audio["audioName"] . "<br/>";
			
			
			$returnText = $returnText . "<div id = 'textPostContent' >";
			$returnText = $returnText . "<div id = 'textContent' >";
			
			$returnText = $returnText . "
					<audio controls style='width: 400px'> 
						<source src='../../userData/audioPost/audio/{$temp_audio["id"]}.mp3'>
						
					</audio>	
			";
			
			$returnText = $returnText . "</div>";	
			$returnText = $returnText . displayImageOptions($username["username"], $temp_media["id"], $_SESSION["currentId"], $conn);
			
			$returnText = $returnText . "</div>";	
			
			
			
			$returnText = $returnText . displayComment($temp_media["id"], $_SESSION["currentId"], 0, $conn);
			$returnText = $returnText . "</div>";
		}
		
	}
	return $returnText;
}

function displayMediaInNormalFormatWithCritiques($temp_media, $conn){
	
	$returnText = "";
	if ( $temp_media["name"] =="image"){
		
		$temp_image = getImage($temp_media["id"], $conn);
				
		if ( $temp_image["width"] > 10 && file_exists('../../images/' . $temp_image["id"] . '.jpg') ) {
			$imageId=$temp_image["id"];
				
			///finds scaled imaeg size
			$adj_img_size=400/$temp_image["width"];
			$adj_img_width=$temp_image["width"]*$adj_img_size;
			$adj_img_height=$temp_image["height"]*$adj_img_size;
			
			$returnText = $returnText . "<div id='post' style='width: 400px' > ";
			///outputs image
			
			$returnText = $returnText . "<div id='imageContent' > " .
				"<img id='userImage' style='height: {$adj_img_height}px; width: {$adj_img_width}px; ' src='../../images/{$imageId}.jpg' />";
				//sets account link to user of the image 
			//$returnText = $returnText . displayImageOptions($temp_image["username"], $temp_media["id"], $_SESSION["currentId"], $conn);
			$returnText = $returnText . "</div>";
			
			$returnText = $returnText . "<div id='imageInfo' >" . 
				"upload " . $imageId . "<br/>" .
				"{$temp_image["imageName"]}</br>" .
				"<br/></div>Critiques:<br/>";
			
			///echo comments into <p>

			$returnText = $returnText . displayCritiques($temp_media["id"],  $conn);
			$returnText = $returnText . "</div><br/>";	
		}
		
	}
	elseif ( $temp_media["name"] =="text"){
		$temp_text = getWriting($temp_media["id"], $conn);
		 
		 if (strlen($temp_text["mediaText"]) > 4) {
			$returnText = $returnText . "<div id='post' style='width: 400px' > ";
			$returnText = $returnText . "<b>{$temp_text["title"]}</b><br/><br/>";
			
			$returnText = $returnText . "<div id = 'textPostContent' >";
			$returnText = $returnText . "<div id = 'textContent' >";
			
			$returnText = $returnText . $temp_text["mediaText"];
			
			$returnText = $returnText . "</div>";	
			$returnText = $returnText . "</div>";	
			
			//echo critiques or blank space
			$critiques = displayCritiques($temp_media["id"],  $conn);
			$returnText = $returnText . $critiques;
			if (strlen($critiques) < 5)
				$returnText = $returnText . "<br/><br/>";
			
			$returnText = $returnText . "</div>";	 
		 }
		
		
	}
	elseif ( $temp_media["name"] == "audio"){
		$temp_audio = getAudio($temp_media["id"], $conn);
		
		if (file_exists('../../userData/audioPost/audio/' . $temp_audio["id"] . '.mp3')){
			$returnText = $returnText . "<div id='post' style='width: 400px' > ";
			$returnText = $returnText . $temp_audio["audioName"] . "<br/>";
			$returnText = $returnText . "
					<audio controls style='width: 400px'> 
						<source src='../../userData/audioPost/audio/{$temp_audio["id"]}.mp3'>
						
					</audio>	
			";
			
			
			$critiques = displayCritiques($temp_media["id"],  $conn);
			$returnText = $returnText . $critiques;
			if (strlen($critiques) < 5)
				$returnText = $returnText . "<br/><br/>";
			
			
			$returnText = $returnText . "</div>";
		}
		
	}
	return $returnText;
}


///needs delete comment and openModal functions
function displayMessage($mailId, $fromUser, $toUser, $message){
	
	if ($fromUser == $_SESSION["currentUser"]) {
		$fromUser = "you";
	}
	
	echo "<div id = 'wholeMessage{$mailId}'>";
	
	echo "<div id = 'messageHeader' >from {$fromUser} to {$toUser} -</div>";
	echo "<div id = 'messageBody' >{$message}</div>";
	echo "<div id = 'messageOptions' >
			<a href = '#' onclick = \"openModal('{$fromUser}')\">reply</a> |
			<a href = '#' onclick = \"deleteComment({$mailId})\" >delete</a> |
	
	</div>";
	
	echo "</div>";
	
	echo "<br/>";
}

function testFunc(){
	return " hello world";
}

/*
function displayComment($mediaId, $id, $nComments, $conn){
	
	$comments = getComments($mediaId, $conn);
	///echo comments into <p>
	$returnText = "";
									
	$returnText = $returnText . "<div id='comments{$mediaId}'>";
	if(sizeof($comments)>0){
		for($i = 0; $i < sizeof($comments) && $i < 10; $i++){
			$returnText = $returnText . "<div id='comment'> " .
			"<div style='color: red;'>&emsp;&emsp;" . $comments[$i][0] . ":</div>" .
			"<div style='padding-left: 3vw;'>" . $comments[$i][1] . "</div><br/>" .
			"</div>";
			
			$nComments++;
		}
	}
	$returnText = $returnText . "</div>";
								
								///echo add comments button
	$returnText = $returnText . "<span  id = 'loadCommentsButton{$mediaId}' onClick = 'loadComments({$mediaId},{$nComments})' ><b>Load Comments</b></span>";
	
	$returnText = $returnText . "
		<textarea  id='textarea{$mediaId}' style='margin: auto; display: block;' ></textarea><hr style='height:-10px; visibility:hidden;'/>
		<button class='commentB' onClick=\"addComment('{$mediaId}','{$_SESSION['currentUser']}', '{$id}') \">Comment</button>";
	
	return $returnText;
}
*/
function displayCritiques($mediaId, $conn){
	
	$critiques = getCritiques($mediaId, $conn);
	
	$returnText = " ";
	
	if(sizeof($critiques)>0){
		for($i = 0; $i < sizeof($critiques); $i++){
			$returnText = $returnText . "<div id='critique'> " .
			"<div style='color: red;'>&emsp;&emsp;" . getUsername($critiques[$i]["userId"], $conn)["username"] . ":</div>" .
			"<div style='padding-left: 3vw;'>&emsp;" . $critiques[$i]["message"] . "</div><br/>" .
			"</div>";
			
		}
	}
	
	$returnText = $returnText;
	
	return $returnText;
	
	
}



?>