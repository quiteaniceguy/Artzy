<?php
class DisplayMedia{
  function __construct(){

  }
  function loadMedia($mediaArray, $nCurrentMedia, $nMediaToLoad){


  	$returnMessage = "";

  	$nMoreMediaToLoad = 0;

  	for ($i = 0; $i + $nCurrentMedia < sizeof($mediaArray) && $i < $nMediaToLoad + $nMoreMediaToLoad; $i++) {

  		$temp_media = $mediaArray[$i + $nCurrentMedia];

  		$mediaToAdd = "ha ha ha i added a midea{$nCurrentMedia}<br/>";

  		///if media doesn't have anything, load another media
  		if ($mediaToAdd == "")
  			$nMoreMediaToLoad++;

  		$returnMessage = $returnMessage . $mediaToAdd;

  		$nCurrentMedia++;
  	}



  	$returnMessage = str_replace("||||", "", $returnMessage);
  	$returnMessage = $returnMessage . "||||" . $nCurrentMedia;



  	//echo $_GET["group"] . "    " . $_GET["nMedia"] . "    " . $_GET["nMediaToLoad"];
    return $returnMessage;
  }

  function displayImage($tempMedia){
    echo "image {$tempMedia["id"]}<br/>";
  }
  function displayText($tempMedia){
    echo "text {$tempMedia["id"]}<br/>";
  }
  function displayAudio($tempMedia){
    echo "audio {$tempMedia["id"]}<br/>";
  }
}
 ?>
