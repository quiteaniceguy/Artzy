function loadMedia(group, nMedia, nMediaToLoad){
	
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
		}
	};
	xmlhttp.open("GET", "../actions/LoadGroupMedia.php?group=" + group + "&nMedia=" + nMedia + "&nMediaToLoad=" + nMediaToLoad , true);
	xmlhttp.send();
	
	
}
