
<link rel="stylesheet" href="../../css/messagePopup.css">
<link rel="stylesheet" href="../../css/Toggle.css">
<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.2.1.min.js"></script>
<script>
	function openModal(sendto, mediaId){
		document.getElementById('myModal').style.display = "block";		
		//document.getElementById('sendto').setAttribute("placeholder", sendto);
		document.getElementById('sendto').innerHTML = sendto;
		
		document.getElementById('mediaIdValue').innerHTML = mediaId;
	}

	function closeModal(){
		document.getElementById('myModal').style.display = "none";
	}

	function otherCloseModal(){
		if(event.target == modal){
			document.getElementById('myModal').style.display = "none";
		}
	}
	var currentId = <?php echo " '{$_SESSION["currentId"]}' ";?> ;
	var currentUser = <?php echo " '{$_SESSION["currentUser"]}' ";?> ;
	
	
	$(document).ready(function(){
		
		$("#send").click(function(){
			var messageType = 'STANDARD_MESSAGE';
			//alert("first: " + messageType);
			if( $('#messageType').is(':checked') ){
				messageType = 'CRITIQUE_MESSAGE';
			}
			
			//alert("second: " + messageType);
			
			
			$.ajax({
				url: '../actions/SendMessage.php',
				type: 'POST',
				data: {message: document.getElementById('message').value, userId: currentId, user: currentUser, sendto: document.getElementById('sendto').value, messageType: messageType, mediaId: document.getElementById('mediaIdValue').value},
				success: function(result){
					document.getElementById('myModal').style.display = "none";
					alert(result);
				}
			});
			
		});
		
	});
</script>






<div id='myModal' class='modal' onClick = 'otherCloseModal()'>

  <!-- Modal content -->
  <div class='modal-content'>
	  <span class='close' onClick = "closeModal()">&times;</span>
	
	  
		TO: <textarea type = "text" id = "sendto" placeholder = "" rows = "1" cols = "60"></textarea><br/>
		
		</br>
		
		<!--
		CRITIQUE:
		
		<label class="switch">
		  <input type="checkbox" id = "messageType" >
		  <span class="slider round"></span>
		</label></br>
		-->
		<textarea id = 'mediaIdValue' style = 'visibility: hidden; width: 0vw; height: 0vh;' >test</textarea></br>
		
		MESSAGE: <br/><textarea type="text" name="audioName" rows="5" cols="60" id="message"></textarea><br/>
		<button id = "send">send</button><br/>
		
  </div>
  

</div>



