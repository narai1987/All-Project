

<div id="container">
<div id="content">
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
</div>
</div>
        
    