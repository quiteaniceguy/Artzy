function addComment(mediaId, username, userId) {

		$.ajax({
			url: '/Artzy/src/controllers/AjaxActions/AddComment.php',
			type: 'POST',
			data: { mediaId: mediaId, userId: userId, comment: document.getElementById("textarea"+mediaId).value },
			success: function(result){
				//commentButtonText = "<div id='comment'>  <div style='color: red;'>&emsp;&emsp;" + username + ":</div><div style='padding-left: 3vw;'>" + result + "</div><br/></div>";
				//document.getElementById("comments"+mediaId).innerHTML = commentButtonText + document.getElementById("comments"+mediaId).innerHTML;
        alert(result);
			}
		});


}

function loadComments(mediaId, allComments, nComments, nCommentsToLoad){
	alert("load comments");
	var setCommentsToLoad = 3;

	$.ajax({
		url: '/Artzy/src/controllers/AjaxActions/LoadComments.php',
		type: 'POST',
		data: {jsonComments: JSON.stringify(allComments), nComments: nComments, nCommentsToLoad: nCommentsToLoad  },
		success: function(result){
			alert(result);
			response = result.split("||||");

			document.getElementById("comments"+mediaId).innerHTML+=response[0];
			document.getElementById('loadCommentsButton' + mediaId).setAttribute("onClick", "loadComments(" + mediaId + "," + JSON.stringify(allComments) + "," + response[1] + "," + setCommentsToLoad + " )")

		}
	});


}
