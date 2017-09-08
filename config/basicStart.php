<?php
	///Connects to amazon s3 library and connects to mysql library
	
	
    use Aws\S3\S3Client;

    require 'vendor/autoload.php';

    $config = require('config.php');
    
    $s3 = S3Client::factory([
        'key' => $config['s3']['key'],
        'secret' => $config['s3']['secret']
    ]);
	
	
	$conn = new PDO("mysql:host={$config['mysql']['servername']};dbname={$config['mysql']['dbName']}", $config['mysql']['username'], $config['mysql']['password']);
		
	try{
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		echo "connection success";
		
	}catch(PDOException $e){
		echo "connection established" . $e->getMessage();
	}

   

?>
