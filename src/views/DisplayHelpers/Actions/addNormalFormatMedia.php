<?php
  require_once($_SERVER['DOCUMENT_ROOT'] . "/Artzy/src/views/DisplayHelpers/DisplayMedia.php");

  $config = require_once($_SERVER['DOCUMENT_ROOT'] . "/Artzy/config/config.php");
  $displayMedia = new DisplayMedia();
  $media = json_decode($_POST["jsonMedia"], true);

  echo $displayMedia->loadMedia($_POST["currentId"], $media, $_POST["nMedia"], $_POST["nMediaToLoad"], $_POST["mediaOptionsType"], $config);
  //echo "nMedia: " .  $media[3]["id"] . "nMediatoLoad: " . $_POST["nMediaToLoad"];
  //echo "normal format" . $_POST["jsonMedia"][0];
 ?>
