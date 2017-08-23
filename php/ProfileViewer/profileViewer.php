<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
  <link rel="icon" href="../../favicon.PNG" type="image/png">
	<title>PROFILE</title>
	<link rel="stylesheet" href="../../css/profilePage.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js">
  
    $(document).ready(funtion(){
    
    var mainbottom = $('#main').offset().top + $('#main').height();
			$(window).on('scroll',function(){
				stop = Math.round($(window).scrollTop());
				if (stop > mainbottom) {
					$('.pie').addClass('past');
				} else {
						$('.pie').removeClass('past');
				}
			});
    
  });
  
  </script>
</head>
<body id="bod">
	<script>
  
  //
  //
  // IN PROGRESS
  /*
  $(Document).ready(function(){
    var mousewheelevt = (/Firefox/i.test(navigator.userAgent  )) ? "DOMMouseScroll" : "mousewheel"
      $('#yourDiv').bind(mousewheelevt, function(e){

    var evt = window.event || e t     
      evt = evt.originalEvent ? evt.originalEvent : evt;   
      var delta = evt.detail ? evt.detail*(-40) : evt.wheelDelta 

    if(delta > 0) {
        $("#links").slideDown(1000);
    }
    else{
        $("#links").slideUp(1000);
    }   
  });
  */
  // IN PROGRESS
  //
  //
  
	function addComment(mediaId, userId) {
			
			var xmlhttp = new XMLHttpRequest();
		
			//when state is ready to change
			xmlhttp.onreadystatechange = function() {
				
				//readystate holds status of xml request
				if (this.readyState == 4 && this.status == 200) {
					
					//returns response data as string
					document.getElementById("comments"+mediaId).innerHTML+=this.responseText+"</br>";
					
					
					
				}
			};
			xmlhttp.open("GET", "../actions/addComment.php?mediaId=" + mediaId + "&userId=" + userId + "&comment=" + document.getElementById("textarea"+mediaId).value , false);
			document.getElementById("textarea"+mediaId).innerHTML = "";
			xmlhttp.send();
			
	  
	}
	</script>
	<script src = '../JSActions/addComment.js'></script>
	<script src = '../JSActions/addLike.js'></script>
	<script src = '../JSActions/LoadMedia.js'></script>
	<?php
		include '../actions/DisplayComment.php';
		include '../actions/DisplayMediaOptions.php';
		include '../actions/DataRetriever.php';
		include '../actions/DisplayMedia.php';
		
		
		
		include "../siteComponents/header.php";
		echo "<br/><br/><br/><br/>";
		include "../siteComponents/MessageModal.php";
		echo "<button id='myBtn' onClick = \"openModal('{$_GET["username"]}')\">MESSAGE THIS USER</button>";
		
		$user=NULL;
		$pass=NULL;
		$id=NULL;
		
		
		$servername="localhost";
		$username="root";
		$password="";
		$dbName="db_artzytest";
		
		$conn=new mysqli($servername, $username, $password, $dbName);
		if($conn->connect_error){
			die("connection to server not found");
		}
		
		
		
		//////oupts all user infomration and sets user and id
		//$temp_user = getUser($_GET["username"], $conn);
		$sql="SELECT * FROM db_users WHERE username='{$_GET["username"]}' ";
		
		$result=$conn->query($sql);	
		
		if( mysqli_num_rows($result) > 0 ){
			
			while($temp_user=mysqli_fetch_assoc($result)){
			    
			    echo "<br/><br/><br/><br/><br/>";
				
			     echo "<div id='userInfo'>";
				 ///echos profile picture if it exists
				if (file_exists("../../profilePictures/{$temp_user["username"]}_{$temp_user["password"]}.jpg")){
				    echo "<img  id = 'profilePic' style='height: 20vh; width: 10vw' src='../../profilePictures/{$temp_user["username"]}_{$temp_user["password"]}.jpg'/></br>";
				}else{
				    echo "<br/>";
				}
				 echo "<b style='font-size: 12vh' >" . $temp_user["username"] . "'s account: </b><br/>";
				
				echo "<br/><br/><b style='font-size: 4vh'>ABOUT</b><br/><br/>" .
				 "<p style='width: 20vw;'>{$temp_user["about"]}</p>";
				
				echo "<br/><br/><br/><br/><br/>" ;
				
				echo "<br/>";
				echo "<b style='font-size: 12vh'>Posts: </b></br>";
				echo "</div>";
				//echo "<b style='font-size: 12vh>Posts:</b><br/>";
				$user = $temp_user["username"];
				$id = $temp_user["id"];
			
				
			}
		}else{
			echo "no results found";
		}
		
		
		///gets all media from current user
		$mediaIds = array();
		$sql=" SELECT table_media.id, table_mediaTypes.name FROM table_media INNER JOIN table_mediaTypes ON table_media.mediaType = table_mediaTypes.id WHERE table_media.userid = {$id} ORDER BY table_media.id DESC";
			
		$result=$conn->query($sql);
		if(!$result){
			die("sql failed");
		}

		if(mysqli_num_rows($result) > 0){
			while($row = mysqli_fetch_assoc($result)){
				array_push($mediaIds, $row["id"]);
			}
			///load more button is really broken
			displayNormalFormatWithLoadButton($mediaIds, 8, $conn);
		}else{
			echo "<br/><br/><br/><br/><br/>";
			echo "<b style='font-size: 7vh; ' >" . $_GET["username"] . " has no images :(</b>";
		}
		
	
	?>
  <div id="main"></div>
	<div id="below-main"></div>
</body>
</html>