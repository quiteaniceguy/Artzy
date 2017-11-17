///requires load media button and allPosts to be defined

function loadMedia(currentId, nMedia, nMediaToLoad, mediaOptionsType, jsonMedia){
  var jsMedia = jsonMedia;
  var jsData = [jsMedia, "test", "lkjsdf"];

	document.getElementById('loadMediaButton').innerHTML = "<b>loading...</b>";

  $.ajax({
    url: "/Artzy/src/views/DisplayHelpers/Actions/addNormalFormatMedia.php",
    type: 'POST',
    data: {jsonMedia: JSON.stringify(jsonMedia), nMediaToLoad: nMediaToLoad, nMedia: nMedia, currentId: currentId, mediaOptionsType: mediaOptionsType},
    success: function(result){
      response = result.split("||||");


			//this will change the load more media button
			document.getElementById('loadMediaButton').setAttribute("onClick", "loadMedia( " + currentId + ", "+ response[1] + ", 7, " + mediaOptionsType + ", jsonMediaArray )");
			//loadMedia('{$_GET["group"]}', {$nMedia}, 7)
			document.getElementById('allPosts').innerHTML += response[0];
			//alert(response[0]);
			//alert(response[1]);
			document.getElementById('loadMediaButton').innerHTML = "<b>Load more</b>";
    }
  });


}
