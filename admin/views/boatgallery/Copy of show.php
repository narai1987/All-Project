<style type="text/css">
.imgAvatar{
	background-color: #ECFAF9;
  -moz-border-radius: 10px 30px;
  border-radius: 10px 30px / 15px 25px;
  border: 1px solid #E4E4F3;
  padding: 5px;

}
.delete_btn{position:absolute; top:2px; right:22px;}
</style>
<div class="left_content left">
<form action="index.php" method="post" onsubmit="return beverageValidate('<?php echo $results['language'][0]['id'];?>')" enctype="multipart/form-data">
<div class="user_panel">
<?php foreach($arrData['doctors'] as $result) { }  ?>
<div class="detail_container ">
<div class="head_cont">
<h2 class="userIcon_grd">
<table width="99%"><tr><td width="85%"><?php echo $result['id']?$results['content'][$_SESSION['language_id']]['edit']:$results['content'][$_SESSION['language_id']]['add_new'];?> <?php echo $results['content'][$_SESSION['language_id']]['doctor'];?>Boat Gallery</td> 
<td></td>
</tr>
</table>
</h2>
</div>  
<div class="grid_container">
<div class="main_collaps">
<div style="padding:10px;">

<table >
<tr>
<td>
<strong><em class="star_red">*</em>Select :</strong>
<select name="gallery" id="gallery">

<option value="">Select</option>
<?php foreach($results as $result){ 
	
?>
<option value="<?php echo $result['boat_id']; ?>" <?php if($result['boat_id']==$_REQUEST['gallery']) {?> selected="selected" <?php } ?> ><?php echo $result['boat_name']; ?></option>
<?php } ?>
</select>

<span id="msgbeverage_id" style="color:red;" class="font"> </span>
</td>
</tr>

</table>
</div>



<table width="100%" cellpadding="0" cellspacing="0" class="tab_button">
<tr>
<td width="70%">&nbsp;</td>
<td align="center" >
<input type="hidden" name="control" value="boatgallery"/>
<input type="hidden" name="task" value="show"/>


<button class="lang_button" type="submit"><strong>Submit</strong></button>

</td>
</tr>


</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
            
        <tr>
        <td><strong><u>Exterior Gallery</u></strong></td>
        </tr>
                
        <tr>
        <td>&nbsp;</td>
        </tr>
            <tr>
			 <?php $g = 1;if($boatGallerys['Exterior']): foreach($boatGallerys['Exterior'] as $Exterior):  ?>
            
            
            <td>
            <!--<a href="index.php?control=tripgallery&task=delimg&id=<?php echo $Exterior['id']; ?>">--><!--</a>-->  
            <div style="position:relative;">
            <img class="imgAvatar" src="<?php echo $Exterior['images']; ?>" width="135" height="90" alt="edit" title="logo" />
                <a href="index.php?control=boatgallery&task=delimg&id=<?php echo $Exterior['id']; ?>&boatid=<?php echo $Exterior['boat_id']; ?>&img=<?php echo $Exterior['images']; ?>" onclick="return confirm('Are you sure you want to Delete ')" >
                  <img class="delete_btn" src="images/backend/del.png" alt="Delete" title="Delete" />
                </a>
            </div>
         
          
          
          
            </td>

            <?php if($g % 4 == 0){  ?>
        </tr> <br />
        <tr>
			<?php } ?>
           
           
           
            <?php $g++;  endforeach; ?>
            
			
			<?php else: ?>
            <td>No Gallery Found.</td>
            <?php endif; ?>
        </tr>
        
         <tr>
        <td>&nbsp;</td>
        </tr>
        <tr>
        <td colspan="4"><hr /></td>
       
        </tr>
         <tr>
        <td>&nbsp;</td>
        </tr>
        
        <tr>
        <td><strong><u>Interior Gallery</u></strong> </td>
       
        </tr>
        
         <tr>
        <td>&nbsp;</td>
        </tr>
        <tr>
			 <?php $g = 1;if($boatGallerys['Interior']): foreach($boatGallerys['Interior'] as $Interior):  ?>
            
            
            <td>
            <div style="position:relative;">
            <!--<a href="index.php?control=tripgallery&task=delimg&id=<?php echo $Interior['id']; ?>">--><!--</a>-->
            <img class="imgAvatar" src="<?php echo $Interior['images']; ?>" width="135" height="90" alt="edit" title="logo" /><br />
         
        
           <a href="index.php?control=boatgallery&task=delimg&id=<?php echo $Interior['id']; ?>&boatid=<?php echo $Interior['boat_id']; ?>&img=<?php echo $Interior['images']; ?>" onclick="return confirm('Are you sure you want to Delete ')" >
         
         <img  class="delete_btn" src="images/backend/del.png" alt="Delete" title="Delete" /></a>
         
         </div>
           </td>

            <?php if($g % 5 == 0){  ?>
        </tr> <br />
        <tr>
			<?php } ?>
           
           
           
            <?php $g++;  endforeach; ?>
            
			
			<?php else: ?>
            <td>No Gallery Found.</td>
            <?php endif; ?>
        </tr>
        
        

</table>
</div>
</div>
</div> 
</div>
</form>  

<?php /*foreach($gallerys as $gallery){  

 echo $gallery['trip_id']." ".$gallery['trip_title'];
 
} */?>
</div>