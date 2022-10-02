<select name="origin" class="custom" id="origin"  onchange="fillDestination(this.value)">
  <option value="0">Select Origin</option>
  <?php foreach($origins as $origin) { ?>
  <option value="<?php echo $origin['origin_id'];?>"><?php echo ucfirst($origin['city']);?></option>
  <?php }?>
</select>
 
