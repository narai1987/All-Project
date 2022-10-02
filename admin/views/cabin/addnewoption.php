<div class="detail_right right">
  <form action="index.php" method="post" onsubmit="return validation_option('<?php echo $results['language'][0]['id'];?>')" enctype="multipart/form-data">
    <?php foreach($arrData['doctors'] as $result) { }  ?>
    <div class="detail_container ">
      <div class="head_cont">
        <h2 class="main_head">
          <table width="99%">
            <tr>
              <td width="85%" class="main_txt">Cabin Options</td>
              <td></td>
            </tr>
          </table>
        </h2>
      </div>
      <div class="grid_container">
        <div class="main_collaps">
          <div id="chlang" >
            <table width="99%" cellpadding="0" cellspacing="8" class="tab_regis _merg_top">
              <tr>
                <td width="18%" align="right"><strong><em class="star_red">* </em> Select Cabin :</strong></td>
                <td>
                  <select name="cabin" id="cabin" >
                    <option value="">Select Cabin</option>
                    <?php foreach($cabins AS $cabin){ ?>
                    <option value="<?php echo $cabin['id'];?>" <?php if($cabin['id'] == $allContents[0]['cabin_id']) { ?> selected="selected" <?php } ?>><?php echo $cabin['cabin'];?></option>
                   <?php } ?>
                   </select>
                  <span id="msgcabin" style="color:red;" class="font"> </span></td>
              </tr>
              <tr>
                <td width="20%" align="right"><strong><em class="star_red">*</em> Option Name :</strong></td>
                <td><input type="text" name="option" id="option" value="<?php echo $allContents[0]['option']; ?>" class="lang_box" style="width:225px;"/>
                  <span id="msgoption" style="color:red;" class="font"> </span></td>
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
            <input type="hidden" name="control" value="cabin"/>
            <input type="hidden" name="edit" value="1"/>
            <input type="hidden" name="task" value="saveoption"/>
            <input type="hidden" name="id" id="idd" value="<?php echo $allContents[0]['id']; ?>"  />
            <input type="hidden" name="tpages" id="tpages" value="<?php echo $_REQUEST['tpages']; ?>"  />
            <input type="hidden" name="page" id="page" value="<?php echo $_REQUEST['page'];?>"  />
          </div>
          <table width="100%" cellpadding="0" cellspacing="0" class="tab_button">
            <tr>
              <td width="70%">&nbsp;</td>
              <td align="center" ><button class="lang_button" type="submit"><strong>Submit</strong></button>
                <button class="lang_button_re" type="reset" onclick="resetOption()"><strong>Reset</strong></button></td>
            </tr>
          </table>
          <br/>
        </div>
      </div>
    </div>
  </form>
</div>
<script type="text/javascript">
	
function validation_option(str){ 
	var chk=1;
	var id=document.getElementById('idd').value;	
	
	if(document.getElementById('cabin').value == '') {
	chk = 0;
	document.getElementById('msgcabin').innerHTML ="This field is required";	
	}else {
	document.getElementById('msgcabin').innerHTML = "";
	}
	
	if(document.getElementById('option').value=='') {
	chk=0;	
	document.getElementById('msgoption').innerHTML="This field is required";
	}else  {
	document.getElementById('msgoption').innerHTML="";
    }
	
	
	
	 if(chk){	
		return true;
		}else {	
		return false;
		}
		
}



function resetOption(){ 
document.getElementById('msgcabin').innerHTML="";
document.getElementById('msgoption').innerHTML = "";
}

</script> 
