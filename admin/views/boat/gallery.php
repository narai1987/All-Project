
<style>
.popupContent{width:auto !important;}
</style>
<h2>Gallery ( <?php echo $mains[0]->boat_name ?> )</h2><br />
            <span class="gal_head"><h3>Exterior Gallery</h3></span>
            <br />
            <table class="boat_gal" width="100%" border="0" cellspacing="0" cellpadding="0">
              <tbody>	
              <tr>
               <?php $g = 1;if($galls):  foreach($galls as $branch): 
			   	if($branch['gallery_type_id'] == 1){
			   ?>
                <td width="145px"><img src="<?php echo $branch['images']; ?>" title="Gallery" width="135" height="90" style="border: 2px solid #435038;"/></td>
                <?php if($g % 5 == 0){  ?>
              </tr><tr>
             <?php } ?>
                <?php $g++; } endforeach; ?>
                <?php else: ?>
                <td>No Gallery Found.</td>
                <?php endif; ?>
                </tr>
              
            </tbody></table>
<br />
            <span class="gal_head"><h3>Interior Gallery</h3></span>
            <br />
             <table class="boat_gal" width="100%" border="0" cellspacing="0" cellpadding="0">
              <tbody>
             <tr>
               <?php $g = 1;if($galls):  foreach($galls as $branch): 
			   	if($branch['gallery_type_id'] == 2){
			   ?>
                <td width="145px"><img src="<?php echo $branch['images']; ?>" title="Gallery" width="135" height="90" style="border: 2px solid #435038;"/></td>
                <?php if($g % 5 == 0){  ?>
              </tr><tr>
             <?php } ?>
                <?php $g++; } endforeach; ?>
                <?php else: ?>
                <td>No Gallery Found.</td>
                <?php endif; ?>
                </tr>
              
            </tbody></table>


<div class="detail_right right">
<div class="detail_container">

<!--<div class="grid_container" id="mmm" style="min-height: 500px;min-width:600px;padding-left:6px;">



<img src="<?php echo $mains->upper_deck; ?>" title="Gallery" width="150" height="150" style="border: 2px solid #435038;"/>
<h2>Upper Deck</h2>

<img src="<?php echo $mains->main_deck; ?>" title="Gallery" width="150" height="150" style="border: 2px solid #435038;"/>
<h2>Main Deck</h2>

<img src="<?php echo $mains->lower_deck; ?>" title="Gallery" width="150" height="150" style="border: 2px solid #435038;"/>
<h2>Lower Dech</h2>


</div>-->
</div>



      
</div>