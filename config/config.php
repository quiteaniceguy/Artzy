<?php

return [
    's3' => [

		'secret' => 'I0FJqe5JtCoxvAZdu3ISXjurtzL4WYXyyESln3b8',
		'key' => 'AKIAJ3IJ4VGWSKFWD4SQ',
        'bucket' => 'themuralreviewbucket'
    ],
	
	'mysql' => [
	
		'servername' => "localhost",
		'username' => "root",
		'password' => "",
		'dbName' => "db_artzytest"
	
	],
	
	'storage' => [
		"images" => "https://s3-us-west-2.amazonaws.com/themuralreviewbucket/UserData/ImagePost/",
		"audio" => "../UserData/audioPost/audio/"
		
	
	]
	
	

];

?>
