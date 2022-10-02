<div id="accordion_data">
<?php for($i=1;$i<=$person;$i++) { ?>
	<h3><a href="#">Member<?php echo $i;?></a></h3>
    
    
    <div>
    
        <p>
        	<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="25%"><input type="text" class="lang_box left" placeholder="Name" name="person[]" id="person<?php echo $i;?>"/></td>
                <td width="8%">
                    <select class="lang_drp right" name="age[]" id="age<?php echo $i;?>">
                        <option value="0">Age</option>
						<?php for($k=1;$k<80;$k++) { ?>
                            <option value="<?php echo $k;?>"><?php echo $k;?></option>   
                        <?php } ?>         
                    </select> 
                </td>
                <td width="9%"><select class="lang_drp left" name="gender[]">
                <option value="1">Male</option>
                <option value="0">Female</option>
            </select> </td>
                <td width="58%"> <select class="lang_drp right" name="certificate[]">
                <option value="0">Dive Certificate</option>
                <?php foreach($certificates as $certificate) {?>
                <option value="<?php echo $certificate['id'];?>"><?php echo $certificate['certificate'];?></option>
                <?php } ?>
            </select></td>
              </tr>
            </table>

        
            
             
        </p>
	</div>
    
	
<?php }?>
</div>
<script>
callCoo();
</script>   