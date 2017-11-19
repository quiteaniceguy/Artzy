<?php
  session_start();
  require_once ($_SERVER["DOCUMENT_ROOT"] . "/Artzy/src/connections/connection.php");
  require_once ($_SERVER["DOCUMENT_ROOT"] . "/Artzy/src/models/sqlmodels/SQLInterface.php");

  $config = require $_SERVER["DOCUMENT_ROOT"] . "/Artzy/config/config.php";

  $conn = Db::getInstance($config);
  $sql = new SQLInterface($conn);

  $mediaId = $sql->uploadMedia($_SESSION["currentId"], 3);
  $textId = $sql->uploadText($_POST["mediaText"]);

  $textDataId = $sql->uploadTextData($_POST["title"], $textId, $mediaId);

  $groups = explode(" ", " " . $_POST["groups"]);
  $sql->uploadGroupLinks($groups, $mediaId);

  echo "upload text";

  header('Location: /Artzy/indexTest.php?controller=uploadMedia&action=home');
 ?>
