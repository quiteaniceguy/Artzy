<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>

  <link rel="icon" href="../../favicon.PNG" type="image/png">
  
	<title>Artzy</title>
  <link rel="stylesheet" href="../../css/loginPage.css">
  <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300|Megrim" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script>
    $(document).ready(function(){
    
			
		
    });
  </script>
</head>
<body>
  <div id="title">
    ARTZY
  </div>
  <div id="loginContainer">
		<div id="loginFormHolder">
			<form action="LoginAction.php" method="get">
				Username<br/><input type="text" class="input" name="username"/>
				<br/><br/>Password<br/><input type="password" class="input" name="password"/>
				<br/><br/><br/><input id="loginSubmitButton" class="Button" type="submit"/>
			</form>
			<?php 
				//outputs login message (e.g incorrect login info)
				if ($_SESSION["m_Login"]!= NULL){
					echo "<br/><br/>{$_SESSION["m_Login"]}";
					$_SESSION["m_Login"]=NULL;
				}
			?>
		</div>
  </div>
	<div id="loginFooter">
		<div id="copyrightInfo">
			TM + © Artzy. All rights reserved.
		</div>
		<div id="loginLinks">
			<a href="https://www.google.com/"> Terms </a>|
			<a href="https://www.google.com/"> Policy </a>|
			<a href="https://www.google.com/"> Copyright </a>
		</div>
		<div id="createAccLink">
			Don't have an account? Make one <a href="../CreateAcc/createAcc.php"><b>here!</b></a>
		</div>
	</div>
</body>
</html>