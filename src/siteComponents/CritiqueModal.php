<?php session_start(); ?>
<link rel="stylesheet" href="../../css/messagePopup.css">
<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.2.1.min.js"></script>
<script>
	function openCritiqueModal(sendCritiqueTo, mediaId){
		document.getElementById('CritiqueModal').style.display = "block";		
		//document.getElementById('sendCritiqueTo').setAttribute("placeholder", sendCritiqueTo);
		document.getElementById('sendCritiqueTo').innerHTML = sendCritiqueTo;
		document.getElementById('critiqueMediaIdValue').innerHTML = mediaId;
		
		alert(sendCritiqueTo);
		alert(mediaId);
	}

	function closeCritiqueModal(){
		document.getElementById('CritiqueModal').style.display = "none";
	}

	function otherCloseCritiqueModal(){
		if(event.target == modal){
			document.getElementById('CritiqueModal').style.display = "none";
		}
	}
	var currentId = <?php echo " '{$_SESSION["currentId"]}' ";?> ;
	
	
	$(document).ready(function(){
		
		$("#sendCritique").click(function(){
			$.ajax({
				url: '../actions/SendReview.php',
				type: 'POST',
				data: {message: document.getElementById('critiqueMessage').value, userId: currentId, sendto: document.getElementById('sendCritiqueTo').value, mediaId: document.getElementById('critiqueMediaIdValue').value},
				success: function(result){
					document.getElementById('CritiqueModal').style.display = "none";
					alert(result);
					alert(document.getElementById('critiqueMediaIdValue').value);
				}
			});
			
		});
		
	});
</script>






<div id='CritiqueModal' class='modal' onClick = 'otherCloseCritiqueModal()'>

  <!-- Modal content -->
  <div class='modal-content'>
	  <span class='close' onClick = "closeCritiqueModal()">&times;</span>
		Critique<br/>
		<textarea id = 'critiqueMediaIdValue' style = 'visibility: hidden; width: 0vw; height: 0vh;' >test</textarea></br>
		
		TO: <textarea type = "text" id = "sendCritiqueTo" placeholder = "" rows = "1" cols = "60"></textarea><br/>
		MESSAGE: <br/><textarea type="text" name="audioName" rows="5" cols="60" id="critiqueMessage"></textarea><br/>
	
		<button id = "sendCritique">send</button><br/>
		
	  
  </div>
  

</div>

