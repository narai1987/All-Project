<div class="detail_right">
  <div class="detail_container">
    <fieldset class="field_profile"  >
      <legend>
      <input type="checkbox" name="checkboxess" id="chkall"  onchange="checkAll(this.id)" />
      UpComing Trips</legend>
      <div class="divlineheight" id="schedulecheckbox">
        <table width="100%">
          <tr>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <?php
$k = 1;
$schedule = explode(",",$_REQUEST['schedule']);

foreach($results as $result) {
	?>
            <td><input type="checkbox" name="chkdate" value="<?php echo $result['id'];?>" id="chk<?php echo $result['id'];?>"  onclick="chkCheck88('<?php echo $result['id'];?>')" <?php echo in_array($result['id'],$schedule)?"checked":"";?> />
              &nbsp;&nbsp;<span><a onclick="chkCheck888('<?php echo $result['id'];?>')"><?php echo $result['start_date'];?>(<?php echo $result['trip_title'];?> By <?php echo $result['boat_name'];?>)</a></span></td>
            <?php
	
	if($k%2==0) { ?>
          </tr>
          <tr>
            <?php }
	$k++;
}
?>
          </tr>
        </table>
      </div>
    </fieldset>
  </div>
</div>
