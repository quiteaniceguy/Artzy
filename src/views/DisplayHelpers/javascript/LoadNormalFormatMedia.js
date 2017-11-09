///requires load media button and allPosts to be defined

function loadMedia(nMedia, nMediaToLoad, jsonMedia){
  var jsMedia = jsonMedia;
  var jsData = [jsMedia, "test", "lkjsdf"];

	document.getElementById('loadMediaButton').innerHTML = "<b>loading...</b>";
	//alert("loading");
  /*
	var xmlhttp = new XMLHttpRequest();

	xmlhttp.onreadystatechange = function() {

		//readystate holds status of xml request
		if (this.readyState == 4 && this.status == 200) {
			///return data in two parts: 0 is what to add to html and 1 is the new number of total comments
			response = this.responseText.split("||||");


			//this will change the load more media button
			document.getElementById('loadMediaButton').setAttribute("onClick", "loadMedia('" + group + "'," + response[1] + ", 7 )")
			//loadMedia('{$_GET["group"]}', {$nMedia}, 7)
			document.getElementById('allPosts').innerHTML += response[0];
			//alert(response[0]);
			//alert(response[1]);
			document.getElementById('loadMediaButton').innerHTML = "<b>Load more</b>";
		}
	};
	xmlhttp.open("GET", "/Artzy/src/actions/LoadGroupMedia.php?group=" + group + "&nMedia=" + nMedia + "&nMediaToLoad=" + nMediaToLoad , true);
	xmlhttp.send();
  */
  $.ajax({
    url: "/Artzy/src/views/DisplayHelpers/ajaxActions/addNormalFormatMedia.php",
    type: 'POST',
    data: {jsonMedia: JSON.stringify(jsonMedia), nMediaToLoad: nMediaToLoad, nMedia: nMedia},
    success: function(result){
      response = result.split("||||");


			//this will change the load more media button
			document.getElementById('loadMediaButton').setAttribute("onClick", "loadMedia( " + response[1] + ", 7, jsonMediaArray )")
			//loadMedia('{$_GET["group"]}', {$nMedia}, 7)
			document.getElementById('allPosts').innerHTML += response[0];
			//alert(response[0]);
			//alert(response[1]);
			document.getElementById('loadMediaButton').innerHTML = "<b>Load more</b>";
    }
  });


}
