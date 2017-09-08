<?php
	function displayImageOptions($username, $mediaId, $currentId, $conn){
		
		//sets account link to user of the image 					
		echo "
		<div id='imageOptions' >
		  <div>
			<a href='../ProfileViewer/profileViewer.php?username={$username}'>
			  <img id='imageOptionsProfileIcon' class='profileIcon' style='height: 5.75vh; width: 2.75vw; ' src='../../icons/profileIcon.gif'  />
			  <img id='imageOptionsProfileIconH' class='profileIcon' style='height: 5.75vh; width: 2.75vw; ' src='../../icons/profileIconR.gif'  />
			</a>
		  </div>";
		  
		//sets like button 
		
			//gets num of likes
		$numOfLikes = getLikes($mediaId, $conn);
	
		////
		//ouputs rest of image options
		echo "
		  <div id='imageOptionsLikeIcon'>
			<img id='likeButton' onClick = 'addLike({$mediaId},{$currentId})'  src = '../../icons/heartIcon.jpg' ></img>
			<div id='timesSymbol'>X</div>
			<div id='likeCounter{$mediaId}' class='likesCounter'>{$numOfLikes}</div>
		  </div>
		  <div id='imageOptionsIcon'></div>
		  <div id='imageOptionsIcon'></div>
		</div>";
		

	}



?>