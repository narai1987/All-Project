<fieldset class="service_field" >

<form action="index.php" method="post"  onsubmit="return taxonomy()" enctype="multipart/form-data" >
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
<!--<select name="language" id="language" class="reg_txt" onchange="changeLanguage_taxonomy(this.value)">

<?php while($language=mysql_fetch_array($data)) { ?>
<option value="<?php echo $language['id'];?>" <?php if($language['id']==$_SESSION['language_id']){?> selected="selected" <?php }?>><?php echo $language['content'];?></option> 
<?php } ?>
</select>-->
</td>
<?php //} ?>
</tr>
</table>

</div>
<div id="chlangTaxo">
<table width="98%" cellpadding="0" cellspacing="2" class="tab_regis _merg_top">
<tr valign="top">
<td align="right" width="18%" valign="top">
<strong><em class="star_red">*</em> <?php echo $results['content']['language_file'];?> :</strong></td>
<td>
<input type="file" name="taxonomy"  />
<span id="msgkeyword" style="color:red;" class="font"> </span>
</td>
</tr>
<tr valign="top">
<td align="right" width="18%" valign="top">
<strong><em class="star_red">*</em> <?php echo $results['content']['flag_image'];?> :</strong></td>
<td>
<input type="file" name="image"  />
<span id="msgkeyword" style="color:red;" class="font"> </span>
</td>
</tr>
<tr>
<td colspan="2" align="center" style="padding-right:150px;">
<input type="hidden" name="control" value="language"/>
<input type="hidden" name="task" value="save"/>
<input type="hidden" name="id" id="id" value="<?php echo $_REQUEST['id'];?>" />
<button class="submit" type="submit"><strong><?php echo $result['taxonomy_id']?$results['content']['update']:($results['content']['save']?$results['content']['save']:"save");?></strong></button> 
</td>
</tr>
</table>
</div>
</form>
</fieldset> 
 