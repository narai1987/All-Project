<select name="end_date" class="custom" id="end_date">
  <option value="0">Return Date</option>
   <?php foreach($returns as $return)  {?>
                  <option value="<?php echo $return['end_trip_datetime'];?>"><?php echo date("l jS M Y",strtotime($return['end_trip_datetime']));?></option>
                  <?php }?>
</select>
 
