<option value="0">Select State</option>
<?php
foreach($results as $result) {
	?>
    <option value="<?php echo $result['id'];?>"><?php echo $result['state'];?></option>
    <?php
}
?>