<?php
  class MediaViewerController{
    function __construct($sqlInterface){
      $this->sqlInterface = $sqlInterface;
    }
    function home(){
      echo "media viewer";

      $mediaId = $_GET["mediaId"];

      $media = $this->sqlInterface->getArrayOfMedia(array($mediaId));
      $media = $this->sqlInterface->setMediaSpecificData($media);

      //var_dump($media);

      require_once $_SERVER['DOCUMENT_ROOT'] . "/Artzy/src/views/MediaViewer/MediaViewer.php";

    }
    function error(){

    }
  }
 ?>
