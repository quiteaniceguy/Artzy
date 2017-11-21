<?php
	class URLChecker{

		public function __construct(){

		}

		public static function checkURL($urlString){
			$headers = get_headers($urlString);
			return stripos($headers[0],"200 OK")?true:false;
		}
	}


?>
