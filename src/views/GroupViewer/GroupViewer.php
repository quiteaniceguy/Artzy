<script src = '/Artzy/src/JSActions/addComment.js'></script>
<script src = '/Artzy/src/JSActions/addLike.js'></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src = '/Artzy/src/views/DisplayHelpers/javascript/LoadNormalFormatMedia.js'></script>

<link rel="stylesheet" href="/Artzy/css/profilePage.css">
<link rel="stylesheet" href="/Artzy/css/imageOptions.css">
<link rel = "stylesheet" href = "/Artzy/css/Contact.css">

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

	///uses group name to get group id


	echo  "<p style='font-size: 10vh;' >{$groupName}:</p>" ."<br/>" ;





	//displayNormalFormatWithLoadButton($media, 5);


	///load more media button
	//echo "<span  id = \"loadMediaButton{$_GET["group"]}\" onClick = \"loadMedia('{$_GET["group"]}', 1, 1)\"><b>Load more Media</b></span>";
	?>
<div id = 'allPosts'>

	<?php
		$displayMedia = new DisplayMedia();
		$nStartingMedia = 5;
		$displayResult = $displayMedia->loadMedia($media, 0, $nStartingMedia);
		echo($displayResult . "<br/>");
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



	echo "<span  style = 'position:absoulte; left: 20vw; margin-left: 45vw;' id = \"loadMediaButton\" onClick = \"loadMedia({$nStartingMedia}, 7, jsonMediaArray)\"><b>Load more media</b></span>";


	function displayNormalFormatWithLoadButton($mediaArray, $nMediaToLoad){
		///allPosts contains all posts
		echo "<div id = 'allPosts'>";


		$nMedia = 0;
		//load n more media if n media is empty
		$loadNMoreMedia = 0;
		for ($i = 0; $i < sizeof($mediaArray) && $i < ($nMediaToLoad + $loadNMoreMedia); $i++) {

			$temp_media = $mediaArray[$i];
			/*
			$mediaToPrint = displayMediaInNormalFormat($temp_media, $conn);
			echo $mediaToPrint . "<br/><br/>" ;
			if ($mediaToPrint == "")
				$loadNMoreMedia++;
				*/
			var_dump($temp_media);
			echo $nMedia . "<br/>";
			$nMedia++;
		}

		echo "</div>";//allPosts
		///create load more media, which will add to all posts div
		echo "<span  style = 'position:absoulte; left: 20vw; margin-left: 45vw;' id = \"loadMediaButton\" onClick = \"loadMedia('{$_GET["group"]}', {$nMedia}, 7)\"><b>Load more media</b></span>";

	}


?>
