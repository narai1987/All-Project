
<div class="detail_right right">
  <form action="index.php" method="post" onsubmit="return validation_cabin('<?php echo $results['language'][0]['id'];?>')" enctype="multipart/form-data">
   
    <?php foreach($arrData['doctors'] as $result) { }  ?>
    <div class="detail_container ">
      <div class="head_cont">
        <h2 class="main_head">
          <table width="99%">
            <tr>
              <td width="85%" class="main_txt"><?php echo $result['id']?$results['content'][$_SESSION['language_id']]['edit']:$results['content'][$_SESSION['language_id']]['add_new'];?> <?php echo $results['content'][$_SESSION['language_id']]['doctor'];?>
                <?php if($results['content'][1]['id']=='') { echo "Add New Cabin"; } else {echo "Edit Cabin";} ?></td>
              <td></td>
            </tr>
          </table>
        </h2>
      </div>
      <div class="grid_container">
        <div class="main_collaps">
          <div style="padding:10px;">
            <div id="accordion_data">
              <?php
foreach($results['language'] as $language) {
?>
              <h3><?php echo $language['content'];?></a></h3>
              <div id="chlang<?php echo $language['id'];?>" style="border:1px solid #f0f5ff; border-top:none !important; margin-top:-3px;">
                <table width="99%" cellpadding="0" cellspacing="8" class="tab_regis _merg_top">
                  <tr>
                    <td width="20%" align="right"><strong><em class="star_red">*</em> Cabin Name :</strong></td>
                    <td><input type="text" name="cabin<?php echo $language['id'];?>" id="cabin<?php echo $language['id'];?>" value="<?php echo $results['content'][$language['id']]['cabin']; ?>" class="lang_box"  onkeyup="changelag(this.id,'<?php echo $language['id'];?>')" />
                      <span id="msgfname<?php echo $language['id'];?>" style="color:red;" class="font"> </span></td>
                  </tr>
                  <tr>
                    <td valign="top" align="right"><strong><em class="star_red">*</em> Description<?php echo $results['content'][$language['id']]['content'];?> :</strong></td>
                    <td><textarea class="lang_box" name="detail<?php echo $language['id'];?>" id="detail<?php echo $language['id'];?>" rows="5" cols="50"><?php echo $results['content'][$language['id']]['detail']; ?></textarea>
                      <span id="msgcontent<?php echo $language['id'];?>" style="color:red;" class="font"> </span></td>
                    <td align="right"></td>
                    <td></td>
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
              <input type="hidden" name="control" value="cabin"/>
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
                  <button class="lang_button_re" type="reset" onclick="resetValidation_cabin()"><strong>Reset</strong></button></td>
              </tr>
            </table><br />
          </div>
          </div>
        </div>
      </div>
  </form>
</div>
<script type="text/javascript">
function isletter(txt)
{
	var iChars = "!@#$^&*+=[]\\\/{}|\":<>?0123456789";
	var chk	=1;
	for (var i = 0; i < txt.length; i++) {
    if (iChars.indexOf(txt.charAt(i)) != -1) {
   		chk=0;
        }
    }
	if(chk){
	return true;
	}else{
	return false;
	}
}
	
	
	
	
	
	
	
	
	
function validation_cabin(str){ 
	var cnt = 1;
		
	if(document.getElementById('cabin'+str).value=='') {
	cnt = 0;	
	document.getElementById('msgfname'+str).innerHTML="This field is required";
	
	}
	else if(!isletter(document.getElementById('cabin'+str).value)) {
	cnt = 0;	
	document.getElementById('msgfname'+str).innerHTML="Invalid cabin name ";

	}
	else  {
	document.getElementById('msgfname'+str).innerHTML="";

	}
	
		if(cnt==1){	
		return true;
		}else {	
		return false;
		}
		
}



function resetValidation_cabin(){ 
document.getElementById('msgfname1').innerHTML="";

}
</script>