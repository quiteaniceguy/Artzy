<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="../../css/messagePopup.css">
  

</head>
<body>
	<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.2.1.min.js"></script>
	<script>
		function openModal(sendto){
			document.getElementById('myModal').style.display = "block";
			alert(sendto);
			
			//document.getElementById('sendto').setAttribute("placeholder", sendto);
			document.getElementById('sendto').innerHTML = sendto;
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
		
		
		$(document).ready(function(){
			$("#myBtn").click(function(){
				$(this).hide();
			});
			$("#send").click(function(){
				$.ajax({
					url: '../actions/SendMessage.php',
					type: 'POST',
					data: {message: document.getElementById('message').value, userId: currentId, sendto: document.getElementById('sendto').value},
					success: function(result){
						alert(result);
					}
				});
				
			});
			
		});
	</script>
	
	
	<button id='myBtn' onClick = "openModal('andrew')">Open Modal</button>
	

	
	<div id='myModal' class='modal' onClick = 'otherCloseModal()'>

	  <!-- Modal content -->
	  <div class='modal-content'>
		  <span class='close' onClick = "closeModal()">&times;</span>
		
		  
			TO: <textarea type = "text" id = "sendto" placeholder = "" rows = "1" cols = "60"></textarea><br/>
			MESSAGE: <br/><textarea type="text" name="audioName" rows="5" cols="60" id="message"></textarea><br/>
			<button id = "send">test</button><br/>
			
		  
   </div>
	  </div>

	</div>
</body>
</html>
