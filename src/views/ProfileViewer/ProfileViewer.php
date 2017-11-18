<script src = '/Artzy/src/javascript/ajax/AddLike.js'></script>
<script src = '/Artzy/src/javascript/ajax/Comments.js'></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src = '/Artzy/src/javascript/ajax/LoadNormalFormatMedia.js'></script>

<link rel = "stylesheet" href = "/Artzy/css/DisplayMedia/DisplayMedia.css">

<?php
	/*
	/////////////include
	include  $_SERVER["DOCUMENT_ROOT"] . '/Artzy/src/actions/DisplayComment.php';
	include  $_SERVER["DOCUMENT_ROOT"] . '/Artzy/src/actions/DisplayMediaOptions.php';
	include  $_SERVER["DOCUMENT_ROOT"] . '/Artzy/src/actions/DataRetriever.php';
	include  $_SERVER["DOCUMENT_ROOT"] . '/Artzy/src/actions/DisplayMedia.php';

	include  $_SERVER["DOCUMENT_ROOT"] . '/Artzy/src/siteComponents/SessionChecker.php';
	include  $_SERVER["DOCUMENT_ROOT"] . '/Artzy/src/siteComponents/header.php';
	include  $_SERVER["DOCUMENT_ROOT"] . '/Artzy/src/siteComponents/MessageModal.php';
	include  $_SERVER["DOCUMENT_ROOT"] . '/Artzy/src/siteComponents/Contact.php';
	*/
	require_once $_SERVER['DOCUMENT_ROOT'] . '/Artzy/src/views/DisplayHelpers/DisplayMedia.php';
	require_once $_SERVER['DOCUMENT_ROOT'] . '/Artzy/src/views/Header/Header.php';
	require_once $_SERVER['DOCUMENT_ROOT'] . '/Artzy/src/views/MessageModal/MessageModal.php';
	$config = require $_SERVER["DOCUMENT_ROOT"] . "/Artzy/config/config.php";
	///uses group name to get group id


	echo  "<p style='font-size: 10vh;' >profile viewer: {$username}</p>" ."<br/>" ;





	//displayNormalFormatWithLoadButton($media, 5);


	///load more media button
	//echo "<span  id = \"loadMediaButton{$_GET["group"]}\" onClick = \"loadMedia('{$_GET["group"]}', 1, 1)\"><b>Load more Media</b></span>";
	?>
<div id = 'allPosts'>

	<?php
		$displayMedia = new DisplayMedia();
		$nStartingMedia = 5;

		$displayResult = $displayMedia->loadMedia($_SESSION["currentId"], $media, 0, $nStartingMedia, 3, $config);
    $displayResult = explode("||||", $displayResult);

    echo($displayResult[0] . "<br/>");
	 ?>

</div>

<!-- converts media array to json and sets javascript var to json to be used to send to javascript action -->
<?php
	$_SESSION['jsonMedia'] = json_encode($media);
	//echo $_SESSION['jsonMedia'];
 ?>
<script>
	var jsonMediaArray = <?php echo $_SESSION['jsonMedia'] ?>;
</script>


<?php



	echo "<span  style = 'position:absoulte; left: 20vw; margin-left: 45vw;' id = \"loadMediaButton\" onClick = \"loadMedia({$_SESSION["currentId"]}, {$displayResult[1]}, 7, 3, jsonMediaArray)\"><b>Load more media</b></span>";



?>
