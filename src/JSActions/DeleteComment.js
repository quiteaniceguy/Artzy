function deleteComment(mailId){
	var xmlhttp = new XMLHttpRequest();
	//when state is ready to change
	
	xmlhttp.onreadystatechange = function() {
			
		//readystate holds status of xml request
		if (this.readyState == 4 && this.status == 200) {
				
			//returns response data as string
			//document.getElementById("comments"+mediaId).innerHTML = this.responseText + document.getElementById("comments"+mediaId).innerHTML;
			if(this.responseText == 0){
				document.getElementById("wholeMessage" + mailId).remove();
			}
				
				
				
		}
	};
	xmlhttp.open("GET", "/Artzy/src/actions/DeleteMessageAction.php?mailid="+mailId, true);
	xmlhttp.send();
	
	//alert("delete comment ran");
}