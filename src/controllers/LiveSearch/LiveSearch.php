<?php
  require_once($_SERVER['DOCUMENT_ROOT'] . '/Artzy/src/models/sqlmodels/SQLInterface.php');
  require_once($_SERVER["DOCUMENT_ROOT"] . "/Artzy/src/connections/connection.php");
  require_once($_SERVER["DOCUMENT_ROOT"] . "/Artzy/src/controllers/EmailLibrary/EmailInterface.php");
  require_once($_SERVER['DOCUMENT_ROOT'] . "/Artzy/src/views/DisplayHelpers/DisplayMedia.php");

  $config = require $_SERVER["DOCUMENT_ROOT"] . "/Artzy/config/config.php";
  $conn = Db::getInstance($config);

  $sql = new SQLInterface($conn);

  $groups = $sql->getGroupsFromSearch($_GET["searchValue"]);

  foreach ($groups as $group){
    echo "<a href = /Artzy/index.php?controller=groupViewer&action=home&group={$group}>{$group}<a/><br/>";
  }
 ?>
