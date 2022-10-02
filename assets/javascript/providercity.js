// JavaScript Document
var vardrop = 1;
var chkval = new Array();
	function opendrop() {
		if(vardrop) {
		document.getElementById("uldrop").style.display = "block";
		vardrop = 0;
		}
		else {
		document.getElementById("uldrop").style.display = "none";
		vardrop = 1;
			
		}
	}
	
	function selectcity(str,val) {
		var  id = "chk"+str;
		var  lid = "li"+str;
		var attrval ='';
		var ch;	
	
		if(document.getElementById(id).checked) {
			
			chkval[str] = document.getElementById(id).value;
			ch = document.getElementById("showcity");
			var pt = document.createElement("li");
			var att = document.createAttribute("id");
			
			att.value=lid;
			pt.setAttributeNode(att);
			pt.innerHTML = val+"<a onclick=deleteelement('"+str+"')><img src=images/cross_small.png /></a>";
			pt.style.cursor="pointer";
			ch.appendChild(pt);
			
			for(k in chkval) {
				if(chkval[k]) {
					if(attrval){
						attrval += ","+chkval[k];
					}
					else {
						attrval += chkval[k];;
					}
				}
			}
			document.getElementById("hdncity").value = attrval;
		}
		else {
			deleteelement(str);
		}
			document.getElementById("showcitytext").style.display = "block";
		
		if(chkval[k]) {}
		else {
		}
	}
	
	function deleteelement(str) {
		//delete chkval;
		try {
			var mycity = document.getElementById("hdncity").value;
			var mydata = mycity.split(',');
			var p = 0;
			for(var kk in mydata) {
				chkval[ltrim(mydata[kk])] = mydata[kk];
			}
		}
		catch(e) {}
		var attrval = '';	
		
		for(var j in chkval) {
			
			if((ltrim(j)==str) || (j==str)) {
				delete chkval[ltrim(j)];
				delete chkval[j];			
			}
		}
		//chkval[str] = '';
		element = document.getElementById("li"+str);
		
		element.parentNode.removeChild(element);
		
		document.getElementById("chk"+str).checked = false;
			for(k in chkval) {
				if(chkval[k]) {
					if(attrval){
						attrval += ","+chkval[k];
					}
					else {
						attrval += chkval[k];;
					}
				}
			}
		document.getElementById("hdncity").value = attrval;
			
	}
	
	//////////////////////////////////////////////////FOR NEW FORM /////////////////////////////
	var oldstate = "";
	function statecitychoose(str) {
		try{
		var data = (document.getElementById("hdncity").value).split(",");
		for(k in data) {
			chkval[data[k]] = data[k];
		}
		}
		catch(e){}
		var state = "state"+str;
		if(!str==0) {
			document.getElementById(state).style.display = "block";	
			document.getElementById("tridd").innerHTML = "<strong><em class=star_red>*</em>Suburbs :</strong>";	
			try{
				document.getElementById(oldstate).style.display = "none";	
			}
			catch(e){}
		}
		else {		
			document.getElementById(state).style.display = "none";	
			document.getElementById("tridd").innerHTML = "";
		}
		oldstate = state;
	}
	
	function filterData(str) {
		var spid = "span_"+str;	
		try{
		document.getElementById(str).click();
		document.getElementById(spid).style.color = "#f00";
		document.getElementById("toppop").click();
		
		}
		catch(e){}
	}
	
	function validatemyservice() {
		var chk = 0;
		if(document.getElementById("service_name").value=="0") {
			document.getElementById("service_title").style.display = "block";
			return false;
		}
		else {
			document.getElementById("service_title").style.display = "none";
			chk = 1;
		if(document.getElementById("state_name").value=="0") {
				document.getElementById("state_title").style.display = "block";
				return false;
			}
			else {
				document.getElementById("state_title").style.display = "none";
				chk = 1;
			}
		}
		//return false;
		if(chk) {
			return true;
		}
		else {
			return false;
		}
	}
	
function ltrim(stringToTrim) {
	return stringToTrim.replace(/^\s+/,"");
}