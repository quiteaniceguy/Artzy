<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
  <?php
		//echo $_COOKIE["ARTZY_USERNAME"];
		//echo $_COOKIE["ARTZY_PASSWORD"];
		if( $_COOKIE["ARTZY_USERNAME"] != "" && $_COOKIE["ARTZY_PASSWORD"] != "" && $_SESSION["cookie"] != "1"){
			header("Location: /Artzy/src/Login/LoginAction.php?username={$_COOKIE["ARTZY_USERNAME"]}&password={$_COOKIE["ARTZY_PASSWORD"]}&cookie=1 ");
		}
			
  
  ?>
  <link rel="icon" href="../../favicon.PNG" type="image/png">
  
	<title>The Mural</title>
  <link rel="stylesheet" href="/Artzy/css/loginPage.css">
  <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300|Megrim" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Lora" rel="stylesheet"> 
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>

</head>
<body>
  
  <div id="title">
    the mural.
  </div>
  <div id="loginContainer">
		<div id="loginFormHolder">
			<form action="/Artzy/src/Login/LoginAction.php" method="get">
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
 
  <div  id = 'titleQuote'><b>A place for students to share and get feedback on art, writing, and music</b><br/><br/>still in beta</div>
	<div id="loginFooter">
		<div id="copyrightInfo">
			<!-- TM + © Artzy. All rights reserved. -->
		</div>
		<div id="loginLinks">
			<!--
			<a href="https://www.google.com/"> Terms </a>|
			<a href="https://www.google.com/"> Policy </a>|
			<a href="https://www.google.com/"> Copyright </a>
			-->
		</div>
		<div id="createAccLink">
			Don't have an account? Make one <a href="/Artzy/src/CreateAccount/CreateAcc/createAcc.php"><b>here!</b></a>
		</div>
	</div>
</body>
</html>