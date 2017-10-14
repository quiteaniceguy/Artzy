
<?php
	session_start();
	
	if($_SESSION["currentId"] == NULL){
		header('Location: ../../index.php');
		echo "<br/><br/><br/><br/><br/><br/>SHOULD BE BROKENSHOULD BE BROKENSHOULD BE BROKENSHOULD BE BROKENSHOULD BE BROKENSHOULD BE BROKEN";
		die("you stupid bitch");
		
		
	}


?>