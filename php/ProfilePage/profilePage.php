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
  
	
	</script>
	<?php
		$user=$_SESSION["currentUser"];
		$pass=$_SESSION["currentPass"];
		$id=$_SESSION["currentId"];
		
		
		$servername="localhost";
		$username="root";
		$password="";
		$dbName="db_artzytest";
		
		$conn=new mysqli($servername, $username, $password, $dbName);
		if($conn->connect_error){
			die("connection to server not found");
		}
		
		
		
		
		///gets all media from current user
		$sql=" SELECT table_media.id, table_mediaTypes.name FROM table_media INNER JOIN table_mediaTypes ON table_media.mediaType = table_mediaTypes.id WHERE table_media.userid = {$_SESSION["currentId"]} ORDER BY table_media.id DESC";
			
			$result=$conn->query($sql);
			if(!$result){
				die("sql failed");
			}
			//echo "<br/><br/><br/><br/><br/>"
			if(mysqli_num_rows($result) > 0){
				echo "<br/><br/><br/><br/><br/>";
				echo "<b style='font-size: 12vh; ' >welcome  " . $_SESSION["currentUser"] . ":</b>";
				
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
								echo "<div id='post' style='width: 400px' > ";
								echo "<img id='userImage' style='height: {$adj_img_height}px; width: {$adj_img_width}px; ' src='../../images/{$imageId}.jpg' />";
								echo "upload " . $imageId . "<br/>";
								echo "{$row_two["imageName"]}</br>";
								
								/*
								///echo comments into <p>
								$sql ="SELECT * FROM table_comments WHERE mediaId={$row["id"]} ";
								$sqlresult=$conn->query($sql);
								
								echo "<div id='comments{$row["id"]}'>";
								if(mysqli_num_rows($sqlresult)>0){
									while($row_two=mysqli_fetch_assoc($sqlresult)){
										echo "<div id = 'comment' >" . $row_two["comment"] . "</div>";
                    // echo "<div style='color: red;'>&emsp;&emsp;" . $row_two["username"] . ":</div>";
										// echo  "<div style='padding-left: 3vw;'>" . $row_two["comment"] . "</div><br/>";
									}
								}
								echo "</div>";
								///echo add comments button
								echo "
									<textarea  id='textarea{$row["id"]}' style='margin: auto; display: block;' ></textarea><hr style='height:-10px; visibility:hidden;'/>
									<button class='commentB' onClick=\"addComment('{$row["id"]}','{$_SESSION["currentId"]}') \">Comment</button>
								</div>
								";
								echo "<br/>";
								*/
							}

						}
					}
				}
			}
		
		include "../siteComponents/header.php";
	?>
  <div id="main"></div>
	<div id="below-main"></div>
</body>
</html>