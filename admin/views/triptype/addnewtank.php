<?php
//print_r($companies);
?>
<script src="assets/viewJs/ViewValidation.js"></script>

<div class="detail_right right">
    <div class="detail_container ">
      <div class="head_cont">
        <h2 class="main_head">
          <table width="99%">
            <tr>
              <td width="85%" class="main_txt"><?php if($results->id=='') { echo "Add New Scuba cylinder "; } else {echo "Edit Scuba cylinder ";} ?></td>
              <td><!--<a href="#" class="button"><img src="images/add_new.png" alt="add new" /></a>--></td>
            </tr>
          </table>
        </h2>
      </div>
      <div class="grid_container">
        <div class="main_collaps">
          <form name="formtanktype" action="index.php" method="post" enctype="multipart/form-data" onsubmit="return fuel_tankValidate();" >
            <div style="width:100%; height:auto;"> 
              <!--TOP TABING START HERE-->
              <div class='tab-container'>
                <fieldset class="field_profile">
                  <legend><strong>Scuba cylinder </strong></legend>
                  <table width="97%" cellpadding="0" cellspacing="4" class="add_language">
                    <tr>
                      <td align="left" width="5%"><strong><em class="star_red">*</em> Scuba cylinder   :</strong></td>
                      <td width="11%"><input class="lang_box" id="fuel_tank" value="<?php echo $results[0]->fuel_tank; ?>" name="fuel_tank" />
                        <span id="msgfuel_tank" style="color:red;" class="font"></span></td>
                    </tr>
                  </table>
                </fieldset>
              </div>
              <!--TOP TABING END HERE--> 
            </div>
            <table width="100%" cellpadding="0" cellspacing="0" class="tab_button">
              <tr>
                <td width="70%">&nbsp;</td>
                <td align="center" ><button class="lang_button"><strong>Submit</strong></button>
                  <button class="lang_button_re" type="reset" onclick="resettankType()"><strong>Reset</strong></button></td>
              </tr>
            </table><br />

            <input type="hidden" name="control" value="triptype"/>
            <input type="hidden" name="edit" value="1"/>
            <input type="hidden" name="task" value="savetank"/>
            <input type="hidden" name="id" id="idd" value="<?php echo $results[0]->id; ?>"  />
             <input type="hidden" name="tpages" id="tpages" value="<?php echo $_REQUEST['tpages']; ?>"  />
  <input type="hidden" name="page" id="page" value="<?php echo $_REQUEST['page'];?>"  /> 
          </form>
        </div>
    </div>
  </div>
</div>
<script type="text/javascript">

function isEmail(text)
{
	
	var pattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
	
	//"^[\\w-_\.]*[\\w-_\.]\@[\\w]\.\+[\\w]+[\\w]$";
	var regex = new RegExp( pattern );
	return regex.test(text);
	
}

function numeric(sText)
{
 var ValidChars = "0123456789,.";
 var IsNumber=true;	
 for (i = 0; i < sText.length && IsNumber == true; i++) 
      { 
      Char = sText.charAt(i); 
      if (ValidChars.indexOf(Char) == -1) 
         {			 
		 IsNumber = false;
         }
      }
  	 return IsNumber;
}


function fuel_tankValidate()
{  
	
   
	var chk=1;
	
	
  if(document.getElementById('fuel_tank').value == '') { 
	document.getElementById('msgfuel_tank').innerHTML ="*Required field.";
	document.getElementById('msgfuel_tank').className ="error-message";
	chk=0;
	}else {
	document.getElementById('msgfuel_tank').innerHTML = "";
	document.getElementById('msgfuel_tank').className ="";
	}
	
  
	
  if(chk) {	
		return true;
		}
		else {
		return false;		
		}	

}

function resettankType()
{  
document.getElementById('msgfuel_tank').innerHTML = "";

}
</script>