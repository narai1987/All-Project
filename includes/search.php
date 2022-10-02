
<div id="toppanel">
  <div id="panel">
    <div class="pat">
      <div class="content clearfix">
        <form action="index.php?control=trip" method="post" name="searchTrip" >
          <table class="search_select" width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td colspan="2" ><select name="country1" id="country1" onChange="fillOriginAndDes(this.value)" class="select" style="width:400px;">
                  <option value="0"><?php echo $taxonomy['select_country'];?></option>
                  <?php $i = 0; foreach($countrys as $country) {?>
                  <option value="<?php echo $country['country_id'];?>" <?php if($_REQUEST['country1'] == $country['country_id']) { ?> selected="selected" <?php } ?>><?php echo ucfirst($country['country']);?></option>
                  <?php }?>
                </select></td>
              <!--<td width="33">&nbsp;</td>
              <td><select name="state" id="provinceid" class="select">
                  <option>Select province</option>
                </select></td>-->
            </tr>
            <tr>
              <td><select name="origin" id="origin" class="select" onchange="fillDestination(this.value)">
                  <option value="0"><?php echo $taxonomy['select_origin'];?></option>
                  <?php $i = 0; foreach($origins as $origin) {?>
                  <option value="<?php echo $origin['origin_id'];?>" <?php if($_REQUEST['origin'] == $origin['origin_id']) { ?> selected="selected" <?php } ?>><?php echo ucfirst($origin['city']);?></option>
                  <?php }?>
                </select></td>
              <td>&nbsp;</td>
              <td><select name="destination" class="select" id="destination" >
                  <option value="0"><?php echo $taxonomy['select_destination'];?></option>
                  <?php $i = 0; foreach($destinations as $destination) {?>
                  <option value="<?php echo $destination['destination_id'];?>" <?php if($_REQUEST['destination'] == $destination['destination_id']) { ?> selected="selected" <?php } ?>><?php echo ucfirst($destination['city']);?></option>
                  <?php }?>
                </select></td>
            </tr>
            <tr>
              <td>
              <select name="start_date" class="select" id="start_date"  onchange="fillEndDate(this.value)">
                  <option value="0"><?php echo $taxonomy['departure_date'];?></option>
                  <?php $i = 0; foreach($departures as $departure) {?>
                  <option value="<?php echo $departure['start_trip_datetime'];?>" <?php if($_REQUEST['start_date'] == $departure['start_trip_datetime']) { ?> selected="selected" <?php } ?>><?php echo date("l jS M Y",strtotime($departure['start_trip_datetime']));?></option>
                  <?php }?>
                </select>
              </td>
              <td>&nbsp;</td>
              <td>
              <select name="end_date" class="select" id="end_date" >
                  <option value="0"><?php echo $taxonomy['return_date'];?></option>
                  <?php $i = 0; foreach($departures as $departure)  {?>
                  <option value="<?php echo $departure['end_trip_datetime'];?>" <?php if($_REQUEST['end_date'] == $departure['end_trip_datetime']) { ?> selected="selected" <?php } ?>><?php echo date("l jS M Y",strtotime($departure['end_trip_datetime']));?></option>
                  <?php }?>
                </select>
              </td>
            </tr>
            <tr>
              <td><select name="price_min" class="select" id="price_min">
                  <option><?php echo $taxonomy['price_from:_min'];?></option>
                </select></td>
              <td>&nbsp;</td>
              <td><select name="price_max" class="select" id="price_max">
                  <option><?php echo $taxonomy['price_from:_max'];?></option>
                </select></td>
            </tr>
            <tr>
              <td class="last" colspan="3"><a style="cursor:pointer;" onclick="document.forms['searchTrip'].submit();" class="trip_btn"><img src="<?php echo $tmp;?>/images/find_trip_btn.png" width="116" height="33" /></a></td>
            </tr>
          </table>
        </form>
      </div>
    </div>
  </div>
  <!-- /login -->
  <ul class="login">
    <li id="toggle"> <a id="open" class="open" href="#"></a> <a id="close" style="display: none;" class="close" href="#"></a> </li>
  </ul>
  <!-- The tab on top --> 
  
  <!-- / top --> 
  
</div>
