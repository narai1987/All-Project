<?php
//print_r($companies);
?><script src="assets/viewJs/ViewValidation.js"></script>
<div class="left_content left">
<div class="user_panel">
<div class="detail_container ">
    <div class="head_cont">
    <h2 class="userIcon_grd">
    <table width="99%"><tr><td width="85%">Add/Edit Operator</td> 
    <td><!--<a href="#" class="button"><img src="images/add_new.png" alt="add new" /></a>--></td>
    </tr>
    </table>
    </h2>
    </div>
    <div class="grid_container">
  <div class="main_collaps">
<form name="formOperator" action="index.php" method="post" enctype="multipart/form-data" onsubmit="return formValidate();" >
<div style="width:100%; height:auto;">
	<!--TOP TABING START HERE-->
    <div class='tab-container'>
         
        <fieldset><legend><strong>Operators</strong></legend>
          <div id="lang0_1" class="pans">
           <table width="97%" cellpadding="0" cellspacing="4" class="add_language">                        
                                                
                        <tr>
                        <td align="right" width="20%"><strong><em class="star_red">*</em> First Name:</strong></td>
                        <td width="29%">
                       <input class="lang_box" id="first_name" value="<?php echo $results['common']->first_name ?>" name="first_name"/></td>
                         <td align="right" width="20%"><strong><em class="star_red">*</em> Last Name :</strong></td>
                        <td width="29%">
                        <input class="lang_box" id="last_name" value="<?php echo $results['common']->last_name ?>" name="last_name"/>
                        </td>
                        </tr> 
                        
                        <tr>
                        <td align="right" width="20%"><strong><em class="star_red">*</em>Email :</strong></td>
                        <td width="29%">
                        <input class="lang_box" id="email" value="<?php echo $results['common']->email ?>" name="email"/>
                        </td>
                        <td align="right" width="20%"><strong><em class="star_red">*</em> Company :</strong></td>
                        <td width="29%">
                        <select class="lang_box" name="company_id" id="company_id">
                        	<option value="0" >Select Company</option>
                            <?php foreach($companies as $c): ?>
                            <option value="<?php echo $c['id']; ?>" <?php if($c['id'] == $results['common']->company_id){ ?> selected="selected" <?php } ?>><?php echo $c['company']; ?></option>
                            <?php endforeach; ?>
                        </select>
                        </td>
                        </tr> 
                        <tr>
                        
                        <td align="right" width="20%"><strong><em class="star_red">*</em> Trip Manager Email :</strong></td>
                        <td>
                        <input type="text" class="lang_box" name="email_trip_manager" id="email_trip_manager" value="<?php echo $results['common']->email_trip_manager; ?>"/>                        
                        </td>
                        <td align="right" width="20%"><strong><em class="star_red">*</em> Manager Name :</strong></td>
                        <td width="29%"><input type="text" class="lang_box" name="manager_name" id="manager_name" value="<?php echo $results['common']->manager_name; ?>"/></td>
                      </tr>
                          <tr>
                        
                        <td align="right" width="20%"><strong><em class="star_red">*</em> Trip Branch Email :</strong></td>
                        <td>
                        <input type="text" class="lang_box" name="email_trip_branch" id="email_trip_branch" value="<?php echo $results['common']->email_trip_branch; ?>"/>                        
                        </td>
                        <td align="right" width="20%"><strong><em class="star_red">*</em> Branch Name :</strong></td>
                        <td width="29%"><input type="text" class="lang_box" name="branch_name" id="branch_name" value="<?php echo $results['common']->branch_name; ?>"/></td>
                       </tr>
                          <tr>
                        
                        <td align="right" width="20%"><strong><em class="star_red">*</em> Join Date :</strong></td>
                        <td>
                        <input type="text" class="lang_box" name="join_date" id="inputDate" value="<?php echo $results['common']->join_date?date("Y-m-d",strtotime($results['common']->join_date)):date("Y-m-d"); ?>"/>                        
                        </td>
                        
                       </tr>
                       
                          <tr>
                        
                        <td align="right" width="20%" valign="top"><strong><em class="star_red">*</em> Description :</strong></td>
                        <td>
                        <textarea rows="7" cols="25" name="description" id="description"><?php echo $results['common']->description; ?></textarea>                        
                        </td>
                        
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
    <button class="lang_button_re">&nbsp; <strong>Reset</strong></button>
    </td>
    </tr>    
</table>     
<input type="hidden" name="control" value="operator"/>
<input type="hidden" name="edit" value="1"/>
<input type="hidden" name="task" value="save"/>
<input type="hidden" name="id" id="idd" value="<?php echo $results['common']->id; ?>"  />   
</form>
  
</div>    
</div>   
</div>  
</div>
</div>