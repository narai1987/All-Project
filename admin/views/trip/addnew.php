
<div class="breadcrumbs">
	<div class="bread_heading f_left">Trips</div>
    <div class="bread_links f_right"><a href="index.php?control=trip">Trips</a>/<a class="bread_active" style="text-decoration:none;">Edit Trips</a></div>
</div>
<link rel="stylesheet" href="styles/alertmessage.css" />
<script type="text/javascript">
//setTimeout("closeMsg('closeid2')",5000);
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

<?php 
      if (isset($_SESSION['error']))
{  ?>

<script type="text/javascript">
$( document ).ready(function() {
document.getElementById("closeid2").className = "darkbase_bg";
});
</script>

<?php } ?>

  <!--POPUP MESSAGE-->
  
  <div id="flashMessage" class="message">
    <div  class='clspop' id='closeid2'>
      <div class='alert_pink' > <a class='pop_close'> <img src="images/close.png" onclick="closeMsg('closeid2')" title="close" /> </a>
        <div id="popmsgclass" class='pop_text warn_red<?php echo $_SESSION['errorclass']; ?>' style="background: #f7d9d9 no-repeat 10px center !important;"><!--warn_red-->
          <p style='color:#063;' id="popmsg"><?php echo $_SESSION['error']; ?></p>
          <p id="popbutton" align="center"></p>
        </div>
      </div>
    </div>
  </div>
  <?php  
  unset($_SESSION['error']);
  unset($_SESSION['errorclass']);
 ?>
  <!--POPUP MESSAGE CLOSE-->


<?php require_once('viewboatPopup.php'); ?>

<style type="text/css">
:disabled
{
background:#F7F7F7;
}
.textWidth {
	width:160px !important;	
}
</style>
<script src="assets/viewJs/ViewValidation.js"></script>
<link rel="stylesheet" href="assets/calender/newCal/jquery-ui.css" />
	<script src="assets/calender/newCal/jquery-1.9.1.js"></script>
    <script src="assets/calender/newCal/jquery-ui.js"></script>
<script type="text/javascript">

function fillBoatsByPrice(boatPriceRange){

document.getElementById("viewBoat").style.display = "none";	
	$.ajax({
		url:"ajax.php?control=trip&task=fillBoats&triptype="+$('#trip_type_id').val()+"&boatPriceRange="+boatPriceRange,
		success:function(status){
			$("#boat_id").html(status);
			document.getElementById("trip_price").value = "";
		}
	});	
	
	
	if($('#trip_type_id').val() == 2){
		$("#tod").attr('disabled',true);
		$("#tod").val($("#fromd").val());
	}
	else{
		$("#tod").attr('disabled',false);
	}
}


function checkTripType(tripType){
	
	document.getElementById("viewBoat").style.display = "none";	
	$.ajax({
		url:"ajax.php?control=trip&task=fillBoats&triptype="+tripType+"&boatPriceRange="+$('#boat_range').val(),
		success:function(status){
			$("#boat_id").html(status);
			document.getElementById("trip_price").value = "";
		}
	});	
	
	
	if(tripType == 2){
		$("#tod").attr('disabled',true);
		$("#tod").val($("#fromd").val());
	}
	else{
		$("#tod").attr('disabled',false);
	}
	
}



jQuery.noConflict();
  
  jQuery(function($) {
   
    $( "#fromd" ).datepicker({
		dateFormat:"yy-mm-dd",	
      changeMonth: true,
      changeYear: true,
      minDate: "<?php echo date("Y-m-d") ?>",
      onClose: function( selectedDate ) {
        $( "#tod" ).datepicker( "option", "minDate", selectedDate );
		$("#tod").val($("#fromd").val());
      }
    });
	
	
    $( "#tod" ).datepicker({
		dateFormat:"yy-mm-dd",
      changeMonth: true,
      changeYear: true,
      minDate: "<?php echo date("Y-m-d") ?>",
      onClose: function( selectedDate ) {
        $( "#fromd" ).datepicker( "option", "maxDate", selectedDate );
      }
    });
	
	
  });
  
  
  </script>
  
  
<?php
	$e = 1;
 foreach($equipments AS $equipment): 
	if($e == 1)
	$validationEquipArr .= $equipment['id'];
	else
	$validationEquipArr .= ",".$equipment['id'];
	$e++;
	endforeach;
?>  
  
  
  
<?php
	$t = 1;
 foreach($fuel_tanks AS $tank): 
	if($t == 1)
	$validationTankArr .= $tank['id'];
	else
	$validationTankArr .= ",".$tank['id'];
	$t++;
	endforeach;
?>  
 
 
 <?php
	$b = 1;
 foreach($beverages AS $beverage): 
	if($b == 1)
	$validationBeverageArr .= $beverage['id'];
	else
	$validationBeverageArr .= ",".$beverage['id'];
	$b++;
	endforeach;
?>

<?php
	$f = 1;
 foreach($foods AS $food): 
	if($f == 1)
	$validationFoodArr .= $food['id'];
	else
	$validationFoodArr .= ",".$food['id'];
	$f++;
	endforeach;
?>   
  
  
<div class="detail_right right">
    <div class="detail_container ">
      <div class="head_cont">
        <h2 class="main_head">
          <table width="99%">
            <tr>
              <td width="85%" class="main_txt">
                <?php if($results['common'][0]->id=='') { echo "Add New Trips"; } else {echo "Edit Trips";} ?>   
              </td>
              <td><!--<a href="#" class="button"><img src="images/add_new.png" alt="add new" /></a>--></td>
            </tr>
          </table>
        </h2>
      </div>
      <div class="grid_container">
        <div class="main_collaps">
          <form action="index.php" method="post" enctype="multipart/form-data" name="formBoat" id="formBoat" onsubmit="return tripaddValidate();" >
            <div style="width:100%; height:auto;"> 
              <!--TOP TABING START HERE-->
              <div class='tab-container'>
              <ul class='etabs'>
                  <li class='tab'><a href="#lang0_1">General</a></li>
                  <li class='tab'><a href="#lang0_2">Scuba cylinder<!-- Fuel Tank--></a></li>
                  <!--<li class='tab'><a href="#lang0_7">Type Of Gases</a></li>-->
                  <li class='tab'><a href="#lang0_3">Diver</a></li>
                  <li class='tab'><a href="#lang0_4">Equipment</a></li>
                  <li class='tab'><a href="#lang0_17">Beverages</a></li>
                  <li class='tab'><a href="#lang0_18">Foods</a></li>
                </ul>
                
                <div class='panel-container'>
                  <div id="lang0_1" class="pans">
                    <table width="97%" cellpadding="0" cellspacing="4">
                      <tr>
                        <td align="right" width="20%"><strong><em class="star_red">*</em> Origin Country :</strong></td>
                        <td width="29%">
   <select class="lang_box textWidth" name="country_id" id="country_id" onchange="selectCity(this.value,'origin')" >
                            <option value="0" >Select Country</option>
                            <?php foreach($countries as $cn): ?>
                            <option value="<?php echo $cn['id']; ?>" <?php if($cn['id'] == $results['common'][0]->country_id){ ?> selected="selected" <?php } ?>><?php echo ucfirst($cn['country']); ?></option>
                            <?php endforeach; ?>
                          </select>
                          <br />
                        <span id="msgcountry_id" style="color:red;" class="font"></span></td>
                          <td align="right" width="15%"><strong><em class="star_red">*</em> Destination Country :</strong></td>
                      <td width="19%">
      <select class="lang_box" name="destination_country_id" id="destination_country_id" onchange="selectCity(this.value,'destination')" style="width: 85%;">
                            <option value="0" >Select Country</option>   
                            <?php foreach($countries as $cn): ?>
                            <option value="<?php echo $cn['id']; ?>" <?php if($cn['id'] == $results['common'][0]->destination_country_id){ ?> selected="selected" <?php } ?>><?php echo ucfirst($cn['country']); ?></option>
                            <?php endforeach; ?>                         
                          </select>
                           <br />
                        <span id="msgdestination_country_id" style="color:red;" class="font"></span></td>
                      </tr>
                      <tr>
                          <td align="right" width="15%"><strong><em class="star_red">*</em> Trip Origin :</strong></td>
                      <td width="24%">
                      <select class="lang_box textWidth" name="origin_id" id="origin" >
                            <option value="0" >Select Origin</option> 
                      		<?php $originCitys = $this->cityByCountryId($results['common'][0]->country_id);
								foreach($originCitys as $originCity) {
							?>
                            <option value="<?php echo $originCity['id'];?>" <?php if($originCity['id'] == $results['common'][0]->origin_id){ ?> selected="selected" <?php } ?> ><?php echo $originCity['city'];?></option> 
                            <?php } ?>                           
                          </select><br />
                        <span id="msgorigin" style="color:red;" class="font"></span>
                     </td>
                      <td align="right" width="15%"><strong><em class="star_red">*</em> Trip Destination  :</strong></td>
                      <td width="19%"><select class="lang_box textWidth" name="destination_id" id="destination">
                            <option value="0" >Select Destination</option>
                            <?php $destinationCitys = $this->cityByCountryId($results['common'][0]->destination_country_id);
								foreach($destinationCitys as $destinationCity) {
							?>
                            <option value="<?php echo $destinationCity['id'];?>" <?php if($destinationCity['id'] == $results['common'][0]->destination_id){ ?> selected="selected" <?php } ?> ><?php echo $destinationCity['city'];?></option> 
                            <?php } ?>                           
                          </select>
                          <br />
                        <span id="msgdestination" style="color:red;" class="font"></span></td>
                    </tr>
                    
                    <?php if(!$_REQUEST['id']){ ?>
                      <tr>
                        <td align="right" width="15%"><strong><em class="star_red">*</em> Start Date :</strong></td>
                        <td width="29%"><input class="lang_box  textWidth" id="fromd" value="<?php echo $results['common'][0]->start_date?date("Y-m-d",strtotime($results['common'][0]->start_date)):date("Y-m-d"); ?>" name="start_date" readonly <?php if($_REQUEST['id']){ ?> disabled="disabled" <?php } ?> /></td>
                        
                        <td align="right" width="20%"><strong><em class="star_red">*</em> End Date :</strong></td>
                        <td width="29%"><input class="lang_box" id="tod" value="<?php echo $results['common'][0]->end_date?date("Y-m-d",strtotime($results['common'][0]->end_date)):date("Y-m-d"); ?>" name="end_date" readonly <?php if($_REQUEST['id']){ ?> disabled="disabled" <?php } ?>/></td>
                      </tr>
                      <?php }else{ ?>
                    <tr>
                    <td>&nbsp;</td>
                    </tr>
                      <tr>
                        <td align="left" colspan="4"><img src="images/hand.gif" />
                         <strong style="color:#066;">&nbsp;&nbsp; To change the trip <b style="color:#900;">Start date</b> and <b style="color:#900;">End date</b> setting please go to the <b style="color:#900;">trip schedules section.</b></strong></td>
                        <input class="lang_box  textWidth" id="fromd" value="<?php echo $results['common'][0]->start_date?date("Y-m-d",strtotime($results['common'][0]->start_date)):date("Y-m-d"); ?>" name="start_date" readonly <?php if($_REQUEST['id']){ ?> disabled="disabled" <?php } ?>  type="hidden"/>
                        <input class="lang_box" id="tod" value="<?php echo $results['common'][0]->end_date?date("Y-m-d",strtotime($results['common'][0]->end_date)):date("Y-m-d"); ?>" name="end_date" readonly <?php if($_REQUEST['id']){ ?> disabled="disabled" <?php } ?> type="hidden"/>
                      </tr>
                    <tr>
                    <td>&nbsp;</td>
                    </tr>
                      <?php } ?>
                      <!--<tr>
                        <td align="right" width="20%"><strong><em class="star_red">*</em> No. of Dives :</strong></td>
                        <td><input type="text" class="lang_box" name="no_of_dives" id="no_of_dives" value="<?php echo $results['common'][0]->no_of_dives; ?>"/> <br />
                        <span id="msgno_of_dives" style="color:red;" class="font"></span></td>
                        <td align="right" width="20%"><strong><em class="star_red">*</em> No. of Days :</strong></td>
                        <td width="29%"><input type="text" class="lang_box" name="no_of_days" id="no_of_days" value="<?php echo $results['common'][0]->no_of_days; ?>"/> <br />
                        <span id="msgno_of_days" style="color:red;" class="font"></span></td>
                      </tr>-->
                      
                      
                      
                      <tr>
                        
                        <td align="right" width="15%"><strong><em class="star_red">*</em> Trip Type :</strong></td>
                        <td width="25%">
                        <select class="lang_box" name="trip_type_id" id="trip_type_id" onchange="checkTripType(this.value)">
                            <option value="0" >Select Trip type</option>
                            <?php foreach($types as $t): ?>
                            <option value="<?php echo $t['id']; ?>" <?php if($t['id'] == $results['common'][0]->trip_type_id){ ?> selected="selected" <?php } ?>><?php echo $t['trip_type']; ?></option>
                            <?php endforeach; ?>
                          </select>
                           <br />
                        <span id="msgtrip_type_id" style="color:red;" class="font"></span></td>
                        
                        <td align="right" width="15%"><strong><em class="star_red">*</em> Choose Boat :</strong></td>
                        <td width="30%"  >
                        <select class="lang_box textWidth"  name="boat_id" id="boat_id" onchange="boatOnChange();">
                            <option value="0" >Select Boat</option>
                            <?php foreach($boats as $b): ?>
                            <option value="<?php echo $b['boat_id']; ?>" <?php if($b['boat_id'] == $results['common'][0]->boat_id){ ?> selected="selected" <?php } ?>><?php echo $b['boat_name']; ?></option>
                            <?php endforeach; ?>
                          </select>
                          <img src="images/backend/Yacht.png" onclick="chooseboat()" id="viewBoat" title="View Boat Detail" style="display:none; float:right; margin-top:6px;cursor:pointer;"/>
                           <br />
                        <span id="msgboat_id" style="color:red;" class="font"></span>
                        
                        
                        </td>
                        
                      </tr>
                      
                      <tr>
                        <!--<td align="right" width="20%"><strong><em class="star_red">*</em> No. of Nights :</strong></td>
                        <td><input type="text" class="lang_box" name="no_of_nights" id="no_of_nights" value="<?php echo $results['common'][0]->no_of_nights; ?>"/> <br />
                        <span id="msgno_of_nights" style="color:red;" class="font"></span></td>-->
                        
                        <td align="right" width="15%"><strong><em class="star_red">*</em> Boat Price Range :</strong></td>
                        <td width="30%"  >
                        <select class="lang_box textWidth"  name="boat_range" id="boat_range" onchange="fillBoatsByPrice(this.value)">
                            <option value="all" <?php if($results['common'][0]->boat_price_range == 'all'){ ?> selected="selected" <?php } ?>>All Price</option>
                          <option value="low" <?php if($results['common'][0]->boat_price_range == 'low'){ ?> selected="selected" <?php } ?>>Low Price</option>
                          <option value="mid" <?php if($results['common'][0]->boat_price_range == 'mid'){ ?> selected="selected" <?php } ?>>Mid Price</option>
                          <option value="high" <?php if($results['common'][0]->boat_price_range == 'high'){ ?> selected="selected" <?php } ?>>High Price</option>
                          </select>
                         
                        
                        
                        </td>
                        
                        
                        <td align="right" width="20%"><strong><em class="star_red">*</em> Min Fee :</strong></td>
                        <td width="29%"><input type="text" class="lang_box textWidth" name="trip_price" id="trip_price" value="<?php echo $results['common'][0]->trip_price; ?>"  disabled="disabled"  /><br />
                        <span id="msgtrip_price" style="color:red;" class="font"></span></td>
                        
                        
                        
                        
                        <td width="44%" colspan="2"></td>
                      </tr>
                      <tr>
                        <td align="right" width="20%"><strong><em class="star_red">*</em> Trip Image :</strong></td>
                        <td><input type="file" class="lang_box" name="image" id="image"/><br />
                        <span id="msgimage" style="color:red;" class="font"></span></td>
                        <td align="right" width="20%"><strong><em class="star_red">*</em> Trip Gallery(multiple images) :</strong></td>
                        <td width="29%"><input type="file" class="lang_box" name="trip_gallery[]" id="trip_gallery[]" multiple="multiple"/><br />
                        <span id="msgtrip_gallery[]" style="color:red;" class="font"></span></td>
                      </tr>
                    </table>
                  </div>
                  <div id="lang0_2" class="pans">
                    <table width="97%" cellpadding="0" cellspacing="4">
                      <?php foreach($fuel_tanks as $tank): ?>
                      <tr>
                        <td align="right" width="12%"><strong><em class="star_red">*</em><?php echo $tank['fuel_tank'] ?> :</strong></td>
                        <td width="5%"><input class="lang_box" id="fuel_tank<?php echo $tank['id'] ?>" value="<?php echo $tank['id'] ?>" name="fuel_tank<?php echo $tank['id'] ?>" type="checkbox" <?php if($results['tankdata'][$tank['id']]['fuel_tank_id']==$tank['id']){ ?> checked="checked" <?php } ?> /></td>
                        
                        <td width="23%" align="right">
                      			<select class="lang_box" name="gastype<?php echo $tank['id'] ?>" id="gastype<?php echo $tank['id'] ?>" > 
                           <option value="-1">Select Gas Type</option>
                        <?php foreach($gas_types as $gas_type): ?>
                <option value="<?php echo  $gas_type['id'] ?>" <?php if($results['tankdata'][$tank['id']]['gastype']==$gas_type['id']){ ?> selected="selected" <?php } ?> ><?php echo $gas_type['gastype'] ?></option>
                      <?php endforeach; ?>
                          </select>
                        <br />
                        <span id="msggastype<?php echo $tank['id']; ?>" style="color:red;" class="font"></span>
                        </td>
                        
                        
                        
                        <td align="right" width="12%"><strong><em class="star_red">*</em> Price :</strong></td>
                        <td width="23%">
                        <!--<select class="lang_box" name="ptype<?php echo $tank['id'] ?>" id="ptype<?php echo $tank['id'] ?>" onchange="checkFuelType<?php echo $tank['id'] ?>(this.value)">-->
                        <select class="lang_box" name="ptype<?php echo $tank['id'] ?>" id="ptype<?php echo $tank['id'] ?>" > 
                           <option value="paid" <?php if($results['tankdata'][$tank['id']]['tank_price']!=0 || $results['tankdata'][$tank['id']]['tank_price']!=''){ ?> selected="selected" <?php } ?> >Paid</option>
                            <option value="free" <?php if($results['tankdata'][$tank['id']]['tank_price']==0 || $results['tankdata'][$tank['id']]['tank_price']==''){ ?> selected="selected" <?php } ?> >Free</option>
                          </select></td>
                        <td align="right" width="15%"><strong><em class="star_red">*</em> If paid(Price) :</strong></td>
                        <td width="24%"><input class="lang_box" id="fuelprice<?php echo $tank['id'] ?>" value="<?php echo $results['tankdata'][$tank['id']]['tank_price']?$results['tankdata'][$tank['id']]['tank_price']:'';?>" name="fuelprice<?php echo $tank['id'] ?>"  onkeyup="Numericchk(this.value,this.id)"/>
                        <br />
                        <span id="msgfuelprice<?php echo $tank['id']; ?>" style="color:red;" class="font"></span></td>
                      </tr>
                      <!--<script type="text/javascript">
                    function checkFuelType<?php echo $tank['id'] ?>(value){
						if(value != 'paid'){
							document.getElementById("fuelprice<?php echo $tank['id'] ?>").value = ""; 
							document.getElementById("fuelprice<?php echo $tank['id'] ?>").disabled = true;
						}else{
							document.getElementById("fuelprice<?php echo $tank['id'] ?>").disabled = false;
						}
                    }
                    </script>-->
                      <?php endforeach; ?>
                    </table>
                  </div>
                  
                  
                  <!--<div id="lang0_7" class="pans">
                    <table width="97%" cellpadding="0" cellspacing="4">
                      <?php foreach($gas_types as $gas_type): ?>
                      <tr>
                        <td align="left" width="2%"><input class="lang_box" id="gas_type<?php echo $gas_type['id'] ?>" value="<?php echo $gas_type['id'] ?>" name="gas_type<?php echo $gas_type['id'] ?>" type="checkbox" <?php if($results['gasdata'][$gas_type['id']]['gas_type_id']==$gas_type['id']){ ?> checked="checked" <?php } ?> /></td>
                        <td width="19%"><strong><em class="star_red">*</em> <?php echo $gas_type['gastype'] ?> :</strong></td>
                        
                      </tr>
                      <?php endforeach; ?>
                    </table>
                  </div>-->
                  
                  
                  
                  <div id="lang0_3" class="pans">
                    <table width="97%" cellpadding="0" cellspacing="4">
                      <tr>
                        <td align="right" width="12%"><strong><em class="star_red">*</em> Price for diver  :</strong></td>
                        <td width="19%"><select class="lang_box" name="diver" id="diver" onchange="disBox(this.value)">
                            <option value="paid"  >Paid</option>
                            <option value="free"  >Free</option>
                          </select><br />
                        <span id="msgdiver" style="color:red;" class="font"></span></td>
                        <td align="right" width="15%"><strong><em class="star_red">*</em> If paid(Price) :</strong></td>
                        <td width="24%"><input class="lang_box" id="price_for_diver" value="<?php echo $results['common'][0]->price_for_diver; ?>" name="price_for_diver"/><br />
                        <span id="msgprice_for_diver" style="color:red;" class="font"></span></td>
                      </tr>
                    </table>
                  </div>
                  <div id="lang0_4" class="pans">
                    <table width="97%" cellpadding="0" cellspacing="4">
                      <?php foreach($equipments as $equipment):
					  	$query = "";
					   ?>
                      <tr>
                        <td align="right" width="12%"><strong><em class="star_red">*</em> <?php echo $equipment['equipment'] ?> :</strong></td>
                        <td width="19%"><input class="lang_box" id="equipment_<?php echo $equipment['id']; ?>" value="<?php echo $equipment['id'] ?>" name="equipment[<?php echo $equipment['id']; ?>]" type="checkbox" <?php echo $tripEq[$equipment['id']][0]['id']?"checked":"";?> /></td>
                        <td align="right" width="12%"><strong><em class="star_red">*</em> Price :</strong></td>
                        <td width="23%">
                        <select class="lang_box" name="eqtype[<?php echo $equipment['id']; ?>]" id="eqtype<?php echo $equipment['id']; ?>" >
                            <option value="paid" <?php echo $tripEq[$equipment['id']][0]['eq_type']=="paid"?"selected":"";?>  >Paid</option>
                            <option value="free" <?php echo $tripEq[$equipment['id']][0]['eq_type']=="free"?"selected":"";?>  >Free</option>
                          </select></td>
                        <td align="right" width="15%"><strong><em class="star_red">*</em> If paid(Price) :</strong></td>
                        <td width="24%"><input class="lang_box" id="eqprice_<?php echo $equipment['id']; ?>" value="<?php echo $tripEq[$equipment['id']][0]['eq_value'];?>" name="eqprice[<?php echo $equipment['id']; ?>]" onkeyup="Numericchk(this.value,this.id)"/>
                        <br />
                        <span id="msgeqprice_<?php echo $equipment['id']; ?>" style="color:red;" class="font"></span></td>
                      </tr>
                      <?php endforeach; ?>
                    </table>
                  </div>
                  
                   <div id="lang0_17" class="pans">
                    <table width="97%" cellpadding="0" cellspacing="4">
                      <?php foreach($beverages as $beverage):
					  	$query = "";
					   ?>
                      <tr>
                        <td align="right" width="18%"><strong><em class="star_red">*</em> <?php echo $beverage['beverage'] ?> :</strong></td>
                        <td width="10%"><input class="lang_box" id="beverage_<?php echo $beverage['id']; ?>" value="<?php echo $beverage['id'] ?>" name="beverage[<?php echo $beverage['id']; ?>]" type="checkbox" <?php echo $boatBv[$beverage['id']][0]['id']?"checked":"";?> /></td>
                        <td align="right" width="12%"><strong><em class="star_red">*</em> Price :</strong></td>
                        <td width="23%">
                        <select class="lang_box" name="bvtype[<?php echo $beverage['id']; ?>]" id="bvtype<?php echo $beverage['id']; ?>">
                            <option value="paid" <?php echo $boatBv[$beverage['id']][0]['eq_type']=="paid"?"selected":"";?>  >Paid</option>
                            <option value="free" <?php echo $boatBv[$beverage['id']][0]['eq_type']=="free"?"selected":"";?>  >Free</option>
                          </select>
                         <br />
                        <span id="msgbvtype<?php echo $beverage['id']; ?>" style="color:red;" class="font"></span> 
                          </td>
                        <td align="right" width="15%"><strong><em class="star_red">*</em> If paid(Price) :</strong></td>
                        <td width="24%"><input class="lang_box" id="bvprice_<?php echo $beverage['id']; ?>" value="<?php echo $boatBv[$beverage['id']][0]['eq_value'];?>" name="bvprice[<?php echo $beverage['id']; ?>]" onkeyup="Numericchk(this.value,this.id)"/>
                        <br />
                        <span id="msgbvprice_<?php echo $beverage['id']; ?>" style="color:red;" class="font"></span>
                        </td>
                      </tr>
                      <?php endforeach; ?>
                    </table>
                  </div>
                  
                  
                  <div id="lang0_18" class="pans">
                    <table width="97%" cellpadding="0" cellspacing="4">
                      <?php foreach($foods as $food):
					  	$query = "";
					   ?>
                      <tr>
                        <td align="right" width="12%"><strong><em class="star_red">*</em> <?php echo $food['food'] ?> :</strong></td>
                        <td width="19%"><input class="lang_box" id="food_<?php echo $food['id']; ?>" value="<?php echo $food['id'] ?>" name="food[<?php echo $food['id']; ?>]" type="checkbox" <?php echo $boatFd[$food['id']][0]['id']?"checked":"";?>/></td>
                        <td align="right" width="12%"><strong><em class="star_red">*</em> Price :</strong></td>
                        <td width="23%">
                        <select class="lang_box" name="fdtype[<?php echo $food['id']; ?>]" id="fdtype<?php echo $food['id']; ?>">
                            <option value="paid" <?php echo $boatFd[$food['id']][0]['eq_type']=="paid"?"selected":"";?>  >Paid</option>
                            <option value="free" <?php echo $boatFd[$food['id']][0]['eq_type']=="free"?"selected":"";?>  >Free</option>
                          </select>
                           <br />
                        <span id="msgfdtype<?php echo $food['id']; ?>" style="color:red;" class="font"></span>
                          </td>
                        <td align="right" width="15%"><strong><em class="star_red">*</em> If paid(Price) :</strong></td>
                        <td width="24%"><input class="lang_box" id="fdprice_<?php echo $food['id']; ?>" value="<?php echo $boatFd[$food['id']][0]['eq_value'];?>" name="fdprice[<?php echo $food['id']; ?>]"  onkeyup="Numericchk(this.value,this.id)"/>
                        <br />
                        <span id="msgfdprice_<?php echo $food['id']; ?>" style="color:red;" class="font"></span></td>
                      </tr>
                      <?php endforeach; ?>
                    </table>
                  </div>
                  
                  
                 </div>
              </div>
              <!--TOP TABING END HERE--> 
            </div>
            <div id="accordion_data">
              <?php
foreach($results1 as $language) {
	
?>
              <h3><a href="#"><?php echo $language['content'];?></a></h3>
              <fieldset >
               
                <div  class="pans">
                  <table width="97%" cellpadding="0" cellspacing="4">
                    <tr>
                      <td align="right" width="20%"><strong><em class="star_red">*</em> Trip Name :</strong></td>
                      <td width="29%"><input type="text" class="lang_box" name="trip_title<?php echo $language['id'];?>" id="trip_title<?php echo $language['id'];?>" value="<?php echo $results['content'][$language['id']]['trip_title'];?>"/>
                      <br />
                        <span id="msgtrip_title1" style="color:red;" class="font"></span></td>
                      <!--<td align="right" width="15%"><strong><em class="star_red">*</em> Trip Origin :</strong></td>
                      <td width="24%"><input class="lang_box" id="origin<?php echo $language['id'];?>" value="<?php echo $results['content'][$language['id']]['origin'];?>" name="origin<?php echo $language['id'];?>"/></td>-->
                    </tr>
                   <!-- <tr>
                      <td align="right" width="12%"><strong><em class="star_red">*</em>Trip Destination  :</strong></td>
                      <td width="19%"><input class="lang_box" id="destination<?php echo $language['id'];?>" value="<?php echo $results['content'][$language['id']]['destination'];?>" name="destination<?php echo $language['id'];?>"/></td>
                    </tr>-->
                    <tr>
                      <td align="right" width="12%"><strong><em class="star_red">*</em> Trip Specification  :</strong></td>
                      <td width="25%"><textarea rows="7" cols="60" class="lang_box" id="specification<?php echo $language['id'];?>" name="specification<?php echo $language['id'];?>"><?php echo $results['content'][$language['id']]['specification'];?></textarea>
                      <br />
                        <span id="msgspecification1" style="color:red;" class="font"></span></td>
                    </tr>
                  </table>

                </div>
              </fieldset>
              <?php } ?>
            </div><br /><br />


            <table width="100%" cellpadding="0" cellspacing="0">
              <tr>
                <td width="50%">&nbsp;</td>
                <td align="center" >
                <button class="lang_button" value="saveandpublish" name="saveandpublish"><strong>Save & Publish</strong></button>
                
                <button class="lang_button" value="save" name="save"><strong>Save</strong></button>
                  <button class="lang_button_re" type="reset" onclick="resettripaddValidate()">&nbsp; <strong>Reset</strong></button></td>
              </tr>
            </table><br />

            <input type="hidden" name="control" value="trip"/>
            <input type="hidden" name="edit" value="1"/>
            <input type="hidden" name="task" value="save"/>
            <input type="hidden" name="id" id="idd" value="<?php echo $results['common'][0]->id; ?>"  />
            
              <input type="hidden" name="tpages" id="tpages" value="<?php echo $_REQUEST['tpages']; ?>"  />
              <input type="hidden" name="page" id="page" value="<?php echo $_REQUEST['page'];?>"  />
              
              <input type="hidden" id="isBooked" name="isBooked" value="<?php echo count($isBooking); ?>" />
              
          </form>
          
                <script type="text/javascript">
                function checkFuelType(value){
					if(value == 'paid'){
						
					}else{
						
					}
                }
                </script>
        </div>
      </div>
    </div>
</div>




<script type="text/javascript">

/*function chkNumeric(val,id){
  		for(i=0;i<val.length;i++){
			if(!isNaN(val.substring(1,val.length)) && !isNaN(val)){
			}else{
			document.getElementById(id).value = val.substring(0,val.length-1);
			}
		}
	
  }*/
 
	function Numericchk(val,id){
		//alert(id);
  		for(i=0;i<val.length;i++){
			if(!isNaN(val.substring(1,val.length)) && !isNaN(val)){
			}else{
			document.getElementById(id).value = val.substring(0,val.length-1);
			}
		}
	
  } 
  
  
  

function isEmail(text)
{
	
	var pattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
	
	//"^[\\w-_\.]*[\\w-_\.]\@[\\w]\.\+[\\w]+[\\w]$";
	var regex = new RegExp( pattern );
	return regex.test(text);
	
}

function numeric(sText)
{
 var ValidChars = "0123456789,.";
 var IsNumber=true;	
 for (i = 0; i < sText.length && IsNumber == true; i++) 
      { 
      Char = sText.charAt(i); 
      if (ValidChars.indexOf(Char) == -1) 
         {			 
		 IsNumber = false;
         }
      }
  	 return IsNumber;
}


function tripaddValidate()
{  
	
    var chk=1;
	
	 /*FOR Equipment VALIDATION*/
   var equipVal = 1;
   var equiparr = [<?php echo $validationEquipArr ?>];
   //alert(equiparr);
		for(a=0; a < equiparr.length;a++){
				//if(document.getElementById('nocabin_'+arr[a]).value == '' && document.getElementById('cabin_'+arr[a]).checked) { 
		   if(document.getElementById('eqtype'+equiparr[a]).value == 'paid' && document.getElementById('eqprice_'+equiparr[a]).value=='' && document.getElementById('equipment_'+equiparr[a]).checked) { 
		  
		            document.getElementById('eqprice_'+equiparr[a]).disabled=false;
					document.getElementById('msgeqprice_'+equiparr[a]).innerHTML ="*Required field.";
					chk=0;
				}else if(document.getElementById('eqtype'+equiparr[a]).value == 'paid' && document.getElementById('eqprice_'+equiparr[a]).value==0 && document.getElementById('equipment_'+equiparr[a]).checked) { 
		  
		            document.getElementById('eqprice_'+equiparr[a]).disabled=false;
					document.getElementById('msgeqprice_'+equiparr[a]).innerHTML ="*Required field.";
					chk=0;
				}else if(document.getElementById('eqtype'+equiparr[a]).value == 'paid' && !numeric(document.getElementById('eqprice_'+equiparr[a]).value) && document.getElementById('equipment_'+equiparr[a]).checked) { 
		  
		            document.getElementById('eqprice_'+equiparr[a]).disabled=false;
					document.getElementById('msgeqprice_'+equiparr[a]).innerHTML ="*Must be numeric only.";
					chk=0;
				}
				else {
					document.getElementById('msgeqprice_'+equiparr[a]).innerHTML = "";
				}
				
		}
   /*END Equipment DATA VALIDATION*/ 
   
   
    /*FOR Tank VALIDATION*/
   var tankVal = 1;
   var tankarr = [<?php echo $validationTankArr ?>];
   //alert(tankarr);
		for(a=0; a < tankarr.length;a++){
				//if(document.getElementById('nocabin_'+arr[a]).value == '' && document.getElementById('cabin_'+arr[a]).checked) { 
		   if(document.getElementById('ptype'+tankarr[a]).value == 'paid' && document.getElementById('fuelprice'+tankarr[a]).value=='' && document.getElementById('fuel_tank'+tankarr[a]).checked) { 
		  
					document.getElementById('msgfuelprice'+tankarr[a]).innerHTML ="*Required.";
					chk=0;
				}else if(document.getElementById('ptype'+tankarr[a]).value == 'paid' && document.getElementById('fuelprice'+tankarr[a]).value==0 && document.getElementById('fuel_tank'+tankarr[a]).checked) { 
		  
					document.getElementById('msgfuelprice'+tankarr[a]).innerHTML ="*Required.";
					chk=0;
				}else if(document.getElementById('ptype'+tankarr[a]).value == 'paid' && !numeric(document.getElementById('fuelprice'+tankarr[a]).value) && document.getElementById('fuel_tank'+tankarr[a]).checked) { 
		  
					document.getElementById('msgfuelprice'+tankarr[a]).innerHTML ="*Must be numeric only.";
					chk=0;
				}
				else {
					document.getElementById('msgfuelprice'+tankarr[a]).innerHTML = "";
				}
				
				 if(document.getElementById('fuel_tank'+tankarr[a]).checked && document.getElementById('gastype'+tankarr[a]).value == '-1') { 
		  
					document.getElementById('msggastype'+tankarr[a]).innerHTML ="*Required field.";
					chk=0;
				}else{
					document.getElementById('msggastype'+tankarr[a]).innerHTML ="";
				}
				
		}
   /*END Tank DATA VALIDATION*/ 
   
   
   
    /*FOR Beverage VALIDATION*/
   var beverageVal = 1;
   var beveragearr = [<?php echo $validationBeverageArr ?>];
		for(a=0; a < beveragearr.length;a++){
				//if(document.getElementById('nocabin_'+arr[a]).value == '' && document.getElementById('cabin_'+arr[a]).checked) { 
		   if(document.getElementById('bvtype'+beveragearr[a]).value == 'paid' && document.getElementById('bvprice_'+beveragearr[a]).value=='' && document.getElementById('beverage_'+beveragearr[a]).checked) { 
		  
		            document.getElementById('bvprice_'+beveragearr[a]).disabled=false;
					document.getElementById('msgbvprice_'+beveragearr[a]).innerHTML ="*Required field.";
					chk=0;
				}else if(document.getElementById('bvtype'+beveragearr[a]).value == 'paid' && document.getElementById('bvprice_'+beveragearr[a]).value==0 && document.getElementById('beverage_'+beveragearr[a]).checked) { 
		  
		            document.getElementById('bvprice_'+beveragearr[a]).disabled=false;
					document.getElementById('msgbvprice_'+beveragearr[a]).innerHTML ="*Required field.";
					chk=0;
				}else if(document.getElementById('bvtype'+beveragearr[a]).value == 'paid' && !numeric(document.getElementById('bvprice_'+beveragearr[a]).value) && document.getElementById('beverage_'+beveragearr[a]).checked) { 
		  
		            document.getElementById('bvprice_'+beveragearr[a]).disabled=false;
					document.getElementById('msgbvprice_'+beveragearr[a]).innerHTML ="*Must be numeric only.";
					chk=0;
				}
			/*	else if(document.getElementById('bvtype'+beveragearr[a]).value == 'free' && document.getElementById('beverage_'+beveragearr[a]).checked) {                       document.getElementById('bvprice_'+beveragearr[a]).value=='';
					   document.getElementById('msgbvprice_'+beveragearr[a]).innerHTML="";
			           document.getElementById('bvprice_'+beveragearr[a]).disabled=true;
		          chk=0;
				}*/else {
					document.getElementById('msgbvprice_'+beveragearr[a]).innerHTML = "";
				}
				
		}
   /*END beverage DATA VALIDATION*/    
   
   
   
   
 
    /*FOR Foods VALIDATION*/
   var foodVal = 1;
   var foodarr = [<?php echo $validationFoodArr ?>];
		for(a=0; a < foodarr.length;a++){
				//if(document.getElementById('nocabin_'+arr[a]).value == '' && document.getElementById('cabin_'+arr[a]).checked) { 
		   if(document.getElementById('fdtype'+foodarr[a]).value == 'paid' && document.getElementById('fdprice_'+foodarr[a]).value=='' && document.getElementById('food_'+foodarr[a]).checked) { 
		  
		            document.getElementById('fdprice_'+foodarr[a]).disabled=false;
					document.getElementById('msgfdprice_'+foodarr[a]).innerHTML ="*Required field.";
					chk=0;
				}else if(document.getElementById('fdtype'+foodarr[a]).value == 'paid' && document.getElementById('fdprice_'+foodarr[a]).value==0 && document.getElementById('food_'+foodarr[a]).checked) { 
		  
		            document.getElementById('fdprice_'+foodarr[a]).disabled=false;
					document.getElementById('msgfdprice_'+foodarr[a]).innerHTML ="*Required field.";
					chk=0;
				}else if(document.getElementById('fdtype'+foodarr[a]).value == 'paid' && !numeric(document.getElementById('fdprice_'+foodarr[a]).value) && document.getElementById('food_'+foodarr[a]).checked) { 
		  
		            document.getElementById('fdprice_'+foodarr[a]).disabled=false;
					document.getElementById('msgfdprice_'+foodarr[a]).innerHTML ="*Must be numeric only.";
					chk=0;
				}
				/*else if(document.getElementById('fdtype'+foodarr[a]).value == 'free' && document.getElementById('food_'+foodarr[a]).checked) {                       document.getElementById('fdprice_'+foodarr[a]).value=='';
					   document.getElementById('msgfdprice_'+foodarr[a]).innerHTML="";
			           document.getElementById('fdprice_'+foodarr[a]).disabled=true;
		          chk=0;
				}*/else {
					
					document.getElementById('msgfdprice_'+foodarr[a]).innerHTML = "";
				}
				
		}
   /*END Foods DATA VALIDATION*/    
   
   
	
	
	
   
   if(document.getElementById('country_id').value == 0) { 
	document.getElementById('msgcountry_id').innerHTML ="*Required field.";
	chk=0;
	}else {
	document.getElementById('msgcountry_id').innerHTML = "";
	}
	
   if(document.getElementById('destination_country_id').value == 0) { 
	document.getElementById('msgdestination_country_id').innerHTML ="*Required field.";
	chk=0;
	}else {
	document.getElementById('msgdestination_country_id').innerHTML = "";
	}
	
	if(document.getElementById('origin').value == 0) { 
	document.getElementById('msgorigin').innerHTML ="*Required field.";
	chk=0;
	}else {
	document.getElementById('msgorigin').innerHTML = "";
	}
	
	if(document.getElementById('destination').value == 0) { 
	document.getElementById('msgdestination').innerHTML ="*Required field.";
	chk=0;
	}else {
	document.getElementById('msgdestination').innerHTML = "";
	}
	
	if(document.getElementById('boat_id').value == 0) { 
	document.getElementById('msgboat_id').innerHTML ="*Required field.";
	chk=0;
	}
	else {
	document.getElementById('msgboat_id').innerHTML = "";
	}
	
	if(document.getElementById('trip_type_id').value == 0) { 
	document.getElementById('msgtrip_type_id').innerHTML ="*Required field.";
	chk=0;
	}
	else {
	document.getElementById('msgtrip_type_id').innerHTML = "";
	}
	
	
	/*if(document.getElementById('no_of_dives').value == '') { 
	document.getElementById('msgno_of_dives').innerHTML ="*Required field.";
	chk=0;
	}else {
	document.getElementById('msgno_of_dives').innerHTML = "";
	}
	
	if(document.getElementById('no_of_days').value == '') { 
	document.getElementById('msgno_of_days').innerHTML ="*Required field.";
	chk=0;
	}else {
	document.getElementById('msgno_of_days').innerHTML = "";
	}
	
	if(document.getElementById('no_of_nights').value == '') { 
	document.getElementById('msgno_of_nights').innerHTML ="*Required field.";
	chk=0;
	}else {
	document.getElementById('msgno_of_nights').innerHTML = "";
	}*/
	
	
	
  if(document.getElementById('trip_price').value == '') { 
	document.getElementById('msgtrip_price').innerHTML ="*Required field.";
	chk=0;
	}else {
	document.getElementById('msgtrip_price').innerHTML = "";
	}
	
 if(document.getElementById("idd").value==''){	
	  
	 /* if(document.getElementById('image').value == '') { 
		document.getElementById('msgimage').innerHTML ="*Required field.";
		chk=0;
		}else {
		document.getElementById('msgimage').innerHTML = "";
		}*/
		
		var image = document.getElementById('image').value;	
			var imageLength = image.length;
			var imageDot = image.lastIndexOf(".");
			
			var imageType = image.substring(imageDot,imageLength);
		
			if(image) {
				
					if((imageType==".jpg")||(imageType==".jpg")||(imageType==".gif")||(imageType==".png")) {
						document.getElementById('msgimage').innerHTML = "";
					}
					else {	chk = 0;
						 document.getElementById('msgimage').innerHTML = "Invalid file format only (jpg,gif,png)"; 
					}
			     }
			else {
					
				if(!document.getElementById("idd").value) {  chk = 0;
				document.getElementById('msgimage').innerHTML = "Please upload an image";
					}
				else {
					document.getElementById('msgimage').innerHTML = "";
				}
			
			}
		
		
	 /* if(document.getElementById('trip_gallery[]').value == '') { 
		document.getElementById('msgtrip_gallery[]').innerHTML ="*Required field.";
		chk=0;
		}else {
		document.getElementById('msgtrip_gallery[]').innerHTML = "";
		}*/
		
		var trip_gallery = document.getElementById('trip_gallery[]').value;	
			var trip_galleryLength = trip_gallery.length;
			var trip_galleryDot = trip_gallery.lastIndexOf(".");
			
			var trip_galleryType = trip_gallery.substring(trip_galleryDot,trip_galleryLength);
		
			if(trip_gallery) {
				
					if((trip_galleryType==".jpg")||(trip_galleryType==".jpg")||(trip_galleryType==".gif")||(trip_galleryType==".png")) {
						document.getElementById('msgtrip_gallery[]').innerHTML = "";
					}
					else {	chk = 0;
						 document.getElementById('msgtrip_gallery[]').innerHTML = "Invalid file format only (jpg,gif,png)"; 
					}
			     }
			else {
					
				if(!document.getElementById("idd").value) {  chk = 0;
				document.getElementById('msgtrip_gallery[]').innerHTML = "Please upload an image";
					}
				else {
					document.getElementById('msgtrip_gallery[]').innerHTML = "";
				}
			
			}
		
   }
 
 
  if(document.getElementById('diver').value == 'paid') {
	  
		document.getElementById('price_for_diver').disabled=false;
		if(document.getElementById('price_for_diver').value=='') {
		chk=0;	
		document.getElementById('msgprice_for_diver').innerHTML="This field is required";
		}
		else if(!numeric(document.getElementById('price_for_diver').value)){ 
		document.getElementById('msgprice_for_diver').innerHTML ="*Must be numeric only.";
		chk=0;	
		}else  {
		document.getElementById('msgprice_for_diver').innerHTML="";
		}	
				  
   }
  
  if(document.getElementById('diver').value=='free') {
	document.getElementById('price_for_diver').value=='';
	document.getElementById('msgprice_for_diver').innerHTML="";
	document.getElementById('price_for_diver').disabled=true;
	//  alert(document.getElementById('eqprice_'+str).value);
	
		if(document.getElementById('price_for_diver').value!='') {
		//chk=0;	
		document.getElementById('price_for_diver').value='';
		}
		else if(document.getElementById('price_for_diver').value=='') {
		//chk=0;	
		document.getElementById('price_for_diver').value='';
		}
		else  {
		document.getElementById('msgprice_for_diver').innerHTML="";
		} 
	
	}
	
	
	
 /*	
  if(document.getElementById('price_for_diver').value == '') { 
	document.getElementById('msgprice_for_diver').innerHTML ="*Required field.";
	chk=0;
	}else {
	document.getElementById('msgprice_for_diver').innerHTML = "";
	}*/
	
  
  if(document.getElementById('trip_title1').value == '') { 
	document.getElementById('msgtrip_title1').innerHTML ="*Required field.";
	chk=0;
	}else {
	document.getElementById('msgtrip_title1').innerHTML = "";
	}
	
  if(document.getElementById('specification1').value == '') { 
	document.getElementById('msgspecification1').innerHTML ="*Required field.";
     chk=0;
	}else {
	document.getElementById('msgspecification1').innerHTML = "";
	}
	
	
		 
 		 if(chk) {	
			 var boat_id = $("#boat_id").val();
			 var startDate = $("#fromd").val();
			 var endDate = $("#tod").val();
		 	if(boat_id != <?php echo $results['common'][0]->boat_id ?>){
				$.ajax({
					url:"ajax.php?control=trip&task=isBoatBusy&boat_id="+boat_id+"&startDate="+startDate+"&endDate="+endDate,
					success:function(status){
						if(status != 'Valid'){
						//alert("The boat is busy on this schedule.");
						
					document.getElementById("popmsg").innerHTML = "This  boat is busy on other trip schedules. Please choose another boat.";
					document.getElementById("popbutton").innerHTML = '';
					document.getElementById("closeid2").className = "darkbase_bg";
					document.getElementById("viewBoat").style.display = "block";
						return false;
						}else if($("#isBooked").val() > 0){
						document.getElementById("popmsg").innerHTML = "This  boat is booked by many customers Are you sure to update this trip?.";
					document.getElementById("popbutton").innerHTML = '<img onclick="sendtripform();" style="cursor: pointer;" align="bottom" src="images/ok_2.png" />&nbsp;&nbsp;&nbsp;<a href="index.php?control=trip"><img style="padding-bottom: 9px;cursor: pointer;" src="images/cancel.gif" /></a>';
						document.getElementById("closeid2").className = "darkbase_bg";
						return false;
						}else{
							$("#formBoat :input").attr("disabled", false);
							document.forms['formBoat'].submit();
						}
					}
				});	
			}else if($("#isBooked").val() > 0){
				document.getElementById("popmsg").innerHTML = "This  boat is booked by many customers Are you sure to update this trip?.";
				document.getElementById("popbutton").innerHTML = '<img onclick="sendtripform();" style="cursor: pointer;" align="bottom" src="images/ok_2.png" />&nbsp;&nbsp;&nbsp;<a href="index.php?control=trip"><img style="padding-bottom: 9px;cursor: pointer;" src="images/cancel.gif" /></a>';
				document.getElementById("closeid2").className = "darkbase_bg";
				return false;
			}else{
			$("#formBoat :input").attr("disabled", false);
			return true;
			}
			
			return false;
		 }
		 else {
			 
			return false;		
		 }	

}


function boatOnChange(){
	var boat_id = $("#boat_id").val();
	var startDate = $("#fromd").val();
	var endDate = $("#tod").val();
	
	
	$.ajax({
			url:"ajax.php?control=trip&task=getBoatPrice&boat_id="+boat_id,
			 success:function(status2){
				document.getElementById("trip_price").value = status2;
			}
		});
	
	
					
	if(boat_id != <?php echo $results['common'][0]->boat_id ?>){
		$.ajax({
			url:"ajax.php?control=trip&task=isBoatBusy&boat_id="+boat_id+"&startDate="+startDate+"&endDate="+endDate,
			 success:function(status){
				if(status != 'Valid'){
					//alert("The boat is busy on this schedule.");
					document.getElementById("popmsg").innerHTML = "This  boat is busy on other trip schedules. Please choose another boat.";
					document.getElementById("popbutton").innerHTML = '';
					document.getElementById("closeid2").className = "darkbase_bg";
					document.getElementById("viewBoat").style.display = "block";
				}
				else {
					if(boat_id == 0){
					document.getElementById("viewBoat").style.display = "none";
					}else{
					document.getElementById("viewBoat").style.display = "block";
					}
				}
			}
		});
	}
}


function sendtripform(){
	$("#formBoat :input").attr("disabled", false);
document.forms['formBoat'].submit();
}
function resettripaddValidate()
{  

  // alert("fdgfd");
	document.getElementById('msgcountry_id').innerHTML = "";
	document.getElementById('msgdestination_country_id').innerHTML = "";
	document.getElementById('msgorigin').innerHTML = "";
	document.getElementById('msgdestination').innerHTML = "";
	document.getElementById('msgboat_id').innerHTML = "";
	document.getElementById('msgtrip_type_id').innerHTML = "";
	document.getElementById('msgno_of_dives').innerHTML = "";
	document.getElementById('msgno_of_days').innerHTML = "";
	document.getElementById('msgno_of_nights').innerHTML = "";
	document.getElementById('msgtrip_price').innerHTML = "";
	document.getElementById('msgimage').innerHTML = "";
	document.getElementById('msgtrip_gallery[]').innerHTML = "";
    document.getElementById('msgprice_for_diver').innerHTML="";
	document.getElementById('msgprice_for_diver').innerHTML="";
	document.getElementById('msgprice_for_diver').innerHTML="";
	document.getElementById('msgtrip_title1').innerHTML = "";
	document.getElementById('msgspecification1').innerHTML = "";
	

}



function disBox(str){
if(str == 'paid'){
	document.getElementById("price_for_diver").disabled = false;
}else{
	document.getElementById("price_for_diver").disabled = true;
}

}

</script>