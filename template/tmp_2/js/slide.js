$(document).ready(function() {
	
		<!--Expand Panel-->
	$("#open").click(function(){
		$("div#panel").slideDown(300);
	
	});	
	
	// Collapse Panel
	$("#close").click(function(){
		$("div#panel").slideUp(300);	
	});		
	
	// Switch buttons from "Log In | Register" to "Close Panel" on click
	$("#toggle a").click(function () {
		$("#toggle a").toggle();
	});	
<!--// Expand Panel-->
		
});