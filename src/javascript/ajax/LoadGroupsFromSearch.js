function showResult(str) {
    
    if (str.length==0){
      document.getElementById("livesearch").innerHTML="";
      document.getElementById("livesearch").style.border="0px";
      return;
    }


    var xmlhttp = new XMLHttpRequest();

    //when state is ready to change
    xmlhttp.onreadystatechange = function() {

      //readystate holds status of xml request
      if (this.readyState == 4 && this.status == 200) {

        //returns response data as string
        document.getElementById("livesearch").innerHTML = this.responseText;
        //document.getElementById("livesearch").style.border = "1px solid #A5ACB2";




      }
    };

    xmlhttp.open("GET", "/Artzy/src/controllers//LiveSearch/LiveSearch.php?searchValue="+str);
    xmlhttp.send();



}

function testFunc(){
  window.location.href = "/Artzy/indexTest.php?controller=groupViewer&action=home&group=general";
}
