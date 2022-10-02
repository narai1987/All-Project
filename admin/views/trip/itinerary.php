
<div class="breadcrumbs">
	<div class="bread_heading f_left">Trips</div>
    <div class="bread_links f_right"><a href="index.php?control=trip">Trips</a>/<a href="index.php?control=trip&task=schedule&trip_id=<?php echo $_REQUEST['tripId']; ?>">Time shedule</a>/<a class="bread_active" >Itinerary</a></div>
</div>
<link rel="stylesheet" href="styles/alertmessage.css" />
<script type="text/javascript">
setTimeout("closeMsg('closeid2')",25000);
function closeMsg(clss) {
		document.getElementById(clss).className = "clspop";
	}
</script>
<!--for alert message start-->
<style type="text/css">
.clspop {
	display:none;
}
.darkbase_bg {
	display:block !important;
}
</style>
<!--POPUP MESSAGE-->
<?php 
      if (isset($_SESSION['error']))
{
?>
<div id="flashMessage" class="message">
  <div  class='darkbase_bg' id='closeid2'>
    <div class='alert_pink' > <a class='pop_close'> <img src="images/close.png" onclick="closeMsg('closeid2')" title="close" /> </a>
      <div class='pop_text warn_red'><!--warn_red-->
        <p style='color:#063;'><?php echo $_SESSION['error']; ?></p>
      </div>
    </div>
  </div>
</div>
<?php  
  unset($_SESSION['error']);
  unset($_SESSION['errorclass']);
  }?>
<!--POPUP MESSAGE CLOSE-->

<link rel="stylesheet" href="assets/calender/newCal/jquery-ui.css" />
<script src="assets/calender/newCal/jquery-1.9.1.js"></script> 
<script src="assets/calender/newCal/jquery-ui.js"></script> 
<script type="text/javascript">
jQuery.noConflict();
  jQuery(function($) {
    $( "#fromd" ).datepicker({
		dateFormat:"yy-mm-dd",	
      changeMonth: true,
      changeYear: true,
      onClose: function( selectedDate ) {
        $( "#tod" ).datepicker( "option", "minDate", selectedDate );
      }
    });
    $( "#tod" ).datepicker({
		dateFormat:"yy-mm-dd",
      changeMonth: true,
      changeYear: true,
      onClose: function( selectedDate ) {
        $( "#fromd" ).datepicker( "option", "maxDate", selectedDate );
      }
    });
  });
  
  
  </script>
<div class="detail_right right">
  <div class="detail_container ">
    <div class="head_cont">
      <h2 class="main_head">
        <table width="99%">
          <tr>
            <td width="85%" class="main_txt">Itinerary <?php echo $keyword['tinerary'];?></td>
            <td><!--<a href="#" class="button"><img src="images/add_new.png" alt="add new" /></a>--></td>
          </tr>
        </table>
      </h2>
    </div>
    <div class="grid_container">
      <div class="main_collaps">
        <?php
        if($itinerary_update_status) {
			?>
        <form action="index.php" method="post" enctype="multipart/form-data" name="formBoat" id="formBoat" onsubmit="return itineraryValidate();" >
          <?php } ?>
          <div style="width:100%; height:auto;"> 
            
            <!--TOP TABING START HERE--><br />

            <div class='tab-container'>
              <ul class='etabs'>
                <li class='tab' id="tabb1" style="width:100%;"><a href="#collapsDiv" onclick="collapsDiv('1')"> Open</a></li>
                <li class='tab' id="tabb2" style="display:none;"><a href="#collapsDiv1" onclick="collapsDiv('2')"> Close</a></li>
              </ul>
              <div class='panel-container'>
                <div id="collapsDiv" class="pans">
                  <table width="97%" cellpadding="0" cellspacing="4">
                    <tr>
                      <td align="right" width="15%"><strong><em class="star_red">*</em> Departure Country :</strong></td>
                      <td width="24%"><?php echo $c_country['id'];?>
                        <select class="lang_box" disabled="disabled" name="current_country" id="current_country" <?php echo $last_origin_country?"":""?>   onchange="selectCity(this.value,'departure_place')">
                          <option value="" >Select Country</option>
                          <?php
							foreach($countrys as $c_country) {
								?>
                          <!--	<option value="<?php echo $c_country['id'];?>" <?php echo ($c_country['id']==$origin_country)?"selected=selected":"";?> ><?php echo $c_country['country'];?></option>-->
                          <option value="<?php echo $c_country['id'];?>" <?php echo ($c_country['id']==$origin_country)?"selected=selected":"";?> ><?php echo $c_country['country'];?></option>
                          <?php
							}
							?>
                        </select>
                        <br />
                        <span id="msgcurrent_country" style="color:red;" class="font"></span></td>
                      <td align="right" width="15%"><strong><em class="star_red">*</em>Reached Country  :</strong></td>
                      <td width="19%"><select class="lang_box" name="new_country" id="new_country" onchange="selectCity(this.value,'arrival_place')">
                          <option value="" >Select Country</option>
                          <?php
							foreach($countrys as $c_country) {
								?>
                          <option value="<?php echo $c_country['id'];?>" <?php echo ($c_country['id']==($results[0]['arrival_country_id'])?"selected=selected":"");?> ><?php echo $c_country['country'];?></option>
                          <?php
							}
							?>
                        </select>
                        <br />
                        <span id="msgnew_country" style="color:red;" class="font"></span></td>
                    </tr>
                    <tr>
                      <td align="right" width="15%"><strong><em class="star_red">*</em> Departure From :</strong></td>
                      <td width="24%"><select class="lang_box" disabled="disabled" name="departure_place" id="departure_place" >
                          <option value="" >Select Origin</option>
                          <?php
							foreach($origins as $origin) {
								?>
                          <option value="<?php echo $origin['id'];?>" <?php echo ($origin['id']==(($results[0]['departure_place'])?($results[0]['departure_place']):($origin_city)))?"selected=selected":"";?> ><?php echo $origin['city'];?></option>
                          <?php
							}
							?>
                        </select>
                        <br />
                        <span id="msgdeparture_place" style="color:red;" class="font"></span></td>
                      <td align="right" width="12%"><strong><em class="star_red">*</em>Reached To  :</strong></td>
                      <td width="19%"><select class="lang_box" name="arrival_place" id="arrival_place">
                          <option value="" >Select Destination</option>
                          <?php
							foreach($destinations as $destination) {
								?>
                          <option value="<?php echo $destination['id'];?>" <?php echo ($destination['id']==$results[0]['arrival_place'])?"selected=selected":"";?> ><?php echo $destination['city'];?></option>
                          <?php
							}
							?>
                        </select>
                        <br />
                        <span id="msgarrival_place" style="color:red;" class="font"></span></td>
                    </tr>
                    <tr>
                      <td align="right" width="15%"><strong><em class="star_red">*</em> Itinerary Date :</strong></td>
                      <td width="24%"><input type="text" disabled="disabled" name="itinerary_date" id="tod" value="<?php echo date("Y-m-d",strtotime($results[0]['itinerary_date']?$results[0]['itinerary_date']:$start_date));?>" class="reg_txt" readonly="readonly"/>
                        <br />
                        <span id="msgtod" style="color:red;" class="font"></span></td>
                      <td align="right" width="12%"><strong><em class="star_red">*</em> Travel Time :</strong></td>
                      <td width="19%"><?php $travelTimes = explode(":",$results[0]['travel_time']);
					  ?>
                        <input type="text" name="travel_hour" id="travel_hour" class="reg_txt" placeholder="Hour" value="<?php echo $travelTimes[0];?>" style="width:50px !important;" onkeyup="numeric(this.value); calculate_arrival_time()" />
                        <select class=""  name="travel_min" id="travel_min" style="width:44px !important;" onchange="calculate_arrival_time()">
                          <option value="" >Min</option>
                          <?php
							for($i=0;$i<=59;$i++) {
                                if($i%5==0) {
								?>
                          <option value="<?php echo $i;?>" <?php echo ($i==$travelTimes[1])?"selected=selected":"";?> ><?php echo $i;?></option>
                          <?php
								}
							}
							?>
                        </select>
                        <br />
                        <span id="msgtravel_hour" style="color:red;" class="font"></span></td>
                    </tr>
                    <tr>
                      <td align="right" width="15%"><strong><em class="star_red">*</em> Departure Time :</strong></td>
                      <td width="24%"><?php
					  	$time_departure = explode(":",($results[0]['departure_time'])?($results[0]['departure_time']):($data['departure_time']));	
											
					  ?>
                        <select class="" <?php echo ($dissabled_time)?"":"disabled=disabled";?> name="departure_hour" id="departure_hour"  onchange="calculate_arrival_time()">
                          <option value="" >Hour</option>
                          <?php
							for($i=0;$i<=12;$i++) {
								?>
                          <option value="<?php echo $i;?>" <?php echo ($time_departure[0]==$i)?"selected=selected":"";?> ><?php echo $i;?></option>
                          <?php
							}
							?>
                        </select>
                        <select class="" <?php echo $dissabled_time?"":"disabled=disabled";?> name="departure_min" id="departure_min"  onchange="calculate_arrival_time()">
                          <option value="" >Min</option>
                          <?php
							for($i=0;$i<=59;$i++) {
                                if($i%5==0) {
								?>
                          <option value="<?php echo $i;?>" <?php echo ($i==$time_departure[1])?"selected=selected":"";?> ><?php echo $i;?></option>
                          <?php
								}
							}
							?>
                        </select>
                        <select class="" <?php echo $dissabled_time?"":"disabled=disabled";?> name="departure_format" id="departure_format"  onchange="calculate_arrival_time()">
                          <option value="AM" <?php echo ("AM"==$time_departure[2])?"selected=selected":"";?> >AM</option>
                          <option value="PM" <?php echo ("PM"==$time_departure[2])?"selected=selected":"";?>  >PM</option>
                        </select>
                        <br />
                        <span id="msgdeparture_hour" style="color:red;" class="font"></span></td>
                      <td align="right" width="12%"><strong><em class="star_red">*</em>Arrival Time :</strong></td>
                      <td width="19%"><?php
					  	$time_arrival = explode(":",$results[0]['arrival_time']);						
					  ?>
                        <select class="" disabled="disabled" name="arrival_hour" id="arrival_hour">
                          <option value="" >Hour</option>
                          <?php
							for($i=0;$i<=12;$i++) {
								?>
                          <option value="<?php echo $i;?>" <?php echo ($i==$time_arrival[0])?"selected=selected":"";?> ><?php echo $i;?></option>
                          <?php
							}
							?>
                        </select>
                        <select class="" disabled="disabled" name="arrival_min" id="arrival_min">
                          <option value="" >Min</option>
                          <?php
							for($i=0;$i<=59;$i++) {
                                if($i%5==0) {
								?>
                          <option value="<?php echo $i;?>" <?php echo ($i==$time_arrival[1])?"selected=selected":"";?> ><?php echo $i;?></option>
                          <?php
								}
							}
							?>
                        </select>
                        <select class="" disabled="disabled" name="arrival_format" id="arrival_format">
                          <option value="AM" <?php echo ("AM"==$time_arrival[2])?"selected=selected":"";?> >AM</option>
                          <option value="PM" <?php echo ("PM"==$time_arrival[2])?"selected=selected":"";?>>PM</option>
                        </select>
                        <br />
                        <span id="msgarrival_hour" style="color:red;" class="font"></span></td>
                    </tr>
                    
                      <td align="right" width="15%"><strong><em class="star_red">*</em> No of Dives :</strong></td>
                      <td width="24%"><select class="lang_box" name="no_of_dive" id="no_of_dive">
                          <option value="" >Select </option>
                          <?php for($k=1;$k<=20;$k++) { ?>
                          <option value="<?php echo $k;?>" <?php if($results[0]['no_of_dive']==$k) {?> selected="selected" <?php }?> ><?php echo $k;?></option>
                          <?php } ?>
                        </select>
                        <br />
                        <span id="msgno_of_dive" style="color:red;" class="font"></span></td>
                      <td align="right" width="12%"><strong><em class="star_red">*</em>Stay Hours :</strong></td>
                      <td width="19%"><select class="lang_box" name="stay_hour" id="stay_hour">
                          <option value="" >Stay Hours</option>
                          <?php for($kk=1;$kk<=24;$kk++) { ?>
                          <option value="<?php echo $kk;?>" <?php echo ($kk==$results[0]['stay_hour'])?"selected=selected":"";?>  ><?php echo $kk;?></option>
                          <?php } ?>
                        </select>
                        <br />
                        <span id="msgstay_hour" style="color:red;" class="font"></span></td>
                    </tr>
                  </table>
                  <div id="accordion_data">
                    <?php foreach($results1 as $language) { ?>
                    <h3><a href="#"><?php echo $language['content'];?></a></h3>
                    <fieldset >
                      <div  class="pans">
                        <table width="97%" cellpadding="0" cellspacing="4">
                          <tr>
                            <td align="right" width="20%"><strong><em class="star_red">*</em> Night Schedule<?php echo $keyword['night_schedule'];?> :</strong></td>
                            <td width="29%"><textarea class="lang_box" name="night_schedule<?php echo $language['id'];?>" id="night_schedule<?php echo $language['id'];?>" ><?php echo $results['content'][$language['id']]['night_schedule'];?></textarea>
                              <br />
                              <span id="msgnight_schedule1" style="color:red;" class="font"></span></td>
                          <tr>
                            <td align="right" width="12%"><strong><em class="star_red">*</em>Detail<?php echo $keyword['detail'];?> :</strong></td>
                            <td width="25%"><textarea class="lang_box" id="detail<?php echo $language['id'];?>" name="detail<?php echo $language['id'];?>"><?php echo $results['content'][$language['id']]['detail'];?></textarea>
                              <br />
                              <span id="msgdetail1" style="color:red;" class="font"></span></td>
                          </tr>
                        </table>
                      </div>
                    </fieldset>
                    <?php } ?>
                  </div>
                  <table width="100%" cellpadding="0" cellspacing="0">
                    <tr>
                      <td width="70%">&nbsp;</td>
                      <td align="center" ><?php
							if($itinerary_update_status) {
								?>
                        <button class="lang_button"><strong>Submit</strong></button>
                        <button class="lang_button_re" type="reset" onclick="reseItin()">&nbsp; <strong>Reset</strong></button>
                        <?php } ?></td>
                    </tr>
                  </table>
                </div>
                <div id="collapsDiv1"></div>
              </div>
            </div>
            <!--TOP TABING END HERE--> 
          </div>
          <input type="hidden" name="control" value="trip"/>
          <input type="hidden" name="task" value="saveItinerary"/>
          <input type="hidden" name="tripId" id="" value="<?php echo $tripID; ?>"  />
          <input type="hidden" name="scheduleId" id="" value="<?php echo $scheduleID; ?>"  />
          <input type="hidden" name="tripItineraryID" id="" value="<?php echo $tripItineraryID; ?>"  />
          <?php
        if($itinerary_update_status) {
			?>
        </form>
        <?php }?>
      </div>
    </div>
    <br />
<br />

    <!--GRID START HERE FOR ITINERARY-->
    <div class="grid_container" id="mmm">
      <table width="99%" cellpadding="0" cellspacing="0" class="grid">
        <tr>
          <td class="tr_haed" width="8%" align="center"><strong>S.No.</strong></td>
          <td class="tr_haed" width="20%"><strong>Departure From</strong></td>
          <td class="tr_haed" width="20%"><strong>Arrival From</strong></td>
          <td class="tr_haed" width="20%"><strong>Itinerary Date</strong></td>
          <td class="tr_haed" width="20%"><strong>Itinenary Start Time</strong></td>
          <td class="tr_haed" align="center"><strong>Action</strong></td>
        </tr>
        <?php 
$i=0; 
if(count($itinerarys)) {
	foreach($itinerarys as $itinerary){ 
	$i++;
	$dparture = $this->cityById($itinerary['departure_place']);
	$arrival = $this->cityById($itinerary['arrival_place']);
	($i%2==0)? $class="tr_line2 grd_pad" : $class="tr_line1 grd_pad";
?>
        <tr>
            
        <td  align="center"> <?php echo $i; ?>  )</td>
          <td ><?php echo $dparture; ?></td>
          <td ><?php echo $arrival; ?></td>
          <td ><?php echo $itinerary['itinerary_date']; ?></td>
          <td ><?php echo $itinerary['departure_time']; ?></td>
          <td  align="center"><a href="index.php?control=trip&task=itinerary&tripItineraryID=<?php echo $itinerary['id'] ; ?>&tripId=<?php echo $itinerary['trip_id'] ; ?>&scheduleId=<?php echo $itinerary['trip_schedule_id'] ; ?>" class="button"><img src="images/edit.png" alt="edit" title="Edit" /></a>
            <?php if($itinerary['status']==0) {?>
            
            <!--<a href="index.php?control=trip&view=trip&task=publish&id=<?php echo $itinerary['id']; ?>" class="button">
<img src="images/backend/check_de.png" title="Click to Publish"/>
</a>-->
            
            <?php }?>
            <?php if($itinerary['status']==1) {?>
            
            <!--<a href="index.php?control=trip&view=trip&task=unpublish&id=<?php echo $itinerary['id']; ?>" class="button">
<img src="images/backend/check.png" title="Click to Unpublish"/>
</a>-->
            
            <?php } ?>
            
            <!--<a href="index.php?control=trip&task=delete&id=<?php echo $itinerary['id']; ?>" onclick="javascript:confirm('Are you sure you want to Delete ')" ><img src="images/backend/del.png" alt="Delete" title="Delete" /></a>--></td>
        </tr>
        <?php } }else{ ?>
        <tr>
          <td  colspan="6" align="center"><strong>Data not found.</strong></td>
        </tr>
        <?php } ?>
      </table>
    </div>
    <!--GRID END HERE FOR ITINERARY--> 
    
  </div>
</div>
<script type="text/javascript">
				var strstr = 2;
                function collapsDiv(str){
					var divTabbId = "tabb"+str;
					document.getElementById(divTabbId).style.display = "none";
					divTabbId = "tabb"+strstr;
					document.getElementById(divTabbId).style.display = "block";
					strstr = str;
                }
				
	
function itineraryValidate(){
			var chk=1;
	     
		   if(document.getElementById('current_country').value == '') { 
			document.getElementById('msgcurrent_country').innerHTML ="*Required field.";
			chk=0;
			}else {
			document.getElementById('msgcurrent_country').innerHTML = "";
			}
			
		   if(document.getElementById('new_country').value == '') { 
			document.getElementById('msgnew_country').innerHTML ="*Required field.";
			chk=0;
			}else {
			document.getElementById('msgnew_country').innerHTML = "";
			}	
			
		   if(document.getElementById('departure_place').value == '') { 
			document.getElementById('msgdeparture_place').innerHTML ="*Required field.";
			chk=0;
			}else {
			document.getElementById('msgdeparture_place').innerHTML = "";
			}
			
		   if(document.getElementById('arrival_place').value == '') { 
			document.getElementById('msgarrival_place').innerHTML ="*Required field.";
			chk=0;
			}else {
			document.getElementById('msgarrival_place').innerHTML = "";
			}
			// TRAVEL TIME
		   if(document.getElementById('travel_hour').value == '') { 
			document.getElementById('msgtravel_hour').innerHTML ="*Required field.";
			chk=0;
			}else {
			document.getElementById('msgtravel_hour').innerHTML = "";
			}
			// TRAVEL TIMEEND
		   if(document.getElementById('departure_hour').value == '' || document.getElementById('departure_min').value == '') { 
			document.getElementById('msgdeparture_hour').innerHTML ="*Required field.";
			chk=0;
			}else {
			document.getElementById('msgdeparture_hour').innerHTML = "";
			}
			
			
		   if(document.getElementById('arrival_hour').value == '' || document.getElementById('arrival_min').value == '') {  
			document.getElementById('msgarrival_hour').innerHTML ="*Required field.";
			chk=0;
			}else {
			document.getElementById('msgarrival_hour').innerHTML = "";
			}
			
		   if(document.getElementById('tod').value == '') { 
			document.getElementById('msgtod').innerHTML ="*Required field.";
			chk=0;
			}else {
			document.getElementById('msgtod').innerHTML = "";
			}
			
		   if(document.getElementById('no_of_dive').value == '') { 
			document.getElementById('msgno_of_dive').innerHTML ="*Required field.";
			chk=0;
			}else {
			document.getElementById('msgno_of_dive').innerHTML = "";
			}
			
		   if(document.getElementById('stay_hour').value == '') { 
			document.getElementById('msgstay_hour').innerHTML ="*Required field.";
			chk=0;
			}else {
			document.getElementById('msgstay_hour').innerHTML = "";
			}
			
		   if(document.getElementById('night_schedule1').value == '') { 
			document.getElementById('msgnight_schedule1').innerHTML ="*Required field.";
			chk=0;
			}else {
			document.getElementById('msgnight_schedule1').innerHTML = "";
			}
			
		   if(document.getElementById('detail1').value == '') { 
			document.getElementById('msgdetail1').innerHTML ="*Required field.";
			chk=0;
			}else {
			document.getElementById('msgdetail1').innerHTML = "";
			}
			
				
		if(chk) {	
		document.getElementById('current_country').disabled = false;
		document.getElementById('departure_place').disabled = false;
		document.getElementById('tod').disabled = false;
		
		document.getElementById('departure_hour').disabled = false;
		document.getElementById('departure_min').disabled = false;
		document.getElementById('departure_format').disabled = false;
		
		document.getElementById('arrival_hour').disabled = false;
		document.getElementById('arrival_min').disabled = false;
		document.getElementById('arrival_format').disabled = false;
		
			return true;
		}
		else {
			return false;		
		}			
		
	}
				
	function reseItin() {
		
	document.getElementById('msgcurrent_country').innerHTML = "";	
	document.getElementById('msgnew_country').innerHTML = "";	
	document.getElementById('msgdeparture_place').innerHTML = "";	
	document.getElementById('msgarrival_place').innerHTML = "";	
	document.getElementById('msgdeparture_hour').innerHTML = "";
	document.getElementById('msgarrival_hour').innerHTML = "";
	document.getElementById('msgtod').innerHTML = "";
	document.getElementById('msgno_of_dive').innerHTML = "";
	
	document.getElementById('msgstay_hour').innerHTML = "";	
	document.getElementById('msgnight_schedule1').innerHTML = "";	
	document.getElementById('msgdetail1').innerHTML = "";	
	}
	
	function numeric(sText) {
		var ValidChars = "0123456789";
		var IsNumber=true; 
		var Char;
		for (var i = 0; i < sText.length && IsNumber == true; i++) { 
			Char = sText.charAt(i); 
			if (ValidChars.indexOf(Char) == -1) {    
				IsNumber = false;
			}
		}
		if(IsNumber==false) {
			document.getElementById("travel_hour").value = '';
		}
	}		
	
	function calculate_arrival_time() {
		var dHour = document.getElementById("departure_hour").value;
		var dMin = document.getElementById("departure_min").value;
		var dFormat = document.getElementById("departure_format").value;
		
		
		var tHour = document.getElementById("travel_hour").value;
		var tMin = document.getElementById("travel_min").value;
		
		var nMin = Number(dMin) + Number(tMin);
		var addHour = nMin>=60?1:0;
		nMin = (nMin>=60)?(nMin%60):(nMin);
		var nHour = Number(dFormat=="PM"?(Number(dHour) + 12):Number(dHour)) + Number(tHour) + Number(addHour);
		var nFormat = '';
		if(nHour>=24) {
			nHour = nHour%24;
			if(nHour>=12) {
				nHour = nHour%12;
				
				nFormat = "PM";
			}
			else {
				
				nFormat = "AM";
			}
		}
		else {
		
			if(nHour>=12) {
				nHour = nHour%12;
				
				nFormat = "PM";
			}
			else {
				
				nFormat = "AM";
				
			}
		}
		//alert(nFormat);
		
		document.getElementById("arrival_hour").value = nHour;
		document.getElementById("arrival_min").value = nMin;
		document.getElementById("arrival_format").value = nFormat;	
		
	}
	 </script> 
