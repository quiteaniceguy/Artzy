<?php

   

    require 'vendor/autoload.php';
    use Aws\S3\S3Client;

    $config = require('config.php');




    $testVar = $config['s3']['secret'];
    
    try{ 
    $s3 = S3Client::factory([
	'version' => '2006-03-01',
	'region' => 'ap-southeast-2',
        'key' => $config['s3']['key'],
        'secret' => $config['s3']['secret']

    ]);
    
    return $s3; 
    }catch(Exception $e){
	die($e->getMessage());
    }


   

	
	
?> 
