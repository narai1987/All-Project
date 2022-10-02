<?php 
//echo '<pre>';print_r($results);
?>

 <script src="assets/viewJs/ViewValidation.js"></script>
<div class="left_content left">
<form action="index.php" method="post" onsubmit="return beverageValidate('<?php echo $results['language'][0]['id'];?>')" enctype="multipart/form-data">
<div class="user_panel">
<?php foreach($arrData['doctors'] as $result) { }  ?>
<div class="detail_container ">
<div class="head_cont">
<h2 class="userIcon_grd">
<table width="99%"><tr><td width="85%"><?php echo $result['id']?$results['content'][$_SESSION['language_id']]['edit']:$results['content'][$_SESSION['language_id']]['add_new'];?> <?php echo $results['content'][$_SESSION['language_id']]['doctor'];?>Add New Beverage</td> 
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
<strong><em class="star_red">*</em>Beverage Types :</strong>
<select name="beverage_id" id="beverage_id">

<option value="">Select</option>
<?php  $sql2="SELECT * FROM beverage_types where language_id = ".$_SESSION['language_id'];
 $result=mysql_query($sql2); 
  while($row=mysql_fetch_array($result)) 
	 {?>
<option value="<?php echo $row['id']; ?>" <?php if($row['id']==$beverages[0]['beverage_type_id']) {?> selected="selected" <?php } ?>><?php echo $row['beverage_type']; ?></option>
<?php } ?>
</select>

<span id="msgbeverage_id" style="color:red;" class="font"> </span>
</td>
</tr>

</table>
</div>
<div id="accordion_data">
<?php //echo '<pre>'; print_r($results);
foreach($results['language'] as $language) {
	
?>
<h3><?php echo $language['content'];?></a></h3>
<div id="chlang<?php echo $language['id'];?>">
<table width="99%" cellpadding="0" cellspacing="8" class="tab_regis _merg_top">

<tr>
<td width="20%" align="right">
<strong><em class="star_red">*</em> Beverage :</strong>
</td>
<td>
<input type="text" name="beverage<?php echo $language['id'];?>" id="beverage<?php echo $language['id'];?>" value="<?php echo $results['content'][$language['id']]['beverage']; ?>" class="reg_txt"  onkeyup="changelag(this.id,'<?php echo $language['id'];?>')" />
<span id="msgbeverage<?php echo $language['id'];?>" style="color:red;" class="font"> </span>
</td>

</tr>



<tr valign="top">
<td align="right" valign="top">
</td>
<td>

</td>
<td></td>
<td></td>
</tr>

<tr>
<td colspan="4" align="center">

</td>
</tr>
</table>
</div>

<?php
}
?>
<input type="hidden" name="control" value="beverage"/>
<input type="hidden" name="edit" value="1"/>
<input type="hidden" name="task" value="save"/>
<input type="hidden" name="id" id="idd" value="<?php echo $results['content'][1]['id']; ?>"  />



</div>


<table width="100%" cellpadding="0" cellspacing="0" class="tab_button">
<tr>
<td width="70%">&nbsp;</td>
<td align="center" ><button class="lang_button" type="submit"><strong>Submit</strong></button>
<button class="lang_button_re" type="reset"><strong>Reset</strong></button>
</td>
</tr>
</table>
</div>
</div>
</div> 
</div>
</form>   
</div>



<script type="text/javascript">
	
function beverageValidate(str){ 
	var chk=1;
	var id=document.getElementById('idd').value;	
	
	if(document.getElementById('beverage_id').value == '') {
	chk = 0;
	document.getElementById('msgbeverage_id').innerHTML ="This field is required";	
	}else {
	document.getElementById('msgbeverage_id').innerHTML = "";
	}
	
	
	
	if(document.getElementById('beverage'+str).value=='') {
	chk=0;	
	document.getElementById('msgbeverage'+str).innerHTML="This field is required";
	}else  {
	document.getElementById('msgbeverage'+str).innerHTML="";
    }	
		
    if(chk){	
	return true;
	}else {	
	return false;
	}
		
}

</script>


