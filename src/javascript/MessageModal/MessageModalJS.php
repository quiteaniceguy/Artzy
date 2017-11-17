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
      url: '/Artzy/src/controllers/AjaxActions/SendMessage.php',
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
