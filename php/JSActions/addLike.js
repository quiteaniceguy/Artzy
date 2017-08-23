function addLike(mediaId, userId) {
		
		var xmlhttp = new XMLHttpRequest();
		
		//when state is ready to change
		xmlhttp.onreadystatechange = function() {
				
			//readystate holds status of xml request
			if (this.readyState == 4 && this.status == 200) {
					
				//returns response data as string
				//document.getElementById("comments"+mediaId).innerHTML = this.responseText + document.getElementById("comments"+mediaId).innerHTML;
				//document.getElementById("comments"+mediaId).innerHTML+=this.responseText+"</br>";
				if(this.responseText == 0){
					document.getElementById("likeCounter" + mediaId).innerHTML = Number(document.getElementById("likeCounter" + mediaId).innerHTML ) + 1;
				}else{
					//alert('return value' + String(this.responseText));
					alert('You have already liked this post');
				}
			}
		};
		xmlhttp.open("GET", "../actions/addLike.php?mediaId=" + mediaId + "&userId=" + userId, false);
		xmlhttp.send();
		
	  
}