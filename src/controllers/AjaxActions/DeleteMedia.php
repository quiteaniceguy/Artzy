<?php
  require_once($_SERVER['DOCUMENT_ROOT'] . '/Artzy/src/models/sqlmodels/SQLInterface.php');
  require_once($_SERVER["DOCUMENT_ROOT"] . "/Artzy/src/connections/connection.php");
  require_once($_SERVER['DOCUMENT_ROOT'] . "/Artzy/src/RemoteFileLibrary/S3Interface.php");
  
  $config = require $_SERVER["DOCUMENT_ROOT"] . "/Artzy/config/config.php";
  $conn = Db::getInstance($config);

  $s3 = require $_SERVER['DOCUMENT_ROOT'] . "/Artzy/config/S3Connect.php";
  $fileUploader = new S3Interface($config['s3']['bucket'], $s3);



  $sql = new SQLInterface($conn);
  echo "deleted media";
 ?>
