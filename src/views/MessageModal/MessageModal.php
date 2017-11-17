<link rel="stylesheet" href="/Artzy/css/MessageModal/messagePopup.css">
<link rel="stylesheet" href="/Artzy/css/MessageModal/Toggle.css">
<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.2.1.min.js"></script>
<?php require_once($_SERVER["DOCUMENT_ROOT"] . "/Artzy/src/javascript/MessageModal/MessageModalJS.php"); ?>







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
