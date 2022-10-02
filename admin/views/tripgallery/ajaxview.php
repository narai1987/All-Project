<div class="heading">Gallery</div>

<?php $g = 1;if($gallerys): foreach($gallerys as $gallery):  ?>

<div style="position:relative; float:left; margin-right:20px; margin-bottom:20px;">

	 <a href="<?php echo $gallery['image']; ?>" class="pirobox_gall" title="<?php echo $gallery['trip_title'] ?>">

            <img class="imgAvatar" src="<?php echo $gallery['image']; ?>" width="135" height="90" alt="edit"  />
            
            </a>
                <a href="index.php?control=tripgallery&task=delimg&id=<?php echo $gallery['id']; ?>&tripid=<?php echo $gallery['trip_id']; ?>&img=<?php echo $gallery['image']; ?>" onclick="return confirm('Are you sure you want to Delete ')" >
                  <img class="delete_btn" src="images/backend/delete.png" alt="Delete" title="Delete" />
                </a>
            </div>
            
         <?php $g++;  endforeach; 
		 else:
		 echo '<h3 align="center">No Gallery Found</h3>';
		 endif;?> 
         
         
                    
<div style="clear:both;"></div>