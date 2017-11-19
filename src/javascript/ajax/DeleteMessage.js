function deleteMessage(mailId){
	var xmlhttp = new XMLHttpRequest();
	//when state is ready to change

	xmlhttp.onreadystatechange = function() {

		//readystate holds status of xml request
		if (this.readyState == 4 && this.status == 200) {

			//returns response data as string
			//document.getElementById("comments"+mediaId).innerHTML = this.responseText + document.getElementById("comments"+mediaId).innerHTML;
			if(this.responseText == 0){
				document.getElementById("wholeMessage" + mailId).remove();
			}else{
				return "ERROR: " . this.responseText;
			}

		}
	};
	xmlhttp.open("GET", "/Artzy/src/controllers/AjaxActions/DeleteMessage.php?mailId="+mailId, true);
	xmlhttp.send();

	//alert("delete comment ran");
}
