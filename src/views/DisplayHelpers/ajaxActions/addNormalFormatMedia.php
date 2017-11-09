<?php
  require_once($_SERVER['DOCUMENT_ROOT'] . "/Artzy/src/views/DisplayHelpers/DisplayMedia.php");
  $displayMedia = new DisplayMedia();
  $media = json_decode($_POST["jsonMedia"], true);

  echo $displayMedia->loadMedia($media, $_POST["nMedia"], $_POST["nMediaToLoad"]);
  //echo "nMedia: " .  $media[3]["id"] . "nMediatoLoad: " . $_POST["nMediaToLoad"];



  //echo "normal format" . $_POST["jsonMedia"][0];
 ?>
