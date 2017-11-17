function deleteMedia(mediaId){


	$.ajax({
		url: '/Artzy/src/controllers/AjaxActions/DeleteMedia.php',
		type: 'POST',
		data: {mediaId: mediaId},
		success: function(result){
			alert(result);


		}
	});


}
