<option value="0">Select City</option>
<?php
foreach($results as $result) {
	?>
    <option value="<?php echo $result['id'];?>"><?php echo $result['city'];?></option>
    <?php
}
?>