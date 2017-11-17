<?php
  class ProfileViewerController{
    function __construct($sqlInterface){
      $this->sqlInterface = $sqlInterface;
    }
    function home(){

      $username = $_GET["username"];
      if (!isset($username))
        return 0;

      $user = $this->sqlInterface->getUser($username);

      $mediaData = $this->sqlInterface->getMediaIdsFromUser($user["id"]);



      $mediaIds = array();
      for ($i = 0; $i < sizeof($mediaData); $i++){
				array_push($mediaIds, $mediaData[$i]["id"]);
			}

      $media = $this->sqlInterface->getArrayOfMedia($mediaIds);
      $media = $this->sqlInterface->setMediaSpecificData($media);



      require_once($_SERVER["DOCUMENT_ROOT"] . "/Artzy/src/views/ProfileViewer/ProfileViewer.php");
    }

    function error(){

    }
  }

 ?>
