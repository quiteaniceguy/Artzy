<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Logged in</title>
</head>
<body>
	<?php
		//die("what " . $_GET["username"] . $_GET["password"]);
		
		$user=$_GET["username"];
		$pass=$_GET["password"];
		
		
		
		$config = require('../../config/config.php');
		$conn = new mysqli($config["mysql"]["servername"], $config["mysql"]["username"], $config["mysql"]["password"], $config["mysql"]["dbName"]);
		
		echo "here";
		/*
		try{
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			echo "connection success";
			
		}catch(PDOException $e){
			echo "connection established" . $e->getMessage();
		}
		
		
		///finds account with matching login info
		$sql = "SELECT * FROM db_users WHERE username='{$user}' AND password='{$pass}' ";
		
		
		$sql="SELECT * FROM db_users WHERE username = :username AND password = :password ";
		
		try{
			$stmt = $conn->prepare($sql);
			$stmt->bindParam(':username' , $inputUser);
			$stmt->bindParam(':password' , $inputPass);
			
			//insert row
			$inputUser = $user;
			$inputPass = $pass;
			if($stmt->execute())
				echo "executed";
			
			//$result = $stmt->get_result();
	  }catch(Exception $e){
		  die("prepare failed: " . $e);
	  }
		$result = $stmt->fetch(PDO::FETCH_ASSOC);
		var_dump($result);
		
	
		
		
		
		//$result=$conn->query($sql);	
		echo 'finished';
		echo $result["id"];
		
		if ($result != NULL){
			echo 'not null';
			
			if($result["isActivated"]==1){
	
				$_SESSION["currentUser"]=$user;
				$_SESSION["currentId"]=$result["id"];
				$_SESSION["currentPass"]=$pass;
				
				setcookie("ARTZY_USERNAME", $user, time() + (86400 * 30), "/");
				setcookie("ARTZY_PASSWORD", $pass, time() + (86400 * 30), "/");
				
				//header( 'Location: ../ProfilePage/profilePage.php' );
				header( 'Location: ../Content/displayGroup.php?group=general' );
			}else{
				$_SESSION["m_Login"]="Unverified Account. Check your email to verify.";
				header('Location: Login.php');
			}
			
		}else{
			if($_GET["cookie"] == 1){
				$_SESSION["cookie"] = "1" ;
				header('Location: Login.php');
				
			}else{
				$_SESSION["m_Login"] = "password or username incorrect" ;
				header('Location: Login.php');
				echo "no user found";
			}
			
			
		}
		*/
	?>
</body>
</html>