
<?php
	
	
	$servername="localhost";
	$username="root";
	$password="";
	$dbname="db_artzytest";
	
	$conn = new mysqli($servername, $username, $password, $dbname);
	
	if($conn->connect_error){
		die("connection error");
	}
	if( $_GET["userId"] == null || $_GET["mediaId"] == null){
		die($_GET["userId"] . $_GET["mediaId"]);
	}
	
	$sql = "SELECT * FROM table_likes WHERE mediaId = {$_GET["mediaId"]} AND userId = {$_GET["userId"]}";
	$results = $conn->query($sql);
	if(!$results){
		die("first sql failed");
	}
	
	if( ($temp_like = mysqli_fetch_assoc($results)) ){
		die("1");
	}
	
	$sql = "INSERT INTO table_likes(mediaId, userId) VALUES('{$_GET["mediaId"]}' , '{$_GET["userId"]}' )" ;
	if(!( $conn->query($sql) ) ){
		die($sql . "    failed");
	}
	
	//echo $_GET["comment"] . $_GET["userId"] . $_GET["imageId"];
	return 0;
?>