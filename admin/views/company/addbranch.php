<div class="detail_right right">
<div class="detail_container">
<div class="head_cont">
<h2 class="testimonial_s">
<table width="99%">
<tr>
<td width="45%"> <?php if($_REQUEST['id']){ ?>Edit Branch<?php }else{ ?>Add Branch  <?php } ?></td> 
<td></td>
<td></td>
<td></td>
</tr>
</table>
</h2>
</div>

<div class="grid_container" id="mmm">

<!--<form method="post" action="index.php" enctype="multipart/form-data">-->

    <table width="98%" cellpadding="1" cellspacing="2" class="tab_regis">

    <tr>
    <td align="right" width="15%" valign="top"><strong>Branch Name:</strong></td>
    <td><input type="text" class="reg_txt" name="branch_name" id="branch_name" value="<?php echo $data['branch_name'];?>" /><div id="bnameid" ></div>
    </td>
    </tr>
    <tr>
    <td align="right" width="15%" valign="top"><strong>Branch Email:</strong></td>
    <td><input type="text" class="reg_txt" name="branch_email" id="branch_email" value="<?php echo $data['branch_email'];?>" /><div id="emailid" ></div>
    </td>
    </tr>
    <tr>
    <td align="right" width="15%" valign="top"><strong>Mobile:</strong></td>
    <td><input type="text" class="reg_txt" name="mobile" id="mobile" value="<?php echo $data['mobile'];?>" /><div id="mobileid" ></div>
    </td>
    </tr>
    <tr>
    <td align="right" width="15%" valign="top"><strong>Phone:</strong></td>
    <td><input type="text" class="reg_txt" name="phone" id="phone" value="<?php echo $data['phone'];?>" /><div id="phoneid" ></div>
    </td>
    </tr>
    <tr>
    <td align="right" width="15%" valign="top"><strong>Fax:</strong></td>
    <td><input type="text" class="reg_txt" name="fax" id="fax" value="<?php echo $data['fax'];?>" /><div id="faxid" ></div>
    </td>
    </tr>
    <tr>
    <td align="right" width="15%" valign="top"><strong>Country:</strong></td>
    <td>
    <select class="reg_txt" name="country" id="country" onchange="fillstate(this.value)" >
    <option value="0">Select Country</option>
    <?php foreach($countrys as $country) {?>
    <option value="<?php echo $country['id'];?>" <?php echo $country['id']==$data['country_id']?"selected":"";?>><?php echo $country['country'];?></option>
    <?php }?>
    </select>
    <div id="countryid" ></div>
    </td>
    <tr>
    <td align="right" width="15%" valign="top"><strong>Province:</strong></td>
    <td>
     <select class="reg_txt" name="province" id="province" onchange="fillcity(this.value)" >
    <option value="0">Select State</option>
    <?php foreach($states as $state) {?>
    <option value="<?php echo $state['id'];?>" <?php echo $state['id']==$data['state_id']?"selected":"";?>><?php echo $state['state'];?></option>
    <?php }?>
    </select>
    <div id="provinceid" ></div>
    </td>
    <tr>
    <td align="right" width="15%" valign="top"><strong>City:</strong></td>
    <td>
     <select class="reg_txt" name="city" id="city" >
    <option value="0">Select City</option>
    <?php foreach($citys as $city) {?>
    <option value="<?php echo $city['id'];?>" <?php echo $city['id']==$data['city_id']?"selected":"";?>><?php echo $city['city'];?></option>
    <?php }?>
    </select>
    <div id="cityid" ></div>
    </td>
    <tr>
    <td align="right" width="15%" valign="top"><strong>Street:</strong></td>
    <td><input type="text" class="reg_txt" name="street" id="street" value="<?php echo $data['street'];?>" /><div id="streetid" ></div>
    </td>
    <tr>
    <td align="right" width="15%" valign="top"><strong>Location:</strong></td>
    <td><input type="text" class="reg_txt" name="location" id="location" value="<?php echo $data['location'];?>" /><div id="locationid" ></div>
    </td>
    <tr>
    <td align="right" width="15%" valign="top"><strong>Address:</strong></td>
    <td><input type="text" class="reg_txt" name="address" id="address" value="<?php echo $data['address'];?>" /><div id="addressid" ></div>
    </td>
    </tr>
    
   
    <tr><td></td><td colspan="2">
    
    </td></tr>
    </table>  
<div id="divid"></div>
<p align="left" style="margin-top:4px;">
<input type="hidden" name="control" value="company"/>
<input type="hidden" name="view" value="company"/>
<input type="hidden" name="task" value="savebranch"/>
<input type="hidden" name="id" value="<?php echo $data['id'] ; ?>" id="id" />
<input type="hidden" name="cid" value="<?php echo $data['company_id']?$data['company_id']:$_REQUEST['cid']; ?>" id="cid" />
<input class="submit" type="button" value="<?php if($_REQUEST['id']){ ?>Update<?php }else{ ?>Save<?php } ?>" onclick="savebranch()" />
<!--<input class="submit" type="Reset" value="Reset" onclick="resett()" />-->
</p> 
<!--</form>-->
</div>
</div>
</div>
<script type="text/javascript">
	function valid_comapany() {
		//if(var abc){}
	}
</script>