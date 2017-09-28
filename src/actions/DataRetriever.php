<?php


	
	function __construct($conn){
		$this->$conn = $conn;
	}
	
	function getAudio($media, $conn){
		$sql = "SELECT * FROM table_audio WHERE mediaId = {$media}";
		$audio_result = $conn->query($sql);
							
		if(!$audio_result){
			die("didn't work at all");
		}
		if($audio = mysqli_fetch_assoc($audio_result)){
			return $audio;
		}
		return NULL;
	}
	
	function getWriting($media, $conn){
		$sql = "SELECT table_textData.title, table_text.mediaText, table_textData.textId
		FROM table_textData
		INNER JOIN table_text ON table_textData.textId = table_text.id 
		WHERE mediaId='{$media}' ";
						
		$text_result = $conn->query($sql);
		if(!$text_result){
			die($sql . " failed");
		}
		if($text = mysqli_fetch_assoc($text_result)){
			return $text;
							
							
		}
	}
	
	function getImage($media, $conn){
		$sql = "SELECT table_images.id, table_images.width, table_images.height, table_images.imageName, db_users.username
		FROM table_images 
		INNER JOIN table_media ON table_images.mediaId = table_media.id 
		INNER JOIN db_users ON db_users.id = table_media.userId
		WHERE mediaId='{$media}' "; 
						
            
            
		$image_results = $conn->query($sql);
		if(!$image_results){
			die("sql failed");
		}
							
		while ($image = mysqli_fetch_assoc($image_results) ){
		//echo "image id: " . $temp_image["id"] . "<br/>";
			return $image;	
		} 
	}
	
	///returns comments(username and comment) in array format
	function getComments($media, $conn){
		$comments = array();
		$sql = "SELECT table_comments.comment, db_users.fName, db_users.lName, db_users.username FROM table_comments INNER JOIN db_users ON table_comments.userId = db_users.id  WHERE table_comments.mediaId = {$media} ORDER BY table_comments.id DESC";
		$sqlresult = $conn->query($sql);
									
	
		if(mysqli_num_rows($sqlresult)>0){
			while($comment = mysqli_fetch_assoc($sqlresult)){
				array_push($comments, array($comment["username"], $comment["comment"]) );
			}
		}
		
		return $comments;
	}
	
	function getCritiques($mediaId, $conn){
		$sql = "SELECT table_mailboxes.userId, table_mailboxes.id, table_mailboxes.mailbox, table_mailboxes.messageId, table_messages.message, table_messageData.messageId, table_messageData.sendby, table_messageData.sendto
		FROM table_mailboxes 
		INNER JOIN table_messageData ON table_mailboxes.messageId = table_messageData.id 
		INNER JOIN table_messages ON table_messageData.messageId = table_messages.id
		WHERE table_messageData.mediaId='{$mediaId}'  ORDER BY table_mailboxes.id DESC;"; 
		
		//$sql = "SELECT * FROM table_messageData WHERE mediaId = '{$mediaId}' ";
		
        $messages = array();
            
		$results = $conn->query($sql);
		if(!$results){
			return "sql failed";
		}
							
		while ($temp_message = mysqli_fetch_assoc($results) ){
		//echo "image id: " . $temp_image["id"] . "<br/>";
			if($temp_message["mailbox"] == "OUTReview")
				array_push($messages, $temp_message);
		} 
		
		return $messages;
	}
	
	///returns array of media objects from specific group
	function getArrayOfMedia($mediaIds, $conn) {
		$mediaArray = array();
		
		for ($i = 0; $i < sizeof($mediaIds); $i++) {
			$temp_media = getMedia($mediaIds[$i], $conn);
			array_push($mediaArray, $temp_media);
		}
		
		return $mediaArray;
	}
	
	function getLikes($media, $conn){
		$numOfLikes = 0;
		
		$sql = "SELECT * FROM table_likes WHERE mediaId={$media}";
		$like_results = $conn->query($sql);
		
		while($temp_like = mysqli_fetch_assoc($like_results)){
			$numOfLikes = $numOfLikes + 1;
		}
		return $numOfLikes;
	}
	
	function getGroupId($name, $conn){
		$sql= " SELECT * FROM table_groups WHERE name='{$name}' ";
		$result=$conn->query($sql);
		if (!$result){
			die("sql broken");
		}
		 
		while ($row = mysqli_fetch_assoc($result)){
			return $row["id"];
		}
	}
	
	function getGroupLinks($groupId, $conn){
		$groupLinks = array();
		
		$sql = "SELECT * FROM table_groupLinks WHERE groupId='{$groupId}' ORDER BY id DESC; ";
		$result = $conn->query($sql);
		
		if(!$result){
			die("sql failed");
		}
		
		
		while ($row = mysqli_fetch_assoc($result)) {
			array_push($groupLinks, $row);
		}
		return $groupLinks;
	}
	
	function getMedia($mediaId, $conn){
		$sql = "SELECT table_media.id, table_media.userId, table_media.mediaType, table_mediaTypes.name FROM table_media INNER JOIN table_mediaTypes ON table_media.mediaType = 
			table_mediaTypes.id WHERE table_media.id='{$mediaId}' ";
			
		$media_results=$conn->query($sql);
		if(!$media_results){
			die("sql failed");
		}
				
			
		while ( $media = mysqli_fetch_assoc($media_results) ) {
			return $media;
		}
		
		
	}
	
	function getMediaIdsFromUser($userId, $conn){
		
		$mediaArray = array();
		
		$sql = "SELECT * FROM table_media WHERE userId = '{$userId}' ORDER BY id DESC";
		$result = $conn->query($sql);
		
		if(!$result){
			die("sql failed");
		}
		
		
		while ($row = mysqli_fetch_assoc($result)) {
			array_push($mediaArray, $row);
		}
		
		return $mediaArray;
		
	}
	
	function getUser($username, $conn){
		$sql="SELECT * FROM db_users WHERE username='{$username}' ";
		$result=$conn->query($sql);	
		
		while($user = mysqli_fetch_assoc($result)){
			return $user;
		}
		
		return NULL;
	}
	function getUsername($userId, $conn){
		$sql="SELECT * FROM db_users WHERE id='{$userId}' ";
		$result=$conn->query($sql);	
		
		while($user = mysqli_fetch_assoc($result)){
			return $user;
		}
		
		return NULL;
	}
	
	function insertMessage($message, $conn){
		$servername="localhost";
		$username="root";
		$password="";
		$dbname="db_artzytest";
		
		$conn = new mysqli($servername, $username, $password, $dbname);
		
		if($conn->connect_error){
			die("connection error");
		}
		
		$sql = "INSERT INTO table_messages(message) VALUES(?)" ;
		try{
			$stmt = $conn->prepare($sql);
			$stmt->bind_param("s", $message);
			$stmt->execute();
		}catch(Exception $e){
			die("this did not work");
		}
		return mysqli_insert_id($conn);

	}
	
	function insertMessageData($messageId, $senderId, $recId, $mediaId, $conn){
		$servername="localhost";
		$username="root";
		$password="";
		$dbname="db_artzytest";
		
		$conn = new mysqli($servername, $username, $password, $dbname);
		
		if($conn->connect_error){
			die("connection error");
		}
		 
		$sql = "INSERT INTO table_messageData(messageId, sendby, sendto, mediaId) VALUES('{$messageId}', '{$senderId}', '{$recId}', '{$mediaId}')" ;
		if(!( $conn->query($sql) ) ){
			die("failed to send messageData");
		}
		
		return mysqli_insert_id($conn);
	}
	function insertMessagebox($userId, $mailbox, $messageId, $conn){
		$servername="localhost";
		$username="root";
		$password="";
		$dbname="db_artzytest";
		
		$conn = new mysqli($servername, $username, $password, $dbname);
		
		if($conn->connect_error){
			die("connection error");
		}
		//return $userId . $mailbox . $messageId;
		$sql = "INSERT INTO table_mailboxes(userId, mailbox, messageId) VALUES('{$userId}', '{$mailbox}', '{$messageId}' )" ;
		if(!( $conn->query($sql) ) ){
			die("failed to send messageDatamailbox");
		}
		
		return "sent";
	}
	
	function getMessagesTo($userId, $conn){
		$sql = "SELECT table_mailboxes.userId, table_mailboxes.id, table_mailboxes.mailbox, table_mailboxes.messageId, table_messages.message, table_messageData.messageId, table_messageData.sendby, table_messageData.sendto
		FROM table_mailboxes 
		INNER JOIN table_messageData ON table_mailboxes.messageId = table_messageData.id 
		INNER JOIN table_messages ON table_messageData.messageId = table_messages.id
		WHERE table_mailboxes.userId='{$userId}'  ORDER BY table_mailboxes.id DESC;"; 
						
        $messages = array();
            
		$results = $conn->query($sql);
		if(!$results){
			return "sql failed";
		}
							
		while ($temp_message = mysqli_fetch_assoc($results) ){
		//echo "image id: " . $temp_image["id"] . "<br/>";
			array_push($messages, $temp_message);
		} 
		
		return $messages;
	}
	
	function getOwnerOfMedia($mediaId, $conn){
		
	}
	
	function getMediaAndType($mediaId, $mediaType, $conn){
		$media = getMedia($mediaId, $conn);
		
		$mediaType[0] = $media["mediaType"];
	}

?>