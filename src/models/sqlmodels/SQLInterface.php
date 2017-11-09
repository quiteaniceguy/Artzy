<?php
	class SQLInterface{
		
		private $conn;
		
		function __construct($conn){
			$this->conn = $conn;
		}
		
		function __clone(){
			
		}
		
		///////////////functions getting data from database
		
		/* retrieves audio data */
		function getAudio($media){
			$sql = "SELECT * FROM table_audio WHERE mediaId = {$media}";
			$audio_result = $this->conn->query($sql);
								
			if(!$audio_result){
				die("didn't work at all");
			}
			
			foreach($audio_result as $audio){
				return $audio;
			}
			
			return NULL;
		}
		
		/*gets writing data + text*/
		function getWriting($media){
			$sql = "SELECT table_textData.title, table_text.mediaText, table_textData.textId
			FROM table_textData
			INNER JOIN table_text ON table_textData.textId = table_text.id 
			WHERE mediaId='{$media}' ";
							
			$text_result = $this->conn->query($sql);
			if(!$text_result){
				die($sql . " failed");
			}
			foreach($text_result as $text){
				return $text;
								
								
			}
		}
		
		function getImage($media){
			$sql = "SELECT table_images.id, table_images.width, table_images.height, table_images.imageName, db_users.username
			FROM table_images 
			INNER JOIN table_media ON table_images.mediaId = table_media.id 
			INNER JOIN db_users ON db_users.id = table_media.userId
			WHERE mediaId='{$media}' "; 
							
				
				
			$image_results = $this->conn->query($sql);
			if(!$image_results){
				die("sql failed");
			}
								
			foreach ($image_results as $image){
			//echo "image id: " . $temp_image["id"] . "<br/>";
				return $image;	
			} 
		}
		
		///returns comments(username and comment) in array format
		function getComments($media){
			$comments = array();
			$sql = "SELECT table_comments.comment, db_users.fName, db_users.lName, db_users.username FROM table_comments INNER JOIN db_users ON table_comments.userId = db_users.id  WHERE table_comments.mediaId = {$media} ORDER BY table_comments.id DESC";
			$sqlresult = $this->conn->query($sql);
										
			if (sizeof($sqlresult) > 0){
				foreach($sqlresult as $comment){
					array_push($comments, array($comment["username"], $comment["comment"]) );
				}
			}
			
			return $comments;
		}
		
		function getCritiques($mediaId){
			$sql = "SELECT table_mailboxes.userId, table_mailboxes.id, table_mailboxes.mailbox, table_mailboxes.messageId, table_messages.message, table_messageData.messageId, table_messageData.sendby, table_messageData.sendto
			FROM table_mailboxes 
			INNER JOIN table_messageData ON table_mailboxes.messageId = table_messageData.id 
			INNER JOIN table_messages ON table_messageData.messageId = table_messages.id
			WHERE table_messageData.mediaId='{$mediaId}'  ORDER BY table_mailboxes.id DESC;"; 
			
			//$sql = "SELECT * FROM table_messageData WHERE mediaId = '{$mediaId}' ";
			
			$messages = array();
				
			$results = $this->conn->query($sql);
			if(!$results){
				return "sql failed";
			}
								
			foreach ($results as $temp_image ){
			//echo "image id: " . $temp_image["id"] . "<br/>";
				if($temp_message["mailbox"] == "OUTReview")
					array_push($messages, $temp_message);
			} 
			
			return $messages;
		}
		
		///returns array of media objects from specific group
		function getArrayOfMedia($mediaIds) {
			$mediaArray = array();
			
			for ($i = 0; $i < sizeof($mediaIds); $i++) {
				$temp_media = $this->getMedia($mediaIds[$i]);
				array_push($mediaArray, $temp_media);
			}
			
			return $mediaArray;
		}
		
		///idk 
		function getLikes($media){
			$numOfLikes = 0;
			
			$sql = "SELECT * FROM table_likes WHERE mediaId={$media}";
			$like_results = $this->conn->query($sql);
			
			while($temp_like = mysqli_fetch_assoc($like_results)){
				$numOfLikes = $numOfLikes + 1;
			}
			return $numOfLikes;
		}
		
		function getGroupId($name){
			$sql= " SELECT * FROM table_groups WHERE name='{$name}' ";
			$result = $this->conn->query($sql);
			if (!$result){
				die("sql broken");
			}
			 
			foreach ($result as $row){
				return $row["id"];
			}
		}
		
		function getGroupLinks($groupId){
			$groupLinks = array();
			
			$sql = "SELECT * FROM table_groupLinks WHERE groupId='{$groupId}' ORDER BY id DESC; ";
			$result = $this->conn->query($sql);
			
			if(!$result){
				die("sql failed");
			}
			
			
			foreach ($result as $row) {
				array_push($groupLinks, $row);
			}
			return $groupLinks;
		}
		
		function getMedia($mediaId){
			$sql = "SELECT table_media.id, table_media.userId, table_media.mediaType, table_mediaTypes.name FROM table_media INNER JOIN table_mediaTypes ON table_media.mediaType = 
				table_mediaTypes.id WHERE table_media.id='{$mediaId}' ";
				
			$media_results=$this->conn->query($sql);
					
			foreach($media_results as $row){
				return $row;
			}
			
			return null;
		}
		
		function getMediaIdsFromUser($userId){
			
			$mediaArray = array();
			
			$sql = "SELECT * FROM table_media WHERE userId = '{$userId}' ORDER BY id DESC";
			$result = $this->conn->query($sql);
			
			if(!$result){
				die("sql failed");
			}
			
			
			foreach($result as $row) {
				array_push($mediaArray, $row);
			}
			
			return $mediaArray;
			
		}
		
		function getUser($username){
			$sql="SELECT * FROM db_users WHERE username='{$username}' ";
			$result = $this->conn->query($sql);	
			
			foreach($result as $user){
				return $user;
			}
			
			return NULL;
		}
		function getUsername($userId){
			$sql="SELECT * FROM db_users WHERE id='{$userId}' ";
			$result=$this->conn->query($sql);	
			
			foreach ($result as $user){
				return $user;
			}
			
			return NULL;
		}
		
		function insertMessage($message){
					
			$sql = "INSERT INTO table_messages(message) VALUES(?)" ;
			try{
				$stmt = $this->conn->prepare($sql);
				$stmt->bind_param("s", $message);
				$stmt->execute();
			}catch(Exception $e){
				die("this did not work");
			}
			$this->conn->lastInsertId();

		}
		
		function insertMessageData($messageId, $senderId, $recId, $mediaId){
			



			 
			$sql = "INSERT INTO table_messageData(messageId, sendby, sendto, mediaId) VALUES('{$messageId}', '{$senderId}', '{$recId}', '{$mediaId}')" ;
			if(!( $this->conn->query($sql) ) ){
				die("failed to send messageData");
			}
			
			//return mysqli_lastInsertId()($this->conn);
			$this->conn->lastInsertId();
		}
		function insertMessagebox($userId, $mailbox, $messageId){
				



			//return $userId . $mailbox . $messageId;
			$sql = "INSERT INTO table_mailboxes(userId, mailbox, messageId) VALUES('{$userId}', '{$mailbox}', '{$messageId}' )" ;
			if(!( $this->conn->query($sql) ) ){
				die("failed to send messageDatamailbox");
			}
			
			return "sent";
		}
		
		function getMessagesTo($userId){
			$sql = "SELECT table_mailboxes.userId, table_mailboxes.id, table_mailboxes.mailbox, table_mailboxes.messageId, table_messages.message, table_messageData.messageId, table_messageData.sendby, table_messageData.sendto
			FROM table_mailboxes 
			INNER JOIN table_messageData ON table_mailboxes.messageId = table_messageData.id 
			INNER JOIN table_messages ON table_messageData.messageId = table_messages.id
			WHERE table_mailboxes.userId='{$userId}'  ORDER BY table_mailboxes.id DESC;"; 
							
			$messages = array();
				
			$results = $this->conn->query($sql);
			if(!$results){
				return "sql failed";
			}
								
			foreach ($results as $temp_message){
			//echo "image id: " . $temp_image["id"] . "<br/>";
				array_push($messages, $temp_message);
			} 
			
			return $messages;
		}
		
		function getOwnerOfMedia($mediaId){
			
		}
		
		function getMediaAndType($mediaId, $mediaType){
			$media = getMedia($mediaId);
			
			$mediaType[0] = $media["mediaType"];
		}
		
		function getLoginUser($user, $pass){
			$sql="SELECT * FROM db_users WHERE username = :username AND password = :password ";

			try{
				$stmt = $this->conn->prepare($sql);
				
				$stmt->bindParam(':username' , $user);
				$stmt->bindParam(':password' , $pass);
				$stmt->execute();
			}catch(Exception $e){
				die("prepare failed: " . $e);
			}
			
			return $stmt->fetch(PDO::FETCH_ASSOC);
		}
	
		//////////////////functions removing data
		
		function deleteGroupLinks($mediaId){
			$sql = "DELETE FROM table_groupLinks WHERE mediaId = {$mediaId}";
			
			if ($this->conn->query($sql)) {
				return 0;
			}
			
			return 1;
		}
		
		function deleteComments($mediaId){
			$sql = "DELETE FROM table_comments WHERE mediaId = {$mediaId}";
			
			$this->conn->query($sql);
			
			return true;
		}
		
		function deleteLikes($mediaId){
			$sql = "DELETE FROM table_likes WHERE mediaId = {$mediaId}";
			
			$this->conn->query($sql);
			
			return true;
		}
		
		function deleteText($mediaId){
			
			$textMedia = getWriting($mediaId);
			
			$sql = "DELETE FROM table_textData WHERE mediaId = {$mediaId}";
			
			if ($this->conn->query($sql)) {
				$sql = "DELETE FROM table_text WHERE id = {$textMedia["textId"]}";
				if ($this->conn->query($sql)) {
					return 0;
				}
				return 5;
			}
			
			return $textMedia["textId"];
		}
		
		function deleteAudio($mediaId){

			$sql = "DELETE FROM table_audio WHERE mediaId = {$mediaId}";
			if ($this->conn->query($sql)) {
				return 0;
			}
			
			return 1;
		}
		
		function deleteImage($mediaId){
			
			$sql = "DELETE FROM table_images WHERE mediaId = {$mediaId}";
			if ($this->conn->query($sql)) {
				return 0;
			}
			
			return 1;
		}
		
		//////////functions inserting data
		
		function uploadMedia($currentId, $mediaType){
			
			$sql = "INSERT INTO table_media(userId, mediaType) VALUES( '{$currentId}', '{$mediaType}') ";
			
			if ( $this->conn->query($sql) == TRUE ){
				echo "image uploaded";
			}else {
				die("media not uploaded");
			}
			return $this->conn->lastInsertId();
		}
		
		function uploadText($mediaText){
			
			$sql_two = "INSERT INTO table_text(mediaText) VALUES(:text) ";
			
			try{
				$stmt = $this->conn->prepare($sql_two);
				$stmt->bindParam(":text", $mediaText);

				$mediaText = str_replace("\t","	", nl2br($mediaText) );
				$stmt->execute();
			}catch(Exception $e){
				die("this did not work");
			}
			
			return $this->conn->lastInsertId();
		}
		
		function uploadTextData($title, $textId, $mediaId){
			
			$sql = "INSERT INTO table_textData(title, textId, mediaId) VALUES( '{$title}', '{$textId}',  '{$mediaId}' ) ";
			
			if ( $this->conn->query($sql) == FALSE ){
				die("text");
			}
			
			return $this->conn->lastInsertId();
		}
		
		function uploadGrouplinks($groups, $mediaId){
			
			foreach ($groups as $group) {
				
				$sql= " SELECT * FROM table_groups WHERE name='{$group}' ";
				
				$result=$this->conn->query($sql);
				
				var_dump($result);
				if ($result == null){
					die("sql broken");
				}

				foreach ($result as $row){
					
					$sql = "INSERT INTO table_groupLinks(groupId, mediaId) VALUES( '{$row["id"]}', '{$mediaId}' ) ";
					if( !$this->conn->query($sql) ){
						die("dead");
					}
				}
			}
			var_dump($result);
			return 0;
			
		}
		
		function uploadImage($name, $width, $height, $id){
			$sql_two = "INSERT INTO table_images(imageName, width, height, mediaId) VALUES( '{$name}', '{$width}', '{$height}', '{$id}' ) ";
			if ( $this->conn->query($sql_two)== TRUE ){
				echo "image uploaded";
			}else {
				die("image upload failed");
			}
			
			return $this->conn->lastInsertId();
		}
		
		function uploadAudio($audioName, $mediaId){
			$sql_two = "INSERT INTO table_audio(audioName, mediaId) VALUES(:name, :mediaId ) ";

			try{
				$stmt = $this->conn->prepare($sql_two);
				$stmt->bindParam(':name', $audioName);
				$stmt->bindParam(':mediaId', $mediaId);
				$stmt->execute();
			}catch(Exception $e){
				die("prepare failed: " . $e);
			}	
			
			return $this->conn->lastInsertId();
		}
		
		function insertUserData($username, $password, $email, $about, $school, $phoneNumber, $age, $fName, $lName, $verificationCode){
			
			$sql = "INSERT INTO db_users(username, password, email, about, school, phoneNumber, age, fName, lName, verificationCode, isActivated)
			VALUES( :username, :password, :email, :about, :school, :phoneNumber, :age, :fName, :lName, :verificationCode, '0')  "; 

			try{
				$stmt = $this->conn->prepare($sql);
				$stmt->bindParam(':username' , $username);
				$stmt->bindParam(':password' , $password);
				$stmt->bindParam(':email' , $email);
				$stmt->bindParam(':about' , $about);
				$stmt->bindParam(':school' , $school);
				$stmt->bindParam(':phoneNumber' , $phoneNumber);
				$stmt->bindParam(':age' , $age);
				$stmt->bindParam(':fName' , $fName);
				$stmt->bindParam(':lName' , $lName);
				$stmt->bindParam(':verificationCode' , $verificationCode );

				$stmt->execute();

			}catch(Exception $ex){
				return "Exception: " . $ex;
			}
			
			return $this->conn->lastInsertId();
		}
	}///class
		


?>