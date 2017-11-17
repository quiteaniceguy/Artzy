<?php

return [
    's3' => [

  		'secret' => 'I0FJqe5JtCoxvAZdu3ISXjurtzL4WYXyyESln3b8',
  		'key' => 'AKIAJ3IJ4VGWSKFWD4SQ',
      'bucket' => 'themuralreviewbucket',
  		'version' => 'latest',
  		'region' => 'us-west-2'
    ],

	'mysql' => [

		'servername' => "themuradbid.cxqmpjl9bxm3.us-west-2.rds.amazonaws.com",
		'username' => "octopoco",
		'password' => "Kangeroo2",
		'dbName' => "db_themural"

	],

	'storage' => [
		"images" => "http://d3velm5jeyhhne.cloudfront.net/UserData/ImagePost/",
		"audio" => "http://d3velm5jeyhhne.cloudfront.net/UserData/AudioPost/Audio/",
		"shortPImages" => "/UserData/ImagePost/",
		"shortPAudio" => "/UserData/AudioPost/Audio/"


	],

	'errors' => [
		'report' => '1'
	]



];

?>
