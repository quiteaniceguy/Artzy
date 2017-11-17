<script src = '/Artzy/src/javascript/ajax/AddLike.js'></script>
<script src = '/Artzy/src/javascript/ajax/Comments.js'></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src = '/Artzy/src/javascript/ajax/LoadNormalFormatMedia.js'></script>

<link rel = "stylesheet" href = "/Artzy/css/DisplayMedia/DisplayMedia.css">

<?php
  require_once $_SERVER['DOCUMENT_ROOT'] . '/Artzy/src/views/DisplayHelpers/DisplayMedia.php';
  require_once $_SERVER['DOCUMENT_ROOT'] . '/Artzy/src/views/Header/Header.php';
  $config = require $_SERVER["DOCUMENT_ROOT"] . "/Artzy/config/config.php";

  $displayMedia = new DisplayMedia();

  $temp_media = $media[0];

  $mediaToAdd = "";
  switch($temp_media["name"]){

    case "text":
      $mediaToAdd = $displayMedia->displayText($temp_media, false);
      break;
    case "image":
      $mediaToAdd = $displayMedia->displayImage(800, $temp_media, $config);
      break;
    case "audio":
      $mediaToAdd = $displayMedia->displayAudio($temp_media, $config);
      break;
    case "video":
      $mediaToAdd = "video don't work<br/>";
      break;
  }

  $mediaToAdd = "<div class = 'post'>" . $mediaToAdd;

  $mediaToAdd = $mediaToAdd . $displayMedia->displayMediaOptions($temp_media, $_SESSION["currentId"]);
  $mediaToAdd = $mediaToAdd . $displayMedia->displayCommentsAndLoadButton($temp_media, $_SESSION["currentId"], $_SESSION["currentUser"], $temp_media["getComments"]);
  //outputs comments


  $mediaToAdd = $mediaToAdd . "</div>";



  echo "<br/><br/><br/><br/><br/><br/>" . $mediaToAdd;
 ?>
