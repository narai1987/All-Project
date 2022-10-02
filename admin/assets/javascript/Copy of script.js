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
		xmlhttp.open("GET","script/gallery.php?control=boat&task=boatGallery&bid="+id,true);
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
					document.getElementById("popdivid").innerHTML=xmlhttp.responseText;	
									
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
		return true;
		}
		else {
		return false;		
		}	
		
		
	
}






function scheduleSave(trip_id,schedule_id,equipmentID,beverageID,foodID) {
	
	if(!addSch_validation(equipmentID,beverageID,foodID)){
		return false;
		}
	
	
	var checkedValue = null; 
	var schId = null;
	var str = '';
	var eqtype = '';
	var eqprice = '';
	var inputElements = document.getElementsByTagName('input');	
	str = "trip_id="+trip_id;
	str += "&schedule_id="+schedule_id;
	str += "&start_date="+(document.getElementById("inputDate").value);
	str += "&end_date="+(document.getElementById("inputDate2").value);
	str += "&trip_price="+(document.getElementById("trip_price").value);
	for(var i=0; i<inputElements.length; ++i){
		  if(inputElements[i].checked){
			  
			   checkedValue = inputElements[i].value;
			   eqtype = "eqtype"+checkedValue;
			   eqprice = "eqprice_"+checkedValue;
			   str += "&chk_eq_"+checkedValue+"="+checkedValue;
			   str += "&eqtype"+checkedValue+"="+(document.getElementById(eqtype).value);
			   str += "&eqprice_"+checkedValue+"="+(document.getElementById(eqprice).value);
		  }
	}

	///////////////////////save ajax functionality start here ////////////////////
	if(str) {
		if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari		
			xmlhttp=new XMLHttpRequest();
		}
		else {// code for IE6, IE5		
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp.onreadystatechange=function() { 
			if (xmlhttp.readyState==4){
				if(xmlhttp.responseText=="Yes") {
					schedule(trip_id);
				}
				else {
					alert("Some data missing.");	
				}							
			}
		}
		xmlhttp.open("GET","script/ajax.php?control=trip&task=scheduleSave&"+str,true);
		xmlhttp.send();	
	}
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



