<style type="text/css">

.tloader {
	display:none;
	position:fixed;
	_position:absolute; /* hack for internet explorer 6*/
	height:100%;
	width:100%;
	top:0;
	left:0;
	background:#000000;
	opacity:.7;
	border:1px solid #cecece;
	z-index:9998;/*
	margin:0 auto;
	padding-top:200px;
	padding-left:200px;*/
}
</style>
<div class="popupContent">
							<a class="popupClose"></a>
							
							 <div id="example-one">
        			
        	<ul class="nav">
                <li class="nav-one"><a href="#featured" id="pop_provider" class="current">Provider Registration</a></li>
                <li class="nav-two"><a href="#core" id="pop_user" >User Registration</a></li>
            </ul>
        	<div class="list-wrap" id="list_wrap">
        	<form name="providersForm" method="post" id="provioderForm" action="index.php" onsubmit="return providerepopup();" >
        	<ul id="featured">
        			<li>
            <fieldset class="fieldset" >
                 <legend>Personal Detail</legend>
                 <table width="98%" cellpadding="0" cellspacing="2" class="tab_regis">
                 <tr valign="top">
                 <td align="right" width="18%" valign="top"><strong><em class="star_red">*</em> First Name :</strong></td>
                 <td><input type="text" name="fname" id="fname" class="reg_txt" />
                      <span id="msgpfname" style="color:red;" class="font"> </span>
                 </td>
                 <td align="right" width="18%" valign="top"><strong><em class="star_red">*</em> Last Name :</strong></td>
                 <td><input type="text" name="lname" id="lname" class="reg_txt" />
                       <span id="msgplname" style="color:red;" class="font"> </span>
                       </td>
                 </tr>
                 
                 <tr valign="top">
                 <td align="right" valign="top"><strong><em class="star_red">*</em> Email :</strong>
                  
                 </td>
                 <td width="36%" valign="top"><input type="text" name="email" id="emailid" class="reg_txt" onkeyup="emailAvailabilty(this.value,'provider')" />
                     <div id="msgemailid" style="color:red;background:none;"> </div>
                 </td>
                 <td align="right"><strong><em class="star_red">*</em> Gender :</strong></td>
                 <td><input type="radio" name="gender" id="gender" value="1" checked="checked"/> Male 
                     <input type="radio" name="gender" id="gender" value="0" /> Female</td>
                 </tr>
                 <tr valign="top">
                 <td align="right"></td>
                 <td>
                 </td>
                 <td align="right"></td>
                 <td></td>
                 </tr>
                 
                 </table>
                 </fieldset>
                 
                 <fieldset class="fieldset" >
                 <legend>Business Detail</legend>
                 <table width="98%" cellpadding="0" cellspacing="2" class="tab_regis">
                 <tr valign="top">
                 <td align="right" width="18%"><strong> Business Name :</strong></td>
                 <td><input type="text" name="business_name" id="business_name" class="reg_txt" /></td>
                <td align="right" valign="top" width="18%"><strong>Insurance :</strong></td>
                 <td align="left" width="28%" valign="middle"><!--<input type="checkbox" name="insurance" checked="checked" />--><input type="radio" name="insurance" value="Yes" checked="checked"  />&nbsp;Yes&nbsp;&nbsp;&nbsp; <input type="radio" name="insurance" value="No"  />&nbsp;No &nbsp;&nbsp;&nbsp;<input type="radio" name="insurance" value="N/A"  />&nbsp;N/A</td>
                 </tr>
                 
                 <tr valign="top">
                 <td align="right" width="18%"><strong title="Enter business registration/licence number."> Licence No :</strong></td>
                 <td width="36%"><input type="text" name="licence" id="licence" class="reg_txt" /></td>
                 <td align="right" width="18%"><strong title="Enter business web url.">Web url :</strong></td><td><input type="text" name="url" id="weburl" class="reg_txt" /><span id="msgurl" style="color:red;" class="font"> </span></td>
                 </tr>
                 <tr valign="top">
                 <td align="right" ><strong>Description:</strong></td>
                 <td colspan="3"><textarea rows="2" cols="50" name="description" id="description" class="regis_area"></textarea></td>
                 
                 </tr>
                 
                 </table>
                 </fieldset>
                 
                 <fieldset class="fieldset" >
                 <legend>Contact Detail</legend>
                 <table width="98%" cellpadding="0" cellspacing="2" class="tab_regis">
                 <tr valign="top">
                 <td align="right" width="18%" valign="top"><strong><em class="star_red">*</em> Country :</strong></td>
                 <td width="36%"><select name="country" id="country" class="reg_txt" onchange="fillstate(this.value)" disabled="disabled"  >
                 <option value="0">Select Country</option>
                 <?php
				 	foreach($countrys as $country) {?>
                 	<option value="<?php echo $country['id'];?>" <?php if($country['id']==2) { ?> selected="selected" <?php }?>><?php echo $country['country'];?></option>
                    <?php }?>
                 </select>
                 <span id="msgcountry" style="color:red;" class="font"> </span>
                 </td>
                 <td align="right" width="18%"><strong>Phone No :</strong></td>
                 <td><input type="text" name="phone" id="phone" maxlength="13" class="reg_txt" onkeyup="numeric1(this.value,this.id)" /></td>
                 </tr>
                 
                 <tr valign="top">
                 <td align="right"><strong><em class="star_red">*</em>State:</strong></td>
                 <td><select name="state" id="states" class="reg_txt" onchange="fillcity(this.value)" >
                 	<option value="0">Select State</option>
                    <?php
                     foreach($states as $state) {?>
                 	<option value="<?php echo $state['id'];?>" ><?php echo $state['state'];?></option>
                    <?php }?>
                 </select>
                  <span id="msgstate" style="color:red;" class="font"> </span>
                  </td>
                 <td align="right"><strong><em class="star_red">*</em>Mobile No :</strong></td>
                 <td><input type="text" name="mobile" id="mobile" maxlength="13" class="reg_txt" onkeyup="numeric1(this.value,this.id)" />
                 <span id="msgmobile" style="color:red;" class="font"> </span>
                 </td>
                 </tr>
                 <div class="tloader" id="dloader"><img src='admin/images/loading.gif' ></div>
                 <tr valign="top">
                 <td align="right"><strong><em class="star_red">*</em> Suburbs:</strong></td>
                 <td id="rmcity"><select name="city" id="city" class="reg_txt" onchange="fillpcode(this.value)" >
                 	<option value="0">Select Suburbs</option>
                 </select>
                 <span id="msgcity" style="color:red;" class="font"> </span>
                 </td>
                 <td align="right"><strong>Postal Code :</strong></td>
                 <td><input type="text" name="postalcode" id="postalcode" maxlength="6" class="reg_txt" onkeyup="numeric1(this.value,this.id)" disabled="disabled" /><input type="hidden" name="postalcode1" id="postalcode1"  /></td>
                 </tr>
                 
                 <tr valign="top">
                 <td align="right"><strong><em class="star_red">*</em>Address:</strong></td>
                 <td colspan="3"><textarea rows="2" cols="50" name="address" id="address" class="regis_area"></textarea>
                  <br /><span id="msgaddress" style="color:red;" class="font"></span></td>
                 </tr>
                 
                 </table>
                 </fieldset>
                 <fieldset class="fieldset">
                 <legend>Payment Type</legend>
                 <table style="font-weight:normal; width:99%; margin:0 auto;">
                 	<tr height="19">
                    	<td width="4%" align="right"><input type="radio" name="rad" value="0" checked="checked" /></td><td align="left">Register and pay now</td></tr><tr><td align="right"><input type="radio" name="rad" value="1"/></td><td>Register and our administrator will get back to you to discuss</td>
                    </tr>
                 </table>
                 </fieldset>
                 <br />
                 <p class="font"><em class="star_red">*</em> indicates mandatory fields ,&nbsp;&nbsp;<span class="font">(Your E-Mail ID will be consider as your User ID)</span>
                 <button type="reset" id="preset" class="submit right" onclick="resetprovioder()"><strong>&nbsp; Reset </strong></button>
                 <button type="submit" class="submit right"><strong>Submit</strong></button></p> 
                 <input type="hidden" name="control" value="provider"  />
                 <input type="hidden" name="view" value="myaccount"  />
                 <input type="hidden" name="task" value="register"  />
                 </li>
                 </ul>
            </form> 
             
             
        	<form name="usersForm" method="post" id="userForm" action="index.php" onsubmit="return userpopup();"> 
                <ul id="core" class="hide">
                <li><ul id="featured">
                <li>
                <fieldset class="fieldset" >
                 <legend>Personal Detail</legend>
                 <table width="98%" cellpadding="0" cellspacing="2" class="tab_regis">
                 <tr valign="top">
                 <td align="right" width="18%" valign="top"><strong><em class="star_red">*</em> First Name :</strong></td>
                 <td><input type="text" name="ufname" id="ufname" class="reg_txt" />
                      <span id="msgfname" style="color:red;" class="font"> </span>
                 </td>
                 <td align="right" width="18%" valign="top"><strong><em class="star_red">*</em> Last Name :</strong></td>
                 <td><input type="text" name="ulname" id="ulname" class="reg_txt" />
                      <span id="msglname" style="color:red;" class="font"> </span>
                      </td>
                 </tr>
                 
                 <tr valign="top">
                 <td align="right" valign="top"><strong><em class="star_red">*</em> Email :</strong>
                  
                 </td>
                 <td><input type="text" name="uemail" id="uemail" class="reg_txt" onkeyup="emailAvailabilty(this.value,'user')" />
                      <span id="msguemail" style="color:red;" class="font"> </span>
                 </td>
                 <td align="right" valign="top"><strong><em class="star_red">*</em> Gender :</strong></td>
                 <td><input type="radio" name="ugender" id="ugender" value="1" checked="checked" /> Male
                     <input type="radio" name="ugender" id="ugender1" value="0"  /> Female</td>
                 </tr>
                 <tr valign="top">
                 <td align="right"></td>
                 <td>
                 </td>
                 <td align="right"></td>
                 <td></td>
                 </tr>
                 <tr valign="top">
                 <td align="right" width="18%" valign="top"><strong><em class="star_red"></em> Mobile No :</strong></td>
                 <td><input type="text" name="umobile" id="umobile" maxlength="10" class="reg_txt" onkeyup="numeric1(this.value,this.id)" />
                      <span id="msgumobile" style="color:red;" class="font"> </span>
                      </td>
                 <td align="right" width="18%"><strong>Postal Code :</strong></td>
                 <td><input type="text" name="postalcode" id="postalcod" maxlength="6" class="reg_txt" onkeyup="numeric1(this.value,this.id)" /></td>
                 </tr>
                 </table>
                 </fieldset>
                 
                 <br />
                 <p class="font"><em class="star_red">*</em> indicates mandatory fields   ,&nbsp;&nbsp;<span class="font">(Your E-Mail ID will be consider as your User ID)</span>
                 <button type="reset" class="submit right" onclick="resetuser()"><strong>&nbsp; Reset </strong></button>
                 <button type="submit" class="submit right"><strong>Submit</strong></button></p>
                 <input type="hidden" name="control" value="user"  />
                 <input type="hidden" name="view" value="myaccount"  />
                 <input type="hidden" name="task" value="register"  />
                 
                 </li>
                 </ul></li>
                   
                 </ul>
             </form>
        		 
        		 
                 
                 
        		 
        	 </div> <!-- END List Wrap -->
         
         </div> <!-- END Organic Tabs (Example One) -->
						</div>
<div class="backgroundPopup"></div>	