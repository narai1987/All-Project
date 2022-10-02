
<div class="detail_right right">
    <div class="detail_container ">
      <div class="head_cont">
        <h2 class="main_head">
          <table width="99%">
            <tr>
              <td width="85%" class="main_txt"><?php if($results['common'][0]->id=='') { echo "Add New Language"; } else {echo "Edit Language";} ?></td>
              <td><!--<a href="#" class="button"><img src="images/add_new.png" alt="add new" /></a>--></td>
            </tr>
          </table>
        </h2>
      </div>
      <div class="grid_container">
        <div class="main_collaps">
          <form name="formLanguage" action="index.php" method="post" enctype="multipart/form-data" onsubmit="return languageValidate();" >
            <div style="width:100%; height:auto;"> 
              <!--TOP TABING START HERE-->
              <div class='tab-container'>
                <fieldset class="field_profile">
                  <legend><strong>Languages</strong></legend>
                  <div id="lang0_1" class="pans">
                    <table width="97%" cellpadding="0" cellspacing="4" class="add_language">
                      <tr>
                        <td align="right" width="20%"><strong><em class="star_red">*</em> Language:</strong></td>
                        <td width="29%"><input class="lang_box" id="content" value="<?php echo $results['common'][0]->content ?>" name="content"/>
                          <span id="msgcontent" style="color:red;" class="font"></span></td>
                      </tr>
                    </table>
                  </div>
                </fieldset>
              </div>
              <!--TOP TABING END HERE--> 
            </div>
            <table width="100%" cellpadding="0" cellspacing="0" class="tab_button">
              <tr>
                <td width="70%">&nbsp;</td>
                <td align="center" ><button class="lang_button"><strong>Submit</strong></button>
                  <button class="lang_button_re" type="reset"  onclick="resetLanguageValidate()"><strong>Reset</strong></button></td>
              </tr>
            </table><br />

            <input type="hidden" name="control" value="language"/>
            <input type="hidden" name="edit" value="1"/>
            <input type="hidden" name="task" value="save"/>
            <input type="hidden" name="id" id="idd" value="<?php echo $results['common'][0]->id; ?>"  />
            
            <input type="hidden" name="tpages" id="tpages" value="<?php echo $_REQUEST['tpages']; ?>"  />
            <input type="hidden" name="page" id="page" value="<?php echo $_REQUEST['page'];?>"  />
            
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">




function languageValidate()
{  
	
   
	var chk=1;
	if(document.getElementById('content').value == '') { 
	document.getElementById('msgcontent').innerHTML ="*Required field.";
	chk=0;
	}else if(!isletter(document.getElementById('content').value)){ 
	document.getElementById('msgcontent').innerHTML ="*Must be letters only.";
	chk=0;	
    }else { 
	document.getElementById('msgcontent').innerHTML ='';
	}
	
	
  if(chk) {	
		return true;
		}
		else {
		return false;		
		}	

}


function resetLanguageValidate()	
	{ 
	
	document.getElementById('msgcontent').innerHTML ='';
	}




</script>