<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/Artzy/src/models/sqlmodels/SQLInterface.php');
require_once($_SERVER["DOCUMENT_ROOT"] . "/Artzy/src/connections/connection.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/Artzy/src/controllers/EmailLibrary/EmailInterface.php");

$config = require $_SERVER["DOCUMENT_ROOT"] . "/Artzy/config/config.php";
$conn = Db::getInstance($config);

$sql = new SQLInterface($conn);

echo $sql->insertComment($_POST["comment"], $_POST["mediaId"], $_POST["userId"]);

 ?>
