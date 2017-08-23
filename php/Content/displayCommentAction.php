<?php
function displayComment($mediaId, $id, $conn){
	$comments = getComments($mediaId, $conn);
	///echo comments into <p>
	
									
	echo "<div id='comments{$mediaId}'>";
	if(sizeof($comments)>0){
		for($i = 0; $i < sizeof($comments); $i++){
			echo "<div id='comment'> " .
			"<div style='color: red;'>&emsp;&emsp;" . $comments[$i][0] . ":</div>" .
			"<div style='padding-left: 3vw;'>" . $comments[$i][1] . "</div><br/>" .
			"</div>";
		}
	}
	echo "</div>";
								
								///echo add comments button
	echo "
		<textarea  id='textarea{$mediaId}' style='margin: auto; display: block;' ></textarea><hr style='height:-10px; visibility:hidden;'/>
		<button class='commentB' onClick=\"addComment('{$mediaId}','{$id}') \">Comment</button>";
	
	
	
	
	
}

?>