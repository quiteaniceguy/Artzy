<?php session_start() ?>
<!DOCTYPE html>
<html>
  <head>
    <link rel="icon" href="../../favicon.PNG" type="image/png">
    <title>Artzy</title>
    <meta charset="utf-8">
		<link rel="stylesheet" href="../../css/createAcc.css">
		<link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300|Megrim" rel="stylesheet">
  </head>

  <body>
		<div id="leftContainer">
			<div id="createYour">Create your</div>
			<div id="title">Artzy</div>
			<div id="acc">Account</div>
			<form action="createAccAction.php" method="post" enctype="multipart/form-data">
				<br/>First Name&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&ensp; Last Name<br><textarea type="text" name="fname" rows="1" cols="28"></textarea> <textarea type="text" name="lname" rows="1" cols="28"></textarea>
				<br/>Username <br/><textarea type="text" name="username" rows="1" cols="60"></textarea>
				<br/>Password&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp; Confirm Password<br><textarea type="text" name="password" rows="1" cols="28"></textarea> <textarea type="text" name="passwordCheck" rows="1" cols="28"></textarea>
				<br/>Email <br><textarea type="text" name="email" rows="1" cols="60"></textarea>
				<br/>School <br><textarea type="text" name="school" rows="1" cols="60"></textarea>
				<br/>Phone Number&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; Age<br><textarea type="text" name="phoneNumber" rows="1" cols="28"></textarea> <textarea type="text" name="age" rows="1" cols="28"></textarea>
				<br/>About <br><textarea rows="5" cols="60" name="about"></textarea>
				
				<br/>Profile Picture: <input type="file" name="uploadFile" id="uploadFile" style="opacity:1; z-index:1;">
				
				<input type="submit" value="Create Account" class="button" name="submit">
				
			</form>
		</div>
		<div id="goalBack"></div>
		<div id="goal"><b>The true work of art is but a shadow of the divine perfection.<br><i>-michelangelo-</i></b></div>
		<div id="loginLink">
			Already have an account? Make one <a href="../Login/Login.php"><b>here!</b></a>
		</div>
		<!--<button id="cover">Choose File</button> -->
  </body>



</html>