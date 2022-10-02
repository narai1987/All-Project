<script src="assets/viewJs/ViewValidation.js"></script>

<div class="left_content left">
  <div class="user_panel">
    <div class="detail_container ">
      <div class="head_cont">
        <h2 class="userIcon_grd">
          <table width="99%">
            <tr>
              <td width="85%">Equipments</td>
              <td></td>
            </tr>
          </table>
        </h2>
      </div>
      <div class="grid_container">
        <div class="main_collaps">
          <form name="formequipment" action="index.php" method="post" enctype="multipart/form-data" onsubmit="return equipmentValidate();" >
            <div id="accordion_data">
              <?php foreach($results1 as $language) { ?>
              <h3><a href="#"><?php echo $language['content'];?></a></h3>
              <div style="width:100%; height:auto;"> 
                <!--TOP TABING START HERE-->
                <div class='tab-container'>
                  <fieldset>
                    <legend><strong>Equipments</strong></legend>
                    <table width="97%" cellpadding="0" cellspacing="4" class="add_language">
                      <tr>
                        <td align="left" width="5%"><strong><em class="star_red">*</em>Name  :</strong></td>
                        <td width="11%"><input class="lang_box" name="name_<?php echo $language['id']; ?>" id="name" value="<?php echo $results['content'][$language['id']]['equipment']; ?>"  />
                          <span id="msgname" style="color:red;" class="font"></span></td>
                      </tr>
                    </table>
                  </fieldset>
                </div>
                <!--TOP TABING END HERE--> 
              </div>
              <?php } ?>
              
            </div>
            <table width="100%" cellpadding="0" cellspacing="0" class="tab_button">
                <tr>
                  <td width="70%">&nbsp;</td>
                  <td align="center" ><button class="lang_button"><strong>Submit</strong></button>
                    <button class="lang_button_re" type="reset"><strong>Reset</strong></button></td>
                </tr>
              </table>
              <input type="hidden" name="control" value="equipment"/>
              <input type="hidden" name="edit" value="1"/>
              <input type="hidden" name="task" value="save"/>
              <input type="hidden" name="id" id="idd" value="<?php echo $results['content'][$language['id']]['id']; ?>"  />
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
function equipmentValidate()
{  
	
   
	var chk=1;
	if(document.getElementById('name').value == '') { 
	document.getElementById('msgname').innerHTML ="*Required field.";
	document.getElementById('msgname').className ="error-message";
	chk=0;
	}else if(!isletter(document.getElementById('name').value)){ 
	document.getElementById('msgname').innerHTML ="*Must be letters only.";
	document.getElementById('msgname').className ="error-message";
	chk=0;	
    }else if((document.getElementById('name').value.length) < 2 ) {
	document.getElementById('msgname').className ="error-message";
	document.getElementById('msgname').innerHTML = "*Must be 2 or more characters.";
	chk=0;	
	}else { 
	document.getElementById('msgname').innerHTML ='';
	document.getElementById('msgname').className ="";
	}
	
   
		
  if(chk) {	
		return true;
		}
		else {
		return false;		
		}	

}

</script>