// JavaScript Document
	var vardrop = 1;
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
	var chkval = new Array();
	function selectcity(str,val) {
		for(var p in chkval) {
			//alert(p+"key");	
		}
		var  id = "chk"+str;
		var  lid = "li"+str;
		var attrval ='';
		var mm = 0;
		var ch;
	
		if(document.getElementById(id).checked) {
			//alert(chkval[str]+"id");
			chkval[str] = document.getElementById(id).value;
			//alert(chkval[str]);
			ch = document.getElementById("showcity");
			var p = document.createElement("li");
			var att = document.createAttribute("id");
			/*p.style.minWidth = "70px";
			p.style.border = "1px solid #f00";*/
			att.value=lid;
			p.setAttributeNode(att);
			p.innerHTML = val+"<a  title='Remove "+val+"' style=cursor:pointer; onclick=deleteelement('"+str+"')><img src=images/cross_small.png /></a>";
			/*p.style.cursor="pointer";
			p.style.float="left";*/
			ch.appendChild(p);
			//alert(chkval.length+"len");
			for(var k in chkval) {
				if(chkval[k]) {
					if(attrval){
						attrval += ","+ltrim(k);
						//attrval += ","+chkval[k];
					}
					else {
						attrval += ltrim(k);
						//attrval += chkval[k];
					}
				}
			}
			attrval = ltrim(attrval);
			document.getElementById("hdncity").value = attrval;
		}
		else {
			//alert("mymy");
			deleteelement(str);
		}
		if(chkval.length) {
			document.getElementById("showcitytext").style.display = "block";
		}
		else {
			document.getElementById("showcitytext").style.display = "none";
		}
	}
	
	function deleteelement(str) {
		var element;
		var attrval = '';
		var mm = 0;
		for(var j in chkval) {
			if((ltrim(j)==str) || (j==str)) {
				delete chkval[ltrim(j)];
				delete chkval[j];
			}
		}
		try {
		element = document.getElementById("li"+str);
		
		element.parentNode.removeChild(element);
		document.getElementById("chk"+str).checked = false;
		}
		catch(e){}
		for(k in chkval) {
			mm = ltrim(k);
			if(mm!=str) {
			//alert("pp"+k+"My"+str+"pp");
				if(attrval){
					attrval += ","+ltrim(k);
				}
				else {
					attrval = ltrim(k);
				}
			}
		}
		attrval = ltrim(attrval);
		document.getElementById("hdncity").value = attrval;
			
	}
	
	//////////////////////////////////////////////////FOR NEW FORM /////////////////////////////
	var oldstate = "";
	function statecitychoose(str) {
		var state = "state"+str;
		if(!str==0) {
			document.getElementById(state).style.display = "block";	
			document.getElementById("tridd").innerHTML = "<strong><em class=star_red>*</em> Choose City :</strong>";	
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