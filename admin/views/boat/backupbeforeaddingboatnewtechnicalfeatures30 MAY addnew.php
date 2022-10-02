 <!-- Apply dropdown check list to the selected items  -->
    
<?php
	$c = 1;
 foreach($cabins AS $cabin): 
	if($c == 1)
	$validationCabinArr .= $cabin['id'];
	else
	$validationCabinArr .= ",".$cabin['id'];
	$c++;
	endforeach;
?>
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
<script src="assets/viewJs/ViewValidation.js"></script><!--
<link rel="stylesheet" href="assets/calender/newCal/jquery-ui.css" />-->
	<script src="assets/calender/newCal/jquery-1.9.1.js"></script>
    <script src="assets/calender/newCal/jquery-ui.js"></script>
<script type="text/javascript">
jQuery.noConflict();
  jQuery(function($) {
    $( "#inputDate" ).datepicker({
      dateFormat: "yy-mm-dd",
      changeMonth: true,
      changeYear: true
    });
	
    $( "#latest_overhall" ).datepicker({
      dateFormat: "yy-mm-dd",
      changeMonth: true,
      changeYear: true
    });
	
  });
		  /*ADD COMPANY BRANCH EVENT HANDLER*/
		  $(document).ready(function(){
		  $("#company").change(function(){
				  $.ajax({
					 url:"ajax.php?control=boat&task=getAjaxBranch&company_id="+$(this).val(),
					 success:function(res){
						 $("#c_branch").html(res);
					}});
		  });
		});
		  /*ADD COMPANY BRANCH EVENT HANDLER*/
			
	
	function Numericchk(val,id){
		//alert(id);
  		for(i=0;i<val.length;i++){
			if(!isNaN(val.substring(1,val.length)) && !isNaN(val)){
			}else{
			document.getElementById(id).value = val.substring(0,val.length-1);
			}
		}
	
  }
  
  	/*function equipmentNumeric(val,id){
		//alert(id);
  		for(i=0;i<val.length;i++){
			if(!isNaN(val.substring(1,val.length)) && !isNaN(val)){
			}else{
			document.getElementById(id).value = val.substring(0,val.length-1);
			}
		}
	
  }*/
			
  </script>
  
  
<div class="detail_right right">
    <div class="detail_container ">
      <div class="head_cont">
        <h2 class="main_head">
          <table width="99%">
            <tr>
              <td width="85%" class="main_txt">
              <?php if($results['common'][0]->id=='') { echo "Add New Boats"; } else {echo "Edit Boats";} ?>
             </td>
              <td><!--<a href="#" class="button"><img src="images/add_new.png" alt="add new" /></a>--></td>
            </tr>
          </table>
        </h2>
      </div>
      <div class="grid_container">
        <div class="main_collaps">
          <form name="formBoat" action="index.php" method="post" enctype="multipart/form-data"  onsubmit="return boatValidate();"><!---->
            <div style="width:100%; height:auto;"> 
              <!--TOP TABING START HERE-->
              <fieldset>
            <legend><strong>General Options</strong></legend>
              <div class='tab-container'>
                <ul class='etabs'>
                  <li class='tab'><a href="#lang0_1">General</a></li>
                  <li class='tab'><a href="#lang0_2">Overview</a></li>
                  <li class='tab'><a href="#lang0_3">Floorplans</a></li>
                  <li class='tab'><a href="#lang0_4">Gallery</a></li>
                  <li class='tab'><a href="#lang0_5">Specs</a></li>
                  <li class='tab'><a href="#lang0_6">Cabin</a></li><!--
                  <li class='tab'><a href="#lang0_7">Equipments</a></li>
                  <li class='tab'><a href="#lang0_17">Beverages</a></li>
                  <li class='tab'><a href="#lang0_18">Foods</a></li>-->
                </ul>
                <div class='panel-container'>
                  <div id="lang0_1" class="pans">
                    <table width="97%" cellpadding="0" cellspacing="4" class="add_language">
                      
                      
                      
                      <tr>
                         <td align="right" width="20%"><strong><em class="star_red">*</em> Boat Stats :</strong></td>
                        <td width="29%">
                        <select class="lang_box" name="boat_type_id" id="boat_type_id" >
                   <option value="1" <?php if($results['common'][0]->boat_type_id == "1"){ ?> selected="selected" <?php } ?>>Liveaboard Boat</option>
                   <option value="2" <?php if($results['common'][0]->boat_type_id == "2"){ ?> selected="selected" <?php } ?>>Day Boat</option>
                          </select>
                           <br />
                        <span id="msgboat_type_id" style="color:red;" class="font"></span></td>
                         
                         
                          <td align="right" width="20%"><strong><em class="star_red">*</em> Manufacture Date :</strong></td>
                        <td width="29%"><input class="lang_box" id="inputDate" readonly="readonly" value="<?php echo $results['common'][0]->established?date("Y-m-d",strtotime($results['common'][0]->established)):date("Y-m-d"); ?>" name="established"/></td> 
                          
                      </tr>
                      
                      
                      
                      <tr>
                        <td align="right" width="20%"><strong><em class="star_red">*</em> Latest over hall  :</strong></td>
                        <td width="29%"><input class="lang_box" id="latest_overhall" readonly="readonly" value="<?php echo $results['common'][0]->latest_overhall?date("Y-m-d",strtotime($results['common'][0]->latest_overhall)):date("Y-m-d"); ?>" name="latest_overhall"/></td>
                        
                         <td align="right" width="20%"><strong><em class="star_red">*</em> Country :</strong></td>
                        <td width="29%"><select class="lang_box" name="country_id" id="country_id">
                            <option value="" >Select Country</option>
                            <?php foreach($countries as $cn): ?>
                            <option value="<?php echo $cn['id']; ?>" <?php if($cn['id'] == $results['common'][0]->country_id){ ?> selected="selected" <?php } ?>><?php echo $cn['country']; ?></option>
                            <?php endforeach; ?>
                          </select>
                          <span id="msgcountry" style="color:red;" class="font"></span></td>
                        
                        
                      </tr>
                      <tr>
                        <td align="right" width="20%"><strong><em class="star_red">*</em> Company :</strong></td>
                        <td width="29%"><select class="lang_box" name="company" id="company" >
                            <option value="" >Select Company</option>
                            <?php foreach($companies as $c): ?>
                            <option value="<?php echo $c['id']; ?>" <?php if($c['id'] == $results['common'][0]->company_id){ ?> selected="selected" <?php } ?>><?php echo $c['company']; ?></option>
                            <?php endforeach; ?>
                          </select>
                          <span id="msgcompany" style="color:red;" class="font"></span></td>
                       
                        <td align="right" width="20%"><strong><em class="star_red">*</em> Company Branch :</strong></td>
                        <td width="29%"><select class="lang_box" name="c_branch" id="c_branch">
                            <option value="" >Select Branch</option>
                            <?php if($branches){ foreach($branches as $branch): ?>
                            <option value="<?php echo $branch['id']; ?>" <?php if($branch['id'] == $results['common'][0]->company_branch_id){ ?> selected="selected" <?php } ?>><?php echo $branch['branch_name']; ?></option>
                            <?php  endforeach;} ?>
                          </select><span id="msgc_branch" style="color:red;" class="font"></span>
                          <span id="msgcompanybr" style="color:red;" class="font"></span></td>
                       
                      </tr>
                      
                      <tr>
                        <td align="right" width="20%"><strong><em class="star_red">*</em> Boat Price :</strong></td>
                        <td width="29%"><input type="text" class="lang_box" name="boat_price" id="boat_price" value="<?php echo $results['common'][0]->boat_price; ?>" onkeyup="chkNumeric(this.value,this.id)"/>
                          <span id="msgboat_price" style="color:red;" class="font"></span></td>
                          
                           <td align="right" width="20%"><strong><em class="star_red">*</em> Operators :</strong></td>
                        <td width="29%"><select class="lang_box" name="operator" id="operator">
                            <option value="" >Select Operator</option>
                            <?php foreach($operators as $o): ?>
                            <option value="<?php echo $o['id']; ?>" <?php if($o['id'] == $results['common'][0]->operator_id){ ?> selected="selected" <?php } ?>><?php echo $o['first_name']." ".$o['last_name']; ?></option>
                            <?php endforeach; ?>
                          </select>
                          <span id="msgoperator" style="color:red;" class="font"></span></td>
                          
                          
                      </tr>
                      
                      <tr>
                         <td align="right" width="20%"><strong title="Age below 6 Years"><em class="star_red">*</em> Child Discount :</strong></td>
                        <td width="29%">
                        <input title="Age below 6 Years" type="text" class="lang_box" name="child_discount1" id="child_discount1" value="<?php echo $results['common'][0]->child_discount1; ?>" onkeyup="chkNumeric(this.value,this.id)" placeholder="Age below 6 Years" />
                          <span id="msgchild_discount1" style="color:red;" class="font"></span>
                        </td>
                          
                          
                         <td align="right" width="20%"><strong title="Age between 6 to 12 Years"><em class="star_red">*</em> Child Discount :</strong></td>
                        <td width="29%">
                        <input title="Age between 6 to 12 Years" type="text" placeholder="Age between 6 to 12 Years" class="lang_box" name="child_discount2" id="child_discount2" value="<?php echo $results['common'][0]->child_discount2; ?>" onkeyup="chkNumeric(this.value,this.id)"/>
                          <span id="msgchild_discount2" style="color:red;" class="font"></span>
                        </td>
                      </tr>
                      
                    </table>
                  </div>
                  <div id="lang0_2" class="pans">
                    <table width="97%" cellpadding="0" cellspacing="4" class="add_language">
                      <tr>
                        <td align="right" width="20%"><strong><em class="star_red">*</em> Boat Length :</strong></td>
                        <td width="29%"><input type="text" class="lang_box" name="boat_length" id="boat_length" value="<?php echo $results['common'][0]->boat_length; ?>" onkeyup="chkNumeric(this.value,this.id)"/>
                          <span id="msgboat_length" style="color:red;" class="font"></span></td>
                        <td align="right" width="20%"><strong><em class="star_red">*</em> Boat Beam :</strong></td>
                        <td><input type="text" class="lang_box" name="boat_beam" id="boat_beam" value="<?php echo $results['common'][0]->boat_beam; ?>" onkeyup="chkNumeric(this.value,this.id)"/>
                          <span id="msgboat_beam" style="color:red;" class="font"></span></td>
                      </tr>
                      <tr>
                        <td align="right" width="20%"><strong><em class="star_red">*</em> Fuel Capacity :</strong></td>
                        <td width="29%"><input type="text" class="lang_box" name="fuel_capacity" id="fuel_capacity" value="<?php echo $results['common'][0]->fuel_capacity; ?>" onkeyup="chkNumeric(this.value,this.id)"/>
                          <span id="msgfuel_capacity" style="color:red;" class="font"></span></td>
                        <td align="right" width="20%"><strong><em class="star_red">*</em> Men Capacity :</strong></td>
                        <td><input type="text" class="lang_box" name="men_capacity" id="men_capacity" value="<?php echo $results['common'][0]->men_capacity; ?>" />
                          <span id="msgmen_capacity" style="color:red;" class="font"></span></td>
                      </tr>
                      
                      
                       <tr>
                          <td align="right" width="20%"><strong><em class="star_red">*</em> Hull Type:</strong></td>
                          <td width="29%"><input type="text" class="lang_box" name="hull_type" id="hull_type" value="<?php echo $results['common'][0]->hull_type;?>"/>
                          <span id="msghull_type" style="color:red;" class="font"></span>
                          
                          </td>
                          <td align="right" width="20%"><strong><em class="star_red">*</em> Hull Material:</strong></td>
                          <td><input type="text" class="lang_box" name="hull_material" id="hull_material" value="<?php echo $results['common'][0]->hull_material;?>"/>
                          
                          <span id="msghull_material" style="color:red;" class="font"></span>
                          
                          </td>
                        </tr>
                      
                      
                      
                      <tr>
                        <td align="right" width="20%"><strong><em class="star_red">*</em> Boat Width :</strong></td>
                        <td width="29%"><input type="text" class="lang_box" name="boat_width" id="boat_width" value="<?php echo $results['common'][0]->boat_width; ?>" onkeyup="chkNumeric(this.value,this.id)"/>
                          <span id="msgboat_width" style="color:red;" class="font"></span></td>
                        <td align="right" width="20%"><strong><em class="star_red"></em> Boat Range :</strong></td>
                        <td><input type="text" class="lang_box" name="boat_range" id="boat_range" value="<?php echo $results['common'][0]->boat_range; ?>" onkeyup="chkNumeric(this.value,this.id)"/>
                          <span id="msgboat_range" style="color:red;" class="font"></span></td>
                      </tr>
                      
                      
                      <tr>
                        <td align="right" width="20%"><strong><em class="star_red">*</em> Fresh Water Capacity :</strong></td>
                        <td width="29%"><input type="text" class="lang_box" name="fresh_water_capacity" id="fresh_water_capacity" value="<?php echo $results['common'][0]->fresh_water_capacity; ?>" onkeyup="chkNumeric(this.value,this.id)"/>
                          <span id="msgfresh_water_capacity" style="color:red;" class="font"></span></td>
                        <td align="right" width="20%"><strong><em class="star_red"></em> Gray Water Capacity :</strong></td>
                        <td><input type="text" class="lang_box" name="gray_water_capacity" id="gray_water_capacity" value="<?php echo $results['common'][0]->gray_water_capacity; ?>" />
                          <span id="msggray_water_capacity" style="color:red;" class="font"></span></td>
                      </tr>
                      
                      
                      <tr>
                        <td align="right" width="20%"><strong><em class="star_red"></em> Black Water Capacity :</strong></td>
                        <td width="29%"><input type="text" class="lang_box" name="black_water_capacity" id="black_water_capacity" value="<?php echo $results['common'][0]->black_water_capacity; ?>" onkeyup="chkNumeric(this.value,this.id)"/>
                          <span id="msgblack_water_capacity" style="color:red;" class="font"></span></td>
                      </tr>
                      
                      
                    </table>
                  </div>
                  <div id="lang0_3" class="pans">
                    <table width="97%" cellpadding="0" cellspacing="4" class="add_language">
                      <tr>
                        <td align="right" width="20%"><strong><em class="star_red">*</em> Upper Deck :</strong></td>
                        <td><input type="file" class="lang_box" name="upper_deck" id="upper_deck"/>
                          <span id="msgupper_deck" style="color:red;" class="font"></span></td>
                          <?php if($_REQUEST['id']){ ?><td><img src="<?php echo $results['common'][0]->upper_deck; ?>" width="45" height="30"/></td><?php } ?>
                      </tr>
                      <tr>
                        <td align="right" width="20%"><strong><em class="star_red">*</em> Main Deck :</strong></td>
                        <td><input type="file" class="lang_box" name="main_deck" id="main_deck"/>
                        <span id="msgmain_deck" style="color:red;" class="font"></span></td>
                          <?php if($_REQUEST['id']){ ?><td><img src="<?php echo $results['common'][0]->main_deck; ?>" width="45" height="30"/></td><?php } ?>
                      </tr>
                      <tr>
                        <td align="right" width="25%"><strong><em class="star_red">*</em> Lower Deck :</strong></td>
                        <td><input type="file" class="lang_box" name="lower_deck" id="lower_deck"/>
                         <span id="msglower_deck" style="color:red;" class="font"></span></td>
                          <?php if($_REQUEST['id']){ ?><td><img src="<?php echo $results['common'][0]->lower_deck; ?>" width="45" height="30"/></td><?php } ?>
                      </tr>
                      <tr> </tr>
                    </table>
                  </div>
                  <div id="lang0_4" class="pans">
                    <table width="97%" cellpadding="0" cellspacing="4" class="add_language">
                      <tr>
                        <td align="right" width="20%"><strong><em class="star_red">*</em> Main Image :</strong></td>
                        <td width="29%"><input type="file" class="lang_box" name="bimage" id="bimage" />
                          <span id="msgbimage" style="color:red;" class="font"></span></td>
                      </tr>
                      
                      <tr>
                        <td align="right" width="20%"><strong><em class="star_red">*</em> Exterior Gallery :</strong></td>
                        <td width="29%"><input type="file" class="lang_box" name="boatExterior_gallery[]" id="boatExterior_gallery" multiple/>
                          <span id="msgexboat_gallery" style="color:red;" class="font"></span></td>
                      </tr>
                      <tr>
                        <td align="right" width="20%"><strong><em class="star_red">*</em> Interior Gallery :</strong></td>
                        <td width="29%"><input type="file" class="lang_box" name="boatInterior_gallery[]" id="boatInterior_gallery" multiple/>
                          <span id="msginboat_gallery" style="color:red;" class="font"></span></td>
                      </tr>
                    </table>
                  </div>
                  <div id="lang0_5" class="pans">
                    <table width="97%" cellpadding="0" cellspacing="4" class="add_language">
                      <tr>
                        <td align="right" width="20%"><strong><em class="star_red">*</em> Draft-Drive Up-High Trim :</strong></td>
                        <td width="29%"><input type="text" class="lang_box" name="draft_drive_up_high_trim" id="draft_drive_up_high_trim" value="<?php echo $results['common'][0]->draft_drive_up_high_trim; ?>"/>
                          <span id="msgdraft_drive_up_high_trim" style="color:red;" class="font"></span></td>
                        <td align="right" width="20%"><strong><em class="star_red">*</em> Draft-Drive Down :</strong></td>
                        <td><input type="text" class="lang_box" name="draft_drive_down" id="draft_drive_down" value="<?php echo $results['common'][0]->draft_drive_down; ?>"/>
                          <span id="msgdraft_drive_down" style="color:red;" class="font"></span></td>
                      </tr>
                      <tr>
                        <td align="right" width="20%"><strong><em class="star_red">*</em> Deadrise :</strong></td>
                        <td width="29%"><input type="text" class="lang_box" name="deadrise" id="deadrise"  value="<?php echo $results['common'][0]->deadrise; ?>"/>
                          <span id="msgdeadrise" style="color:red;" class="font"></span></td>
                        <td align="right" width="20%"><strong><em class="star_red">*</em> Approximate Dry Weight :</strong></td>
                        <td><input type="text" class="lang_box" name="approx_dry_weight" id="approx_dry_weight"  value="<?php echo $results['common'][0]->approx_dry_weight; ?>"/>
                          <span id="msgapprox_dry_weight" style="color:red;" class="font"></span></td>
                      </tr>
                      <tr>
                        <td align="right" width="20%"><strong><em class="star_red">*</em> Estimated Height On Trailer - Top of Windshield :</strong></td>
                        <td width="29%"><input type="text" class="lang_box" name="estimated_height_on_trailer_top_of_windshield" id="estimated_height_on_trailer_top_of_windshield" value="<?php echo $results['common'][0]->estimated_height_on_trailer_top_windshield; ?>"/>
                          <span id="msgestimated_height_on_trailer_top_of_windshield" style="color:red;" class="font"></span></td>
                        <td align="right" width="20%"><strong><em class="star_red">*</em> Boat Height - Windshield To Keel :</strong></td>
                        <td><input type="text" class="lang_box" name="boat_height_windshield_to_keel" id="boat_height_windshield_to_keel" value="<?php echo $results['common'][0]->boat_height_windshield_to_keel; ?>"/>
                          <span id="msgboat_height_windshield_to_keel" style="color:red;" class="font"></span></td>
                      </tr>
                      <tr>
                        <td align="right" width="20%"><strong><em class="star_red">*</em> Bridge Clearance - Top Up :</strong></td>
                        <td width="29%"><input type="text" class="lang_box" name="bridge_clearance_topup" id="bridge_clearance_topup" value="<?php echo $results['common'][0]->bridge_clearance_top_up; ?>"/>
                          <span id="msgbridge_clearance_topup" style="color:red;" class="font"></span></td>
                        <td align="right" width="20%"><strong><em class="star_red">*</em> Bridge Clearance - Top Down :</strong></td>
                        <td><input type="text" class="lang_box"  name="bridge_clearance_topDown" id="bridge_clearance_topDown" value="<?php echo $results['common'][0]->bridge_clearance_top_down; ?>"/>
                          <span id="msgbridge_clearance_topDown" style="color:red;" class="font"></span></td>
                      </tr>
                      <tr>
                        <td align="right" width="20%"><strong><em class="star_red">*</em> Cockpit Depth - Helm :</strong></td>
                        <td width="29%"><input type="text" class="lang_box"   name="cockpit_depth_helm" id="cockpit_depth_helm" value="<?php echo $results['common'][0]->cockpit_depth_helm; ?>"/>
                          <span id="msgcockpit_depth_helm" style="color:red;" class="font"></span></td>
                        <td align="right" width="20%"><strong><em class="star_red">*</em> Cockpit Storage :</strong></td>
                        <td><input type="text" class="lang_box" name="cockpit_storage" id="cockpit_storage" value="<?php echo $results['common'][0]->cockpit_storage; ?>"/>
                          <span id="msgcockpit_storage" style="color:red;" class="font"></span></td>
                      </tr>
                    </table>
                  </div>
                  <div id="lang0_6" class="pans">
                    <table width="97%" cellpadding="0" cellspacing="4" class="add_language">
                      
					  
                      <tr>
                        <th width="2%"></th>
                        <th align="left" width="18%"><strong>Cabins</strong></th>
                        <th>Cabin Options </th>
                         <th align="left" width="14%">No. of Cabin</th>
                        <th width="14%">No. of Person</th>
                        <th width="14%">Price</th>
                        
                      </tr>
					  <tr>
					  <td colspan="6"><hr /></td>
					  </tr>
					  
					  <?php
					  
					   foreach($cabins as $cabin): ?>
                      <tr>
                        <td width="2%"><input class="lang_box" id="cabin_<?php echo $cabin['id']; ?>" value="<?php echo $cabin['id'] ?>" name="cabin[<?php echo $cabin['id']; ?>]" type="checkbox" <?php echo $boatCabin[$cabin['id']][0]['id']?"checked":"";?> /></td>
                        
                        
                       
                        
                        
                        <td align="left" width="28%"><strong><?php echo $cabin['cabin'] ?> </strong></td>
                        
                        
                         <td class="tdDrop">
                        
                        <?php 
						
						if(!empty($boatCabin[$cabin['id']][0]['cabin_options'])){
							$mkDataArray = explode(",",$boatCabin[$cabin['id']][0]['cabin_options']);
						}
						
						$allCabinOptions = $this->getCabinOptionByCabinId($cabin['id']); ?>
                        
                        <select id="cboption_<?php echo $cabin['id']; ?>" name="cboption_<?php echo $cabin['id']; ?>[]" multiple="multiple" class="mdrop" >
                        	
                            <?php foreach($allCabinOptions AS $allCabinOption){ ?>
                        
                            <option <?php if(in_array($allCabinOption['id'],$mkDataArray)){ ?> selected="selected" <?php } ?> value="<?php echo $allCabinOption['id'] ?>"><?php echo $allCabinOption['option'] ?></option>
                            <?php } ?>
                            </select> <br />
                        <span id="msgcboption_<?php echo $cabin['id']; ?>" style="color:red;" class="font"></span>
                        
                        </td>
                        
                        
                        <td align="left" width="14%">
                        <input class="lang_box" type="text" name="nocabin[<?php echo $cabin['id']; ?>]" id="nocabin_<?php echo $cabin['id']; ?>" placeholder="No. of <?php echo $cabin['cabin'] ?>" onkeyup="Numericchk(this.value,this.id)" maxlength="3" value="<?php echo $boatCabin[$cabin['id']][0]['no_of_cabin'];?>"/><br />
                        <span id="msgnocabin_<?php echo $cabin['id']; ?>" style="color:red;" class="font"></span></td>
                        <td width="14%">
                        <input class="lang_box" type="text" name="noperson[<?php echo $cabin['id']; ?>]" id="noperson_<?php echo $cabin['id']; ?>" placeholder="No. of persons/cabin"  onkeyup="Numericchk(this.value,this.id)" maxlength="3" value="<?php echo $boatCabin[$cabin['id']][0]['no_of_person'];?>"/><br />
                        <span id="msgnoperson_<?php echo $cabin['id']; ?>" style="color:red;" class="font"></span></td>
                        <td width="14%"><input class="lang_box" id="cbprice_<?php echo $cabin['id']; ?>" value="<?php echo $boatCabin[$cabin['id']][0]['cabin_price'];?>" name="cbprice[<?php echo $cabin['id']; ?>]"  onkeyup="Numericchk(this.value,this.id)" placeholder="Price/cabin"/><br />
                        <span id="msgcbprice_<?php echo $cabin['id']; ?>" style="color:red;" class="font"></span></td>
                      </tr>
                      <?php endforeach; ?>
                     
                      
                    </table>
                  </div>
                  <!--<div id="lang0_7" class="pans">
                    <table width="97%" cellpadding="0" cellspacing="4" class="add_language">
                      <?php foreach($equipments as $equipment):
					  	$query = "";
					   ?>
                      <tr>
                        <td align="right" width="12%"><strong><em class="star_red">*</em><?php echo $equipment['equipment'] ?> :</strong></td>
                        <td width="19%"><input class="lang_box" id="equipment_<?php echo $equipment['id']; ?>" value="<?php echo $equipment['id'] ?>" name="equipment[<?php echo $equipment['id']; ?>]" type="checkbox" <?php echo $boatEq[$equipment['id']][0]['id']?"checked":"";?> /></td>
                        <td align="right" width="12%"><strong><em class="star_red">*</em> Price :</strong></td>
                        <td width="23%"><select class="lang_box" name="eqtype[<?php echo $equipment['id']; ?>]" id="eqtype<?php echo $equipment['id']; ?>" >
                            <option value="paid" <?php echo $boatEq[$equipment['id']][0]['eq_type']=="paid"?"selected":"";?>  >Paid</option>
                            <option value="free" <?php echo $boatEq[$equipment['id']][0]['eq_type']=="free"?"selected":"";?>  >Free</option>
                          </select>
                          <br />
                        <span id="msgeqtype<?php echo $equipment['id']; ?>" style="color:red;" class="font"></span>
                          </td>
                        <td align="right" width="15%"><strong><em class="star_red">*</em> If paid(Price) :</strong></td>
                        <td width="24%"><input class="lang_box" id="eqprice_<?php echo $equipment['id']; ?>" value="<?php echo $boatEq[$equipment['id']][0]['eq_value'];?>" name="eqprice[<?php echo $equipment['id']; ?>]" onkeyup="Numericchk(this.value,this.id)"/><br />
                        <span id="msgeqprice_<?php echo $equipment['id']; ?>" style="color:red;" class="font"></span></td>
                      </tr>
                      <?php endforeach; ?>
                    </table>
                  </div>-->
                  
                  <!--<div id="lang0_17" class="pans">
                    <table width="97%" cellpadding="0" cellspacing="4">
                      <?php foreach($beverages as $beverage):
					  	$query = "";
					   ?>
                      <tr>
                        <td align="right" width="12%"><strong><em class="star_red">*</em><?php echo $beverage['beverage'] ?> :</strong></td>
                        <td width="19%"><input class="lang_box" id="beverage_<?php echo $beverage['id']; ?>" value="<?php echo $beverage['id'] ?>" name="beverage[<?php echo $beverage['id']; ?>]" type="checkbox" <?php echo $boatBv[$beverage['id']][0]['id']?"checked":"";?> /></td>
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
                  </div>-->
                  
                  
                  <!--<div id="lang0_18" class="pans">
                    <table width="97%" cellpadding="0" cellspacing="4">
                      <?php foreach($foods as $food):
					  	$query = "";
					   ?>
                      <tr>
                        <td align="right" width="12%"><strong><em class="star_red">*</em><?php echo $food['food'] ?> :</strong></td>
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
                  </div>-->
                  
                </div>
              </div>
            </fieldset>
              <!--TOP TABING END HERE--> 
            </div>
            
            <fieldset>
            <legend><strong>Featured & Technical Options</strong></legend>
            <div class='tab-container'>
                <ul class='etabs'>
                  <li class='tab'><a href="#lang0_11">Technical Options</a></li>
                  <li class='tab'><a href="#lang0_12">Cockpit</a></li>
                  <li class='tab'><a href="#lang0_13">Helm</a></li>
                  <li class='tab'><a href="#lang0_14">Hull & Deck</a></li>
                  <li class='tab'><a href="#lang0_15">Engine Power Options</a></li>
                  <li class='tab'><a href="#lang0_16">Engine Features</a></li>
                </ul>
                <div class='panel-container'>
                  <div id="lang0_11" class="pans">
                    <table width="97%" cellpadding="0" cellspacing="4" class="add_language" >
                      
                       <tr>
               <?php $g = 1; foreach($techOptions as $techOption):  ?>
                <td align="right" width="20%" style="text-align:left;">
                <input type="checkbox"  class="" id="" value="<?php echo $techOption['id']; ?>" name="technicalOption[]" <?php if(strpos($results['common'][0]->boat_technical,$techOption['id']) !== false){ ?> checked="checked" <?php } ?>/> <?php echo $techOption['title']; ?> 
                        </td>
                <?php if($g % 2 == 0){  ?>
              			</tr><tr>
                <?php  } $g++;endforeach; ?>
                </tr>
                      
                    </table>
                  </div>
                  <div id="lang0_12" class="pans">
                    <table width="97%" cellpadding="0" cellspacing="4" class="add_language">
                       <tr>
               <?php $g = 1;foreach($cockpitFeatures as $cockpitFeature):  ?>
                <td align="right" width="20%" style="text-align:left;">
                <input type="checkbox" class="" id="" value="<?php echo $cockpitFeature['id']; ?>" name="cockpit[]" <?php if(strpos($results['common'][0]->boat_cockpit,$cockpitFeature['id']) !== false){ ?> checked="checked" <?php } ?>/> <?php echo $cockpitFeature['title']; ?> 
                        </td>
                <?php if($g % 2 == 0){  ?>
              			</tr><tr>
                <?php  } $g++;endforeach; ?>
                </tr>
                    </table>
                  </div>
                  <div id="lang0_13" class="pans">
                    <table width="97%" cellpadding="0" cellspacing="4" class="add_language">
                       <tr>
               <?php $g = 1;foreach($helmFeatures as $helmFeature):  ?>
                <td align="right" width="20%" style="text-align:left;">
                <input type="checkbox" class="" id="" value="<?php echo $helmFeature['id']; ?>" name="helm[]" <?php if(strpos($results['common'][0]->boat_helm,$helmFeature['id']) !== false){ ?> checked="checked" <?php } ?>/> <?php echo $helmFeature['title']; ?> 
                        </td>
                <?php if($g % 2 == 0){  ?>
              			</tr><tr>
                <?php  } $g++;endforeach; ?>
                </tr>
                    </table>
                  </div>
                  <div id="lang0_14" class="pans">
                    <table width="97%" cellpadding="0" cellspacing="4" class="add_language">
                       <tr>
               <?php $g = 1;foreach($hullDecks as $hullDeck):  ?>
                <td align="right" width="20%" style="text-align:left;">
                <input type="checkbox" class="" id="" value="<?php echo $hullDeck['id']; ?>" name="hullDeck[]" <?php if(strpos($results['common'][0]->boat_hulldeck,$hullDeck['id']) !== false){ ?> checked="checked" <?php } ?>/> <?php echo $hullDeck['title']; ?> 
                        </td>
                <?php if($g % 2 == 0){  ?>
              			</tr><tr>
                <?php  } $g++;endforeach; ?>
                </tr>
                    </table>
                  </div>
                  <div id="lang0_15" class="pans">
                    <table width="97%" cellpadding="0" cellspacing="4" class="add_language">
                       <tr>
               <?php $g = 1;foreach($enginePowers as $enginePower):  ?>
                <td align="right" width="20%" style="text-align:left;">
                <input type="checkbox" class="" id="" value="<?php echo $enginePower['id']; ?>" name="enginePower[]" <?php if(strpos($results['common'][0]->boat_enginepower,$enginePower['id']) !== false){ ?> checked="checked" <?php } ?>/> <?php echo "<b>".$enginePower['power']."</b> ".$enginePower['title']; ?> 
                        </td>
                <?php if($g % 2 == 0){  ?>
              			</tr><tr>
                <?php  } $g++;endforeach; ?>
                </tr>
                    </table>
                  </div>
                  <div id="lang0_16" class="pans">
                    <table width="97%" cellpadding="0" cellspacing="4" class="add_language">
                       <tr>
               <?php $g = 1;foreach($engineFeatures as $engineFeature):  ?>
                <td align="right" width="20%" style="text-align:left;">
                <input type="checkbox" class="" id="" value="<?php echo $engineFeature['id']; ?>" name="engineFeature[]" <?php if(strpos($results['common'][0]->boat_engine,$engineFeature['id']) !== false){ ?> checked="checked" <?php } ?>/> <?php echo $engineFeature['title']; ?> :
                        </td>
                <?php if($g % 2 == 0){  ?>
              			</tr><tr>
                <?php  } $g++;endforeach; ?>
                </tr>
                    </table>
                  </div>
                </div>
              </div>
            </fieldset>
            
            <div id="accordion_data">
              <?php
foreach($results1 as $language) {
?>
              <h3><a href="#"><?php echo $language['content'];?></a></h3>
              <div class="acco_cont" style="border:none !important;">
                <div class='tab-container'>
                  <ul class='etabs'>
                    <li class='tab'><a href="#lang<?php echo $language['id'];?>_0">General Info
                      <?php //echo $language['general_info'];?>
                      </a></li>
                    <li class='tab'><a href="#lang<?php echo $language['id'];?>_3">Floorplans</a></li>
                    <li class='tab'><a href="#lang<?php echo $language['id'];?>_6">Boat Hull Detail</a></li>
                    <li class='tab'><a href="#lang<?php echo $language['id'];?>_7">Safty Detail</a></li>
                  </ul>
                  <div class='panel-container'>
                    <div id="lang<?php echo $language['id'];?>_0" class="pans">
                      <table width="97%" cellpadding="0" cellspacing="4" class="add_language">
                        <tr>
                          <td align="right" width="10%"><strong><em class="star_red">*</em> Name :</strong></td>
                          <td width="29%" align=""><input type="text" class="lang_box" name="boat_name<?php echo $language['id'];?>" id="boat_name<?php echo $language['id'];?>" value="<?php echo $results['content'][$language['id']]['boat_name'];?>"/>
                            <span id="msgboat_name<?php echo $language['id'];?>" style="color:red;" class="font"></span></td>
                        </tr>
                        <tr valign="top">
                          <td align="right" width="10%"><strong><em class="star_red">*</em> Description :</strong></td>
                          <td width="29%" align=""><textarea rows="7" cols="60" class="lang_box" name="description<?php echo $language['id'];?>" id="description<?php echo $language['id'];?>"><?php echo $results['content'][$language['id']]['description'];?></textarea><br />
                            <span id="msgdescription<?php echo $language['id'];?>" style="color:red;" class="font"></span></td>
                        </tr>
                      </table>
                    </div>
                    
                    
                    <div id="lang<?php echo $language['id'];?>_3" class="pans">
                      <table width="97%" cellpadding="0" cellspacing="4" class="add_language">
                        <tr>
                          <td style="width:99%;" align="left" valign="top"><strong><em class="star_red"></em> Text For Images:</strong></td>
                        </tr>
                        <tr>
                          <td width="99%"><textarea rows="7" cols="60" class="ckeditor" name="imgdescription<?php echo $language['id'];?>" id="imgdescription<?php echo $language['id'];?>"><?php echo $results['content'][$language['id']]['imgdescription'];?></textarea></td>
                        </tr>
                      </table>
                    </div>
                    
                    
                    <div id="lang<?php echo $language['id'];?>_6" class="pans">
                      <table width="97%" cellpadding="0" cellspacing="4" class="add_language">
                       
                        <tr>
                          <td align="right" valign="top"><strong><em class="star_red"></em> Design Hull Detail:</strong></td>
                          <td colspan="3"><textarea rows="7" cols="60" class="ckeditor" name="design_hull_detail<?php echo $language['id'];?>" id="design_hull_detail<?php echo $language['id'];?>"><?php echo $results['content'][$language['id']]['design_hull_detail'];?></textarea></td>
                        </tr>
                      </table>
                    </div>
                    <div id="lang<?php echo $language['id'];?>_7" class="pans">
                      <table width="97%" cellpadding="0" cellspacing="4" class="add_language">
                        <tr>
                          <td align="right" valign="top"><strong><em class="star_red"></em> Safty Detail:</strong></td>
                          <td colspan="3"><textarea rows="7" cols="60" class="ckeditor" name="safty_detail<?php echo $language['id'];?>" id="safty_detail<?php echo $language['id'];?>"><?php echo $results['content'][$language['id']]['safty_detail'];?></textarea></td>
                        </tr>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              <?php } ?>
            </div>
            <table width="100%" cellpadding="0" cellspacing="0" class="tab_button">
              <tr>
                <td width="70%">&nbsp;</td>
                <td align="center" ><button class="lang_button"><strong>Submit</strong></button>
                  <button class="lang_button_re" type="reset" onclick="resetBoat()"><strong>Reset</strong></button></td>
              </tr>
            </table><br />

            <input type="hidden" name="control" value="boat"/>
            <input type="hidden" name="edit" value="1"/>
            <input type="hidden" name="task" value="save"/>
            <input type="hidden" name="id" id="idd" value="<?php echo $results['common'][0]->id; ?>"  />
            
            
               <input type="hidden" name="tpages" id="tpages" value="<?php echo $_REQUEST['tpages']; ?>"  />
              <input type="hidden" name="page" id="page" value="<?php echo $_REQUEST['page'];?>"  />
            
          </form>
        </div>
      </div>
    </div>
</div>


<script type="text/javascript">

function chkNumeric(val,id){
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

function numericWithoutPoint(sText)
{
 var ValidChars = "0123456789,";
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

function boatValidate()
{  



	var chk=1;
   var id=document.getElementById('idd').value;	
   
   /*FOR CABIN DATA VALIDATION*/
   var cabinVal = 1;
   var arr = [<?php echo $validationCabinArr ?>];
		for(a=0; a < arr.length;a++){
				
				if(document.getElementById('nocabin_'+arr[a]).value == '' && document.getElementById('cabin_'+arr[a]).checked) { 
					document.getElementById('msgnocabin_'+arr[a]).innerHTML ="*Required";
					chk=0;
				}else if(!numeric(document.getElementById('nocabin_'+arr[a]).value) && document.getElementById('cabin_'+arr[a]).checked) { 
					document.getElementById('msgnocabin_'+arr[a]).innerHTML ="*Must be numeric only.";
					chk=0;
				}else {
					document.getElementById('msgnocabin_'+arr[a]).innerHTML = "";
				}
				
				if(document.getElementById('noperson_'+arr[a]).value == '' && document.getElementById('cabin_'+arr[a]).checked) { 
					document.getElementById('msgnoperson_'+arr[a]).innerHTML ="*Required";
					chk=0;
				}else if(!numeric(document.getElementById('noperson_'+arr[a]).value) && document.getElementById('cabin_'+arr[a]).checked) { 
					document.getElementById('msgnoperson_'+arr[a]).innerHTML ="*Must be numeric only.";
					chk=0;
				}else {
					document.getElementById('msgnoperson_'+arr[a]).innerHTML = "";
				}
				
				if(document.getElementById('cbprice_'+arr[a]).value == '' && document.getElementById('cabin_'+arr[a]).checked) { 
					document.getElementById('msgcbprice_'+arr[a]).innerHTML ="*Required.";
					chk=0;
				}else if(!numeric(document.getElementById('cbprice_'+arr[a]).value) && document.getElementById('cabin_'+arr[a]).checked) { 
					document.getElementById('msgcbprice_'+arr[a]).innerHTML ="*Must be numeric only.";
					chk=0;
				}else {
					document.getElementById('msgcbprice_'+arr[a]).innerHTML = "";
				}
				
				if(document.getElementById('cboption_'+arr[a]).value == '' && document.getElementById('cabin_'+arr[a]).checked) { 
					document.getElementById('msgcboption_'+arr[a]).innerHTML ="*Required.";
					chk=0;
				}else {
					document.getElementById('msgcboption_'+arr[a]).innerHTML = "";
				}
				
		}
   /*FOR CABIN DATA VALIDATION*/
   
    /*FOR Equipment VALIDATION*/
   /*var equipVal = 1;
   var equiparr = [<?php echo $validationEquipArr ?>];
  
		for(a=0; a < equiparr.length;a++){
				
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
				
		}*/
   /*END Equipment DATA VALIDATION*/ 
   
 
    /*FOR Beverage VALIDATION*/
 /*  var beverageVal = 1;
   var beveragearr = [<?php echo $validationBeverageArr ?>];
		for(a=0; a < beveragearr.length;a++){
				
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
			else {
					document.getElementById('msgbvprice_'+beveragearr[a]).innerHTML = "";
				}
				
		}*/
   /*END beverage DATA VALIDATION*/    
   
   
   
   
 
    /*FOR Foods VALIDATION*/
  /* var foodVal = 1;
   var foodarr = [<?php echo $validationFoodArr ?>];
		for(a=0; a < foodarr.length;a++){
				
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
				else {
					
					document.getElementById('msgfdprice_'+foodarr[a]).innerHTML = "";
				}
				
		}*/
   /*END Foods DATA VALIDATION*/    
   
   
   
   
   
   
   if(document.getElementById('company').value == '') { 
	document.getElementById('msgcompany').innerHTML ="*Required field.";
	chk=0;
	}else {
	document.getElementById('msgcompany').innerHTML = "";
	}
	
   if(document.getElementById('c_branch').value == '') { 
	document.getElementById('msgc_branch').innerHTML ="*Required field.";
	chk=0;
	}else {
	document.getElementById('msgc_branch').innerHTML = "";
	}
	
	if(document.getElementById('operator').value == '') { 
	document.getElementById('msgoperator').innerHTML ="*Required field.";
	chk=0;
	}else {
	document.getElementById('msgoperator').innerHTML = "";
	}
	
	if(document.getElementById('country_id').value == '') { 
	document.getElementById('msgcountry').innerHTML ="*Required field.";
	chk=0;
	}else {
	document.getElementById('msgcountry').innerHTML = "";
	}
	
	if(document.getElementById('boat_price').value == '') { 
	document.getElementById('msgboat_price').innerHTML ="*Required field.";
	chk=0;
	}/*else if(!numeric(document.getElementById('boat_length').value)){ 
	document.getElementById('msgboat_length').innerHTML ="*Must be numeric only.";
	document.getElementById('msgboat_length').className ="error-message";
	chk=0;	
    }*/
	else {
	document.getElementById('msgboat_price').innerHTML = "";
	}
	
	if(document.getElementById('boat_length').value == '') { 
	document.getElementById('msgboat_length').innerHTML ="*Required field.";
	chk=0;
	}/*else if(!numeric(document.getElementById('boat_length').value)){ 
	document.getElementById('msgboat_length').innerHTML ="*Must be numeric only.";
	document.getElementById('msgboat_length').className ="error-message";
	chk=0;	
    }*/
	else {
	document.getElementById('msgboat_length').innerHTML = "";
	}
	
	
	if(document.getElementById('boat_beam').value == '') { 
	document.getElementById('msgboat_beam').innerHTML ="*Required field.";
	chk=0;
	}else {
	document.getElementById('msgboat_beam').innerHTML = "";
	}
	
	if(document.getElementById('child_discount1').value == '') { 
	document.getElementById('msgchild_discount1').innerHTML ="*Required field.";
	chk=0;
	}else {
	document.getElementById('msgchild_discount1').innerHTML = "";
	}
	
	if(document.getElementById('child_discount2').value == '') { 
	document.getElementById('msgchild_discount2').innerHTML ="*Required field.";
	chk=0;
	}else {
	document.getElementById('msgchild_discount2').innerHTML = "";
	}
	
	if(document.getElementById('hull_type').value == '') { 
	document.getElementById('msghull_type').innerHTML ="*Required field.";
	chk=0;
	}else {
	document.getElementById('msghull_type').innerHTML = "";
	}
	
	if(document.getElementById('hull_material').value == '') { 
	document.getElementById('msghull_material').innerHTML ="*Required field.";
	chk=0;
	}else {
	document.getElementById('msghull_material').innerHTML = "";
	}
	
	if(document.getElementById('boat_width').value == '') { 
	document.getElementById('msgboat_width').innerHTML ="*Required field.";
	chk=0;
	}else {
	document.getElementById('msgboat_width').innerHTML = "";
	}
	
	if(document.getElementById('fresh_water_capacity').value == '') { 
	document.getElementById('msgfresh_water_capacity').innerHTML ="*Required field.";
	chk=0;
	}else {
	document.getElementById('msgfresh_water_capacity').innerHTML = "";
	}
	
	if(document.getElementById('fuel_capacity').value == '') { 
	document.getElementById('msgfuel_capacity').innerHTML ="*Required field.";
	chk=0;
	}else {
	document.getElementById('msgfuel_capacity').innerHTML = "";
	}
	
	if(document.getElementById('men_capacity').value == '') { 
	document.getElementById('msgmen_capacity').innerHTML ="*Required field.";
	chk=0;
	}else if(!numericWithoutPoint(document.getElementById('men_capacity').value)){ 
	document.getElementById('msgmen_capacity').innerHTML ="*Must be numeric only.";
	chk=0;	
    }else {
	document.getElementById('msgmen_capacity').innerHTML = "";
	}
	
	
	
  if(document.getElementById('draft_drive_up_high_trim').value == '') { 
	document.getElementById('msgdraft_drive_up_high_trim').innerHTML ="*Required field.";
	chk=0;
	}else {
	document.getElementById('msgdraft_drive_up_high_trim').innerHTML = "";
	}
	
  if(document.getElementById('draft_drive_down').value == '') { 
	document.getElementById('msgdraft_drive_down').innerHTML ="*Required field.";
	chk=0;
	}else {
	document.getElementById('msgdraft_drive_down').innerHTML = "";
	}
	
  if(document.getElementById('deadrise').value == '') { 
	document.getElementById('msgdeadrise').innerHTML ="*Required field.";
	chk=0;
	}else {
	document.getElementById('msgdeadrise').innerHTML = "";
	}
	
  if(document.getElementById('approx_dry_weight').value == '') { 
	document.getElementById('msgapprox_dry_weight').innerHTML ="*Required field.";
    chk=0;
	}else {
	document.getElementById('msgapprox_dry_weight').innerHTML = "";
	}
	
 	
  if(document.getElementById('estimated_height_on_trailer_top_of_windshield').value == '') { 
	document.getElementById('msgestimated_height_on_trailer_top_of_windshield').innerHTML ="*Required field.";
    chk=0;
	}else {
	document.getElementById('msgestimated_height_on_trailer_top_of_windshield').innerHTML = "";
	}
	
  if(document.getElementById('boat_height_windshield_to_keel').value == '') { 
	document.getElementById('msgboat_height_windshield_to_keel').innerHTML ="*Required field.";
	chk=0;
	}else {
	document.getElementById('msgboat_height_windshield_to_keel').innerHTML = "";
	}
	
  if(document.getElementById('bridge_clearance_topup').value == '') { 
	document.getElementById('msgbridge_clearance_topup').innerHTML ="*Required field.";
	chk=0;
	}else {
	document.getElementById('msgbridge_clearance_topup').innerHTML = "";
	}
	
  if(document.getElementById('bridge_clearance_topDown').value == '') { 
	document.getElementById('msgbridge_clearance_topDown').innerHTML ="*Required field.";
	chk=0;
	}else {
	document.getElementById('msgbridge_clearance_topDown').innerHTML = "";
	}
	
  if(document.getElementById('cockpit_depth_helm').value == '') { 
	document.getElementById('msgcockpit_depth_helm').innerHTML ="*Required field.";
	chk=0;
	}else {
	document.getElementById('msgcockpit_depth_helm').innerHTML = "";
	}
	
	
  if(document.getElementById('cockpit_storage').value == '') { 
	document.getElementById('msgcockpit_storage').innerHTML ="*Required field.";
	chk=0;
	}else {
	document.getElementById('msgcockpit_storage').innerHTML = "";
	}
	
 
 if(document.getElementById('boat_name1').value=='') {
	chk=0;	
	document.getElementById('msgboat_name1').innerHTML="*Required field.";
	document.getElementById('msgboat_name1').className ="error-message";
	}else  {
	document.getElementById('msgboat_name1').innerHTML="";
	  }
	
 if(document.getElementById('description1').value=='') {
	chk=0;	
	document.getElementById('msgdescription1').innerHTML="*Required field.";
	}else  {
	document.getElementById('msgdescription1').innerHTML="";
	  }
	
	
	
 if(document.getElementById("idd").value=='') {
			var upper_deck = document.getElementById('upper_deck').value;	
			var upper_deckfzipLength = upper_deck.length;
			var upper_deckfzipDot = upper_deck.lastIndexOf(".");
			
			var upper_deckfzipType = upper_deck.substring(upper_deckfzipDot,upper_deckfzipLength);
		
			if(upper_deck) {
				
					if((upper_deckfzipType==".jpg")||(upper_deckfzipType==".jpg")||(upper_deckfzipType==".gif")||(upper_deckfzipType==".png")) {
						document.getElementById('msgupper_deck').innerHTML = "";
					}
					else {	chk = 0;
						 document.getElementById('msgupper_deck').innerHTML = "Invalid file format only (jpg,gif,png)"; 
					}
			     }
			else {
					document.getElementById('msgupper_deck').innerHTML = "";
			}

			 var bimage = document.getElementById('bimage').value;
			var bimagefzipLength = bimage.length;
			var bimagefzipDot = bimage.lastIndexOf(".");
			var bimagefzipType = bimage.substring(bimagefzipDot,bimagefzipLength);
			if(bimage) {
				
					if((bimagefzipType==".jpg")||(bimagefzipType==".jpg")||(bimagefzipType==".gif")||(bimagefzipType==".png")) {
					       document.getElementById('msgbimage').innerHTML = "";
					}
					else {	chk = 0;
						 document.getElementById('msgbimage').innerHTML = "Invalid file format only (jpg,gif,png)"; 
					}
			     }
			else {
					
				if(!id) {  chk = 0;
				document.getElementById('msgbimage').innerHTML = "Please upload an image";
					}
				else {
					document.getElementById('msgbimage').innerHTML = "";
				}
			
			}
			
			
			
				
			 var boatExterior_gallery = document.getElementById('boatExterior_gallery').value;
			var boatExterior_galleryfzipLength = boatExterior_gallery.length;
			var boatExterior_galleryfzipDot = boatExterior_gallery.lastIndexOf(".");
			var boatExterior_galleryfzipType = boatExterior_gallery.substring(boatExterior_galleryfzipDot,boatExterior_galleryfzipLength);
			if(boatExterior_gallery) {
				
					if((boatExterior_galleryfzipType==".jpg")||(boatExterior_galleryfzipType==".jpg")||(boatExterior_galleryfzipType==".gif")||(boatExterior_galleryfzipType==".png")) {
					       document.getElementById('msgexboat_gallery').innerHTML = "";
					}
					else {	chk = 0;
						 document.getElementById('msgexboat_gallery').innerHTML = "Invalid file format only (jpg,gif,png)"; 
					}
			     }
			else {
					
				if(!id) {  chk = 0;
				document.getElementById('msgexboat_gallery').innerHTML = "Please upload an image";
					}
				else {
					document.getElementById('msgexboat_gallery').innerHTML = "";
				}
			
			}
			
			
			
						
					
			 var boatInterior_gallery = document.getElementById('boatInterior_gallery').value;
			var boatInterior_galleryLength = boatInterior_gallery.length;
			var boatInterior_galleryDot = boatInterior_gallery.lastIndexOf(".");
			var boatInterior_galleryType = boatInterior_gallery.substring(boatInterior_galleryDot,boatInterior_galleryLength);
			if(boatInterior_gallery) {
				
					if((boatInterior_galleryType==".jpg")||(boatInterior_galleryType==".jpg")||(boatInterior_galleryType==".gif")||(boatInterior_galleryType==".png")) {
					       document.getElementById('msginboat_gallery').innerHTML = "";
					}
					else {	chk = 0;
						 document.getElementById('msginboat_gallery').innerHTML = "Invalid file format only (jpg,gif,png)"; 
					}
			     }
			else {
					
				if(!id) {  chk = 0;
				document.getElementById('msginboat_gallery').innerHTML = "Please upload an image";
					}
				else {
					document.getElementById('msginboat_gallery').innerHTML = "";
				}
			
			}
			
			
					
						
				
			 var main_deck = document.getElementById('main_deck').value;
			var main_deckLength = main_deck.length;
			var main_deckDot = main_deck.lastIndexOf(".");
			var main_deckType = main_deck.substring(main_deckDot,main_deckLength);
			if(main_deck) {
				
					if((main_deckType==".jpg")||(main_deckType==".jpg")||(main_deckType==".gif")||(main_deckType==".png")) {
					       document.getElementById('msgmain_deck').innerHTML = "";
					}
					else {	chk = 0;
						 document.getElementById('msgmain_deck').innerHTML = "Invalid file format only (jpg,gif,png)"; 
					}
			     }
			else {
					
				if(!id) {  chk = 0;
				document.getElementById('msgmain_deck').innerHTML = "Please upload an image";
					}
				else {
					document.getElementById('msgmain_deck').innerHTML = "";
				}
			
			}
            				
		
			 var lower_deck = document.getElementById('lower_deck').value;
			var lower_deckLength = lower_deck.length;
			var lower_deckDot = lower_deck.lastIndexOf(".");
			var lower_deckType = lower_deck.substring(lower_deckDot,lower_deckLength);
			if(lower_deck) {
				
					if((lower_deckType==".jpg")||(lower_deckType==".jpg")||(lower_deckType==".gif")||(lower_deckType==".png")) {
					       document.getElementById('msglower_deck').innerHTML = "";
					}
					else {	chk = 0;
						 document.getElementById('msglower_deck').innerHTML = "Invalid file format only (jpg,gif,png)"; 
					}
			     }
			else {
					document.getElementById('msglower_deck').innerHTML = "";
			
			}
			
    }
    else {		
			
			var upper_deck = document.getElementById('upper_deck').value;	
			var upper_deckfzipLength = upper_deck.length;
			var upper_deckfzipDot = upper_deck.lastIndexOf(".");
			
			var upper_deckfzipType = upper_deck.substring(upper_deckfzipDot,upper_deckfzipLength);
		
			if(upper_deck) {
				
					if((upper_deckfzipType==".jpg")||(upper_deckfzipType==".jpg")||(upper_deckfzipType==".gif")||(upper_deckfzipType==".png")) {
						document.getElementById('msgupper_deck').innerHTML = "";
					}
					else {	chk = 0;
						 document.getElementById('msgupper_deck').innerHTML = "Invalid file format only (jpg,gif,png)"; 
					}
			     }
			else {
					document.getElementById('msgupper_deck').innerHTML = "";
			
			}


		
			 var bimage = document.getElementById('bimage').value;
			var bimagefzipLength = bimage.length;
			var bimagefzipDot = bimage.lastIndexOf(".");
			var bimagefzipType = bimage.substring(bimagefzipDot,bimagefzipLength);
			if(bimage) {
				
					if((bimagefzipType==".jpg")||(bimagefzipType==".jpg")||(bimagefzipType==".gif")||(bimagefzipType==".png")) {
					       document.getElementById('msgbimage').innerHTML = "";
					}
					else {	chk = 0;
						 document.getElementById('msgbimage').innerHTML = "Invalid file format only (jpg,gif,png)"; 
					}
			     }
			else {
					
				if(!id) {  chk = 0;
				document.getElementById('msgbimage').innerHTML = "Please upload an image";
					}
				else {
					document.getElementById('msgbimage').innerHTML = "";
				}
			
			}
			
			
			
				
			 var boatExterior_gallery = document.getElementById('boatExterior_gallery').value;
			var boatExterior_galleryfzipLength = boatExterior_gallery.length;
			var boatExterior_galleryfzipDot = boatExterior_gallery.lastIndexOf(".");
			var boatExterior_galleryfzipType = boatExterior_gallery.substring(boatExterior_galleryfzipDot,boatExterior_galleryfzipLength);
			if(boatExterior_gallery) {
				
					if((boatExterior_galleryfzipType==".jpg")||(boatExterior_galleryfzipType==".jpg")||(boatExterior_galleryfzipType==".gif")||(boatExterior_galleryfzipType==".png")) {
					       document.getElementById('msgexboat_gallery').innerHTML = "";
					}
					else {	chk = 0;
						 document.getElementById('msgexboat_gallery').innerHTML = "Invalid file format only (jpg,gif,png)"; 
					}
			     }
			else {
					
				if(!id) {  chk = 0;
				document.getElementById('msgexboat_gallery').innerHTML = "Please upload an image";
					}
				else {
					document.getElementById('msgexboat_gallery').innerHTML = "";
				}
			
			}
			
			
			
						
					
			 var boatInterior_gallery = document.getElementById('boatInterior_gallery').value;
			var boatInterior_galleryLength = boatInterior_gallery.length;
			var boatInterior_galleryDot = boatInterior_gallery.lastIndexOf(".");
			var boatInterior_galleryType = boatInterior_gallery.substring(boatInterior_galleryDot,boatInterior_galleryLength);
			if(boatInterior_gallery) {
				
					if((boatInterior_galleryType==".jpg")||(boatInterior_galleryType==".jpg")||(boatInterior_galleryType==".gif")||(boatInterior_galleryType==".png")) {
					       document.getElementById('msginboat_gallery').innerHTML = "";
					}
					else {	chk = 0;
						 document.getElementById('msginboat_gallery').innerHTML = "Invalid file format only (jpg,gif,png)"; 
					}
			     }
			else {
					
				if(!id) {  chk = 0;
				document.getElementById('msginboat_gallery').innerHTML = "Please upload an image";
					}
				else {
					document.getElementById('msginboat_gallery').innerHTML = "";
				}
			
			}
			
			
					
						
				
			 var main_deck = document.getElementById('main_deck').value;
			var main_deckLength = main_deck.length;
			var main_deckDot = main_deck.lastIndexOf(".");
			var main_deckType = main_deck.substring(main_deckDot,main_deckLength);
			if(main_deck) {
				
					if((main_deckType==".jpg")||(main_deckType==".jpg")||(main_deckType==".gif")||(main_deckType==".png")) {
					       document.getElementById('msgmain_deck').innerHTML = "";
					}
					else {	chk = 0;
						 document.getElementById('msgmain_deck').innerHTML = "Invalid file format only (jpg,gif,png)"; 
					}
			     }
			else {
					
				if(!id) {  chk = 0;
				document.getElementById('msgmain_deck').innerHTML = "Please upload an image";
					}
				else {
					document.getElementById('msgmain_deck').innerHTML = "";
				}
			
			}
            				
			
			 var lower_deck = document.getElementById('lower_deck').value;
			var lower_deckLength = lower_deck.length;
			var lower_deckDot = lower_deck.lastIndexOf(".");
			var lower_deckType = lower_deck.substring(lower_deckDot,lower_deckLength);
			if(lower_deck) {
				
					if((lower_deckType==".jpg")||(lower_deckType==".jpg")||(lower_deckType==".gif")||(lower_deckType==".png")) {
					       document.getElementById('msglower_deck').innerHTML = "";
					}
					else {	chk = 0;
						 document.getElementById('msglower_deck').innerHTML = "Invalid file format only (jpg,gif,png)"; 
					}
			     }
			else {
					document.getElementById('msglower_deck').innerHTML = "";
			}	
			
	}
	

	
	
  if(chk) {	
		return true;
		}
		else {
		return false;		
		}	

}

		


function resetBoat()	
	{ 
	
	document.getElementById('msgcompanybr').innerHTML = "";
	document.getElementById('msgoperator').innerHTML = "";
	document.getElementById('msgcompany').innerHTML = "";
	document.getElementById('msgcountry').innerHTML = "";
	document.getElementById('msgboat_price').innerHTML = "";
	document.getElementById('msgboat_length').innerHTML = "";
	document.getElementById('msgboat_beam').innerHTML = "";
	document.getElementById('msgfuel_capacity').innerHTML = "";
	document.getElementById('msgmen_capacity').innerHTML = "";
	document.getElementById('msgupper_deck').innerHTML = "";
	document.getElementById('msgbimage').innerHTML = "";
	document.getElementById('msgexboat_gallery').innerHTML = "";
	document.getElementById('msginboat_gallery').innerHTML = "";
	document.getElementById('msgdraft_drive_up_high_trim').innerHTML = "";
	document.getElementById('msgdraft_drive_down').innerHTML = "";
	document.getElementById('msgdeadrise').innerHTML = "";
	document.getElementById('msgapprox_dry_weight').innerHTML = "";
	document.getElementById('msgestimated_height_on_trailer_top_of_windshield').innerHTML = "";
	document.getElementById('msgboat_height_windshield_to_keel').innerHTML = "";
	document.getElementById('msgbridge_clearance_topup').innerHTML = "";
	document.getElementById('msgbridge_clearance_topDown').innerHTML = "";
	document.getElementById('msgcockpit_depth_helm').innerHTML = "";
	document.getElementById('msgcockpit_storage').innerHTML = "";
	document.getElementById('msgboat_name1').innerHTML="";
	document.getElementById('msgdescription1').innerHTML="";
	document.getElementById('msgmain_deck').innerHTML = "";
	document.getElementById('msglower_deck').innerHTML = "";
	
	document.getElementById('msgcompany').innerHTML = "";
	document.getElementById('msgc_branch').innerHTML = "";
	}
		


</script>