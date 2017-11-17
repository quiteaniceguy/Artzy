<link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300|Megrim" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Lora" rel="stylesheet">
<link rel="stylesheet" href="/Artzy/css/header.css"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<script src = "/Artzy/src/javascript/ajax/LoadGroupsFromSearch.js"></script>


<div id="links" class="pie">



  <?php
	error_reporting(0);

	if($_SESSION["currentId"] != NULL){
		echo "<div id='logo'><span style = 'z-index: 20;' onclick = 'testFunc()'>the mural.</span></div> ";
		echo "<div id='searchDiv'><input id='searchBar' class='searchBar' type='text' name ='search' placeholder='Search For Groups(general, writing, music, visualarts, etc...)' onkeyup = 'showResult(this.value)' /></div> ";
		echo "<a id='headerElement' href='/Artzy/indexTest.php?controller=logout&action=home'>LOGOUT</a>";
		echo "<a id='headerElement' href='/Artzy/indexTest.php?controller=uploadMedia&action=home' >UPLOAD </a>";
		echo "<a id='headerElement' href='/Artzy/indexTest.php?controller=profileEditor&action=home'>PROFILE</a>";
		echo "<a id='headerElement' href='/Artzy/indexTest.php?controller=messageViewer&action=home&mailboxType=IN'>MESSAGES</a>";
		echo "<a id='headerElement' href='/Artzy/indexTest.php?controller=muralReview&action=home'>THE MURAL REVIEW</a>";

		//echo "<a id='headerElement' href='../CritiqueViewer/CritiqueViewer.php'>CRITIQUES</a>";

		echo "<div id='livesearch'  ></div>";


	}else{
		//echo "<a id='headerElement' href='../../index.php'>HOME</a>";
		echo "<a id='headerElement' href='../Login/Login.php'>LOGIN</a>";
		echo "<a id='headerElement' href='../CreateAcc/createAcc.php'> JOIN</a>" ;

	}
  ?>

</div>
