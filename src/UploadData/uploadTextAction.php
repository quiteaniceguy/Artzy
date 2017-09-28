<?php
  session_start();
  
  $servername="localhost";
  $username="root";
  $password="";
  $dbName="db_artzytest";
  
  if($_SESSION["currentUser"]!=NULL && $_SESSION["currentId"]!=NULL){
	  
	  //connects to server
	  $config = require('../../config/config.php');
		
	  $conn = new mysqli($config["mysql"]["servername"], $config["mysql"]["username"], $config["mysql"]["password"], $config["mysql"]["dbName"]);
	  if(!$conn){
		die("connection to server failed");
	  }
	  
	  
	  
	  //puts basic data into media table
	  $sql_one = "INSERT INTO table_media(userId, mediaType) VALUES( '{$_SESSION["currentId"]}', '3') ";
	  if ( $conn->query($sql_one)== TRUE ){
		echo "image uploaded";
	  }else {
		die("media not uploaded");
	  }
	  $mediaId = mysqli_insert_id($conn);
	  
	  
	  //put text into text table
	  $sql_two = "INSERT INTO table_text(mediaText) VALUES(?) ";
	  try{
		  $stmt = $conn->prepare($sql_two);
		  $stmt->bind_param("s", $mediaText);
		  
		  $mediaText = str_replace("\t","	", nl2br($_POST["mediaText"]) );
		  $stmt->execute();
	  }catch(Exception $e){
		  die("this did not work");
	  }
	 
	  $textId = mysqli_insert_id($conn);

	  ///put text data into table
	  $sql_two = "INSERT INTO table_textData(title, textId, mediaId) VALUES( '{$_POST["title"]}', '{$textId}',  '{$mediaId}' ) ";
	  if ( $conn->query($sql_two)== TRUE ){
		echo "image uploaded";
	  }else {
		die("text");
	  }
	  
	  

	  


	  ///gets id of last uploaded thing
	  $id = mysqli_insert_id($conn);
	  
	  ///uploads each link from group to user
	  $groups=explode(" ", " " . $_POST["groups"]);
	  
	  echo "<br/><br/><br/><br/><br/><br/>";
	  for ( $i=1; $i<sizeof($groups); $i=$i+1) {
		  echo $groups[$i] . "<br/>";
		  
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
	  

	 
	  
  }else{
	  echo "must be logged in to upload file";
  }
  
  include "../siteComponents/header.php";
  


?>


