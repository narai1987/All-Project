<?php
if($results=="0") {
	$edit = 0;
}
else {
	$edit = 1;
}
foreach($results['taxonomy_content'] as $result) { }
?>


   
    

<table width="98%" cellpadding="0" cellspacing="2" class="tab_regis _merg_top">
<tr valign="top">
<td align="right" width="18%" valign="top"><strong><em class="star_red">*</em><?php echo $results['content']['keyword'];?> :</strong></td>
<td><input type="text" name="keyword" id="keyword" value="<?php echo $result['content']; ?>" style="width:50%;"  class="reg_txt"  onkeyup="changelag(this.id,'<?php echo $_REQUEST['lang_id']; ?>')"  />
<input type="hidden" name="languageId" id="languageId" value="<?php echo $result['language_id']; ?>" />  
<input type="hidden" name="lang_id" id="lang_id" value="<?php echo $_REQUEST['lang_id']; ?>"  />
<span id="msgkeyword" style="color:red;" class="font"> </span>
</td>
</tr>
<tr>
<td colspan="2" align="center" style="padding-right:150px;">
<input type="hidden" name="control" value="taxonomy"/>
<input type="hidden" name="edit" value="<?php echo $edit;?>"/>
<input type="hidden" name="task" value="save"/>
<input type="hidden" name="languageID" id="languageID" value="<?php echo $_REQUEST['lang_id']; ?>"  />
<input type="hidden" name="id" id="idd" value="<?php echo $_REQUEST['did']; ?>"  />
<button class="submit" type="submit"><strong><?php echo $result['taxonomy_id']?$results['content']['update']:$results['content']['save'];?></strong></button> 
</td>
</tr>
</table>
