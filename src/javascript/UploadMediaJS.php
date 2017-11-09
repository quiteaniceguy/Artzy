<link rel="stylesheet" href="/Artzy/css/uploadPage.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
<script>
	bkLib.onDomLoaded(
		function(){
			new nicEditor({maxHeight: 500}).panelInstance('mediaText');
	});

	var uploaded = '<?php echo $uploaded; ?>';

	if( uploaded == 1){
	   alert("uploaded");
	}
	if( uploaded == 2){
	   alert("upload failed");
	}


	$(document).ready(function(){
	  
	  $("#postImage").click(function(){
		  $("#loadingMessage").html("uploading....");
		  $(".submitButton").hide();
		  $("#imageForm").submit();
	  });
	   $("#postText").click(function(){
		  $("#loadingMessage").html("uploading....");
		  $(".submitButton").hide();
		  $("#textForm").submit();
	  });
	   $("#postAudio").click(function(){
		
		  $("#loadingMessage").html("uploading....");
		  $(".submitButton").hide();
		  $("#audioForm").submit();
	  });
	});
</script>