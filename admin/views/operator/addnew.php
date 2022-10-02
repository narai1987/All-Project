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
              <td width="85%" class="main_txt"><?php if($results['common'][0]->id=='') { echo "Add New Operator"; } else {echo "Edit Operator";} ?></td>
              <td><!--<a href="#" class="button"><img src="images/add_new.png" alt="add new" /></a>--></td>
            </tr>
          </table>
        </h2>
      </div>
      <div class="grid_container">
        <div class="main_collaps">
          <form name="formOperator" action="index.php" method="post" enctype="multipart/form-data" onsubmit="return operatorValidate();" >
            <div style="width:100%; height:auto;"> 
              <!--TOP TABING START HERE-->
              <div class='tab-container'>
                  <div id="lang0_1" class="pans">
                    <table width="97%" cellpadding="0" cellspacing="4" class="add_language">
                      <tr>
                        <td align="right" width="20%" valign="top"><strong><em class="star_red">*</em> First Name:</strong></td>
                        <td width="29%"><input class="lang_box" id="first_name" value="<?php echo $results['common'][0]->first_name ?>" name="first_name"/>
                          <span id="msgfname" style="color:red;" class="font"></span></td>
                        <td align="right" width="20%"  valign="top"><strong><em class="star_red">*</em> Last Name :</strong></td>
                        <td width="29%"><input class="lang_box" id="last_name" value="<?php echo $results['common'][0]->last_name ?>" name="last_name"/>
                          <span id="msglname" style="color:red;" class="font"></span></td>
                      </tr>
                      <tr>
                        <td align="right" width="20%" valign="top"><strong><em class="star_red">*</em> Email :</strong></td>
                        <td width="29%"><input class="lang_box" id="email" value="<?php echo $results['common'][0]->email ?>" name="email"/>
                          <span id="msgemail" style="color:red;" class="font"></span></td>
                        <td align="right" width="20%" valign="top"><strong><em class="star_red">*</em> Company :</strong></td>
                        <td width="29%"><select class="lang_box" name="company_id" id="company_id">
                            <option value="" >Select Company</option>
                            <?php foreach($companies as $c): ?>
                            <option value="<?php echo $c['id']; ?>" <?php if($c['id'] == $results['common'][0]->company_id){ ?> selected="selected" <?php } ?>><?php echo $c['company']; ?></option>
                            <?php endforeach; ?>
                          </select>
                          <span id="msgcompany_id" style="color:red;" class="font"></span></td>
                      </tr>
                      <tr>
                        <td align="right" width="21%" valign="top"><strong><em class="star_red">*</em> Trip Manager Email :</strong></td>
                        <td><input type="text" class="lang_box" name="email_trip_manager" id="email_trip_manager" value="<?php echo $results['common'][0]->email_trip_manager; ?>"/>
                          <span id="msgemail_trip_manager" style="color:red;" class="font"></span></td>
                        <td align="right" width="20%" valign="top"><strong><em class="star_red">*</em> Manager Name :</strong></td>
                        <td width="29%"><input type="text" class="lang_box" name="manager_name" id="manager_name" value="<?php echo $results['common'][0]->manager_name; ?>"/>
                          <span id="msgmanager_name" style="color:red;" class="font"></span></td>
                      </tr>
                      <tr>
                        <td align="right" width="20%" valign="top"><strong><em class="star_red">*</em> Trip Branch Email :</strong></td>
                        <td><input type="text" class="lang_box" name="email_trip_branch" id="email_trip_branch" value="<?php echo $results['common'][0]->email_trip_branch; ?>"/>
                          <span id="msgemail_trip_branch" style="color:red;" class="font"></span></td>
                        <td align="right" width="20%" valign="top"><strong><em class="star_red">*</em> Branch Name :</strong></td>
                        <td width="29%"><input type="text" class="lang_box" name="branch_name" id="branch_name" value="<?php echo $results['common'][0]->branch_name; ?>"/>
                          <span id="msgbranch_name" style="color:red;" class="font"></span></td>
                      </tr>
                      <tr>
                        <td align="right" width="20%" valign="top"><strong><em class="star_red">*</em> Join Date :</strong></td>
                        <td><input type="text" class="lang_box" name="join_date" id="inputDate" readonly="readonly" value="<?php echo $results['common'][0]->join_date?date("Y-m-d",strtotime($results['common'][0]->join_date)):date("Y-m-d"); ?>"/></td>
                      </tr>
                      <tr>
                        <td align="right" width="20%" valign="top"><strong><em class="star_red">*</em> Description :</strong></td>
                        <td><textarea rows="7" cols="25" name="description" id="description"><?php echo $results['common'][0]->description; ?></textarea>
                          <span id="msgdescription" style="color:red;" class="font"></span></td>
                      </tr>
                    </table>
                  </div>
              </div>
              <!--TOP TABING END HERE--> 
            </div>
            <table width="100%" cellpadding="0" cellspacing="0" class="tab_button">
              <tr>
                <td width="70%">&nbsp;</td>
                <td align="center" ><button class="lang_button"><strong>Submit</strong></button>
                  <button class="lang_button_re" type="reset"  onclick="resetOperatorValidate()"><strong>Reset</strong></button></td>
              </tr>
            </table><br />

            <input type="hidden" name="control" value="operator"/>
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
<script type="text/javascript">

function isEmail(text)
{
	
	var pattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
	
	//"^[\\w-_\.]*[\\w-_\.]\@[\\w]\.\+[\\w]+[\\w]$";
	var regex = new RegExp( pattern );
	return regex.test(text);
	
}



function operatorValidate()
{  
	
   
	var chk=1;
	if(document.getElementById('first_name').value == '') { 
	document.getElementById('msgfname').innerHTML ="*Required field.";
	chk=0;
	}else if(!isletter(document.getElementById('first_name').value)){ 
	document.getElementById('msgfname').innerHTML ="*Must be letters only.";
	chk=0;	
    }else { 
	document.getElementById('msgfname').innerHTML ='';
	}
	
	if(document.getElementById('last_name').value == '') { 
	document.getElementById('msglname').innerHTML ="*Required field.";
	chk=0;
	}else if(!isletter(document.getElementById('last_name').value)){ 
	document.getElementById('msglname').innerHTML ="*Must be letters only.";
	chk=0;	
    }else { 
	document.getElementById('msglname').innerHTML ='';
	}
	
  if(document.getElementById('email').value == '') { 
	document.getElementById('msgemail').innerHTML ="*Required field.";
	chk=0;
	}else if(!isEmail(document.getElementById('email').value)){ 
	document.getElementById('msgemail').innerHTML ="*Must be email-id only.";
	chk=0;	
    }else {
	document.getElementById('msgemail').innerHTML = "";
	}
	
  if(document.getElementById('company_id').value == '') { 
	document.getElementById('msgcompany_id').innerHTML ="*Required field.";
	chk=0;
	}else {
	document.getElementById('msgcompany_id').innerHTML = "";
	}
	
  if(document.getElementById('email_trip_manager').value == '') { 
	document.getElementById('msgemail_trip_manager').innerHTML ="*Required field.";
	chk=0;
	}else if(!isEmail(document.getElementById('email_trip_manager').value)){ 
	document.getElementById('msgemail_trip_manager').innerHTML ="*Must be email-id only.";
	chk=0;	
    }else {
	document.getElementById('msgemail_trip_manager').innerHTML = "";
	}
	
  if(document.getElementById('manager_name').value == '') { 
	document.getElementById('msgmanager_name').innerHTML ="*Required field.";
	chk=0;
	}else if(!isletter(document.getElementById('manager_name').value)){ 
	document.getElementById('msgmanager_name').innerHTML ="*Must be email-id only.";
	chk=0;	
    }else {
	document.getElementById('msgmanager_name').innerHTML = "";
	}	
	
	
  if(document.getElementById('email_trip_branch').value == '') { 
	document.getElementById('msgemail_trip_branch').innerHTML ="*Required field.";
	chk=0;
	}else if(!isEmail(document.getElementById('email_trip_branch').value)){ 
	document.getElementById('msgemail_trip_branch').innerHTML ="*Must be email-id only.";
	chk=0;	
    }else {
	document.getElementById('msgemail_trip_branch').innerHTML = "";
	}	
	
	
  if(document.getElementById('branch_name').value == '') { 
	document.getElementById('msgbranch_name').innerHTML ="*Required field.";
	chk=0;
	}else {
	document.getElementById('msgbranch_name').innerHTML = "";
	}
	
  if(document.getElementById('description').value == '') { 
	document.getElementById('msgdescription').innerHTML ="*Required field.";
	chk=0;
	}else {
	document.getElementById('msgdescription').innerHTML = "";
	}
	
  if(chk) {	
		return true;
		}
		else {
		return false;		
		}	

}


function resetOperatorValidate()	
	{ 
	
	document.getElementById('msgfname').innerHTML ='';
	document.getElementById('msglname').innerHTML ='';
	document.getElementById('msgemail').innerHTML = "";
	document.getElementById('msgcompany_id').innerHTML = "";
	document.getElementById('msgemail_trip_manager').innerHTML = "";
	document.getElementById('msgmanager_name').innerHTML = "";
	document.getElementById('msgemail_trip_branch').innerHTML = "";
	document.getElementById('msgbranch_name').innerHTML = "";
	document.getElementById('msgdescription').innerHTML = "";
	}




</script>