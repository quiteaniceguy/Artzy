<?php

	require 'DataRetriever.php';
	
	$servername="localhost";
	$username="root";
	$password="";
	$dbName="db_artzytest";
	
	$conn = new mysqli($servername, $username, $password, $dbName);
	if(!$conn){
		die("connection to server failed");
	}
	
	$returnMessage = "";
	
	
	$comments = getComments($_GET["mediaId"], $conn);
	
	$totalComments = $_GET["nComments"];
	
	if(sizeof($comments) - $_GET["nComments"]>0){
		for($i = 0; $i + $_GET["nComments"] < sizeof($comments) && $i < 10; $i++){
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