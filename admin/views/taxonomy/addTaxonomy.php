<?php

if(file_exists("configuration.php"))
require_once("configuration.php");
else if(file_exists("../configuration.php"))
require_once("../configuration.php");
else if(file_exists("../../configuration.php"))
require_once("../../configuration.php");
foreach($results as $result) { }
?>




<fieldset class="service_field" >

<form action="index.php" method="post"  onsubmit="return taxonomy()" >
<div class="service_head_p">
<table width="99%" cellspacing="0" cellpadding="0"><tr>
<td width="72%"><p> <strong><?php echo $result['taxonomy_id']?$results['content']['edit']:$results['content']['add_new'];?> 
<?php echo $results['content']['taxonomy'];?></strong></p></td> 
<?php //if($result['taxonomy_id'] ) {?>
<td align="right"><span class="font_size"><strong><?php echo $results['content']['languages'];?> :</strong></span></td>
<td align="left">
<?php  $sql = "select * from languages";
$data= mysql_query($sql);
?>
<select name="language" id="language" class="reg_txt" onchange="changeLanguage_taxonomy(this.value)">
<!--<option value="0">Select</option>-->
<?php while($language=mysql_fetch_array($data)) { ?>
<option value="<?php echo $language['id'];?>" <?php if($language['id']==$_SESSION['language_id']){?> selected="selected" <?php }?>><?php echo $language['content'];?></option> 
<?php } ?>
</select>
</td>
<?php //} ?>
</tr>
</table>

</div>
<div id="chlangTaxo">
<table width="98%" cellpadding="0" cellspacing="2" class="tab_regis _merg_top">
<tr valign="top">
<td align="right" width="18%" valign="top">
<strong><em class="star_red">*</em> <?php echo $results['content']['keyword'];?> :</strong></td>
<td><input type="text" name="keyword" id="keyword" value="<?php echo $result['content']; ?>" style="width:50%;"  class="reg_txt"  onkeyup="changelag(this.id,'<?php echo $_SESSION['language_id']; ?>')"  />
<input type="hidden" name="languageId" id="languageId" value="<?php echo $result['language_id']; ?>"  />
<span id="msgkeyword" style="color:red;" class="font"> </span>
</td>
</tr>
<tr>
<td colspan="2" align="center" style="padding-right:150px;">
<input type="hidden" name="control" value="taxonomy"/>
<input type="hidden" name="edit" value="1"/>
<input type="hidden" name="task" value="save"/>
<input type="hidden" name="id" id="idd" value="<?php echo $result['taxonomy_id']; ?>"  />
<button class="submit" type="submit"><strong><?php echo $result['taxonomy_id']?$results['content']['update']:$results['content']['save'];?></strong></button> 
</td>
</tr>
</table>
</div>
</form>
</fieldset> 
 