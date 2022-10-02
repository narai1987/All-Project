<script type="text/javascript">

function saveSchedule(){
       
	  	 	var r = document.getElementsByName("scheduleId")
			var c = -1

			for(var i=0; i < r.length; i++){
			   if(r[i].checked) {
				  c = i; 
			   }
			}
		
		if(c == -1){
				
			alert('Please Choose Date');
			return false;
				
		}else{
			
				$('#sloader').css('display','block');
				document.getElementById("closepop").className = "darkbase_bg";
				document.getElementById("ajax_loader").style.display="block";
				setTimeout("saveTask();",2000);	
			}	
			
		
	  return false;
	
	}

function saveTask(){
$.ajax({
        			type: 'POST',
       				 url: 'ajax.php?control=checkout&task=memberStep',
        			data: $("#frmSchedule").serialize(),
         			success: function (data) {
						//$('#ajax_newsletter_form').before(data);
						$('#getMember').html(data);
						document.getElementById('closepop').className = "clspop";	
						
						( $('#getSchedule').stop(true, true).fadeOut( 600 ), $('#stponeli').removeClass( 'st-open' ).stop().animate({
							height	: $('#stponeli').data( 'originalHeight' )
						}, 600, 'easeInOutExpo' ) )
						
			
						( $('#getMember').stop(true, true).fadeIn( 600 ), $('#stptwoli').addClass( 'st-open' ).stop().animate({
							height	: $('#stptwoli').data( 'originalHeight' ) + $('#stptwoli').find('div.st-content').outerHeight( true )
						}, 600, 'easeInOutExpo' ), $('html, body').stop().animate({
						scrollTop	: ( true ) ? $('#stptwoli').data( 'offsetTop' ) : $('#stptwoli').offset().top
						}, 900, 'easeInOutExpo' ) )	
						
						
						
        			 
					 
					 
					 },
      			});
}

function radioClick(){
	$.ajax({
			type: 'POST',
			 url: 'ajax.php?control=checkout&task=memberStep',
			data: $("#frmSchedule").serialize(),
			success: function (data) {
				$('#getMember').html(data);
				
			 },
	 });
}


</script>

<div class="st-content" id="getSchedule">

<form name="frmSchedule" id="frmSchedule" action="ajax.php?control=checkout&task=memberStep" method="post" >
<div class="my_account">
<div class="booktrip">
	<table width="100%" cellpadding="0" cellspacing="0" class="tab_button">
    	<tr>
        	<th align="left">#</th>
        	<th align="left">Start</th>
        	<th align="left">End</th>
        	<th align="left">Booking Staus</th>
        </tr>
        <?php
		 foreach($results as $result) { ?>
         
         
    	<tr>
        	<td><input id="scheduleId<?php echo $result['id']; ?>" type="radio" name="scheduleId" value="<?php echo $result['id'];?>" <?php echo ($data[$result['id']]['status']=="Pending" or $data[$result['id']]['status']=="Running" or $data[$result['id']]['status']=="Completed")?"disabled":"";?> <?php if(($result['id']==$_REQUEST['schId']) and (($data[$result['id']]['status']!="Pending") and ($data[$result['id']]['status']!="Running") and ($data[$result['id']]['status']!="Completed"))) { echo "checked";} ?> onclick="radioClick()"></td>
        	<td><?php echo date("jS F, Y g:i A ",strtotime($result['start_date']));?></td>
        	<td><?php echo date("jS F, Y g:i A",strtotime($result['end_date']));?></td>
        	<td><?php echo $data[$result['id']]['status']?ucfirst($data[$result['id']]['status']):"Open";?></td>
        </tr>
        <?php }?>
    </table>

</div>
</div>
   

				<div class="accord_sep">&nbsp;</div>
                        <table class="privacy_table" width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                          <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                          <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
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
                            <span id="sloader" style="display:none;"><img src="images/web-loader.gif" /></span>
                            </td>
                            <td align="right" valign="middle">
                            
                            <a style="cursor:pointer;" class="get_quotes_btn" onclick="saveSchedule()">Continue >></a>
                            </td>
                          </tr>
                        </table>
        
        <input type="hidden" name="tripId" value="<?php echo $_REQUEST['trip_id'];?>"  />
        <input type="hidden" name="userId" id="userId" value="<?php echo $userId;?>"  />
        <input type="hidden" name="bookingId" id="bookingId" value="<?php echo $_REQUEST['bookingId'];?>"  />
</form>

        <div class="clr"></div>
                </div>