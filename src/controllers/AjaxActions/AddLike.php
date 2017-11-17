<?php


  require_once($_SERVER['DOCUMENT_ROOT'] . '/Artzy/src/models/sqlmodels/SQLInterface.php');
  require_once($_SERVER["DOCUMENT_ROOT"] . "/Artzy/src/connections/connection.php");

	$config = require $_SERVER["DOCUMENT_ROOT"] . "/Artzy/config/config.php";
	$conn = Db::getInstance($config);

  $sql = new SQLInterface($conn);

  $returnValue = $sql->insertLike($_GET["mediaId"], $_GET["userId"]);

  return $returnValue;
 ?>
