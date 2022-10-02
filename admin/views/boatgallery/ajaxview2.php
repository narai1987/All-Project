<div id="ajaxData2">

        <div class="heading">Main Image</div>
        
        <?php if($mains[0]->main_image): ?>
        
        <div style="position:relative; float:left; margin-right:20px; margin-bottom:20px;">
                    
                    <a href="<?php echo $mains[0]->main_image; ?>" class="pirobox_gall" title="main">
                    <img class="imgAvatar" src="<?php echo $mains[0]->main_image; ?>" width="135" height="90" alt="edit"  />
                    </a>
                    
                          <img style="cursor:pointer;" class="delete_btn" src="images/backend/update.png" alt="Update" title="Update" onclick="loadpopupupload('main_image');"/>
                    
                    
                    </div>
        <?php 
        else:
        echo '<h3 align="center">No Image</h3>';
        endif;
        
        
        ?>  


                   
<div style="clear:both;"></div>
         
            <br />
            

<div class="heading">Floorplans</div>

			<?php if($mains[0]->upper_deck and $mains[0]->main_deck and $mains[0]->lower_deck): ?>
            
            <div style="position:relative; float:left; margin-right:20px; margin-bottom:20px;">
            
            <a href="<?php echo $mains[0]->upper_deck; ?>" class="pirobox_gall" title="main">
            <img class="imgAvatar" src="<?php echo $mains[0]->upper_deck; ?>" width="135" height="90" alt="edit"  />
            </a>
            
           
                  <img style="cursor:pointer;" class="delete_btn" src="images/backend/update.png" alt="Update" title="Update"  onclick="loadpopupupload('upper_deck');"/>
           
            </div>

			<div style="position:relative; float:left; margin-right:20px; margin-bottom:20px;">
            
            <a href="<?php echo $mains[0]->main_deck; ?>" class="pirobox_gall" title="main">
            <img class="imgAvatar" src="<?php echo $mains[0]->main_deck; ?>" width="135" height="90" alt="edit"  />
            </a>
            
            
                  <img style="cursor:pointer;" class="delete_btn" src="images/backend/update.png" alt="Update" title="Update"  onclick="loadpopupupload('main_deck');"/>
             
            </div>

			<div style="position:relative; float:left; margin-right:20px; margin-bottom:20px;">
            
            <a href="<?php echo $mains[0]->lower_deck; ?>" class="pirobox_gall" title="main">
            <img class="imgAvatar" src="<?php echo $mains[0]->lower_deck; ?>" width="135" height="90" alt="edit"  />
            </a>
            
             
                  <img style="cursor:pointer;" class="delete_btn" src="images/backend/update.png" alt="Update" title="Update"  onclick="loadpopupupload('lower_deck');"/>
               
            </div>


<?php 
else:
echo '<h3 align="center">No Image</h3>';
endif;


?>


</div>