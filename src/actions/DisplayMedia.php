<?php
///////////////THIS FILE IS SOOOOOOOO GROOOSSSSSSS
include_once "DisplayMediaOptions.php";
include_once "DisplayComment.php";
include_once "DataRetriever.php";
include_once "../RemoteFileLibrary/URLChecker.php";
$config = require('../../config/config.php');

function displayNormalFormatWithLoadButton($mediaIds, $nMediaToLoad, $conn){
	///allPosts contains all posts
	echo "<div id = 'allPosts'>";
	
	$mediaArray = getArrayOfMedia($mediaIds, $conn);
	$nMedia = 0;
	
	$loadNMoreMedia = 0;
	for ($i = 0; $i < sizeof($mediaArray) && $i < ($nMediaToLoad + $loadNMoreMedia); $i++) {
			
		$temp_media = $mediaArray[$i];
		
		$mediaToPrint = displayMediaInNormalFormat($temp_media, $conn);

		echo $mediaToPrint . "<br/><br/>" ;
		
		if ($mediaToPrint == "")
			$loadNMoreMedia++;
		
		$nMedia++;
	}
	
	
	echo "</div>";//allPosts
	
	///create load more media button
	echo "<span  style = 'position:absoulte; left: 20vw; margin-left: 45vw;' id = \"loadMediaButton\" onClick = \"loadMedia('{$_GET["group"]}', {$nMedia}, 7)\"><b>Load more media</b></span>";
	
}

function displayUserNormalFormat($mediaIds, $nMediaToLoad, $conn){
	///allPosts contains all posts
	echo "<div id = 'allPosts'>";
	
	$mediaArray = getArrayOfMedia($mediaIds, $conn);
	$nMedia = 0;
	
	$loadNMoreMedia = 0;
	for ($i = 0; $i < sizeof($mediaArray); $i++) {
			
		$temp_media = $mediaArray[$i];
		
		$mediaToPrint = displayUserMediaInNormalFormat($temp_media, $conn);
		
		echo $mediaToPrint . "<br/><br/>" ;
		
		if ($mediaToPrint == "")
			$loadNMoreMedia++;
		
		/*
		echo $i;
		echo $mediaArray[$i]["name"];
		*/
		$nMedia++;
	}
	
	if (sizeof($mediaArray) - $loadNMoreMedia < 1){
		echo "<p style = 'text-align:center; font-size: 4vh;'> You haven't uploaded anything yet! </p>
			<p style = 'text-align:center; font-size: 4vh;'> Click on the 'UPLOAD' tab above to make a post </p></br></br>";
	}
	
	
	echo "</div>";//allPosts
	
	///create load more media button
	//echo "<span  id = \"loadMediaButton\" onClick = \"loadUserMedia('3', {$nMedia}, 7)\"><b>Load more Media</b></span>";
	
}

function displayMediaInNormalFormat($temp_media, $conn){
	global $config;
	
	$username = getUsername($temp_media["userId"], $conn);
	
	
	$returnText = "";
	if ( $temp_media["name"] =="image"){
		
		$temp_image = getImage($temp_media["id"], $conn);
		
				
		if ( $temp_image["width"] > 10 && @getimagesize($config["storage"]["images"] . $temp_media["id"] . '.jpg')[0] > 0 ) {
			$imageId=$temp_image["id"];
				
			///finds scaled imaeg size
			$adj_img_size=400/$temp_image["width"];
			$adj_img_width=$temp_image["width"]*$adj_img_size;
			$adj_img_height=$temp_image["height"]*$adj_img_size;
			
			$returnText = $returnText . "<div id='post' style='width: 400px' > ";
			///outputs image
			
			$returnText = $returnText . "<div id='imageContent' > " .
				"<a href = '../MediaViewer/MediaViewer.php?mediaId={$temp_media["id"]}' target = '_blank' >" . 
				"<img id='userImage' style='height: {$adj_img_height}px; width: {$adj_img_width}px; ' src='{$config["storage"]["images"]}{$temp_media["id"]}.jpg' />" . 
				"</a>";
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
		}else{
			//$returnText = $returnText . "<p>file doesn't exist: {$temp_media["id"]}  {$config["storage"]["images"]}{$temp_media["id"]}.jpg  ";	
			
		}
		
	}
	elseif ( $temp_media["name"] =="text"){
		$temp_text = getWriting($temp_media["id"], $conn);
		 
		 if (strlen($temp_text["mediaText"]) > 4) {
			$returnText = $returnText . "<div id='post' style='width: 400px' > ";
			$returnText = $returnText . "<b>{$temp_text["title"]}</b><br/><br/>";
			$returnText = $returnText . "<div id = 'textPostContent' >";
			$returnText = $returnText . "<div id = 'textContent' >";
			
			$textToDisplay = $temp_text["mediaText"];
			
			//this word count include html tags, which take up a lot more characters, so, yeah......
			if(strlen($textToDisplay) > 1000){
				$textToDisplay = trimContent($temp_text["mediaText"], 1000) . ".........<a href = '../MediaViewer/MediaViewer.php?mediaId={$temp_media["id"]}' target = '_blank' style = 'color: blue;' >(more)</a>";
				//echo "to long: " . strlen($temp_text["mediaText"]);
			}else{
				
				//echo "short enough: " . strlen($temp_text["mediaText"]);
			}
			
			$returnText = $returnText . "<div style = 'width: 20vw;'>" . $textToDisplay . "</div>";
			$returnText = $returnText . "</div>";
			$returnText = $returnText . displayImageOptions($username["username"], $temp_media["id"], $_SESSION["currentId"], $conn);
			
			
			
			
			$returnText = $returnText . "</div>";	 
			
			$returnText = $returnText . displayComment($temp_media["id"], $_SESSION["currentId"], 0, $conn);
			$returnText = $returnText . "</div>";
		 }
		
		
	}
	elseif ( $temp_media["name"] == "audio"){
		$temp_audio = getAudio($temp_media["id"], $conn);
		
		if (URLChecker::checkURL($config["storage"]["audio"] . $temp_media["id"] . '.mp3')){
			$returnText = $returnText . "<div id='post' style='width: 400px' > ";
			$returnText = $returnText . $temp_audio["audioName"] . "<br/>";
			
			
			$returnText = $returnText . "<div id = 'textPostContent' >";
			$returnText = $returnText . "<div id = 'textContent' >";
			
			$returnText = $returnText . "
					<audio controls style='width: 400px'> 
						<source src='{$config["storage"]["audio"]}{$temp_media["id"]}.mp3'>
						
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


function displayMediaInLargeFormat($temp_media, $conn){
	global $config; 
	
	$username = getUsername($temp_media["userId"], $conn);
	
	
	$returnText = "";
	if ( $temp_media["name"] =="image"){
		
		$temp_image = getImage($temp_media["id"], $conn);
				
		if ( $temp_image["width"] > 10 && @getimagesize($config["storage"]["images"] . $temp_media["id"] . '.jpg')[0] > 0 ) {
			$imageId=$temp_image["id"];
				
			///finds scaled imaeg size
			$adj_img_size=50/$temp_image["width"];
			$adj_img_width=$temp_image["width"]*$adj_img_size;
			$adj_img_height=$temp_image["height"]*$adj_img_size;
			
			$returnText = $returnText . "<div id='post' style='position: absolute; width: 75vw; left: 12.5vw; ' > ";
			///outputs image
			
			$returnText = $returnText . "<div id='largeImageContent' style = 'left: 12.5vw;'> " .
				"<img id='userImage' style='height: {$adj_img_height}vw; width: {$adj_img_width}vw; left: 0vw;' src='{$config["storage"]["images"]}{$temp_media["id"]}.jpg' />";
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
		
		if (URLChecker::checkURL($config["storage"]["audio"] . $temp_media["id"] . '.mp3')){
			$returnText = $returnText . "<div id='post' style='width: 400px' > ";
			$returnText = $returnText . $temp_audio["audioName"] . "<br/>";
			
			
			$returnText = $returnText . "<div id = 'textPostContent' >";
			$returnText = $returnText . "<div id = 'textContent' >";
			
			$returnText = $returnText . "
					<audio controls style='width: 400px'> 
						<source src='{$config["storage"]["audio"]}{$temp_media["id"]}.mp3'>
						
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
function displayUserMediaInNormalFormat($temp_media, $conn){
	global $config;
	
	$username = getUsername($temp_media["userId"], $conn);
	
	
	$returnText = "";
	if ( $temp_media["name"] =="image"){
		
		$temp_image = getImage($temp_media["id"], $conn);
		
				
		if ( $temp_image["width"] > 10 && @getimagesize($config["storage"]["images"] . $temp_media["id"] . '.jpg')[0] > 0 ) {
			$imageId=$temp_image["id"];
				
			///finds scaled imaeg size
			$adj_img_size=400/$temp_image["width"];
			$adj_img_width=$temp_image["width"]*$adj_img_size;
			$adj_img_height=$temp_image["height"]*$adj_img_size;
			
			$returnText = $returnText . "<div id='post' style='width: 400px' > ";
			///outputs image
			
			$returnText = $returnText . "<div id='imageContent' > " .
				"<a href = '../MediaViewer/MediaViewer.php?mediaId={$temp_media["id"]}' target = '_blank' >" . 
				"<img id='userImage' style='height: {$adj_img_height}px; width: {$adj_img_width}px; ' src='{$config["storage"]["images"]}{$temp_media["id"]}.jpg' />" . 
				"</a>";
				//sets account link to user of the image 
		$returnText = $returnText . displayUserImageOptions($username["username"], $temp_media["id"], $_SESSION["currentId"], $conn);
			$returnText = $returnText . "</div>";
			
			$returnText = $returnText . "<div id='imageInfo' >" . 
				"upload " . $imageId . "<br/>" .
				"{$temp_image["imageName"]}</br>" .
				"<br/></div>Comments:";
			
			///echo comments into <p>

			$returnText = $returnText . displayComment($temp_media["id"], $_SESSION["currentId"], 0, $conn);
			$returnText = $returnText . "</div><br/>";	
		}else{
			//$returnText = $returnText . "<p>file doesn't exist: {$temp_media["id"]}  {$config["storage"]["images"]}{$temp_media["id"]}.jpg  ";	
			
		}
		
	}
	elseif ( $temp_media["name"] =="text"){
		$temp_text = getWriting($temp_media["id"], $conn);
		 
		 if (strlen($temp_text["mediaText"]) > 4) {
			$returnText = $returnText . "<div id='post' style='width: 400px' > ";
			$returnText = $returnText . "<b>{$temp_text["title"]}</b><br/><br/>";
			$returnText = $returnText . "<div id = 'textPostContent' >";
			$returnText = $returnText . "<div id = 'textContent' >";
			
			$textToDisplay = $temp_text["mediaText"];
			
			//this word count include html tags, which take up a lot more characters, so, yeah......
			if(strlen($textToDisplay) > 1000){
				$textToDisplay = trimContent($temp_text["mediaText"], 1000) . ".........<a href = '../MediaViewer/MediaViewer.php?mediaId={$temp_media["id"]}' target = '_blank' style = 'color: blue;' >(more)</a>";
				//echo "to long: " . strlen($temp_text["mediaText"]);
			}else{
				
				//echo "short enough: " . strlen($temp_text["mediaText"]);
			}
			
			$returnText = $returnText . "<div style = 'width: 20vw;'>" . $textToDisplay . "</div>";
			$returnText = $returnText . "</div>";
			$returnText = $returnText . displayUserImageOptions($username["username"], $temp_media["id"], $_SESSION["currentId"], $conn);
			
			
			
			
			$returnText = $returnText . "</div>";	 
			
			$returnText = $returnText . displayComment($temp_media["id"], $_SESSION["currentId"], 0, $conn);
			$returnText = $returnText . "</div>";
		 }
		
		
	}
	elseif ( $temp_media["name"] == "audio"){
		$temp_audio = getAudio($temp_media["id"], $conn);
		
		if (URLChecker::checkURL($config["storage"]["audio"] . $temp_media["id"] . '.mp3')){
			$returnText = $returnText . "<div id='post' style='width: 400px' > ";
			$returnText = $returnText . $temp_audio["audioName"] . "<br/>";
			
			
			$returnText = $returnText . "<div id = 'textPostContent' >";
			$returnText = $returnText . "<div id = 'textContent' >";
			
			$returnText = $returnText . "
					<audio controls style='width: 400px'> 
						<source src='{$config["storage"]["audio"]}{$temp_media["id"]}.mp3'>
						
					</audio>	
			";
			
			$returnText = $returnText . "</div>";	
			$returnText = $returnText . displayUserImageOptions($username["username"], $temp_media["id"], $_SESSION["currentId"], $conn);
			
			$returnText = $returnText . "</div>";	
			
			
			
			$returnText = $returnText . displayComment($temp_media["id"], $_SESSION["currentId"], 0, $conn);
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
	
	echo "<div id = 'wholeMessage{$mailId}' class = 'wholeMessage' >";
	
	echo "<div id = 'messageHeader' >from {$fromUser} to {$toUser} -</div>";
	echo "<div id = 'messageBody' >{$message}</div>";
	echo "<div id = 'messageOptions' >
			<a href = '#' onclick = \"openModal('{$fromUser}')\">reply</a> |
			<a href = '#' onclick = \"deleteComment({$mailId})\" >delete</a> |
	
	</div>";
	
	echo "</div>";
	
	echo "_________________________________<br/><br/>";
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

///helper method that cuts string while keeping complete tags
function trimContent( $str, $trimAt){
	$nStartBracket = 0;
	$nEndBracket = 0;
	
	$returnString = "";

	for ($i = 0; $i < strlen($str) && $i < $trimAt || $nStartBracket != $nEndBracket ; $i++) {
		
		if ($str[$i] == "<")
			$nStartBracket++;
		else if($str[$i] == ">")
			$nEndBracket++;
		
		$returnString = $returnString . $str[$i];
	}
	
	return $returnString;
}




?>
