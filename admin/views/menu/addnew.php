<?php 
//echo '<pre>';print_r($results);
?>
<script type="text/javascript" src="assets/ckeditor/ckeditor.js"></script>

<div class="detail_right right">
  <form action="index.php" method="post" onsubmit="return validation_content('<?php echo $results['language'][0]['id'];?>')" enctype="multipart/form-data">
   
      <?php foreach($arrData['doctors'] as $result) { }  ?>
      <div class="detail_container ">
        <div class="head_cont">
          <h2 class="main_head">
            <table width="99%">
              <tr>
                <td width="85%" class="main_txt"><?php echo $result['id']?$results['content'][$_SESSION['language_id']]['edit']:$results['content'][$_SESSION['language_id']]['add_new'];?> <?php echo $results['content'][$_SESSION['language_id']]['doctor'];?>
                  <?php if($results['content'][1]['id']=='') { echo "Add New Menu"; } else {echo "Edit Menu";} ?></td>
                <td></td>
              </tr>
            </table>
          </h2>
        </div>
        <div class="grid_container">
          <div class="main_collaps">
            <div style="padding:10px;">
              <table width="99%" cellpadding="0" cellspacing="8" class="tab_regis _merg_top">
                <tr>
                  <td width="18%" align="right"><strong><em class="star_red">* </em> Menu Tpye :</strong></td>
                  <td><!--<input type="text" name="title" id="title" value="<?php echo $contentTitle[0]['title']; ?>" class="reg_txt" />-->
                    
                    <?php //echo $menutypes[0]['menutype'];?>
                    <select name="type" id="type" >
                      <option value="">Select </option>
                      <option value="top" <?php if($menutypes[0]['menutype'] == 'top') {?> selected="selected" <?php } ?>>Top Menu </option>
                      <option value="footer" <?php if($menutypes[0]['menutype'] == 'footer') {?> selected="selected" <?php } ?>>Footer Menu</option>
                      <option value="bottom footer" <?php if($menutypes[0]['menutype'] == 'bottom footer') {?> selected="selected" <?php } ?>>Bottom Footer Menu</option>
                      <option value="terms conditions" <?php if($menutypes[0]['menutype'] == 'terms conditions') {?> selected="selected" <?php } ?>>Static Menu</option>
                    </select>
                    <span id="msgtype" style="color:red;" class="font"> </span></td>
                </tr>
              </table>
            </div>
            <div id="accordion_data">
              <?php
foreach($results['language'] as $language) {
?>
              <h3><?php echo $language['content'];?></a></h3>
              <div id="chlang<?php echo $language['id'];?>" style="border:1px solid #f0f5ff; border-top:none !important; margin-top:-3px;">
                <table width="99%" cellpadding="0" cellspacing="8" class="tab_regis _merg_top">
                  <tr>
                    <td width="20%" align="right"><strong><em class="star_red">*</em> Title :</strong></td>
                    <td><input type="text" name="title<?php echo $language['id'];?>" id="title<?php echo $language['id'];?>" value="<?php echo $results['content'][$language['id']]['title']; ?>" class="lang_box"  onkeyup="changelag(this.id,'<?php echo $language['id'];?>')" />
                      <span id="msgtitle<?php echo $language['id'];?>" style="color:red;" class="font"> </span></td>
                  </tr>
                  <tr>
                    <td valign="top" align="right"><strong><em class="star_red">*</em> Content Design :</strong></td>
                    <td><textarea class="ckeditor" name="content<?php echo $language['id'];?>" id="content<?php echo $language['id'];?>" rows="5" cols="50"><?php echo $results['content'][$language['id']]['content']; ?></textarea>
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
              <input type="hidden" name="control" value="menu"/>
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
                  <button class="lang_button_re" type="reset" onclick="resetMenu()"><strong>Reset</strong></button></td>
              </tr>
            </table><br/>
          </div>
        </div>
    </div>
  </form>
</div>
<script type="text/javascript">
	
function validation_content(str){ 
	var chk=1;
	var id=document.getElementById('idd').value;	
	
	if(document.getElementById('type').value == '') {
	chk = 0;
	document.getElementById('msgtype').innerHTML ="This field is required";	
	}else {
	document.getElementById('msgtype').innerHTML = "";
	document.getElementById('msgtype').className="";
	}
	
	if(document.getElementById('title'+str).value=='') {
	chk=0;	
	document.getElementById('msgtitle'+str).innerHTML="This field is required";
	}else  {
	document.getElementById('msgtitle'+str).innerHTML="";
    }	
		
		
/*	if(document.getElementById('content'+str).value=='') {
	chk=0;	
	document.getElementById('msgcontent'+str).innerHTML="This field is required";
	}else  {
	document.getElementById('msgcontent'+str).innerHTML="";
    }*/
	
	if(chk){	
		return true;
		}else {	
		return false;
		}
		
}




function resetMenu(){ 
document.getElementById('msgtype').innerHTML="";
document.getElementById('msgtitle1').innerHTML = "";

//document.getElementById('msgcontent1').innerHTML="";
}

</script> 
