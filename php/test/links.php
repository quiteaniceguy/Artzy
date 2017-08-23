<br/>
<br/>
<br/>

<a href="../createAcc/createAcc.php">createAcc</a><br/>
<a href="../Login/Login.php">Login</a><br/>
<a href="../uploadImage/uploadImage.php">uploadImage</a><br/>
<a href="../ProfilePage/profilePage.php">profile</a><br/>

<?php
	if($_SESSION["currentUser"]!=NULL && $_SESSION["currentId"]!=NULL){
		echo "currently logged in as:   <br/>";
		echo "username: " .$_SESSION["currentUser"] . "<br/>";
		echo "id: " . $_SESSION["currentId"] . "<br/>";
	}
	
?>