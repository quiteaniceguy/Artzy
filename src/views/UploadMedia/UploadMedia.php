  <?php
	require_once $_SERVER["DOCUMENT_ROOT"] . '/Artzy/src/javascript/UploadMediaJS.php';

  require_once $_SERVER['DOCUMENT_ROOT'] . '/Artzy/src/views/Header/Header.php';
  ?>
  <link rel="stylesheet" href="/Artzy/css/uploadPage.css">
  <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300|Megrim" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Lora" rel="stylesheet">

  <div id="imageUpload">
	  <b style = 'font-size: 4vh;'>IMAGE</b><br/><br/><br/>
	  <form action="/Artzy/src/controllers/UploadMedia/UploadImage.php" method="post" enctype="multipart/form-data" id = "imageForm">
		IMAGE NAME:<br><textarea type="text" name="imageName"  class="upInput" style = "width: 20vw; height: 1vw;"></textarea><br/>
		GROUPS:<br><textarea type="text" name="groups" style = "width: 20vw; height: 2vw;" class="upInput">general visualarts</textarea><br/><br/>
		<input type="file" name="uploadedImage" id="uploadedImage"/><br/><br/><br/><br/>
		<button id = "postImage" class = "submitButton" >upload</button>
		<!-- <input type="submit" value="post" id = "postButton"/><br/>  -->

	  </form>
   </div>

   <div id="textUpload">
	  <b style = 'font-size: 4vh;'>TEXT</b><br/><br/><br/>
	  <form action="/Artzy/src/controllers/UploadMedia/UploadText.php" method="post" enctype="multipart/form-data" id = "textForm">
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
	  <form action="/Artzy/src/controllers/UploadMedia/UploadAudio.php" method="post" enctype="multipart/form-data" id = "audioForm" >
		AUDIO NAME:<br><textarea type="text" name="audioName" style = "width: 20vw; height: 1vw;" class="upInput"></textarea><br/>
		GROUPS:<br><textarea type="text" name="groups" style = "width: 20vw; height: 2vw;" class="upInput">general music</textarea><br/><br/>
		<!--IMAGE: <input type="file" name="uploadedImage" id="uploadedImage"/><br/>-->
		AUDIO: <input type="file" name="uploadedAudio" id="uploadedAudio"/><br/><br/><br/><br/><br/>
		<button id = "postAudio" class = "submitButton" >upload</button>

	  </form>
   </div>

   <div id = "loadingMessage"></div>

  <div id = "footer">*You retain ownership of all content you submit, post, display, or otherwise make available on the service, and at any time may request its removal </div>
