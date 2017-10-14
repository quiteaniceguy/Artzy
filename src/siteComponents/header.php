<link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300|Megrim" rel="stylesheet">
 <link href="https://fonts.googleapis.com/css?family=Lora" rel="stylesheet"> 
<link rel="stylesheet" href="../../css/header.css"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<script>
  
	function showResult(str) {
      
			if (str.length==0){
				document.getElementById("livesearch").innerHTML="";
				document.getElementById("livesearch").style.border="0px";
				return;
			}
      
      
			var xmlhttp = new XMLHttpRequest();
      
			//when state is ready to change
			xmlhttp.onreadystatechange = function() {
				
				//readystate holds status of xml request
				if (this.readyState == 4 && this.status == 200) {
					
					//returns response data as string
					document.getElementById("livesearch").innerHTML = this.responseText;
					//document.getElementById("livesearch").style.border = "1px solid #A5ACB2";
          
					
					
					
				}
			};
      
			xmlhttp.open("GET", "../actions/livesearch.php?searchValue="+str);
			xmlhttp.send();
			

	  
	}
	
	function testFunc(){
		window.location.href = "../Content/displayGroup.php?group=general";
	}
  
  
  
</script>
<div id="links" class="pie">
  
  
  
  <?php
	error_reporting(0);
	
	if($_SESSION["currentId"]!=NULL){
		echo "<div id='logo'><span style = 'z-index: 20;' onclick = 'testFunc()'>the mural.</span></div> ";
		echo "<div id='searchDiv'><input id='searchBar' class='searchBar' type='text' name ='search' placeholder='Search For Groups(writing, music, visualarts, etc...)' onkeyup = 'showResult(this.value)' /></div> ";
		echo "<a id='headerElement' href='../Login/Logout.php'>LOGOUT</a>";
		echo "<a id='headerElement' href='../UploadData/uploadMedia.php' >UPLOAD </a>";
		echo "<a id='headerElement' href='../ProfilePage/profilePage.php'>PROFILE</a>";
		echo "<a id='headerElement' href='../MessagesPage/UserMessages.php?mailboxType=IN'>MESSAGES</a>";
		echo "<a id='headerElement' href='../TheMuralReview/TheReview.php'>THE MURAL REVIEW</a>";
		
		//echo "<a id='headerElement' href='../CritiqueViewer/CritiqueViewer.php'>CRITIQUES</a>";
		
		echo "<div id='livesearch'  ></div>";
    

	}else{
		//echo "<a id='headerElement' href='../../index.php'>HOME</a>";
		echo "<a id='headerElement' href='../Login/Login.php'>LOGIN</a>";
		echo "<a id='headerElement' href='../CreateAcc/createAcc.php'> JOIN</a>" ;
		
	}
  ?>
  
</div>

<script>
  
</script>