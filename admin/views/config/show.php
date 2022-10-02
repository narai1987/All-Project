<div class="detail_right right">
<div class="detail_container">
<div class="grid_container">
  	

  	<!--Setting for confic start-->
    <fieldset class="field_profile">
    <legend>Site Settings</legend>
    <form name="tmpForm" action="index.php?control=config&task=conficChange" method="post" >
    <div class="fleft">
        <?php
        foreach($confics as $confic) {
			?>
            <fieldset class="field_profile">
            	<legend><?php echo ucwords(str_replace("_"," ",$confic['title']));?></legend>
                <?php
				if($confic['control']=="text" or $confic['control']=="") {
					?>
            	<div>
                	<input type="text" name="<?php echo $confic['title'];?>" class="lang_box"  value="<?php echo $confic['value'];?>"  />
                    <br /><br />
                </div>
                <?php
				}
				else if($confic['control']=="select") {
				?>
                
                <div>
                <select name="<?php echo $confic['title'];?>" class="lang_box">
                	<?php
					$arr = explode("#",$confic['description']);
					$arr1 = explode(",",$arr[1]);
					foreach($arr1 as $data) {
						?>
                        <option value="<?php echo trim($data);?>" <?php echo (trim($data)==$confic['value'])?"selected=selected":"";?>><?php echo trim($data);?></option>
                        <?php
					}
					?>
                	
                </select>
                <br /><br />
                </div>
                <?php
				}
				?>
                    <div><?php echo $confic['description'];?></div>
            </fieldset>
        <?php 
		} ?>
        </div>
        <div class="fright">
        <input type="submit" name="submit" value="Submit" class="lang_button"  />
        </div>
    </form>
    </fieldset>
  	
    </div>
</div>
</div>