<div id="ajaxData">

<div class="heading">Exterior Gallery</div>

<?php $g = 1;if($boatGallerys['Exterior']): foreach($boatGallerys['Exterior'] as $Exterior):  ?>

<div style="position:relative; float:left; margin-right:20px; margin-bottom:20px;">

			<a href="<?php echo $Exterior['images']; ?>" class="pirobox_gall" title="<?php echo $Exterior['boat_name'] ?>">
            <img class="imgAvatar" src="<?php echo $Exterior['images']; ?>" width="135" height="90" alt="edit"  />
            </a>
                <a href="index.php?control=boatgallery&task=delimg&id=<?php echo $Exterior['id']; ?>&boatid=<?php echo $Exterior['boat_id']; ?>&img=<?php echo $Exterior['images']; ?>" onclick="return confirm('Are you sure you want to Delete ')" >
                  <img class="delete_btn" src="images/backend/delete.png" alt="Delete" title="Delete" />
                </a>
            </div>
            
         <?php $g++;  endforeach; 
		 
		 endif;?> 
         
         
                    
<div style="clear:both;"></div>
         
            <br />
<div class="heading">Interior Gallery</div>


<?php $g = 1;if($boatGallerys['Interior']): foreach($boatGallerys['Interior'] as $Interior):  ?>

<div style="position:relative; float:left; margin-right:20px; margin-bottom:20px;">
<a href="<?php echo $Interior['images']; ?>" class="pirobox_gall" title="<?php echo $Interior['boat_name'] ?>">
            <img class="imgAvatar" src="<?php echo $Interior['images']; ?>" width="135" height="90" alt="edit" />
            </a>
                <a href="index.php?control=boatgallery&task=delimg&id=<?php echo $Interior['id']; ?>&boatid=<?php echo $Interior['boat_id']; ?>&img=<?php echo $Interior['images']; ?>" onclick="return confirm('Are you sure you want to Delete ')" >
                  <img class="delete_btn" src="images/backend/delete.png" alt="Delete" title="Delete" />
                </a>
            </div>
            
         <?php $g++;  endforeach; endif;?> 
         
         
            
<div style="clear:both;"></div>
</div>