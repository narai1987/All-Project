<div id="ajaxData2">

        <div class="heading">Main Image</div>
        
        <?php if($mains[0]->image): ?>
        
        <div style="position:relative; float:left; margin-right:20px; margin-bottom:20px;">
                    
                    <a href="<?php echo $mains[0]->image; ?>" class="pirobox_gall" title="main">
                    <img class="imgAvatar" src="<?php echo $mains[0]->image; ?>" width="135" height="90" alt="edit"  />
                    </a>
                    
                          <img style="cursor:pointer;" class="delete_btn" src="images/backend/update.png" alt="Update" title="Update" onclick="loadpopupupload();"/>
                    
                    
                    </div>
        <?php 
        else:
        echo '<h3 align="center">No Image</h3>';
        endif;
        
        
        ?>  


    </div>