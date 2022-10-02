<select name="destination" class="custom" id="destination">
  <option value="0">Select Destination</option>
  <?php foreach($destinations as $destination) { ?>
  <option value="<?php echo $destination['destination_id'];?>"><?php echo ucfirst($destination['city']);?></option>
  <?php }?>
</select>
 
