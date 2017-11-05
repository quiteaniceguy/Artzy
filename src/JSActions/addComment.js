



function addComment(mediaId, username, userId) {
	
		$.ajax({
			url: '/Artzy/src/actions/addComment.php',
			type: 'POST',
			data: { mediaId: mediaId, userId: userId, comment: document.getElementById("textarea"+mediaId).value },
			success: function(result){
				commentButtonText = "<div id='comment'>  <div style='color: red;'>&emsp;&emsp;" + username + ":</div><div style='padding-left: 3vw;'>" + result + "</div><br/></div>";
				document.getElementById("comments"+mediaId).innerHTML = commentButtonText + document.getElementById("comments"+mediaId).innerHTML;
				
			}
		});
			
	  
}

function loadComments(mediaId, nComments){
	var xmlhttp = new XMLHttpRequest();
	
	//when state is ready to change
	xmlhttp.onreadystatechange = function() {
			
		//readystate holds status of xml request
		if (this.readyState == 4 && this.status == 200) {
			///return data in two parts: 0 is what to add to html and 1 is the new number of total comments
			response = this.responseText.split("||||");
			
			document.getElementById("comments"+mediaId).innerHTML+=response[0];
			document.getElementById('loadCommentsButton' + mediaId).setAttribute("onClick", "loadComments(" + mediaId + "," + response[1] + " )")
				
				
		}
	};
	xmlhttp.open("GET", "/Artzy/src/actions/LoadComments.php?mediaId=" + mediaId + "&nComments=" + nComments, false);
	xmlhttp.send();
			
	  	
}