<?php 
//echo '<pre>';print_r($results);
?>

 <script src="assets/viewJs/ViewValidation.js"></script>
<div class="left_content left">
<form action="index.php" method="post" onsubmit="return relationValidate('<?php echo $results['language'][0]['id'];?>')" enctype="multipart/form-data">
<div class="user_panel">
<?php foreach($arrData['doctors'] as $result) { }  ?>
<div class="detail_container ">
<div class="head_cont">
<h2 class="userIcon_grd">
<table width="99%"><tr><td width="85%"><?php echo $result['id']?$results['content'][$_SESSION['language_id']]['edit']:$results['content'][$_SESSION['language_id']]['add_new'];?> <?php echo $results['content'][$_SESSION['language_id']]['doctor'];?>
<?php if($results['content'][1]['id']=='') { echo "Add New Relation"; } else {echo "Edit Relation";} ?>
</td> 
<td></td>
</tr>
</table>
</h2>
</div>  
<div class="grid_container">
<div class="main_collaps">

<div id="accordion_data">
<?php //echo '<pre>'; print_r($results);
foreach($results['language'] as $language) {
	
?>
<h3><?php echo $language['content'];?></a></h3>
<div id="chlang<?php echo $language['id'];?>">
<table width="99%" cellpadding="0" cellspacing="8" class="tab_regis _merg_top">

<tr>
<td width="20%" align="right">
<strong><em class="star_red">*</em> Relation :</strong>
</td>
<td>
<input type="text" name="relation<?php echo $language['id'];?>" id="relation<?php echo $language['id'];?>" value="<?php echo $results['content'][$language['id']]['content']; ?>" class="reg_txt"  onkeyup="changelag(this.id,'<?php echo $language['id'];?>')" />
<span id="msgrelation<?php echo $language['id'];?>" style="color:red;" class="font"> </span>
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
<input type="hidden" name="control" value="relation"/>
<input type="hidden" name="edit" value="1"/>
<input type="hidden" name="task" value="save"/>
<input type="hidden" name="id" id="idd" value="<?php echo $results['content'][1]['relation_id']; ?>"  />
<input type="hidden" name="tpages" id="tpages" value="<?php echo $_REQUEST['tpages']; ?>"  />
<input type="hidden" name="page" id="page" value="<?php echo $_REQUEST['page'];?>"  />


</div>


<table width="100%" cellpadding="0" cellspacing="0" class="tab_button">
<tr>
<td width="70%">&nbsp;</td>
<td align="center" ><button class="lang_button" type="submit"><strong>Submit</strong></button>
<button class="lang_button_re" type="reset" onclick="resetRelation()"><strong>Reset</strong></button>
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
	
function relationValidate(str){ 
	var chk=1;
	//alert(str);
    var id=document.getElementById('idd').value;	
	
	
	
	
	if(document.getElementById('relation'+str).value=='') {
	chk=0;	
	document.getElementById('msgrelation'+str).innerHTML="This field is required";
	}else  {
	document.getElementById('msgrelation'+str).innerHTML="";
    }	
		
    if(chk){	
	return true;
	}else {	
	return false;
	}
		
}



function resetRelation(){ 
document.getElementById('msgrelation1').innerHTML="";

}

</script>


