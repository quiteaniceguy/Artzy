<?php
	class UploadMediaController{
		function home(){
			$uploaded = $_GET["uploaded"];
			require_once($_SERVER["DOCUMENT_ROOT"] . "/Artzy/src/views/UploadMedia/UploadMedia.php");
		}
		
		function error(){
			
		}
	}


?>