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
			url: '/Artzy/src/actions/SendMessage.php',
			type: 'POST',
			data: {message: document.getElementById('message').value, userId: currentId, sendto: document.getElementById('sendto').value},
			success: function(result){
				alert(result);
			}
		});
		
	});
	
});
