<?php
//print_r($companies);
?>
<script src="assets/viewJs/ViewValidation.js"></script>

<div class="left_content left">
  <div class="user_panel">
    <div class="detail_container ">
      <div class="head_cont">
        <h2 class="userIcon_grd">
          <table width="99%">
            <tr>
              <td width="85%">Trips</td>
              <td><!--<a href="#" class="button"><img src="images/add_new.png" alt="add new" /></a>--></td>
            </tr>
          </table>
        </h2>
      </div>
      <div class="grid_container">
        <div class="main_collaps">
          <form action="index.php" method="post" enctype="multipart/form-data" name="formBoat" id="formBoat" onsubmit="return formValidate();" >
            <div style="width:100%; height:auto;"> 
              <!--TOP TABING START HERE-->
              <div class='tab-container'>
                <fieldset>
                  <legend><strong>Trips For</strong></legend>
                  <div id="lang0_1" class="pans">
                    <table width="97%" cellpadding="0" cellspacing="4">
                      <tr>
                        <td align="right" width="20%"><strong><em class="star_red">*</em>Choose Country :</strong></td>
                        <td width="29%"><select class="lang_box" name="country_id" id="country_id">
                            <option value="0" >Select Country</option>
                            <?php foreach($countries as $cn): ?>
                            <option value="<?php echo $cn['id']; ?>" <?php if($cn['id'] == $results['common']->country_id){ ?> selected="selected" <?php } ?>><?php echo ucfirst($cn['country']); ?></option>
                            <?php endforeach; ?>
                          </select></td>
                      </tr>
                      <tr>
                        <td align="right" width="20%"><strong><em class="star_red">*</em>Choose Boat :</strong></td>
                        <td width="29%"><select class="lang_box" name="boat_id" id="boat_id">
                            <option value="0" >Select Boat</option>
                            <?php foreach($boats as $b): ?>
                            <option value="<?php echo $b['boat_id']; ?>" <?php if($b['boat_id'] == $results['common']->boat_id){ ?> selected="selected" <?php } ?>><?php echo $b['boat_name']; ?></option>
                            <?php endforeach; ?>
                          </select></td>
                        <td align="right" width="20%"><strong><em class="star_red">*</em> Trip Type :</strong></td>
                        <td width="29%"><select class="lang_box" name="trip_type_id" id="trip_type_id">
                            <option value="0" >Select Trip type</option>
                            <?php foreach($types as $t): ?>
                            <option value="<?php echo $t['id']; ?>" <?php if($t['id'] == $results['common']->trip_type_id){ ?> selected="selected" <?php } ?>><?php echo $t['trip_type']; ?></option>
                            <?php endforeach; ?>
                          </select></td>
                      </tr>
                      <tr>
                        <td align="right" width="20%"><strong><em class="star_red">*</em> Start Date :</strong></td>
                        <td width="29%"><input class="lang_box" id="inputDate" value="<?php echo $results['common']->start_date?date("Y-m-d",strtotime($results['common']->start_date)):date("Y-m-d"); ?>" name="start_date"/></td>
                        <td align="right" width="20%"><strong><em class="star_red">*</em> End Date :</strong></td>
                        <td width="29%"><input class="lang_box" id="inputDate2" value="<?php echo $results['common']->end_date?date("Y-m-d",strtotime($results['common']->end_date)):date("Y-m-d"); ?>" name="end_date"/></td>
                      </tr>
                      <tr>
                        <td align="right" width="20%"><strong><em class="star_red">*</em> No. of Dives :</strong></td>
                        <td><input type="text" class="lang_box" name="no_of_dives" id="no_of_dives" value="<?php echo $results['common']->no_of_dives; ?>"/></td>
                        <td align="right" width="20%"><strong><em class="star_red">*</em> No. of Days :</strong></td>
                        <td width="29%"><input type="text" class="lang_box" name="no_of_days" id="no_of_days" value="<?php echo $results['common']->no_of_days; ?>"/></td>
                      </tr>
                      <tr>
                        <td align="right" width="20%"><strong><em class="star_red">*</em> No. of Nights :</strong></td>
                        <td><input type="text" class="lang_box" name="no_of_nights" id="no_of_nights" value="<?php echo $results['common']->no_of_nights; ?>"/></td>
                        <td align="right" width="20%"><strong><em class="star_red">*</em> Min Fee :</strong></td>
                        <td width="29%"><input type="text" class="lang_box" name="trip_price" id="trip_price" value="<?php echo $results['common']->trip_price; ?>"/></td>
                      </tr>
                      <tr>
                        <td align="right" width="20%"><strong><em class="star_red">*</em> Trip Image :</strong></td>
                        <td><input type="file" class="lang_box" name="image" id="image"/></td>
                        <td align="right" width="20%"><strong><em class="star_red">*</em> Trip Gallery(multiple images) :</strong></td>
                        <td width="29%"><input type="file" class="lang_box" name="trip_gallery[]" id="trip_gallery[]" multiple="multiple"/></td>
                      </tr>
                    </table>
                  </div>
                </fieldset>
                <fieldset>
                  <legend><strong>Fuel Tank</strong></legend>
                  <div id="lang0_1" class="pans">
                    <table width="97%" cellpadding="0" cellspacing="4">
                      <?php foreach($fuel_tanks as $tank): ?>
                      <tr>
                        <td align="right" width="12%"><strong><em class="star_red">*</em><?php echo $tank['fuel_tank'] ?> :</strong></td>
                        <td width="19%"><input class="lang_box" id="fuel_tank<?php echo $tank['id'] ?>" value="<?php echo $tank['id'] ?>" name="fuel_tank<?php echo $tank['id'] ?>" type="checkbox" <?php if($results['tankdata'][$tank['id']]['fuel_tank_id']==$tank['id']){ ?> checked="checked" <?php } ?>/></td>
                        <td align="right" width="12%"><strong><em class="star_red">*</em> Price :</strong></td>
                        <td width="23%"><select class="lang_box" name="ptype<?php echo $tank['id'] ?>" id="ptype<?php echo $tank['id'] ?>" onchange="checkFuelType<?php echo $tank['id'] ?>(this.value)">
                            <option value="paid" <?php if($results['tankdata'][$tank['id']]['tank_price']!=0 || $results['tankdata'][$tank['id']]['tank_price']!=''){ ?> selected="selected" <?php } ?> >Paid</option>
                            <option value="free" <?php if($results['tankdata'][$tank['id']]['tank_price']==0 || $results['tankdata'][$tank['id']]['tank_price']==''){ ?> selected="selected" <?php } ?> >Free</option>
                          </select></td>
                        <td align="right" width="15%"><strong><em class="star_red">*</em> If paid(Price) :</strong></td>
                        <td width="24%"><input class="lang_box" id="fuelprice<?php echo $tank['id'] ?>" value="<?php echo $results['tankdata'][$tank['id']]['tank_price']?$results['tankdata'][$tank['id']]['tank_price']:'';?>" name="fuelprice<?php echo $tank['id'] ?>"/></td>
                      </tr>
                      <script type="text/javascript">
                    function checkFuelType<?php echo $tank['id'] ?>(value){
						if(value != 'paid'){
							document.getElementById("fuelprice<?php echo $tank['id'] ?>").value = ""; 
							document.getElementById("fuelprice<?php echo $tank['id'] ?>").disabled = true;
						}else{
							document.getElementById("fuelprice<?php echo $tank['id'] ?>").disabled = false;
						}
                    }
                    </script>
                      <?php endforeach; ?>
                    </table>
                  </div>
                </fieldset>
                <script type="text/javascript">
                function checkFuelType(value){
					if(value == 'paid'){
						
					}else{
						
					}
                }
                </script>
                <fieldset>
                  <legend><strong>Diver</strong></legend>
                  <div id="lang0_1" class="pans">
                    <table width="97%" cellpadding="0" cellspacing="4">
                      <tr>
                        <td align="right" width="12%"><strong><em class="star_red">*</em>Price for diver  :</strong></td>
                        <td width="19%"><select class="lang_box" name="company" id="company">
                            <option value="paid"  >Paid</option>
                            <option value="free"  >Free</option>
                          </select></td>
                        <td align="right" width="15%"><strong><em class="star_red">*</em> If paid(Price) :</strong></td>
                        <td width="24%"><input class="lang_box" id="fuelprice" value="" name="fuelprice"/></td>
                      </tr>
                      <tr>
                        <td align="right" width="27%"><strong><em class="star_red">*</em>Price for kids below certain Age  :</strong></td>
                        <td width="21%"><input class="lang_box" id="price_for_kids" value="<?php echo $results['common']->price_for_kids; ?>" name="price_for_kids"/></td>
                      </tr>
                    </table>
                  </div>
                </fieldset>
                <fieldset>
                  <legend><strong>Equipment</strong></legend>
                  <div id="lang0_1" class="pans">
                    <table width="97%" cellpadding="0" cellspacing="4">
                      <?php foreach($equipments as $equipment): ?>
                      <tr>
                        <td align="right" width="12%"><strong><em class="star_red">*</em><?php echo $equipment['equipment'] ?> :</strong></td>
                        <td width="19%"><input class="lang_box" id="equipment_<?php echo $equipment['id'] ?>" value="<?php echo $equipment['id'] ?>" name="equipment[]" type="checkbox" /></td>
                        <td align="right" width="12%"><strong><em class="star_red">*</em> Price :</strong></td>
                        <td width="23%"><select class="lang_box" name="eqtype[]" id="eqtype<?php echo $equipment['id']; ?>">
                            <option value="paid"  >Paid</option>
                            <option value="free"  >Free</option>
                          </select></td>
                        <td align="right" width="15%"><strong><em class="star_red">*</em> If paid(Price) :</strong></td>
                        <td width="24%"><input class="lang_box" id="eqprice_<?php echo $equipment['id'] ?>" value="" name="eqprice[]"/></td>
                      </tr>
                      <?php endforeach; ?>
                    </table>
                  </div>
                </fieldset>
              </div>
              <!--TOP TABING END HERE--> 
            </div>
            <div id="accordion_data">
              <?php
foreach($results1 as $language) {
?>
              <h3><a href="#"><?php echo $language['content'];?></a></h3>
              <fieldset >
                <legend></legend>
                <div  class="pans">
                  <table width="97%" cellpadding="0" cellspacing="4">
                    <tr>
                      <td align="right" width="20%"><strong><em class="star_red">*</em> Trip Name :</strong></td>
                      <td width="29%"><input type="text" class="lang_box" name="trip_title<?php echo $language['id'];?>" id="trip_title<?php echo $language['id'];?>" value="<?php echo $results['content'][$language['id']]['trip_title'];?>"/></td>
                      <td align="right" width="15%"><strong><em class="star_red">*</em> Trip Origin :</strong></td>
                      <td width="24%"><input class="lang_box" id="origin<?php echo $language['id'];?>" value="<?php echo $results['content'][$language['id']]['origin'];?>" name="origin<?php echo $language['id'];?>"/></td>
                    </tr>
                    <tr>
                      <td align="right" width="12%"><strong><em class="star_red">*</em>Trip Destination  :</strong></td>
                      <td width="19%"><input class="lang_box" id="destination<?php echo $language['id'];?>" value="<?php echo $results['content'][$language['id']]['destination'];?>" name="destination<?php echo $language['id'];?>"/></td>
                    </tr>
                    <tr>
                      <td align="right" width="12%"><strong><em class="star_red">*</em>Trip Specification  :</strong></td>
                      <td width="25%"><textarea rows="7" cols="60" class="lang_box" id="specification<?php echo $language['id'];?>" name="specification<?php echo $language['id'];?>"><?php echo $results['content'][$language['id']]['specification'];?></textarea></td>
                    </tr>
                  </table>
                </div>
              </fieldset>
              <?php } ?>
            </div>
            <table width="100%" cellpadding="0" cellspacing="0">
              <tr>
                <td width="70%">&nbsp;</td>
                <td align="center" ><button class="lang_button"><strong>Submit</strong></button>
                  <button class="lang_button_re">&nbsp; <strong>Reset</strong></button></td>
              </tr>
            </table>
            <input type="hidden" name="control" value="trip"/>
            <input type="hidden" name="edit" value="1"/>
            <input type="hidden" name="task" value="save"/>
            <input type="hidden" name="id" id="idd" value="<?php echo $results['common']->id; ?>"  />
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
