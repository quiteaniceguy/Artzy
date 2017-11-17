<link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300|Megrim" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Lora" rel="stylesheet">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<script src = "/Artzy/src/javascript/ajax/LoadGroupsFromSearch.js"></script>


<div id="links" class="pie">



  <?php
	error_reporting(0);

	if($_SESSION["currentId"]=NULL){
		echo "<div id='logo'><span style = 'z-index: 20;' onclick = 'testFunc()'>the mural.</span></div> ";
		echo "<div id='searchDiv'><input id='searchBar' class='searchBar' type='text' name ='search' placeholder='Search For Groups(general, writing, music, visualarts, etc...)' onkeyup = 'showResult(this.value)' /></div> ";
		echo "<a id='headerElement' href='/Artzy/src/Login/Logout.php'>LOGOUT</a>";
		echo "<a id='headerElement' href='/Artzy/view/UploadData/UploadMedia.php' >UPLOAD </a>";
		echo "<a id='headerElement' href='/Artzy/view/ProfilePage/ProfilePage.php'>PROFILE</a>";
		echo "<a id='headerElement' href='/Artzy/view/MessagesPage/MessageViewer.php?mailboxType=IN'>MESSAGES</a>";
		echo "<a id='headerElement' href='/Artzy/view/TheMuralReview/TheReview.php'>THE MURAL REVIEW</a>";

		//echo "<a id='headerElement' href='../CritiqueViewer/CritiqueViewer.php'>CRITIQUES</a>";

		echo "<div id='livesearch'  ></div>";


	}else{
		//echo "<a id='headerElement' href='../../index.php'>HOME</a>";
		echo "<a id='headerElement' href='../Login/Login.php'>LOGIN</a>";
		echo "<a id='headerElement' href='../CreateAcc/createAcc.php'> JOIN</a>" ;

	}
  ?>

</div>
