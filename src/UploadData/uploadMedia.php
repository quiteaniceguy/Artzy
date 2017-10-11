<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>

  <title></title>
  <link rel="stylesheet" href="../../css/uploadPage.css">
  
</head>

<body>
  <?php
    // Get pictures already posted and place them around.
    // Eventually fade from some pictures to others
    // Fill the screen with submitted photos
	//this is hard
    /*
    $sql=" SELECT table_media.id, table_mediaTypes.name FROM table_media INNER JOIN table_mediaTypes ON table_media.mediaType = table_mediaTypes.id WHERE table_media.userid = {$_SESSION["currentId"]} ";
    
      $result=$conn->query($sql);
			if(!$result){
				die("sql failed");
			}
  
    while($row=mysqli_fetch_assoc($result)){
					
					
					if ( $row["name"] == "image" ){
						
						///gets the right image from database that matches specific media
						$sql = "SELECT table_images.width, table_images.height, table_images.id, table_images.imageName FROM table_images INNER JOIN table_media ON table_images.mediaId = table_media.id WHERE table_images.mediaId={$row["id"]} ";
						$result_two=$conn->query($sql);
						if(!$result){
							die("sql failed");
						}
						
						while($row_two=mysqli_fetch_assoc($result_two)){
							
							
							///if image is big enough
							if ( $row_two["width"] > 10 ) {
								$imageId=$row_two["id"];
								
								///finds scaled imaeg size
								$adj_img_size=400/$row_two["width"];
								$adj_img_width=$row_two["width"]*$adj_img_size;
								$adj_img_height=$row_two["height"]*$adj_img_size;
               
                ///outpus image
								echo "<div id='userImageDiv' style='width: 400px' > ";
								echo "<img id='userImage' style='height: {$adj_img_height}px; width: {$adj_img_width}px; ' src='../../images/{$imageId}.jpg' />";
								echo "upload " . $imageId . "<br/>";
								echo "{$row_two["imageName"]}</br>";
              }*/
  ?>
  <script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  
  
  <script type="text/javascript">
  bkLib.onDomLoaded(
	function(){
		new nicEditor({maxHeight: 500}).panelInstance('mediaText');
	});
	
	var uploaded = '<?php echo $_GET["uploaded"]?>';
   if( uploaded == 1){
	   alert("uploaded");
   }
   if( uploaded == 2){
	   alert("upload failed");
   }
  
  
  $(document).ready(function(){
	  
	  $("#postImage").click(function(){
		  $("#loadingMessage").html("uploading....");
		  $(".submitButton").hide();
		  $("#imageForm").submit();
	  });
	   $("#postText").click(function(){
		  $("#loadingMessage").html("uploading....");
		  $(".submitButton").hide();
		  $("#textForm").submit();
	  });
	   $("#postAudio").click(function(){
		
		  $("#loadingMessage").html("uploading....");
		  $(".submitButton").hide();
		  $("#audioForm").submit();
	  });
  });
  
  
  
  </script>
  
  <div id="imageUpload">
	  <b style = 'font-size: 4vh;'>IMAGE</b><br/><br/><br/>
	  <form action="uploadImageAction.php" method="post" enctype="multipart/form-data" id = "imageForm">
		IMAGE NAME:<br><textarea type="text" name="imageName"  class="upInput" style = "width: 20vw; height: 1vw;"></textarea><br/>
		GROUPS:<br><textarea type="text" name="groups" style = "width: 20vw; height: 2vw;" class="upInput">general visualarts</textarea><br/><br/>
		<input type="file" name="uploadedImage" id="uploadedImage"/><br/><br/><br/><br/>
		<button id = "postImage" class = "submitButton" >upload</button>
		<!-- <input type="submit" value="post" id = "postButton"/><br/>  -->
		
	  </form>
   </div>
   
   <div id="textUpload">
	  <b style = 'font-size: 4vh;'>TEXT</b><br/><br/><br/>
	  <form action="uploadTextAction.php" method="post" enctype="multipart/form-data" id = "textForm">
	    TITLE:<br><textarea type="text" name="title" style = "width: 20vw; height: 1vw;"" class="upInput"></textarea><br/>
		TEXT:<br><textarea type="text" name="mediaText"  class="upInput" id="mediaText" style = "width: 30vw; height: 50vh;" ></textarea><br/>
		GROUPS:<br><textarea type="text" name="groups" rows="1" cols="60" class="upInput">general writing</textarea><br/><br/>
		<button id = "postText" class = "submitButton" >upload</button>
		
	  </form>
   </div>
   <!--
   <div id="content">
	  <form action="uploadVideoAction.php" method="post" enctype="multipart/form-data">
		VIDEO NAME:<br><textarea type="text" name="videoName" rows="1" cols="60" class="upInput"></textarea><br/>
		GROUPS:<br><textarea type="text" name="groups" rows="1" cols="60" class="upInput"></textarea><br/><br/>
		<input type="file" name="uploadedVideo" id="uploadedVideo"/>
		<input type="submit" value="post video"/><br/>
		
	  </form>
   </div>
   -->
   <div id="audioUpload">
	  <b style = 'font-size: 4vh;'>AUDIO</b><br/><br/><br/>
	  <form action="uploadAudioAction.php" method="post" enctype="multipart/form-data" id = "audioForm" >
		AUDIO NAME:<br><textarea type="text" name="audioName" style = "width: 20vw; height: 1vw;" class="upInput"></textarea><br/>
		GROUPS:<br><textarea type="text" name="groups" style = "width: 20vw; height: 2vw;" class="upInput">general music</textarea><br/><br/>
		<!--IMAGE: <input type="file" name="uploadedImage" id="uploadedImage"/><br/>-->
		AUDIO: <input type="file" name="uploadedAudio" id="uploadedAudio"/><br/><br/><br/><br/><br/>
		<button id = "postAudio" class = "submitButton" >upload</button>
		
	  </form>
   </div>
   
   <div id = "loadingMessage"></div>
   
  <div id = "footer">*You retain ownership of all content you submit, post, display, or otherwise make available on the service, and at any time may request its removal </div>
  <?php include "../siteComponents/header.php"; ?>
</body>

</html>