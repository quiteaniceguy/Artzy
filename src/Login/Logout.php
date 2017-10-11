<?php session_start(); ?>
<!DOCTYPE html>
<html>


<body>
	<?php
		setcookie("ARTZY_USERNAME", "", time() + (86400 * 30), "/");
		setcookie("ARTZY_PASSWORD", "", time() + (86400 * 30), "/");
		session_destroy();
		header('Location: Login.php');
	?>
</body>

</html>