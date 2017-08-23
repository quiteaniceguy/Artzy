<?php
	
	
	$servername="localhost";
	$username="root";
	$password="";
	$dbname="db_artzytest";
	
	$conn = new mysqli($servername, $username, $password, $dbname);
	
	if($conn->connect_error){
		die("connection error");
	}
	
	$sql = "SELECT * FROM table_groups WHERE name LIKE '{$_GET["searchValue"]}%' " ;
	$returnResult = "";
	
	$result=$conn->query($sql);
	if (!$result) {
		die("failed");
	}
	
	while ( $temp_group = mysqli_fetch_assoc($result) ){
		$returnResult = $returnResult . "<a href='../Content/displayGroup.php?group={$temp_group["name"]}'> {$temp_group["name"]} </a>    </br>";
	}
	
	if ( $returnResult == "" ){
    $returnResult = "no results found";
  }
	echo $returnResult;
?>