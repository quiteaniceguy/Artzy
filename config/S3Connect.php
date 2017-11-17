<?php

	if(file_exists($_SERVER['DOCUMENT_ROOT'] . '/Artzy/libs/aws/aws-autoloader.php')){
		//echo "exsits";
	}else{
		echo "no exists";
	}

		ini_set('display_errors',1);
    error_reporting(E_ALL);

    require_once $_SERVER['DOCUMENT_ROOT'] . '/Artzy/libs/aws/aws-autoloader.php';

    use Aws\S3\S3Client;

    $config = require('config.php');




    $testVar = $config['s3']['secret'];

    try{

		$s3 = S3Client::factory([
			'version' => $config['s3']['version'],
			'region' => $config['s3']['region'],
			'credentials' => array(
				'key' => $config['s3']['key'],
				'secret' => $config['s3']['secret']
			)

		]);
		return $s3;

    }catch(Exception $e){
		die($e->getMessage());
    }






?>
