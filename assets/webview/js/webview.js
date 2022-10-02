// JavaScript Document
function addWishlist(tripID,userID) {
			 $("#imgwishlist").attr("src","images/web-loader.gif");
			 $("#imgwishlist").attr("height","36");
			 $("#imgwishlist").attr("width","36");
	$.ajax({
     url:"script/ajax.php?control=api&task=addWishlist&tripID="+tripID+"&userID="+userID,
     success:function(del){
		 if(del=="No") {
			 $("#triptpe").html(del);
		 }
		 else {
			 $("#triptpe").html(del);
			 $("#imgwishlist").attr("src",del);
			 $("#imgwishlist").attr("height","36");
			 $("#imgwishlist").attr("width","36");
			 if(del=="images/rm_wish.png")
			 $("#imgwishlist").attr("title","Remove to wishlist");
			 else
			 $("#imgwishlist").attr("title","Add to wishlist");
		 }
	 }
	 });
}

function divPerson(adult,child) {
	var person = Number(adult) + Number(child);
		if (person) {			
			if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
				xmlhttp=new XMLHttpRequest();
			}
			else {// code for IE6, IE5
				xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			}
			xmlhttp.onreadystatechange=function() {
				if (xmlhttp.readyState==4 && xmlhttp.status==200) {
					//alert(xmlhttp.responseText);
					document.getElementById("memberCollaps").innerHTML=xmlhttp.responseText;
					callCoo();
					//document.getElementById("testDiv").innerHTML=xmlhttp.responseText;
				}
			}
			xmlhttp.open("GET","script/ajax.php?control=api&task=divPerson&person="+person,true);
			xmlhttp.send();	
		} 
}
function tripDateTime(str,type,tripId) {
	var controlId = type=='1'?"end_date":"start_date";
	//alert(controlId);
	if (str) {			
		if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
			xmlhttp=new XMLHttpRequest();
		}
		else {// code for IE6, IE5
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp.onreadystatechange=function() {
			if (xmlhttp.readyState==4 && xmlhttp.status==200) {
				///document.getElementById("testDiv").innerHTML=xmlhttp.responseText;
				document.getElementById(controlId).innerHTML=xmlhttp.responseText;
			}
		}
		xmlhttp.open("GET","script/ajax.php?control=api&task=tripDateTime&scheduleId="+str+"&tripId="+tripId+"&controlId="+controlId,true);
		xmlhttp.send();	
	} 
}