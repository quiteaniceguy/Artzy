<?php

	require 'DataRetriever.php';
	
	$config = require('../../config/config.php');
		
	$conn = new mysqli($config["mysql"]["servername"], $config["mysql"]["username"], $config["mysql"]["password"], $config["mysql"]["dbName"]);
	if(!$conn){
		die("connection to server failed");
	}
	
	
	$comments = getComments($_GET["mediaId"], $conn);
	
	$totalComments = $_GET["nComments"];
	
	if(sizeof($comments) - $_GET["nComments"]>0){
		for($i = 0; $i + $_GET["nComments"] < sizeof($comments) && $i < 5; $i++){
			$returnMessage = $returnMessage . "<div id='comment'> " .
			"<div style='color: red;'>&emsp;&emsp;" . $comments[$i + $_GET["nComments"]][0] . ":</div>" .
			"<div style='padding-left: 3vw;'>" . $comments[$i + $_GET["nComments"]][1] . "</div><br/>" .
			"</div>";
			
			$totalComments++;
		}
	}
	///echo comments into <p>
	$returnMessage = str_replace("||||", "", $returnMessage);
	$returnMessage = $returnMessage . "||||" . $totalComments;
	
	echo $returnMessage;
	
	
	//echo "load comments return state" . $_GET["mediaId"];
?>