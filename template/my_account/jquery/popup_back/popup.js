/*
	Credits
	Author: Shane Strong
	Website: http://www.shanestrong.com
	Email: shane@shanestrong.com
	License: Free to use and edit as you see fit. Only thing I ask is if you find something to 
	make this better please let me know.
*/

//Setting up the popup
//0 is disabled; 1 is enabled;
var popupStatus = 0;

function loadPopup(){
	//Will only be loaded if the status is 0
	if(popupStatus==0){
		$(".backgroundPopup").css({"opacity": "0.8"});
		$(".backgroundPopup").fadeIn("slow");
		$(".popupContent").fadeIn("slow");
		popupStatus = 1;
	}
}

//This will disable the popup when needed
function disablePopup(){
	//Will only disable if status is 1
	if(popupStatus==1){
		$(".backgroundPopup").fadeOut("slow");
		$(".popupContent").fadeOut("slow");
		popupStatus = 0;
	}
}

//Centers the popup to your window size 
function centerPopup(){
	var windowWidth = document.documentElement.clientWidth;
	var windowHeight = document.documentElement.clientHeight;
	var popupHeight = $(".popupContent").height();
	var popupWidth = $(".popupContent").width();
	$(".popupContent").css({
		"position": "absolute",
		"top": windowHeight/2-popupHeight/2,
		"left": windowWidth/2-popupWidth/2
	});
	//this is needed for ie6
	$(".backgroundPopup").css({ "height": windowHeight });
}


//Click event controller
$(document).ready(function(){
	//Open the popup and center
	$(".button").click(function(){
		centerPopup();
		loadPopup();
	});
	
	
	//Close popup by clicking the x
	$(".popupClose").click(function(){ disablePopup(); });
	//Close popup by clicking outside the box
	$(".backgroundPopup").click(function(){ disablePopup(); });
	//Close popup by clicking escape
	$(document).keypress(function(e){
		if(e.keyCode==27 && popupStatus==1){
			disablePopup();
		}
	});
});




//for Login----------------------------------------------------------------------

function loadPopup1(){
	//Will only be loaded if the status is 0
	
	if(popupStatus==0){
		$(".backgroundPopup1").css({"opacity": "0.8"});
		$(".backgroundPopup1").fadeIn("slow");
		$(".popupContent_loin").fadeIn("slow");
		popupStatus = 1;
	}
}


//This will disable the popup when needed
function disablePopup1(){
	//Will only disable if status is 1
	if(popupStatus==1){
		$(".backgroundPopup1").fadeOut("slow");
		$(".popupContent_loin").fadeOut("slow");
		popupStatus = 0;
	}
}

//Centers the popup to your window size for login 
function centerPopup1(){
	var windowWidth = document.documentElement.clientWidth;
	var windowHeight = document.documentElement.clientHeight;
	var popupHeight = $(".popupContent_loin").height();
	var popupWidth = $(".popupContent_loin").width();
	$(".popupContent_loin").css({
		"position": "absolute",
		"top": windowHeight/2-popupHeight/2,
		"left": windowWidth/2-popupWidth/2
	});	
	//this is needed for ie6
	$(".backgroundPopup1").css({ "height": windowHeight });
}
//Click event controller
$(document).ready(function(){
	
	//login popup
	$(".loginpop").click(function(){
		centerPopup1();
		loadPopup1();
	});

	
	//Close popup by clicking the x
	$(".popupClose1").click(function(){ disablePopup1(); });
	//Close popup by clicking outside the box
	$(".backgroundPopup1").click(function(){ disablePopup1(); });
	//Close popup by clicking escape
	$(document).keypress(function(e){
		if(e.keyCode==27 && popupStatus==1){
			disablePopup1();
		}
	});
});


////////////////////////////////pop for user feed///////////////
var popupStatus5 = 0;
function loadPopup5(){
	//Will only be loaded if the status is 0
	if(popupStatus5==0){
		$(".backgroundPopupfeed").css({"opacity": "0.8"});
		$(".backgroundPopupfeed").fadeIn("slow");
		$(".pop_feed").fadeIn("slow");
		popupStatus5 = 1;
		
	}
}

//This will disable the popup when needed
function disablePopup5(){
	//Will only disable if status is 1
	if(popupStatus5==1){
		$(".backgroundPopupfeed").fadeOut("slow");
		$(".pop_feed").fadeOut("slow");
		popupStatus5 = 0;
	}
}

//Centers the popup to your window size 
function centerPopup5(){
	var windowWidth = document.documentElement.clientWidth;
	var windowHeight = document.documentElement.clientHeight;
	var popupHeight = $(".pop_feed").height();
	var popupWidth = $(".pop_feed").width();
	$(".pop_feed").css({
		"position": "absolute",
		"top": windowHeight/2-popupHeight/2,
		"left": windowWidth/2-popupWidth/2
	});
	//this is needed for ie6
	$(".backgroundPopupfeed").css({ "height": windowHeight });
}


//Click event controller
$(document).ready(function(){
	//Open the popup and center
	
	//Close popup by clicking the x
	$(".popupClose5").click(function(){ disablePopup5(); window.location.reload(true); });
	//Close popup by clicking outside the box
	$(".backgroundPopupfeed").click(function(){ disablePopup5(); window.location.reload(true); });
	
	//Close popup by clicking escape
	$(document).keypress(function(e){
		if(e.keyCode==27 && popupStatus5==1){
			disablePopup5(); window.location.reload(true);
		}
	});
});
/////////////////////////////////////////////////////////////////
///////////////////////LOGIN SMALL POPUP/////////////////////////



var popupStatusLogin = 0;
function loadPopupLogin(){
	//Will only be loaded if the status is 0
	if(popupStatusLogin==0){
		$(".backgroundPopuplogin").css({"opacity": "0.8"});
		$(".backgroundPopuplogin").fadeIn("slow");
		$(".pop_login").fadeIn("slow");
		popupStatusLogin = 1;
		
	}
}

//This will disable the popup when needed
function disablePopupLogin(){
	//Will only disable if status is 1
	if(popupStatusLogin==1){
		$(".backgroundPopuplogin").fadeOut("slow");
		$(".pop_login").fadeOut("slow");
		popupStatusLogin = 0;
	}
}

//Centers the popup to your window size 
function centerPopupLogin(){
	var windowWidth = document.documentElement.clientWidth;
	var windowHeight = document.documentElement.clientHeight;
	var popupHeight = $(".pop_login").height();
	var popupWidth = $(".pop_login").width();
	$(".pop_login").css({
		"position": "absolute",
		"top": windowHeight/2-popupHeight/2,
		"left": windowWidth/2-popupWidth/2
	});
	//this is needed for ie6
	$(".backgroundPopuplogin").css({ "height": windowHeight });
}


//Click event controller
$(document).ready(function(){
	//Open the popup and center

	
	
	//Close popup by clicking the x
	$(".popupCloseLogin").click(function(){ disablePopupLogin(); });
	//Close popup by clicking outside the box
	$(".backgroundPopuplogin").click(function(){ disablePopupLogin(); });
	//Close popup by clicking escape
	$(document).keypress(function(e){
		if(e.keyCode==27 && popupStatusLogin==1){
			disablePopupLogin();
		}
	});
});



///////////////////////LOGIN SMALL POPUP END/////////////////////
