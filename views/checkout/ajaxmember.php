<style type="text/css">
.wrongTurn{
border:1px solid #F00 !important;
}
</style>
<script type="text/javascript">

function goToStepOne(){
	
	$('#preloader').html('<img src="images/web-loader.gif" />');
	document.getElementById("closepop").className = "darkbase_bg";
	document.getElementById("ajax_loader").style.display="block";
		setTimeout("goToStepOneTask();",2000);
	
	
}

function goToStepOneTask(){
$.ajax({
		 url: 'ajax.php?control=checkout&task=show&ajaxRequest=1&schId=<?php echo $schedules[0]['id'];?>&trip_id=<?php echo $tripId;?>',
		success: function (data) {
			$('#getSchedule').html(data);
			document.getElementById('closepop').className = "clspop";	
						( $('#getMember').stop(true, true).fadeOut( 600 ), $('#stptwoli').removeClass( 'st-open' ).stop().animate({
							height	: $('#stptwoli').data( 'originalHeight' )
						}, 600, 'easeInOutExpo' ) )
						
			
						( $('#getSchedule').stop(true, true).fadeIn( 600 ), $('#stponeli').addClass( 'st-open' ).stop().animate({
							height	: $('#stponeli').data( 'originalHeight' ) + $('#stponeli').find('div.st-content').outerHeight( true )
						}, 600, 'easeInOutExpo' ), $('html, body').stop().animate({
						scrollTop	: ( true ) ? $('#stponeli').data( 'offsetTop' ) : $('#stponeli').offset().top
						}, 900, 'easeInOutExpo' ) )	
			
			
			
		 }});
}

function saveMember(){
var chk = 1;
	
		
		if(document.getElementById("adult").value == 0){
			//document.getElementById("msgperson").innerHTML = '*Select no. of persons';
			$('#adult').addClass('wrongTurn');
			chk = 0;
		}else{
		$('#adult').removeClass('wrongTurn');
		}
		
		for(a = 1; a<=(parseInt(document.getElementById("adult").value));a++){
		
			if(document.getElementById("person"+a).value == ''){
				$('#person'+a).addClass('wrongTurn');
				chk = 0;
			}else{
			$('#person'+a).removeClass('wrongTurn');
			}
			
			if(document.getElementById("age"+a).value == 0){
				$('#age'+a).addClass('wrongTurn');
				chk = 0;
			}else{
			$('#age'+a).removeClass('wrongTurn');
			}
			
		}
			
			if(chk){
				$('#sloader2').css('display','block');
				document.getElementById("closepop").className = "darkbase_bg";
				document.getElementById("ajax_loader").style.display="block";
				setTimeout("saveMemberTask();",2000);
				
				
			}else{
				return false;
			}
		return false;	
}


function saveMemberTask(){
$.ajax({
        			type: 'POST',
       				 url: 'ajax.php?control=checkout&task=saveTripMembers',
        			data: $("#frmtripMember").serialize(),
         			success: function (data) {
						
          				$('#proBook').html(data);
						document.getElementById('closepop').className = "clspop";	
						$('#sloader2').css('display','none');
						( $('#getMember').stop(true, true).fadeOut( 600 ), $('#stptwoli').removeClass( 'st-open' ).stop().animate({
							height	: $('#stptwoli').data( 'originalHeight' )
						}, 600, 'easeInOutExpo' ) )
						
			
						( $('#proBook').stop(true, true).fadeIn( 600 ), $('#stpthreeli').addClass( 'st-open' ).stop().animate({
							height	: $('#stpthreeli').data( 'originalHeight' ) + $('#stpthreeli').find('div.st-content').outerHeight( true )
						}, 600, 'easeInOutExpo' ), $('html, body').stop().animate({
						scrollTop	: ( true ) ? $('#stpthreeli').data( 'offsetTop' ) : $('#stpthreeli').offset().top
						}, 900, 'easeInOutExpo' ) )	
			
			
						
        			 },
      			});
}

function divPersonweb(adult,child) {
	var person = Number(adult) + Number(child);
	document.getElementById("memBut").style.display = 'none';
	document.getElementById("memberCollaps").innerHTML='<img style="margin-left:370px;width:50px;"  src="images/image.gif" />';
	document.getElementById("closepop").className = "darkbase_bg";
	document.getElementById("ajax_loader").style.display="block";
	( $('#getMember').stop(true, true).fadeIn( 600 ), $('#stptwoli').addClass( 'st-open' ).stop().animate({
							height	: $('#stptwoli').data( 'originalHeight' ) + $('#stptwoli').find('div.st-content').outerHeight( true )
						}, 600, 'easeInOutExpo' ), $('html, body').stop().animate({
						scrollTop	: ( true ) ? $('#stptwoli').data( 'offsetTop' ) : $('#stptwoli').offset().top
						}, 900, 'easeInOutExpo' ) )	
	
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
					document.getElementById("memBut").style.display = 'block';
					document.getElementById('closepop').className = "clspop";
					( $('#getMember').stop(true, true).fadeIn( 600 ), $('#stptwoli').addClass( 'st-open' ).stop().animate({
							height	: $('#stptwoli').data( 'originalHeight' ) + $('#stptwoli').find('div.st-content').outerHeight( true )
						}, 600, 'easeInOutExpo' ), $('html, body').stop().animate({
						scrollTop	: ( true ) ? $('#stptwoli').data( 'offsetTop' ) : $('#stptwoli').offset().top
						}, 900, 'easeInOutExpo' ) )	
						
				}
			}
			xmlhttp.open("GET","ajax.php?control=checkout&task=divPersonweb&person="+person,true);
			xmlhttp.send();	
		} 
}
</script>

<div id="container">
<div id="content">
<form name="frmtripMember" id="frmtripMember" action="ajax.php?control=checkout&task=saveTripMembers" method="post">
<div class="my_account">
<div class="booktrip">
<h2><span>Trip (Members)</span></h2>
<p></p>
<br />
<p>
<strong>Start Date : <span style="color:#096;"><?php echo date("jS F, Y g:i A ",strtotime($schedules[0]['start_date']));?></span></strong> 
<strong style="float:right;">End Date : <span style="color:#096;"><?php echo date("jS F, Y g:i A ",strtotime($schedules[0]['end_date']));?></span></strong>
</p>
<p style="clear:both;">
<span id="sdate" style="color:#F00;"></span>
</p>
<div class="scedule">
<fieldset class="bookField">
<legend>Member/Person</legend>
<table width="100%" cellspacing="0" cellpadding="0" class="tabls">
<tr>
<td width="30%">No. of Persons:</td>
<td><select class="person" name="adult" id="adult" onChange="divPersonweb(this.value,0)">
<?php for($i=1;$i<=15;$i++){ ?>
<option value="<?php echo $i;?>" <?php echo $i==($bookings[0]['no_of_person']+$bookings[0]['no_of_child'])?"selected=selected":"";?>><?php echo $i;?></option>
<?php }?>
</select><br />

<span id="msgperson" style="color:#F00;"></span></td>
</tr>

<!--<tr>
<td width="30%">No. of Child:</td>
<td><select class="person" name="child" id="child" onChange="divPersonweb(adult.value,this.value)">
<?php for($i=0;$i<20;$i++){ ?>
<option value="<?php echo $i;?>" <?php echo $i==$bookings[0]['no_of_child']?"selected=selected":"";?>><?php echo $i;?></option>
<?php }?>
</select></td>
</tr>-->

</table>

</fieldset>

<fieldset class="bookField">
<legend>Member Details</legend>

<div class="main_collaps" id="memberCollaps">
<?php if(count($persons)) {
?>
	<div id="accordion_data">
<?php
$kk=0;
foreach($persons as $person) { $kk++;?>
	
	<h3><a href="#">Member<?php echo $kk;?></a></h3>
	<div>
    
        <p>
        	<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="25%"><input type="text" class="lang_box left" id="person<?php echo $kk;?>" placeholder="Name" name="person[]" value="<?php echo $person['p_name'];?>" />
               <!-- <span class="left" id="msgmemb<?php echo $kk;?>" style="color:#F00;"></span>-->
                </td>
                <td width="8%"><select class="lang_drp right" name="age[]" id="age<?php echo $kk;?>">
                <option value="0">Age</option>
            <?php for($k=1;$k<80;$k++) { ?>
                <option value="<?php echo $k;?>" <?php echo $k==$person['p_age']?"selected=selected":"";?>><?php echo $k;?></option>   
            <?php } ?>         
            </select>
             <!--<span class="right" id="msgmemage<?php echo $kk;?>" style="color:#F00;"></span>-->
            </td>
                <td width="9%"><select class="lang_drp left" name="gender[]">
                <option value="1" <?php echo $person['p_gender']=='1'?"selected=selected":"";?>>Male</option>
                <option value="0" <?php echo $person['p_gender']=='0'?"selected=selected":"";?>>Female</option>
            </select></td>
                <td width="58%"><select class="lang_drp right" name="certificate[]">
                <option value="0">Dive Certificate</option>
                <?php foreach($certificates as $certificate) {?>
                <option value="<?php echo $certificate['id'];?>" <?php echo $certificate['id']==$person['dive_certificate_id']?"selected=selected":"";?>><?php echo $certificate['certificate'];?></option>
                <?php } ?>
            </select></td>
              </tr>
            </table>

        
            
             
        </p>
	</div>
    
<?php }?>
</div>
<?php	
}else {
?>
<div id="accordion_data">
<h3><a href="#">Member 1</a></h3>
    
    
    <div>
    
        <p>
        	<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="25%"><input type="text" class="lang_box left" placeholder="Name" name="person[]" id="person1"/></td>
                <td width="8%">
                    <select class="lang_drp right" name="age[]" id="age1">
                        <option value="0">Age</option>
						<?php for($k=1;$k<80;$k++) { ?>
                            <option value="<?php echo $k;?>"><?php echo $k;?></option>   
                        <?php } ?>         
                    </select> 
                </td>
                <td width="9%"><select class="lang_drp left" name="gender[]">
                <option value="1">Male</option>
                <option value="0">Female</option>
            </select> </td>
                <td width="58%"> <select class="lang_drp right" name="certificate[]">
                <option value="0">Dive Certificate</option>
                <?php foreach($certificates as $certificate) {?>
                <option value="<?php echo $certificate['id'];?>"><?php echo $certificate['certificate'];?></option>
                <?php } ?>
            </select></td>
              </tr>
            </table>

        
            
             
        </p>
	</div>
</div>
<?php } ?>
</div>

</fieldset>
</div>


</div>

</div>
   
					
<div class="accord_sep">&nbsp;</div>
                        <table class="privacy_table" width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td align="left" valign="middle">
                            <span id="preloader"></span>
                            <a style="cursor:pointer;" class="get_quotes_btn" onclick="goToStepOne()">Previous >></a>
                            </td>
                            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                          <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                          <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                          <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                          <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                          <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                          <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                          <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                          <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                            <td align="right" style="float:right;">
                            <span id="sloader2" style="display:none;"><img src="images/web-loader.gif" /></span>
                            </td>
                            <td align="right" valign="middle">
                            <a style="cursor:pointer;" id="memBut" class="get_quotes_btn" onclick="saveMember()">Continue >></a>
                            </td>
                          </tr>
                        </table>
<!--<a href="webview.php?control=api&task=bookingMember&tripID=<?php echo $_REQUEST['tripId']?$_REQUEST['tripId']:$_REQUEST['tripID'];?>&userID=<?php echo $_REQUEST['userId']?$_REQUEST['userId']:$_REQUEST['userID'];?>&scheduleId=<?php echo $schedules[0]['id'];?>" class="lang_button" style="text-decoration:none;"><strong>Back</strong></a>&nbsp;&nbsp;&nbsp;
<button class="lang_button"><strong>Next</strong></button>-->
        
        
        
        <input type="hidden" name="control" value="checkout"  />
        <input type="hidden" name="task" value="saveTripMembers"  />
        <input type="hidden" name="tripId" value="<?php echo $tripId;?>"  />
        <input type="hidden" name="userId" value="<?php echo $userId;?>"  />
        <input type="hidden" name="bookingId" id="bookingId" value="<?php echo $bookingId;?>"  />
        <input type="hidden" name="scheduleId" id="scheduleId" value="<?php echo $scheduleId;?>"  />
        
</form>
</div>
</div>