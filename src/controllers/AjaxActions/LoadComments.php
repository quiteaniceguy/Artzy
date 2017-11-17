<?php
  require_once($_SERVER['DOCUMENT_ROOT'] . '/Artzy/src/models/sqlmodels/SQLInterface.php');
  require_once($_SERVER["DOCUMENT_ROOT"] . "/Artzy/src/connections/connection.php");
  require_once($_SERVER["DOCUMENT_ROOT"] . "/Artzy/src/controllers/EmailLibrary/EmailInterface.php");
  require_once($_SERVER['DOCUMENT_ROOT'] . "/Artzy/src/views/DisplayHelpers/DisplayMedia.php");

  $config = require $_SERVER["DOCUMENT_ROOT"] . "/Artzy/config/config.php";
  $conn = Db::getInstance($config);

  $sql = new SQLInterface($conn);
  $display = new DisplayMedia();

  $comments = json_decode($_POST["jsonComments"], true);


  echo $display->loadComments($comments, $_POST["nComments"], $_POST["nCommentsToLoad"]);
  //echo "load comments place holder";
 ?>
