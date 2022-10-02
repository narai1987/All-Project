<?php 
//echo '<pre>';print_r($results);
?>
<script type="text/javascript" src="assets/ckeditor/ckeditor.js"></script>

<div class="detail_right right">
  <form action="index.php" method="post" onsubmit="return validation_emailTemplate('<?php echo $results['language'][0]['id'];?>')" enctype="multipart/form-data">
    <?php foreach($arrData['doctors'] as $result) { }  ?>
    <div class="detail_container ">
      <div class="head_cont">
        <h2 class="main_head">
          <table width="99%">
            <tr>
              <td width="85%" class="main_txt"><?php echo $result['id']?$results['content'][$_SESSION['language_id']]['edit']:$results['content'][$_SESSION['language_id']]['add_new'];?> <?php echo $results['content'][$_SESSION['language_id']]['doctor'];?>
                <?php if($results['content'][1]['id']=='') { echo "Add New E-mail Templates "; } else {echo "Edit E-mail Templates ";} ?></td>
              <td></td>
            </tr>
          </table>
        </h2>
      </div>
      <div class="grid_container">
        <div class="main_collaps">
          <div id="chlang<?php echo $language['id'];?>" >
            <table width="99%" cellpadding="0" cellspacing="8" class="tab_regis _merg_top">
              <tr>
                <td width="18%" align="right"><strong><em class="star_red">* </em> Type :</strong></td>
                <td><!--<input type="text" name="title" id="title" value="<?php echo $contentTitle[0]['title']; ?>" class="reg_txt" />-->
                  
                  <?php //echo "fghf".$emailtypes[0]['type'];?>
                  <select name="type" id="type" >
                    <option value="">Select </option>
                    <option value="News Letter" <?php if($emailtypes[0]['type'] == 'News Letter') {?> selected="selected" <?php } ?>>News Letter </option>
                    <option value="Registration" <?php if($emailtypes[0]['type'] == 'Registration') {?> selected="selected" <?php } ?>>Registration</option>
                    <option value="Forget Password" <?php if($emailtypes[0]['type'] == 'Forget Password') {?> selected="selected" <?php } ?>>Forget Password</option>
                    <option value="New Password" <?php if($emailtypes[0]['type'] == 'New Password') {?> selected="selected" <?php } ?>>New Password</option>
                  </select>
                  <span id="msgtype" style="color:red;" class="font"> </span></td>
              </tr>
              <tr>
                <td width="20%" align="right"><strong><em class="star_red">*</em> Title :</strong></td>
                <td><input type="text" name="title" id="title" value="<?php echo $results['content'][1]['title']; ?>" class="lang_box" />
                  <span id="msgtitle" style="color:red;" class="font"> </span></td>
              </tr>
              <tr>
                <td width="20%" align="right"><strong><em class="star_red">*</em> Subject :</strong></td>
                <td><input type="text" name="subject" id="subject" value="<?php echo $results['content'][1]['subject']; ?>" class="lang_box" />
                  <span id="msgsubject" style="color:red;" class="font"> </span></td>
              </tr>
              <tr>
                <td valign="top" align="right"><strong><em class="star_red">*</em> Content Design :</strong></td>
                <td><textarea class="ckeditor" name="content" id="content" rows="5" cols="50"><?php echo $results['content'][1]['content']; ?></textarea>
                  <span id="msgcontent" style="color:red;" class="font"> </span></td>
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
            <input type="hidden" name="control" value="emailTemplate"/>
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
                <button class="lang_button_re" type="reset" onclick="resetEmailtemp()"><strong>Reset</strong></button></td>
            </tr>
          </table>
          <br/>
        </div>
      </div>
    </div>
  </form>
</div>
<script type="text/javascript">
	
function validation_emailTemplate(str){ 
	var chk=1;
	var id=document.getElementById('idd').value;	
	
	if(document.getElementById('type').value == '') {
	chk = 0;
	document.getElementById('msgtype').innerHTML ="This field is required";	
	}else {
	document.getElementById('msgtype').innerHTML = "";
	}
	
	if(document.getElementById('title').value=='') {
	chk=0;	
	document.getElementById('msgtitle').innerHTML="This field is required";
	}else  {
	document.getElementById('msgtitle').innerHTML="";
    }	
	
	if(document.getElementById('subject').value=='') {
	chk=0;	
	document.getElementById('msgsubject').innerHTML="This field is required";
	}else  {
	document.getElementById('msgsubject').innerHTML="";
    }		
		
	/*if(document.getElementById('content1').value=='') {
	chk=0;	
	document.getElementById('msgcontent1').innerHTML="This field is required";
	}else  {
	document.getElementById('msgcontent1').innerHTML="";
    }*/
	
	 if(chk){	
		return true;
		}else {	
		return false;
		}
		
}



function resetEmailtemp(){ 
document.getElementById('msgtype').innerHTML="";
document.getElementById('msgtitle').innerHTML = "";
document.getElementById('msgsubject').innerHTML="";
//document.getElementById('msgcontent1').innerHTML="";
}

</script> 
