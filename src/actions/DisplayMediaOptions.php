<?php
	function displayImageOptions($username, $mediaId, $currentId, $conn){
		
		$returnText = "<script src = '/Artzy/src/JSActions/DeleteMedia.js' ></script>";
		$returnText = "<br/><script src = '/Artzy/src/JSActions/addLike.js' ></script>";
		//sets account link to user of the image 					
		$returnText = $returnText . "
		<div id='imageOptions' >
		  <div>
			<a href='/Artzy/view/ProfileViewer/ProfileViewer.php?username={$username}' target = '_blank'>
			  <img id='imageOptionsProfileIcon' class='profileIcon' style='height: 5.75vh; width: 2.75vw; ' src='/Artzy/icons/profileIcon.gif'  />
			  <img id='imageOptionsProfileIconH' class='profileIcon' style='height: 5.75vh; width: 2.75vw; ' src='/Artzy/icons/profileIconR.gif'  />
			</a>
		  </div>";
		  
		//sets like button 
		
			//gets num of likes
		$numOfLikes = getLikes($mediaId, $conn);
	
		////
		//ouputs rest of image options
		$returnText = $returnText . "
		  <div id='imageOptionsLikeIcon'>
			<img id='likeButton' onClick = 'addLike({$mediaId},{$currentId})'  src = '/Artzy/icons/heartIcon.jpg' ></img>
			<div id='timesSymbol'>X</div>
			<div id='likeCounter{$mediaId}' class='likesCounter'>{$numOfLikes}</div>
		  </div>";
		  
		  $returnText = $returnText . "<div id='imageOptionsIcon'>
		  <img id='imageOptionsMailIcon' class='mailIcon' style='height: 5.75vh; width: 5vw; ' src='/Artzy/icons/mailIcon.png'  onClick = \"openModal('{$username}', '{$mediaId}')\" />
		  </div>";
		  $returnText = $returnText . "<div id='imageOptionsIcon'>
		  
		  
		  </div>
		  
		  
		</div>";
		
			  

		
		
		return $returnText;

	}

	function displayUserImageOptions($username, $mediaId, $currentId, $conn){
		
		$returnText = "<script src = '/Artzy/src/JSActions/DeleteMedia.js' ></script>";
		//sets account link to user of the image 					
		$returnText = $returnText . "
		<div id='imageOptions' >
		  <div>
			
		  </div>";
		  
		//sets like button 
		
			//gets num of likes
		$numOfLikes = getLikes($mediaId, $conn);
	
		////
		//ouputs rest of image options
		$returnText = $returnText . "
		  <div id='imageOptionsLikeIcon'>
			<img id='likeButton'   src = '/Artzy/icons/heartIcon.jpg' ></img>
			<div id='timesSymbol'>X</div>
			<div id='likeCounter{$mediaId}' class='likesCounter'>{$numOfLikes}</div>
		  </div>";
		  
		  $returnText = $returnText . "<div id='imageOptionsIcon'>
		 
		  </div>";
		  $returnText = $returnText . "<div id='imageOptionsIcon'>
		  
		  
		  </div>
		  <img id = 'imageOptionsUserTrashIcon' onclick = \"deleteMedia('{$mediaId}')\" src = '/Artzy/icons/trashIcon.png' />
		  
		</div>";
		
			  

		
		
		return $returnText;

	}
	
	function displayThisImageOptions($currentId, $mediaId, $conn){
		
		
	}
	
	
	function displayTextOptions($username, $mediaId, $currentId, $conn){
		$returnText = "";
		//sets account link to user of the image 					
		$returnText = $returnText . "
		<div id='textOptions' >
		  <div>
			<a href='../ProfileViewer/profileViewer.php?username={$username}' target = '_blank'>
			  <img id='imageOptionsProfileIcon' class='profileIcon' style='height: 5.75vh; width: 2.75vw; ' src='../../icons/profileIcon.gif'  />
			  <img id='imageOptionsProfileIconH' class='profileIcon' style='height: 5.75vh; width: 2.75vw; ' src='../../icons/profileIconR.gif'  />
			</a>
		  </div>";
		  
		//sets like button 
		
			//gets num of likes
		$numOfLikes = getLikes($mediaId, $conn);
	
		////
		//ouputs rest of image options
		$returnText = $returnText . "
		  <div id='imageOptionsLikeIcon'>
			<img id='likeButton' onClick = 'addLike({$mediaId},{$currentId})'  src = '../../icons/heartIcon.jpg' ></img>
			<div id='timesSymbol'>X</div>
			<div id='likeCounter{$mediaId}' class='likesCounter'>{$numOfLikes}</div>
		  </div>
		  <div id='imageOptionsIcon'></div>
		  <div id='imageOptionsIcon'></div>
		</div>";
		
		return $returnText;

	}
	



?>