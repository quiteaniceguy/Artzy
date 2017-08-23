<?php
	
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

?>