<?php 
//echo '<pre>';print_r($results);
?>
<script src="assets/viewJs/ViewValidation.js"></script>

<div class="detail_right right">
  <form action="index.php" method="post" onsubmit="return boattech('<?php echo $results['language'][0]['id'];?>')" enctype="multipart/form-data">
      <?php foreach($arrData['doctors'] as $result) { }  ?>
      <div class="detail_container ">
        <div class="head_cont">
          <h2 class="main_head">
            <table width="99%">
              <tr>
                <td width="85%" class="main_txt"><?php echo $result['id']?$results['content'][$_SESSION['language_id']]['edit']:$results['content'][$_SESSION['language_id']]['add_new'];?> <?php echo $results['content'][$_SESSION['language_id']]['doctor'];?>
                  <?php if($results['content'][1]['id']=='') { echo "Add New Boat Technical Options"; } else {echo "Edit Boat Technical Options";} ?></td>
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
              <div id="chlang<?php echo $language['id'];?>" style="border:1px solid #f0f5ff; border-top:none !important; margin-top:-3px;">
                <table width="99%" cellpadding="0" cellspacing="8" class="tab_regis _merg_top">
                  <tr>
                    <td width="20%" align="right"><strong><em class="star_red">*</em> Title :</strong></td>
                    <td><input type="text" name="title<?php echo $language['id'];?>" id="title<?php echo $language['id'];?>" value="<?php echo $results['content'][$language['id']]['title']; ?>" class="lang_box"  onkeyup="changelag(this.id,'<?php echo $language['id'];?>')" />
                      <br />
                      <span id="msgtitle<?php echo $language['id'];?>" style="color:red;" class="font"> </span></td>
                  </tr>
                  <tr>
                    <td width="20%" align="right" valign="top"><strong><em class="star_red">*</em> Description :</strong></td>
                    <td><textarea class="lang_box" name="description<?php echo $language['id'];?>" id="description<?php echo $language['id'];?>" rows="5" cols="57"><?php echo $results['content'][$language['id']]['description']; ?></textarea>
                      <br />
                      <span id="msgdescription<?php echo $language['id'];?>" style="color:red;" class="font"> </span></td>
                  </tr>
                  <tr valign="top">
                    <td align="right" valign="top"></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td colspan="4" align="center"></td>
                  </tr>
                </table>
              </div>
              <?php
}
?>
              <input type="hidden" name="control" value="boatfeature"/>
              <input type="hidden" name="edit" value="1"/>
              <input type="hidden" name="task" value="save"/>
              <input type="hidden" name="id" id="idd" value="<?php echo $results['content'][1]['id']; ?>"  />
              
                 <input type="hidden" name="tpages" id="tpages" value="<?php echo $_REQUEST['tpages']; ?>"  />
              <input type="hidden" name="page" id="page" value="<?php echo $_REQUEST['page'];?>"  />
            
            </div>
            <table width="100%" cellpadding="0" cellspacing="0" class="tab_button">
              <tr>
                <td width="70%">&nbsp;</td>
                <td align="center" ><button class="lang_button" type="submit"><strong>Submit</strong></button>
                  <button class="lang_button_re" type="reset" onclick="resetboattech()"><strong>Reset</strong></button></td>
              </tr>
            </table><br />

          </div>
        </div>
    </div>
  </form>
</div>
<script type="text/javascript">
	
function boattech(str){ 
	var chk=1;
	var id=document.getElementById('idd').value;	
	
	if(document.getElementById('title'+str).value=='') {
	chk=0;	
	document.getElementById('msgtitle'+str).innerHTML="This field is required";
	}else  {
	document.getElementById('msgtitle'+str).innerHTML="";
    }	
	
	if(document.getElementById('description'+str).value=='') {
	chk=0;	
	document.getElementById('msgdescription'+str).innerHTML="This field is required";
	}else  {
	document.getElementById('msgdescription'+str).innerHTML="";
    }	
		
	if(chk){	
		return true;
		}else {	
		return false;
		}
		
}
function resetboattech(){ 
document.getElementById('msgtitle1').innerHTML="";
document.getElementById('msgdescription1').innerHTML="";
}
</script> 
