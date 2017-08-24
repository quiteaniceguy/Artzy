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
	  
	  //gets image data
	  $imagetemp=$_FILES["uploadedImage"]["tmp_name"];
	  list($imageWidth, $imageHeight) = getimagesize($imagetemp);
	  
	  
	  //puts basic data into media table
	  $sql_one = "INSERT INTO table_media(userId, mediaType) VALUES( '{$_SESSION["currentId"]}', '1') ";
	  if ( $conn->query($sql_one)== TRUE ){
		echo "image uploaded";
	  }else {
		die("media not uploaded");
	  }
	  $mediaId = mysqli_insert_id($conn);
	  
	  ///puts image data into image table
	  $sql_two = "INSERT INTO table_images(imageName, width, height, mediaId) VALUES( '{$_POST["imageName"]}', '{$imageWidth}', '{$imageHeight}', '{$mediaId}' ) ";
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
	  if ( move_uploaded_file($imagetemp, "../../images/" . $mediaId . ".jpg")){
		echo "file moved";
	  }else{
		die("file move failed");
	  }
  }else{
	  echo "must be logged in to upload file";
  }
  
  include "../siteComponents/header.php";
  


?>