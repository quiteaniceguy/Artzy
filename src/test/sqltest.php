<?php
	require $_SERVER['DOCUMENT_ROOT'] . "/Artzy/src/RemoteFileLibrary/S3Interface.php";
	require($_SERVER['DOCUMENT_ROOT'] . '/Artzy/src/controllerHelpers/ErrorReports.php');
	require($_SERVER['DOCUMENT_ROOT'] . '/Artzy/src/models/sqlmodels/SQLInterface.php');

	require_once($_SERVER["DOCUMENT_ROOT"] . "/Artzy/src/connections/connection.php");

	$testWr = 472;
	$testAu = 542;
	$testIm = 476;
	$testGroups = array("general", "visualarts");

	$s3 = require $_SERVER['DOCUMENT_ROOT'] . "/Artzy/config/S3Connect.php";
	$config = require($_SERVER['DOCUMENT_ROOT'] . '/Artzy/config/config.php');

	$conn = Db::getInstance($config);


	$fileUploader = new S3Interface($config['s3']['bucket'], $s3);
	$sqlInterface = new SQLInterface($conn);

	var_dump($sqlInterface->getMedia($testWr));
	var_dump($sqlInterface->getUser("tommy"));
	var_dump($sqlInterface->getAudio($testAu));
	var_dump($sqlInterface->getWriting($testWr));
	var_dump($sqlInterface->getImage($testIm));
	var_dump($sqlInterface->getComments($testIm));
	var_dump($sqlInterface->getGroupId("visualarts"));
	var_dump($sqlInterface->getGroupLinks(3));
	var_dump($sqlInterface->getMediaIdsFromUser(145));
	var_dump($sqlInterface->getUsername(145));
	var_dump($sqlInterface->getGroupsFromSearch('ge'));
	var_dump($sqlInterface->deleteAllMediaData(599));

	//tests for uploading data, wanna stop uploading random shit
	/*
	$mediaId = $sqlInterface->uploadMedia(145, 2);
	var_dump($mediaId);


	$textId = $sqlInterface->uploadText("hello this is a test text");
	var_dump($textId);

	var_dump($sqlInterface->uploadTextData("test title", $textId, $mediaId) );

	$imageId = $sqlInterface->uploadAudio("test_audio", $mediaId);
	$sqlInterface->uploadGroupLinks( $testGroups, $mediaId);
	*/
	echo "<br/>";
	var_dump($sqlInterface->getLoginUser('tommy', 'Kangeroo2'));
	//$sqlInterface->uploadTextData("test title", $textId, )


?>
