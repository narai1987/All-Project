<script type="text/javascript">
function schCheck(){
	
	if(document.getElementById("userId").value) {	
				var r = document.getElementsByName("scheduleId")
				var c = -1
	
				for(var i=0; i < r.length; i++){
				   if(r[i].checked) {
					  c = i; 
				   }
				}
			
				if(c == -1){
						
					alert('Please Choose Trip Schedule.');
					return false;
						
				}else{
				return true;
				}
	}else{
	alert("Please login first.");
	return false;
	}
}
</script>

<div id="container">
<div id="content">
<form name="frmsch" action="webview.php" method="post" onsubmit="return schCheck();">
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
        	<td><input id="scheduleId<?php echo $result['id']; ?>" type="radio" name="scheduleId" value="<?php echo $result['id'];?>" <?php echo ($data[$result['id']]['status']=="Pending" or $data[$result['id']]['status']=="Running" or $data[$result['id']]['status']=="Completed")?"disabled":"";?> <?php if(($result['id']==$_REQUEST['scheduleId']) and (($data[$result['id']]['status']!="Pending") and ($data[$result['id']]['status']!="Running") and ($data[$result['id']]['status']!="Completed"))) { echo "checked";} ?> ></td>
        	<td><?php echo date("jS F, Y g:i A ",strtotime($result['start_date']));?></td>
        	<td><?php echo date("jS F, Y g:i A",strtotime($result['end_date']));?></td>
        	<td><?php echo $data[$result['id']]['status']?ucfirst($data[$result['id']]['status']):"Open";?></td>
        </tr>
        <?php }?>
    </table>

</div>
</div>
   

<table width="100%" cellpadding="0" cellspacing="0" class="tab_button">
    <tr>
        <td align="right" >
<a href="webview.php?control=api&task=tripDetail&tripID=<?php echo $_REQUEST['tripId']?$_REQUEST['tripId']:$_REQUEST['tripID'];?>&userID=<?php echo $_REQUEST['userId']?$_REQUEST['userId']:$_REQUEST['userID'];?>&andruserID=<?php echo $_REQUEST['userId']?$_REQUEST['userId']:$_REQUEST['userID'];?>" class="lang_button" style="text-decoration:none;"><strong>Back</strong></a>&nbsp;&nbsp;&nbsp;<button class="lang_button"><strong>Next</strong></button>
        <input type="hidden" name="control" value="api"  />
        <input type="hidden" name="task" value="scheduleTrip"  />
        <input type="hidden" name="tripId" value="<?php echo $_REQUEST['tripId']?$_REQUEST['tripId']:$_REQUEST['tripID'];?>"  />
        <input type="hidden" name="userId" id="userId" value="<?php echo $_REQUEST['userId']?$_REQUEST['userId']:$_REQUEST['userID'];?>"  />
        <input type="hidden" name="bookingId" id="bookingId" value="<?php echo $_REQUEST['bookingId'];?>"  />
        
        </td>
    </tr>
    
</table>
</form>
</div>
</div>
<script>
function goBack()
  {
  window.history.back()
  }
</script>