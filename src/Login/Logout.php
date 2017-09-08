<?php session_start(); ?>
<!DOCTYPE html>
<html>


<body>
	<?php
		session_destroy();
		header('Location: Login.php');
	?>
</body>

</html>