<?php
	require_once($_SERVER["DOCUMENT_ROOT"] . "/Artzy/src/controllerHelpers/ErrorReports.php");
	
	
	
	class Db{
		
		private static $instance = null;

		private function __construct(){}
		private function __clone(){}
		
		public static function getInstance($config){
			if (!isset($instance) ){
				try{
					self::$instance = new PDO("mysql:host={$config["mysql"]["servername"]};dbname={$config["mysql"]["dbName"]}", $config["mysql"]["username"], $config["mysql"]["password"]);
					self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					
				}catch(PDOException $e){
					return $e->getMessage();
				}
			}
			
			return self::$instance;
		}
	}


?>