$(function(){
	
	var xmlhttp;
	
	var likeResume = document.getElementById("like_resume");
	
	if (likeResume) {
		likeResume.onclick = function(){
		
			var that = this;
		
			if (window.XMLHttpRequest) {
				xmlhttp = new XMLHttpRequest();
			} else {
				xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
			}
		
			xmlhttp.open("POST", "/resume/ajax/like_resume", true);
			xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
			xmlhttp.onreadystatechange = function(response) {
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
					document.body.removeChild(that);
				}
			}
			xmlhttp.send();
		}
	}
	
})