/*
jQuery script to hide and show the homepage code accordingly.
*/

$(document).ready(function(){
	
	
	//Hiding username on login
	$("#login").click(function(){
		$("#username").hide("drop", {direction:"up"}, "slow");
	});

	//Showing username on register
	$("#register").click(function(){
		$("#username").show("fold", 1000);
	});
});