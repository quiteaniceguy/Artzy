<?php
  class ProfileEditorController{
    function __construct($sqlInterface){
      $this->sqlInterface = $sqlInterface;
    }
    function home(){

      $username = $_SESSION["currentUser"];
      $id = $_SESSION["currentId"];

      $mediaData = $this->sqlInterface->getMediaIdsFromUser($id);



      $mediaIds = array();
      for ($i = 0; $i < sizeof($mediaData); $i++){
        array_push($mediaIds, $mediaData[$i]["id"]);
      }

      $media = $this->sqlInterface->getArrayOfMedia($mediaIds);
      $media = $this->sqlInterface->setMediaSpecificData($media);



      require_once($_SERVER["DOCUMENT_ROOT"] . "/Artzy/src/views/ProfileEditor/ProfileEditor.php");
    }
    function error(){

    }
  }
 ?>
