<?php
  class GroupViewerController{


	function __construct($sqlInterface){
		$this->sqlInterface = $sqlInterface;
	}

    function home(){
      ///gets all group links for specific group
  		$groupName = $_GET["group"];
      if (!isset($_GET["group"]))
        $groupName = "general";
        
  		$groupId = $this->sqlInterface->getGroupId($groupName);
  		$groupLinks = $this->sqlInterface->getGroupLinks($groupId);

      //uses grouplinks to get all mediaIds
  		$groupIds = array();
  		for ($groupLink = 0; $groupLink < sizeof($groupLinks); $groupLink++) {
  			array_push($groupIds, $groupLinks[$groupLink]["mediaId"]);
  		}

      //uses media ids to get array of media
  		$media = $this->sqlInterface->getArrayOfMedia($groupIds);

      //gets username and media data for display of each media's owner
      $media = $this->sqlInterface->setMediaSpecificData($media);



      //var_dump($media);

  		require_once($_SERVER["DOCUMENT_ROOT"] . "/Artzy/src/views/GroupViewer/GroupViewer.php");

    }

    function error(){

    }
  }
?>
