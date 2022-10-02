<link rel="stylesheet" type="text/css" href="assets/popup/css/reveal.css" media="all" />
<script type="text/javascript" src="assets/popup/js/jquery.reveal.js"></script>


<a href="#" id="popupid" data-reveal-id="myModal"></a> </div>

<!--select boat  popup-->

<div id="myModal" class="reveal-modal">
  <div style="float:right; width:100%;">
    <div class="news_title_pop">Boat Detail</div>
    <br />
    <div>
      <p id="cartajaxdata">
      
      
      
      <div id="innerhtm">
      <img src="images/loader_white.gif" style="margin-left: 160px;"/>
      </div>
      
      
      
      
      
      
      </p>
    </div>
    <a class="close-reveal-modal"><img src="images/close2.png" width="23" height="23" /></a> </div>
</div>
<script type="text/javascript" /> 
function chooseboat() {	
$("#innerhtm").html('<img src="images/loader_white.gif" style="margin-left: 160px;"/>');
	$.ajax({
		url:"ajax.php?control=trip&task=boatDetail&boat_id="+$("#boat_id").val(),
		success:function(status){
			$("#innerhtm").html(status);
		}
	});	

	document.getElementById("popupid").click();	
} 


	</script> 
	
<!--select boat  popup-->