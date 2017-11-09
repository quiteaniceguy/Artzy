<?php
	/* if reports set to 1 in config file, report all errors */
	
	$errorReportsConfig = require($_SERVER['DOCUMENT_ROOT'] . '/Artzy/config/config.php');
		
	if($errorReportsConfig["errors"]["report"] == 1){
		ini_set('display_errors', 1);
		ini_set('display_startup_errors', 1);
		error_reporting(E_ALL);
		
	}
 
?>