// JavaScript Document
function bMember() {
	var chk = 1;
	if(document.getElementById("userId").value) {
		/*if(document.getElementById("start_date").value == 0){
			document.getElementById("sdate").innerHTML = '*Select date';
			chk = 0;
		}else{
		document.getElementById("sdate").innerHTML = '';
		}*/
		if(document.getElementById("adult").value == 0){
			document.getElementById("msgperson").innerHTML = '*Select no. of persons';
			chk = 0;
		}else{
		document.getElementById("msgperson").innerHTML = '';
		}
		
		for(a = 1; a<=(parseInt(document.getElementById("adult").value));a++){
		
			if(document.getElementById("person"+a).value == ''){
				document.getElementById("msgmemb"+a).innerHTML = '*Enter person name';
				chk = 0;
			}else{
			document.getElementById("msgmemb"+a).innerHTML = '';
			}
			
			if(document.getElementById("age"+a).value == 0){
				document.getElementById("msgmemage"+a).innerHTML = '*Enter person Age';
				chk = 0;
			}else{
			document.getElementById("msgmemage"+a).innerHTML = '';
			}
			
		}
			
			if(chk){
				return true;
			}else{
				return false;
			}
		return false;	
	}
	else {
		alert("Please login first");	
		return false;
	}
}
/////////////////////////////////////////////////////////////////////////////////////////////////////

function checkCheckBox(str,div,type) {
	var divid = div+str;
	var typeid = type+str;
	if(document.getElementById(typeid).checked) {
		document.getElementById(divid).style.display = "block";
	}
	else {
		document.getElementById(divid).style.display = "none";
	}
}
/////////////////////////////////////////////////////////////////////////////////////////////////////
function bookingValidate() {
	var selected = [];
	
	$('#availCabin input:checked').each(function() {
    	selected.push($(this).attr('id'));
	});
	if(selected == ''){
		alert('Please choose atleast one Cabin to continue.');
		return false;
	}else{
		return true;	
	}
	
	return false;
}