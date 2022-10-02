// JavaScript Document
function numerics(sText)
{
 var ValidChars = "0123456789,.";
 var IsNumber=true;	
 for (i = 0; i < sText.length && IsNumber == true; i++) 
      { 
      Char = sText.charAt(i); 
      if (ValidChars.indexOf(Char) == -1) 
         {			 
		 IsNumber = false;
         }
      }
  	 return IsNumber;
}





var xmlhttp;

function boatGallery(id) {
	document.getElementById("popdivid").innerHTML="<img align='middle' src='images/image.gif' style='margin-top: 45px;margin-left: 480px;' />";
		if (window.XMLHttpRequest) {
			xmlhttp=new XMLHttpRequest();
		}
		else {// code for IE6, IE5
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp.onreadystatechange=function() {
			if (xmlhttp.readyState==4 && xmlhttp.status==200) {
				//document.getElementById("divid").innerHTML=xmlhttp.responseText;
				if(xmlhttp.responseText){
					document.getElementById("popdivid").innerHTML=xmlhttp.responseText;
				}
				else {
					document.getElementById("popdivid").innerHTML="Data Not Found...";
				}				
					marginZeroAuto();
			}
		}
		xmlhttp.open("GET","ajax.php?control=boat&task=boatGallery&bid="+id,true);
		xmlhttp.send();
}	








function branches(cid) {
	alert("branches");
		if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
			xmlhttp=new XMLHttpRequest();
		}
		else {// code for IE6, IE5
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp.onreadystatechange=function() {
			if (xmlhttp.readyState==4 && xmlhttp.status==200) {
				//document.getElementById("divid").innerHTML=xmlhttp.responseText;
				if(xmlhttp.responseText){
					document.getElementById("branchpopUp").innerHTML=xmlhttp.responseText;
				}
				else {
					document.getElementById("branchpopUp").innerHTML="data not found...";
				}				
					marginZeroAuto();
			}
		}
		xmlhttp.open("GET","script/branch.php?cid="+cid,true);
		xmlhttp.send();
}	

	
	function iframeBranch(cid) {
	
	$('#popdivid').html('<p align="center" style="padding-top:75px"><img src="../images/image.gif" width="50"/></p>');
	
		//alert("gfhgf");
		if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
			xmlhttp=new XMLHttpRequest();
		}
		else {// code for IE6, IE5
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp.onreadystatechange=function() {
			if (xmlhttp.readyState==4 && xmlhttp.status==200) {
				//document.getElementById("divid").innerHTML=xmlhttp.responseText;
				if(xmlhttp.responseText){
					document.getElementById("popdivid").innerHTML=xmlhttp.responseText;
				}
				else {
					document.getElementById("popdivid").innerHTML="data not found...";
				}				
					marginZeroAuto();
			}
		}
		//alert(cid);
		xmlhttp.open("GET","script/branch.php?cid="+cid,true);
		xmlhttp.send();
}	


function reportShow(cid) {
	
	$('#popdivid').html('<p align="center" style="padding-top:75px"><img src="../images/image.gif" width="50"/></p>');
	
		//alert("gfhgf");
		if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
			xmlhttp=new XMLHttpRequest();
		}
		else {// code for IE6, IE5
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp.onreadystatechange=function() {
			if (xmlhttp.readyState==4 && xmlhttp.status==200) {
				//document.getElementById("divid").innerHTML=xmlhttp.responseText;
				if(xmlhttp.responseText){
					document.getElementById("popdivid").innerHTML=xmlhttp.responseText;
				}
				else {
					document.getElementById("popdivid").innerHTML="data not found...";
				}				
					marginZeroAuto();
			}
		}
		//alert(cid);
		xmlhttp.open("GET","ajax.php?control=report&task=ajaxReport&cid="+cid,true);
		xmlhttp.send();
}	




function closepopup()
{
	document.getElementById("addnew_branchpopup").style.display="none";
}




function addbranches(cid,id) {
//function addbranches() {	
	//alert(cid);
	document.getElementById("addnew_branchpopup").style.display="block";
	
		if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
			xmlhttp=new XMLHttpRequest();
		}
		else {// code for IE6, IE5
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp.onreadystatechange=function() {
			if (xmlhttp.readyState==4 && xmlhttp.status==200) {
				//document.getElementById("divid").innerHTML=xmlhttp.responseText;
				if(xmlhttp.responseText){
					document.getElementById("addnew_branchpopup").innerHTML=xmlhttp.responseText;
				}
				else {
					document.getElementById("addnew_branchpopup").innerHTML="data not found...";
				}				
					marginZeroAuto();
			}
		}
		xmlhttp.open("GET","script/addbranch.php?cid="+cid+"&id="+id,true);
		xmlhttp.send();
}


function editbranch(id,langid,compid) {
//function addbranches() {	
	//alert(id);
	document.getElementById("addnew_branchpopup").style.display="block";
	
		if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
			xmlhttp=new XMLHttpRequest();
		}
		else {// code for IE6, IE5
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp.onreadystatechange=function() {
			if (xmlhttp.readyState==4 && xmlhttp.status==200) {
				//document.getElementById("divid").innerHTML=xmlhttp.responseText;
				if(xmlhttp.responseText){
					document.getElementById("addnew_branchpopup").innerHTML=xmlhttp.responseText;
				}
				else {
					document.getElementById("addnew_branchpopup").innerHTML="data not found...";
				}				
					marginZeroAuto();
			}
		}
		xmlhttp.open("GET","script/editbranch.php?id="+id+"&lngid="+langid+"&cmpid="+compid,true);
		xmlhttp.send();
}




function save_addbranch() {
	
	/*var	bname = document.getElementById("bname").value;
	var btitle =	document.getElementById("btitle").value;*/
	var	branch_email = document.getElementById("branch_email").value;
	var mobile =	document.getElementById("mobile").value;
	var phone =document.getElementById("phone").value;
	var	fax = document.getElementById("fax").value;
	var country_id = document.getElementById("country_id").value;
	var state_id = document.getElementById("state_id").value;
	var city_id = document.getElementById("city_id").value;
	var street = document.getElementById("street").value;
	var location = document.getElementById("location").value;
	var address = document.getElementById("address").value;
	
	document.getElementById("addnew_branchpopup").style.display="none";	
	var xmlhttp;	
	
	if (window.XMLHttpRequest) {	
		xmlhttp=new XMLHttpRequest();
	}
	else {	
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function() { 
		if (xmlhttp.readyState==4) {		
			document.getElementById("addnew_branchpopup").innerHTML=xmlhttp.responseText;
		}
	}	
	xmlhttp.open("GET","script/addbranch.php?branch_email="+branch_email+"&mobile="+mobile+"&phone="+phone+"&fax="+fax+"&country_id="+country_id+"&state_id="+state_id+"&city_id="+city_id+"&street="+street+"&location="+location+"&address="+address,true);
	xmlhttp.send();
}

function savebranch() {
	//alert('++++++++');
	var str ;
	str = "branch_email="+(document.getElementById("branch_email").value);
	str += "&mobile="+(document.getElementById("mobile").value);
	str += "&phone="+(document.getElementById("phone").value);
	str += "&fax="+(document.getElementById("fax").value);
	str += "&country="+(document.getElementById("country").value);
	str += "&province="+(document.getElementById("province").value);
	str += "&city="+(document.getElementById("city").value);
	str += "&street="+(document.getElementById("street").value);
	str += "&location="+(document.getElementById("location").value);
	str += "&address="+(document.getElementById("address").value);
	str += "&id="+(document.getElementById("id").value);
	str += "&cid="+(document.getElementById("cid").value);
	
		if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
			xmlhttp=new XMLHttpRequest();
		}
		else {// code for IE6, IE5
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
		//alert("script/branch.php?control=company&task=savebranch&"+str);
					//document.getElementById("divid").innerHTML="script/branch.php?control=company&task=savebranch&"+str;
		xmlhttp.onreadystatechange=function() {
			if (xmlhttp.readyState==4 && xmlhttp.status==200) {
				document.getElementById("divid").innerHTML=xmlhttp.responseText;
				
				if(xmlhttp.responseText){
					document.getElementById("popdivid").innerHTML=xmlhttp.responseText;
				}
				else {
					document.getElementById("popdivid").innerHTML="data not found...";
				}				
					marginZeroAuto();
			}
		}
		xmlhttp.open("GET","script/branch.php?control=company&task=savebranch&"+str,true);
		xmlhttp.send();
}

function fillstate(country) {
	var xmlhttp;
	if(country!="0") {
		if (window.XMLHttpRequest)
		{// code for IE7+, Firefox, Chrome, Opera, Safari 
		
			xmlhttp=new XMLHttpRequest();
		}
		else
		{// code for IE6, IE5
		
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp.onreadystatechange=function()
		{ 
			if (xmlhttp.readyState==4)
			{
				document.getElementById("province").innerHTML=xmlhttp.responseText;
				document.getElementById("city").innerHTML="<option value='0'>Select City</option>";
				
			}
		}
		
		
		xmlhttp.open("GET","script/branch.php?control=company&task=fillstate&country_id="+country,true);
		xmlhttp.send();	
	}
	
}

function fillcity(state) {
	var xmlhttp;
	if(state!="0") {
		if (window.XMLHttpRequest)
		{// code for IE7+, Firefox, Chrome, Opera, Safari 
		
			xmlhttp=new XMLHttpRequest();
		}
		else
		{// code for IE6, IE5
		
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp.onreadystatechange=function()
		{ 
			if (xmlhttp.readyState==4)
			{
				document.getElementById("city").innerHTML=xmlhttp.responseText;
				
			}
		}
		
		
		xmlhttp.open("GET","script/branch.php?control=company&task=fillcity&state_id="+state,true);
		xmlhttp.send();	
	}
	
}

function selectCity(country_id,cityid) {
	var xmlhttp;
	if(country_id!="0") {
		if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari 		
			xmlhttp=new XMLHttpRequest();
		}
		else {// code for IE6, IE5		
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp.onreadystatechange=function() { 
			if (xmlhttp.readyState==4) {
				document.getElementById(cityid).innerHTML=xmlhttp.responseText;
				
			}
		}
		xmlhttp.open("GET","script/ajax.php?control=countrie&task=selectCity&countryID="+country_id,true);
		xmlhttp.send();	
	}
}

/*NAGESH CODE END HERE*/
function numeric1(sText,id)
{
 var ValidChars = "0123456789- ";
 var IsNumber=true; 
 for (i = 0; i < sText.length && IsNumber == true; i++)  { 
		Char = sText.charAt(i); 
		if (ValidChars.indexOf(Char) == -1) {    
			document.getElementById(id).value="";
			document.getElementById(id).focus();
		}
	}
}

/*TRIP TIME SCHEDULE POPUP OPEN */
function schedule(tripId) {
	//alert("fghf");
	var xmlhttp;
	if(tripId!="0") {
		if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari		
			xmlhttp=new XMLHttpRequest();
		}
		else {// code for IE6, IE5		
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp.onreadystatechange=function() { 
			if (xmlhttp.readyState==4) {
				loadPopup();
				document.getElementById("popdivid").innerHTML=xmlhttp.responseText;				
			}
		}
		xmlhttp.open("GET","script/ajax.php?control=trip&task=schedule&trip_id="+tripId,true);
		xmlhttp.send();	
	}
}


function tripsale(id,tripId,trip_schedule_id,user_id) {
	//alert(trip_schedule_id);
	var xmlhttp;
	if(tripId!="0") {
		if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari		
			xmlhttp=new XMLHttpRequest();
		}
		else {// code for IE6, IE5		
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp.onreadystatechange=function() { 
			if (xmlhttp.readyState==4) {
				loadPopup();
				document.getElementById("popdivid").innerHTML=xmlhttp.responseText;	
						
			}
		}
		xmlhttp.open("GET","script/ajax.php?control=tripsale&task=alltripsale&id="+id+"&trip_id="+tripId+"&trip_schedule_id="+trip_schedule_id+"&user_id="+user_id,true);
		xmlhttp.send();	
	}
}



function addSchedule(tripId,scheduleId) {	
	var xmlhttp;
	if(tripId!="0") {
		if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari		
			xmlhttp=new XMLHttpRequest();
		}
		else {// code for IE6, IE5		
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp.onreadystatechange=function() { 
				if (xmlhttp.readyState==4) {
					loadPopup();
					var rr = document.getElementById("popdivid").innerHTML=xmlhttp.responseText;	
					//alert(rr.find(".inputDate"));
						/*jQuery(function($) {
						$("#inputDate").datepicker({
								//inline: true,
							  dateFormat:"yy-mm-dd",	
							  changeMonth: true,
							  changeYear: true,
							  numberOfMonths: 1,
							});
							alert('ddd');
						});*/
							 
									
				}
		}
		xmlhttp.open("GET","script/ajax.php?control=trip&task=addschedule&trip_id="+tripId+"&scheduleId="+scheduleId,true);
		xmlhttp.send();	
	}
}

function scheduleStatus(tripId,scheduleId,status) {	
   
	var xmlhttp;
	if(tripId!="0") {
		 if(confirm('Are you sure you want to '+status)){
			
		if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari		
			xmlhttp=new XMLHttpRequest();
		}
		else {// code for IE6, IE5		
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp.onreadystatechange=function() { 
				if (xmlhttp.readyState==4) {
					loadPopup();
					document.getElementById("popdivid").innerHTML=xmlhttp.responseText;					
				}
		}
		xmlhttp.open("GET","script/ajax.php?control=trip&task=scheduleStatus&trip_id="+tripId+"&scheduleId="+scheduleId,true);
		xmlhttp.send();
		 return true;
		 }
		 else {
			 
			return false; 
		 }
	}
}

function deleteSchedule(tripId,scheduleId) {	
   
	var xmlhttp;
	if(tripId!="0") {
		 if(confirm('Are you sure you want to Delete ')){
			
		if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari		
			xmlhttp=new XMLHttpRequest();
		}
		else {// code for IE6, IE5		
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp.onreadystatechange=function() { 
				if (xmlhttp.readyState==4) {
					loadPopup();
					document.getElementById("popdivid").innerHTML=xmlhttp.responseText;					
				}
		}
		xmlhttp.open("GET","script/ajax.php?control=trip&task=scheduleDelete&trip_id="+tripId+"&scheduleId="+scheduleId,true);
		xmlhttp.send();
		 return true;
		 }
		 else {
			 
			return false; 
		 }
	}
}


function Numericchk(val,id){
		//alert(id);
  		for(i=0;i<val.length;i++){
			if(!isNaN(val.substring(1,val.length)) && !isNaN(val)){
			}else{
			document.getElementById(id).value = val.substring(0,val.length-1);
			}
		}
	
  } 
  





function addSch_validation(equipmentID,beverageID,foodID) {
var chk=1;

if(document.getElementById('trip_price').value == '') { 
	document.getElementById('msgtrip_price').innerHTML ="*Required field.";
	
	chk=0;
	}else if(!numerics(document.getElementById('trip_price').value)) { 
	document.getElementById('msgtrip_price').innerHTML ="*Must be numeric only.";
	
	chk=0;
	}else {
	document.getElementById('msgtrip_price').innerHTML = "";
	}


 // var equipVal = 1;
    var equiparr = new Array(); 
	equiparr = equipmentID;
  // var equiparr = [equipmentID]; 
  // alert(equiparr);
	for(a=0; a < equiparr.length;a++){
			if(equiparr[a] != ','){
			
		   if(document.getElementById('eqtype'+equiparr[a]).value == 'paid' && document.getElementById('eqprice_'+equiparr[a]).value=='' && document.getElementById('chk_eq_'+equiparr[a]).checked) { 
		            document.getElementById('msgeqprice_'+equiparr[a]).innerHTML ="*Required field.";
					chk=0;
				}else if(document.getElementById('eqtype'+equiparr[a]).value == 'paid' && document.getElementById('eqprice_'+equiparr[a]).value==0 && document.getElementById('chk_eq_'+equiparr[a]).checked) { 
		  
		   
					document.getElementById('msgeqprice_'+equiparr[a]).innerHTML ="*Required field.";
					chk=0;
				}else if(document.getElementById('eqtype'+equiparr[a]).value == 'paid' && !numerics(document.getElementById('eqprice_'+equiparr[a]).value) && document.getElementById('chk_eq_'+equiparr[a]).checked) { 
		  
					document.getElementById('msgeqprice_'+equiparr[a]).innerHTML ="*Must be numeric only.";
					chk=0;
				}
				else {
					document.getElementById('msgeqprice_'+equiparr[a]).innerHTML = "";
				}
			}
		}
		
	

   // var beverageVal = 1;
   
    var beveragearr = new Array(); 
	beveragearr = beverageID;
  
	for(b=0; b < beveragearr.length;b++){
			if(beveragearr[b] != ','){
		   if(document.getElementById('bvtype'+beveragearr[b]).value == 'paid' && document.getElementById('bvprice_'+beveragearr[b]).value=='' && document.getElementById('chk_bv_'+beveragearr[b]).checked) { //alert(beveragearr[b]);
		            document.getElementById('msgbvprice_'+beveragearr[b]).innerHTML ="*Required field.";
					chk=0;
				}else if(document.getElementById('bvtype'+beveragearr[b]).value == 'paid' && document.getElementById('bvprice_'+beveragearr[b]).value==0 && document.getElementById('chk_bv_'+beveragearr[b]).checked) { 
		  
		   
					document.getElementById('msgbvprice_'+beveragearr[b]).innerHTML ="*Required field.";
					chk=0;
				}else if(document.getElementById('bvtype'+beveragearr[b]).value == 'paid' && !numerics(document.getElementById('bvprice_'+beveragearr[b]).value) && document.getElementById('chk_bv_'+beveragearr[b]).checked) { 
		  
					document.getElementById('msgbvprice_'+beveragearr[b]).innerHTML ="*Must be numeric only.";
					chk=0;
				}
				else {
					document.getElementById('msgbvprice_'+beveragearr[b]).innerHTML = "";
				}
			}
		}
			
	
  
    var foodarr = new Array(); 
	foodarr = foodID;
  // var equiparr = [equipmentID]; 
  
	for(a=0; a < foodarr.length;a++){
			if(foodarr[a] != ','){
		   if(document.getElementById('fdtype'+foodarr[a]).value == 'paid' && document.getElementById('fdprice_'+foodarr[a]).value=='' && document.getElementById('chk_fd_'+foodarr[a]).checked) { 
		            document.getElementById('msgfdprice_'+foodarr[a]).innerHTML ="*Required field.";
					chk=0;
				}else if(document.getElementById('fdtype'+foodarr[a]).value == 'paid' && document.getElementById('fdprice_'+foodarr[a]).value==0 && document.getElementById('chk_fd_'+foodarr[a]).checked) { 
		            document.getElementById('msgfdprice_'+foodarr[a]).innerHTML ="*Required field.";
					chk=0;
				}else if(document.getElementById('fdtype'+foodarr[a]).value == 'paid' && !numerics(document.getElementById('fdprice_'+foodarr[a]).value) && document.getElementById('chk_fd_'+foodarr[a]).checked) { 
		  
					document.getElementById('msgfdprice_'+foodarr[a]).innerHTML ="*Must be numeric only.";
					chk=0;
				}
				else {
					document.getElementById('msgfdprice_'+foodarr[a]).innerHTML = "";
				}
			}
		}
			
			
 		 if(chk) {	
			
			if($("#isBooked").val() > 0){
				document.getElementById("popmsg").innerHTML = "This  boat is booked by many customers Are you sure to update this trip?.";
				document.getElementById("popbutton").innerHTML = '<img onclick="sendscheduleform();" style="cursor: pointer;" align="bottom" src="images/ok_2.png" />&nbsp;&nbsp;&nbsp;<a href="index.php?control=trip"><img style="padding-bottom: 9px;cursor: pointer;" src="images/cancel.gif" /></a>';
				document.getElementById("closeid2").className = "darkbase_bg";
				return false;
			}else{
			$("#tod").attr("disabled", false);
			$("#ajax_schedule_form :input").attr("disabled", false);
			return true;
			}
			
			return false;
		 }
		else {
			return false;		
		}	
		
		
	
}





function scheduleSave(trip_id,schedule_id,equipmentID,beverageID,foodID) {
	
	
			if(!addSch_validation(equipmentID,beverageID,foodID)){
			return false;
			}
	 
	 /*$.ajax({
        type: 'POST',
        url: 'ajax.php?control=trip&task=scheduleSave&trip_id='+trip_id+'&schedule_id='+schedule_id+'',
        data: $("#ajax_schedule_form").serialize(),
         success: function (data) {
           schedule(trip_id);
         },
      });*/
	///////////////////////save ajax functionality end here //////////////////////
}

function scheduleAction(id,task,msg) {
	if(id) {
		if(confirm(msg)) {
			if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari		
					xmlhttp=new XMLHttpRequest();
			}
			else {// code for IE6, IE5		
				xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			}
			xmlhttp.onreadystatechange=function() { 
				if (xmlhttp.readyState==4){
					alert(xmlhttp.responseText);
					if(xmlhttp.responseText=="Yes") {
						schedule(id);
					}
					else {
						alert("Some data missing.");
						//document.getElementById("popdivid").innerHTML=xmlhttp.responseText;	
					}							
				}
			}
			xmlhttp.open("GET","script/ajax.php?control=trip&task="+task+"&id="+str,true);
			xmlhttp.send();	
		}
	}
}
/*TRIP TIME SCHEDULE POPUP OPEN */



function ajaxstate(country_id) {
	
		if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
			xmlhttp=new XMLHttpRequest();
		}
		else {// code for IE6, IE5
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp.onreadystatechange=function() {
			if (xmlhttp.readyState==4 && xmlhttp.status==200) {
				document.getElementById("state_id").innerHTML=xmlhttp.responseText;
			}
		}
		xmlhttp.open("GET","script/ajaxstate.php?country_id="+country_id,true);
		xmlhttp.send();
	
}	

function itinerary(tripScheduleId) {
		if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
			xmlhttp=new XMLHttpRequest();
		}
		else {// code for IE6, IE5
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp.onreadystatechange=function() {
			if (xmlhttp.readyState==4 && xmlhttp.status==200) {
				document.getElementById("popdivid").innerHTML=xmlhttp.responseText;				
			}
		}
		xmlhttp.open("GET","script/ajax.php?control=trip&task=lastScheduleItinerary&trip_schedule_id="+tripScheduleId,true);
		xmlhttp.send();
}

/* COUPON ATTACH TO TRIP SCHEDULE START*/
function scheduleForCoupon(typeId) {
	var xmlhttp;
	if(typeId!="other") {
		if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari		
			xmlhttp=new XMLHttpRequest();
		}
		else {// code for IE6, IE5		
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
		var schedule = document.getElementById("schedule").value;
		//alert(schedule);
		xmlhttp.onreadystatechange=function() { 
			if (xmlhttp.readyState==4) {
				loadPopup();
				centerPopup();	
	
				//document.getElementById("popdivid").innerHTML="kjshdf";	
				document.getElementById("popdivid").innerHTML=xmlhttp.responseText;	
			}
		}
		xmlhttp.open("GET","script/ajax.php?control=coupon&task=scheduleForCoupon&type_id="+typeId+"&schedule="+schedule,true);
		xmlhttp.send();	
	}
}
/* COUPON ATTACH TO TRIP SCHEDULE END*/
/*CHECK BOX CHECKED ALL OR UNCHECK ALL */

function chkCheck88(id) {
	id = "chk"+id;
	var str = new Array();
	var str1 = '';
	var str2 = '';
	str1 = document.getElementById("schedule").value;
	str = str1.split(",");
	if(document.getElementById(id).checked) {
		str[document.getElementById(id).value] = document.getElementById(id).value;
		str2 += str1?str1+","+str[document.getElementById(id).value]:str[document.getElementById(id).value];
	}
	else {
		for(var k in str) {
			if(str[k]==document.getElementById(id).value) 
			delete str[k];
			else 
			str2 += str2?","+str[k]:str[k]; 
		}
	}
	document.getElementById("schedule").value = str2;
}
function chkCheck888(id) {
	id = "chk"+id;
	var str = new Array();
	var str1 = '';
	var str2 = '';
	str1 = document.getElementById("schedule").value;
	str = str1.split(",");
	if(document.getElementById(id).checked) {
		document.getElementById(id).checked = false;
		for(var k in str) {
			if(str[k]==document.getElementById(id).value) 
			delete str[k];
			else 
			str2 += str2?","+str[k]:str[k]; 
		}
	}
	else {
		document.getElementById(id).checked = true;
		str[document.getElementById(id).value] = document.getElementById(id).value;
		str2 += str1?str1+","+str[document.getElementById(id).value]:str[document.getElementById(id).value];
	}
	document.getElementById("schedule").value = str2;
}
function checkAll(id) {
	var checkboxes = new Array();
	var str = new Array();
	var str1 = '';
	checkboxes = document.getElementsByTagName('input');
	for (var i = 0; i < checkboxes.length; i++) {
		if (checkboxes[i].type == 'checkbox') {
			if(document.getElementById(id).checked) {
				checkboxes[i].checked = true;			
				if(checkboxes[i].value!="on")
					str[checkboxes[i].value] = checkboxes[i].value;
				}
				else {
					checkboxes[i].checked = false;
					delete str[checkboxes[i].value];
				}
			}
		}
		for(var k in str) {
		str1 += str1?","+str[k]:str[k]; 
	}
	document.getElementById("schedule").value = str1;	
}
/*CHECK BOX CHECKED ALL OR UNCHECK ALL */



