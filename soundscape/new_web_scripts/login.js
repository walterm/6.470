/*
jQuery script to hide and show the homepage code accordingly.
*/

$(document).ready(function(){

	//Showing username on register
	$("#register").click(function(){
		$("#logbutton").hide();
		$("#username").show('drop', {direction:"up"}, 300, $("#login").text("Cancel"));
		$("#login").click(function() {
			$(this).text("Login")
			$("#username").hide('drop', {direction:"up"}, 300)
			$("#logbutton").show();
		});
	});
});