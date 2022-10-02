
<select name="state" class="custom" id="provinceid">
<option>Select province</option>
<?php foreach($provinces as $province) { ?>
<option value="<?php echo $province['id'];?>"><?php echo $province['id'];?></option>
<?php }?>
</select>