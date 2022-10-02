<option value="0" >Select Destination</option>
<?php
foreach($results as $city) {
	?>
	<option value="<?php echo $city['id'];?>"><?php echo $city['city'];?></option>
	<?php
}
?> 