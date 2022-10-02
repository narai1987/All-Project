
<div class="st-content" id="getMember">

	<div id="container">
<div id="content">
<form name="frmMember" action="webview.php" method="post" onsubmit="return bMember();">
<div class="my_account">
<div class="booktrip">
<h2><span>Trip (Members)</span></h2>
<p><!--<select class="date_trip left" name="start_date" id="start_date" onChange="tripDateTime(this.value,'1','<?php echo $_REQUEST['tripId'];?>')">
<option value="0">Start Date</option>
<?php foreach($schedules as $schedule) { ?>
<option value="<?php echo $schedule['id'];?>" <?php echo $schedule['id']==$bookings[0]['trip_schedule_id']?"selected=selected":"";?>><?php echo $schedule['start_date'];?></option>
<?php }?>
</select>
<select class="date_trip right" name="end_date" id="end_date" onChange="tripDateTime(this.value,'2','<?php echo $_REQUEST['tripId'];?>')">
<option value="0">End Date</option>
<?php foreach($schedules as $schedule) { ?>
<option value="<?php echo $schedule['id'];?>" <?php echo $schedule['id']==$bookings[0]['trip_schedule_id']?"selected=selected":"";?>><?php echo $schedule['end_date'];?></option>
<?php }?>
</select> -->
<strong>Start Date : <?php echo date("jS F, Y g:i A ",strtotime($schedules[0]['start_date']));?></strong> 
<strong style="float:right;">End Date : <?php echo date("jS F, Y g:i A ",strtotime($schedules[0]['end_date']));?></strong>
</p>
<p style="clear:both;">
<span id="sdate" style="color:#F00;"></span>
</p>
<div class="scedule">
<fieldset class="bookField">
<legend>Member/Person</legend>
<table cellspacing="0" cellpadding="0" class="tabls">
<tr>
<td width="30%">No. of Adults:</td>
<td><select class="person" name="adult" id="adult" onChange="divPerson(this.value,child.value)">
<?php for($i=0;$i<20;$i++){ ?>
<option value="<?php echo $i;?>" <?php echo $i==$bookings[0]['no_of_person']?"selected=selected":"";?>><?php echo $i;?></option>
<?php }?>
</select><br />

<span id="msgperson" style="color:#F00;"></span></td>
</tr>

<tr>
<td width="30%">No. of Child:</td>
<td><select class="person" name="child" id="child" onChange="divPerson(adult.value,this.value)">
<?php for($i=0;$i<20;$i++){ ?>
<option value="<?php echo $i;?>" <?php echo $i==$bookings[0]['no_of_child']?"selected=selected":"";?>><?php echo $i;?></option>
<?php }?>
</select></td>
</tr>

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
        <input type="text" class="lang_box left" id="person<?php echo $kk;?>" placeholder="Name" name="person[]" value="<?php echo $person['p_name'];?>" />
            
            <select class="lang_drp right" name="age[]" id="age<?php echo $kk;?>">
                <option value="0">Age</option>
            <?php for($k=1;$k<80;$k++) { ?>
                <option value="<?php echo $k;?>" <?php echo $k==$person['p_age']?"selected=selected":"";?>><?php echo $k;?></option>   
            <?php } ?>         
            </select> 
        </p>
        <p style="clear:both;">
        <span class="left" id="msgmemb<?php echo $kk;?>" style="color:#F00;"></span>
        <span class="right" id="msgmemage<?php echo $kk;?>" style="color:#F00;"></span>
        </p>
        <br />
        <p>
            <select class="lang_drp left" name="gender[]">
                <option value="1" <?php echo $person['p_gender']=='1'?"selected=selected":"";?>>Male</option>
                <option value="0" <?php echo $person['p_gender']=='0'?"selected=selected":"";?>>Female</option>
            </select> 
            <select class="lang_drp right" name="certificate[]">
                <option value="0">Dive Certificate</option>
                <?php foreach($certificates as $certificate) {?>
                <option value="<?php echo $certificate['id'];?>" <?php echo $certificate['id']==$person['dive_certificate_id']?"selected=selected":"";?>><?php echo $certificate['certificate'];?></option>
                <?php } ?>
            </select>
        </p>     
	</div>
<?php }?>
</div>
<?php	
}
?>
</div>

</fieldset>
</div>


</div>
</div>
   

<table width="100%" cellpadding="0" cellspacing="0" class="tab_button">
    <tr>
        <td align="right" >
<a href="webview.php?control=api&task=bookingMember&tripID=<?php echo $_REQUEST['tripId']?$_REQUEST['tripId']:$_REQUEST['tripID'];?>&userID=<?php echo $_REQUEST['userId']?$_REQUEST['userId']:$_REQUEST['userID'];?>&scheduleId=<?php echo $schedules[0]['id'];?>" class="lang_button" style="text-decoration:none;"><strong>Back</strong></a>&nbsp;&nbsp;&nbsp;<button class="lang_button"><strong>Next</strong></button>
        <input type="hidden" name="control" value="api"  />
        <input type="hidden" name="task" value="saveMember"  />
        <input type="hidden" name="tripId" value="<?php echo $_REQUEST['tripId']?$_REQUEST['tripId']:$_REQUEST['tripID'];?>"  />
        <input type="hidden" name="userId" id="userId" value="<?php echo $_REQUEST['userId']?$_REQUEST['userId']:$_REQUEST['userID'];?>"  />
        <input type="hidden" name="bookingId" id="bookingId" value="<?php echo $_REQUEST['bookingId']?$_REQUEST['bookingId']:$bookkid[0]['id'];?>"  />
        <input type="hidden" name="scheduleId" id="scheduleId" value="<?php echo $_REQUEST['scheduleId'];?>"  />
        </td>
    </tr>
    
</table>
</form>
</div>
</div>


  <div class="clr"></div>
 </div>