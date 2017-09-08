<?php
  session_start();
  
  $servername="localhost";
  $username="root";
  $password="";
  $dbName="db_artzytest";
  
  if($_SESSION["currentUser"]!=NULL && $_SESSION["currentId"]!=NULL){
	  
	  //connects to server
	  $conn = new mysqli($servername, $username, $password, $dbName);
	  if(!$conn){
		die("failed");
	  }
	  
	  //gets video data
	  $videoTemp=$_FILES["uploadedVideo"]["tmp_name"];
	  echo "file type: " . $_FILES["uploadedVideo"]["type"];
	  if ($_FILES["uploadedVideo"]["tmp_name"] == NULL){
		  echo "error: " . $_FILES["uploadedVideo"]["error"];
		  die("wtf is going on");
	  }
		  
	  
	  
	  //puts basic data into media table
	  $sql_one = "INSERT INTO table_media(userId, mediaType) VALUES( '{$_SESSION["currentId"]}', '2') ";
	  if ( $conn->query($sql_one)== TRUE ){
		echo "media uploaded";
	  }else {
		die("media not uploaded");
	  }
	  $mediaId = mysqli_insert_id($conn);
	  
	  ///puts image data into image table
	  $sql_two = "INSERT INTO table_videos(videoName , mediaId) VALUES( '{$_POST["videoName"]}',  '{$mediaId}' ) ";
	  if ( $conn->query($sql_two)== TRUE ){
		echo "image uploaded";
	  }else {
		die("image upload failed");
	  }

	  ///gets id of last uploaded thing
	  
	  $id = mysqli_insert_id($conn);
	  
	  ///uploads each link from group to user
	  $groups=explode(" ", " " . $_POST["groups"]);
	  
	  echo "<br/><br/><br/><br/><br/><br/>";
	  for ( $i=1; $i<sizeof($groups); $i=$i+1) {
		  echo $groups[$i] . "<br/>";
		  
		  ///uses name of group to get group id
		  $sql= " SELECT * FROM table_groups WHERE name='{$groups[$i]}' ";
		  $result=$conn->query($sql);
		  if (!result){
			  die("sql broken");
		  }
		  
		  while ($row = mysqli_fetch_assoc($result)){
			  echo $row["id"] . "<br/>";
			  $sql = "INSERT INTO table_groupLinks(groupId, mediaId) VALUES( '{$row["id"]}', '{$mediaId}' ) ";
			  if( !$conn->query($sql) ){
				  die("dead");
			  }
		  }
	  }
	  

	 
	  //uploads image
	  if ( move_uploaded_file($videoTemp, "../../videos/" . $id . ".mp4")){
		echo "file moved";
	  }else{
		  ini_set('display_errors',1);
		die("file move failed" . $_FILES["uploadedVideo"]["error"]);
	  }
	  
  }else{
	  echo "must be logged in to upload file " ;
  }
  
  include "../siteComponents/header.php";
  


?>