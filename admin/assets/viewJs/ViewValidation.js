function isletter(txt)
{
	var iChars = "!@#$^&*+=[]\\\/{}|\":<>?0123456789";
	var chk	=1;
	for (var i = 0; i < txt.length; i++) {
    if (iChars.indexOf(txt.charAt(i)) != -1) {
   		chk=0;
        }
    }
	if(chk){
	return true;
	}else{
	return false;
	}
}
	

	
	
function validation_doctor(str){ 

	var cnt = 1;
	var id=document.getElementById('idd').value;	
	var image = document.getElementById('logo').value;	
	var fzipLength = image.length;
	var fzipDot = image.lastIndexOf(".");
	var fzipType = image.substring(fzipDot,fzipLength);
	if(image) {	
		if((fzipType==".jpg")||(fzipType==".jpeg")||(fzipType==".gif")||(fzipType==".png")) {
		document.getElementById('msgimage').innerHTML = "";			
		}
		else {	
		cnt = 0;	
		document.getElementById('msgimage').innerHTML = "Invalid file format only (jpg,gif,png)";
		}
	}
	else {
		if(!id) {  
		cnt = 0;
		document.getElementById('msgimage').innerHTML = "Please upload Company logo";
	    }
		else {
			document.getElementById('msgimage').innerHTML = "";
		}
	
	}
	
		
	if(document.getElementById('company'+str).value=='') {
	cnt = 0;	
	document.getElementById('msgfname'+str).innerHTML="This field is required";
	
	}
	else if(!isletter(document.getElementById('company'+str).value)) {
	cnt = 0;	
	document.getElementById('msgfname'+str).innerHTML="Invalid company name ";

	}
	else  {
	document.getElementById('msgfname'+str).innerHTML="";

	}
	
		if(cnt==1){	
		return true;
		}else {	
		return false;
		}
		
}


function resetComp()	
	{ 
	
	document.getElementById('msgimage').innerHTML = "";
	document.getElementById('msgfname1').innerHTML="";
	
	}
	