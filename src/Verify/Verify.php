<!DOCTYPE html>
<html>

<head>
	<title>hello</title>
</head>
<body>
	<?php
	
	$verificationCode=$_GET["code"];
	$id=$_GET["userid"];
	
	echo $verificationCode . "    " . $id . "<br/>";
	
	$server="localhost";
	$username="root";
	$password="";
	$dbName="db_artzytest";
	
	$conn = new mysqli($server, $username, $password, $dbName);
	

	
	if($conn->connect_error){
		die("connection to database failed");
	}
	
	$sql ="SELECT * FROM db_users WHERE id='{$id}' ";

	$result=$conn->query($sql);
	
	if(!$result){
		die("sql failed");
	}
	
	
	if( mysqli_num_rows($result) > 0 ){
		
		while($row=mysqli_fetch_assoc($result)){
			
			if( $row["verificationCode"]==$verificationCode ){
				
				$vsql="UPDATE db_users SET isActivated = '1' WHERE id= {$row["id"]}";
				if($conn->query($vsql)){
					echo "verified";
				}else{
					die("second thing died");
				}
				echo "sql sent";
			}else{
				echo "codes don't match";
			}
			
		} 
	}else{
		echo "no results";
		
	}
	
	
	?>
</body>

</html>