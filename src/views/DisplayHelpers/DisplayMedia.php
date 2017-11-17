<?php
class DisplayMedia{
  function __construct(){

  }
  function loadMedia($currentId, $mediaArray, $nCurrentMedia, $nMediaToLoad, $mediaOptionsType, $config){
    $imageWidth = 800;

  	$returnMessage = "";

  	$nMoreMediaToLoad = 0;

    $nMoreCurrentMedia = 0;

    //put all media comments in array
    /*
    foreach ($mediaArray as $temp)
      echo $temp["id"] . "<br/>";
    */
    $mediaComments = array();
    foreach ($mediaArray as $tempMedia ) {
      array_push($mediaComments, $tempMedia["getComments"]);
    }

  	for ($i = 0; $i + $nCurrentMedia < sizeof($mediaArray) && $i < $nMediaToLoad + $nMoreMediaToLoad; $i++) {

  		$temp_media = $mediaArray[$i + $nCurrentMedia];

  		$mediaToAdd = "";


      switch($temp_media["name"]){

        case "text":
          $mediaToAdd = $this->displayText($temp_media, true);
          break;
        case "image":
          $mediaToAdd = $this->displayImage($imageWidth, $temp_media, $config);
          break;
        case "audio":
          $mediaToAdd = $this->displayAudio($temp_media, $config);
          break;
        case "video":
          $mediaToAdd = "video don't work<br/>";
          break;
      }

  		///if media doesn't have anything, load another media
  		if ($mediaToAdd == ""){
        $nMoreMediaToLoad++;
        continue;
      }


      $mediaToAdd = "<div class = 'post'>" . $mediaToAdd;

      $selectMediaOptions = array(false, false, false, false);
      switch($mediaOptionsType){
        case 1:
          $selectMediaOptions = array(true, true, true, false);
          break;
        case 2:
          $selectMediaOptions = array(true, false, false, true);
          break;
      }
      $mediaToAdd = $mediaToAdd . $this->displayMediaOptions($temp_media, $_SESSION["currentId"], $selectMediaOptions);
      $mediaToAdd = $mediaToAdd .$this->displayCommentsAndLoadButton($temp_media, $_SESSION["currentId"], $_SESSION["currentUser"], $mediaComments[$i + $nCurrentMedia]);
      //outputs comments


      $mediaToAdd = $mediaToAdd . "</div>";




      $mediaToAdd = $mediaToAdd . "<br/>";

  		$returnMessage = $returnMessage . $mediaToAdd;

  		$nMoreCurrentMedia++;


  	}



  	$returnMessage = str_replace("||||", "", $returnMessage);
  	$returnMessage = $returnMessage . "||||" . ($nCurrentMedia + $nMoreCurrentMedia);



  	//echo $_GET["group"] . "    " . $_GET["nMedia"] . "    " . $_GET["nMediaToLoad"];

    return $returnMessage;
  }


  function displayImage($width, $tempMedia, $config){
    $imageId = $tempMedia["getImage"]["id"];

    ///finds scaled imaeg size
    $adj_img_size = $width/$tempMedia["getImage"]["width"];
    $adj_img_width = $tempMedia["getImage"]["width"]*$adj_img_size;
    $adj_img_height = $tempMedia["getImage"]["height"]*$adj_img_size;

    $returnText = "";

    //start post

    $returnText = $returnText . "<b>{$tempMedia["getImage"]["imageName"]}</b><br/><br/>";


    //start textContent
    $returnText = $returnText . "<div class = 'imageContent' >";

    $returnText = $returnText . "<a href = '/Artzy/indexTest.php?controller=mediaViewer&action=home&group=general&mediaId={$tempMedia["id"]}' target = '_blank' >" .
    "<img id='userImage' style='height: {$adj_img_height}px; width: {$adj_img_width}px; ' src='{$config["storage"]["images"]}{$tempMedia["id"]}.jpg' />" .
    "</a>";


    //ending textContent
    $returnText = $returnText . "</div>";


    //ending post


    return $returnText . "<p>imageID: {$tempMedia["id"]}</p>";
  }

  function displayText($tempMedia, $cut){

    /*
    if (strlen($temp_text["mediaText"]) > 4) {
     $returnText = $returnText . "<div id='post' style='width: 400px' > ";
     $returnText = $returnText . "<b>{$temp_text["title"]}</b><br/><br/>";
     $returnText = $returnText . "<div id = 'textPostContent' >";
     $returnText = $returnText . "<div id = 'textContent' >";

     $textToDisplay = $temp_text["mediaText"];

     //this word count include html tags, which take up a lot more characters, so, yeah......
     if(strlen($textToDisplay) > 1000){
       $textToDisplay = trimContent($temp_text["mediaText"], 1000) . ".........<a href = '../MediaViewer/MediaViewer.php?mediaId={$temp_media["id"]}' target = '_blank' style = 'color: blue;' >(more)</a>";
       //echo "to long: " . strlen($temp_text["mediaText"]);
     }else{

       //echo "short enough: " . strlen($temp_text["mediaText"]);
     }

     $returnText = $returnText . "<div style = 'width: 20vw;'>" . $textToDisplay . "</div>";
     $returnText = $returnText . "</div>";
     $returnText = $returnText . displayImageOptions($username["username"], $temp_media["id"], $_SESSION["currentId"], $conn);




     $returnText = $returnText . "</div>";

     $returnText = $returnText . displayComment($temp_media["id"], $_SESSION["currentId"], 0, $conn);
     $returnText = $returnText . "</div>";
   }*/
    $returnText = "";



    $returnText = $returnText . "<b>{$tempMedia["getText"]["title"]}</b><br/><br/>";


    //start textContent
    $returnText = $returnText . "<div class = 'textContent' >";


    $returnText = $returnText . $tempMedia["getText"]["mediaText"];

    //ending textContent
    $returnText = $returnText . "</div>";







    return $returnText;

  }

  function displayAudio($tempMedia, $config){
    $returnText = "";

    $returnText = $returnText . $tempMedia["getAudio"]["audioName"] . "<br/>";
    //start audioContent
    $returnText = $returnText . "<div class = 'audioContent' >";


    $returnText = $returnText . "
        <audio controls class = 'audioSrc' style='width: 400px'>
          <source src='{$config["storage"]["audio"]}{$tempMedia["id"]}.mp3'>

        </audio>
    ";

    //end audioContent
    $returnText = $returnText . "</div>";





    return $returnText;
  }

  function displayMediaOptions($tempMedia, $userId, $selectMediaOptions){
    $returnText = "";
    //start mediaOptions
    $returnText = $returnText . "<div class = 'mediaOptions'>";

    if ($selectMediaOptions[0]) {
      $returnText = $returnText . "<div class = 'mediaOption' >


        <img class = 'likeButton' onClick = 'addLike({$tempMedia["id"]},{$userId})'  src = '/Artzy/icons/heartIcon.jpg' ></img>
  			<div class ='timesSymbol'>X</div>
  			<div class = 'likeCounter' id='likeCounter{$tempMedia["id"]}' class='likesCounter'>{$tempMedia["getLikes"]}</div>
      </div><br/>";
    }

    if ($selectMediaOptions[1]) {
      $returnText = $returnText . "<div class = 'mediaOption' >

      <a href='/Artzy/indexTest.php?controller=profileViewer&action=home&username=test' target = '_blank'>
        <img id='imageOptionsProfileIcon' class='profileIcon' style='height: 5.75vh; width: 2.75vw; ' src='/Artzy/icons/profileIcon.gif'  />
      </a>

      </div>";

    }

    if ($selectMediaOptions[2]) {
      $returnText = $returnText . "<div class = 'mediaOption' >



        <img id='imageOptionsMailIcon' class='mailIcon' style='height: 5.75vh; width: 5vw; ' src='/Artzy/icons/mailIcon.png'  onClick = \"openModal('test', '{$tempMedia["id"]}', '173')\" />

      </div><br/>";
    }

    if ($selectMediaOptions[3]) {
      $returnText = $returnText . "<div class = 'mediaOption' >
      <img class = 'deleteMedia' onclick = \"deleteMedia('{$mediaId}')\" src = '/Artzy/icons/trashIcon.png' />
      </div><br/>";
    }
    //end mediaOptions
    $returnText = $returnText . "</div>";

    return $returnText;
  }

  function loadComments($commentArray, $nCurrentComments, $nCommentsToLoad){
    $returnMessage = "";

    $nMoreCommentsToLoad = 0;

    $nMoreCurrentComments = 0;

    for ($i = 0; $i + $nCurrentComments < sizeof($commentArray) && $i < $nCommentsToLoad + $nMoreCommentsToLoad; $i++) {
      $tempComment = $commentArray[$i + $nCurrentComments];

      $commentToAdd = "";

      $commentToAdd = $tempComment[1] . "<br/>";
      $commentToAdd = "<div id='comment'>  <div style='color: red;'>&emsp;&emsp;" . $tempComment[0] . ":</div><div style='padding-left: 3vw;'>" . $tempComment[1] . "</div><br/></div>";

      //var_dump$$temp
      ///if media doesn't have anything, load another media

      if ($commentToAdd == ""){
        $nMoreCommentsToLoad++;
      }


      $returnMessage = $returnMessage . $commentToAdd;

      $nMoreCurrentComments++;
    }



    $returnMessage = str_replace("||||", "", $returnMessage);
    $returnMessage = $returnMessage . "||||" . ($nCurrentComments + $nMoreCurrentComments);



    //echo $_GET["group"] . "    " . $_GET["nMedia"] . "    " . $_GET["nMediaToLoad"];
    return $returnMessage;


  }

  function displayCommentsAndLoadButton($temp_media, $currentId, $currentUser, $jsonComments){
    $mediaToAdd = "";
    $initComments = $this->loadComments($temp_media["getComments"], 0, 5);
    $initComments = explode("||||", $initComments);

    $mediaToAdd = $mediaToAdd . "<div id = 'comments{$temp_media["id"]}'>" . $initComments[0] . "</div>";
    //load more comments commentButtonText
    if (sizeof($temp_media["getComments"]) > 5){

      $jsonComments = json_encode($temp_media["getComments"]);
      $mediaToAdd = $mediaToAdd . "<span  id = 'loadCommentsButton{$temp_media["id"]}' onClick = 'loadComments({$temp_media["id"]}, {$jsonComments},{$initComments[1]}, 3)' ><b>Load Comments</b></span>";
    }
    //textarea to comment and submit comment button
    $mediaToAdd = $mediaToAdd . "<textarea  id='textarea{$temp_media["id"]}' class = 'commentTextArea' ></textarea><hr style='height:-10px; visibility:hidden;'/>
    <button class='commentButton' onClick=\"addComment('{$temp_media["id"]}','{$currentUser}', '{$currentId}') \">Comment</button>";

    return $mediaToAdd;
  }




}
 ?>
