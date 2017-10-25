<?php session_start(); ?>
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
	
	$config = require('../../config/config.php');
		
	$conn = new mysqli($config["mysql"]["servername"], $config["mysql"]["username"], $config["mysql"]["password"], $config["mysql"]["dbName"]);
	if(!$conn){
		die("connection to server failed");
	}
	

	
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
					$_SESSION["m_Login"] = "Account Verified";
					header('Location: ../../index.php');
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
