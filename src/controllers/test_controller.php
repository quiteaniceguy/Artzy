<?php
	class TestController{
		function home(){
			$firstName = "Thomas";
			$lastName = "Eblen";
			
			require_once($_SERVER["DOCUMENT_ROOT"] . "/Artzy/src/views/test/home.php");
		}
		
		function error(){
			require_once($_SERVER["DOCUMENT_ROOT"] . "/Artzy/src/views/test/error.php");
		}
	}

?>